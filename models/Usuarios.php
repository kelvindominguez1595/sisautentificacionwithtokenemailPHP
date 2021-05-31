<?php
    require_once('emails.php');
    require_once('functions.php');
    class Usuarios{
        private $DB;
        public $functions;
        public $id;
        public $nombres;
        public $apellidos;
        public $telefono;
        public $direccion;
        public $fechanacimiento;
        public $pass;
        public $email;
        public $rol_id;
        public $confirmPass;
        public $sexo;
        public $created_at;
        public $updated_at;
        public $deleted_at;

        public function __CONSTRUCT(){
            $this->DB = Database::Conexion();
            $this->functions = new Funciones();
            $this->mail = new Mails();
        }

        public function Validate($data){
            try {
                $sqlcommand = $this->DB->prepare("SELECT * FROM usuarios WHERE email = ?");
                $sqlcommand->execute(array($data->email));

                $response = $sqlcommand->fetch(PDO::FETCH_OBJ);
                $result = '';
                if(empty($response)){
                    $result = 'Usuario no esta registrado!';
                } else {
                    $passEncrypt = password_verify($data->pass, $response->pass);
                    if ($passEncrypt) {
                        $result = $response;
                    } else {
                        $result = 'Error, Verifique usuario o la contraseña';
                    }
                    
                }
                return $result;
            } catch (Throwable $th) {
                die($th->getMessage());
            }
        }

        public function Logged($response){
            try {
                if($response == "Usuario no esta registrado!"){
                    $texto = "El usuario utilizado no esta registrado en nuestra base de datos";
                    $tipo = "info";
                    $route = "Autentificacion&action=Index";
                    $this->functions->SesionesMessage($texto, $tipo, $route);
                    // $_SESSION['logged'] = 2;
                    // exit;
                } elseif($response == "Error, Verifique usuario o la contraseña"){
                    $texto = "Porfavor revise si esta bien escrito el usuaro o la contraseña";
                    $tipo = "error";
                    $route = "Autentificacion&action=Index";
                    $this->functions->SesionesMessage($texto, $tipo, $route);
                    // $_SESSION['logged'] = 2;
                    exit;
                }else{
                    $texto = "Bievenido";
                    $tipo = "success";
                    $route = "Home";
                    $_SESSION['logged'] = 1;
                    $this->functions->SesionesMessage($texto, $tipo, $route);
                }
            } catch (Throwable $th) {
               die($th->getMessage());
            }
        }

        public function Register($data){
            /** DATOS AUTOGUARDADOS PARA NO VOLVER A LLENAR */
                $_SESSION['txtNombres']         = $data->nombres;
                $_SESSION['txtApellidos']       = $data->apellidos;
                $_SESSION['txtTelefono']        = $data->telefono;
                $_SESSION['txtDireccion']       = $data->direccion;
                $_SESSION['txtFechaCumpleanos'] = $data->fechanacimiento;
                $_SESSION['txtEmail']           = $data->email;
                $_SESSION['sexo']               = $data->sexo;
            /**  =================  */
            /** sql INSERT */
            $sqlcommand = "INSERT INTO usuarios(nombres, apellidos, telefono, direccion, fechanacimiento, pass, email, rol_id, sexo, created_at, update_at) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            if($data->pass == $data->confirmPass){

                // Encriptamos la contraseña con HASH
                $passEncrypt = password_hash($data->pass, PASSWORD_BCRYPT);
                // COMENZAMOS LA CONEXION CON PDO
                $pre = $this->DB->prepare($sqlcommand);
                $resul = $pre->execute(array($data->nombres, $data->apellidos, $data->telefono, $data->direccion, $data->fechanacimiento, $passEncrypt, $data->email, $data->rol_id, $data->sexo, $data->created_at, $data->updated_at));

                try {
                        $idusuario = $this->DB->lastInsertId();
                        $TipoProceso   = 2; // 1 confirmado 2-no confir - 3 resetPassword
                        $estado = 1; // 2 inactivo 1 activo
                        $code   =  $this->functions->GenerateCode();
                        $token  =  $this->functions->GenerateToken();
                        if($this->proceso($idusuario, $TipoProceso, $estado, $token, $code)){
                            /** para vlidar el correo electronico */
                            $this->mail->emailDestino       = $data->email;
                            $this->mail->asunto             = 'Confirmar correo Electronico';
                            $this->mail->nombreRemitente    = 'Kelvin Vásquez';
                            $this->mail->emailRemitente     = 'soporte@espartancode.com';
                            $this->mail->code               = $code;
                            $this->mail->token              = $token;
                            $this->mail->domains            = $this->functions->Domains();
                            $this->mail->ConfirmarEmail($this->mail);
                            /** Borramos los datos guardado en sesion del fomulario de registro */
                            unset($_SESSION['txtNombres'], $_SESSION['txtApellidos'], $_SESSION['txtTelefono'], $_SESSION['txtDireccion'], $_SESSION['txtFechaCumpleanos'], $_SESSION['txtEmail'], $_SESSION['sexo']);
        
                            $tipo   = "success";
                            $texto  = "Confirmar EMAIL";
                            $route  = "Autentificacion&action=Confirmarcuenta";
                            $_SESSION['logged'] = 1;

                            $_SESSION['tokengenerate'] = $token;
                            $_SESSION['CodeGeneare'] = $code;
                            $this->functions->SesionesMessage($texto, $tipo, $route);
                        } else {
                            unset($_SESSION['logged']);
                            die("Erro de conexion");
                        }
                    
                } catch (Throwable $th) {
                    //throw $th;
                    unset($_SESSION['logged']);
                    die($th->getMessage());
                }
                /** fi */
            } else {
                unset($_SESSION['logged']);
                $tipo   = "error";
                $texto  = "La contraseña no coinciden";
                $route  = "Autentificacion&action=Registrousuario";
                $this->functions->SesionesMessage($texto, $tipo, $route);
            }

        }
        /** register token en reset password */
        public function proceso($idusuario, $tipo, $estado, $token, $code){
                /** sql INSERT */
                $sqlcommand = "INSERT INTO procesos(usuario_id, tipo_id, codigo, token, fecha_iniciotoken, fecha_fintokeb, created_at, estado) VALUES(?,?,?,?,?,?,?,?)";

                // COMENZAMOS LA CONEXION CON PDO
                $pre = $this->DB->prepare($sqlcommand);
                $resul = $pre->execute(array($idusuario, $tipo, $code, $token, $this->functions->FechaActual(), $this->functions->FechaFinal(5), $this->functions->FechaActual(), $estado));
                return $resul;
        }
    }
?>