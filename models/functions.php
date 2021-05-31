<?php
    class Funciones{
        // Obtene la fecha actual del host
        public function FechaActual(){
            date_default_timezone_set('America/El_Salvador');  
            $date = date('Y-m-d H:i:s');
            return $date;
        }

        /** Fecha final */
        public function FechaFinal($days){
            $final = date("Y-m-d H:i:s",strtotime($this->FechaActual()."+ ".$days." days"));
            return $final;
        }

        // Obtengo el dominio **servira para enviar correos **
        public function Domains(){
            $host = $_SERVER['HTTP_HOST'];
            return $host;
        }
        
        // Genero un token el cual sera aleatorio
        public function GenerateToken(){
            $token = password_hash("PROYECTOFINA", PASSWORD_BCRYPT);
            return $token;
        }

        // Genero un codigo para validar la contraseña o la cuenta de correo
        public function GenerateCode(){
            $code = rand(100000,999999);
            return $code;
        }

        // Para mostrar alertas y redireccionar
        public function SesionesMessage($texto, $tipo, $ruta){
            $_SESSION['texto'] = $texto;
            $_SESSION['tipo'] = $tipo;
            header("Location: ?view=".$ruta);
        }

        // formatear fecha
        public function Fechaformater($date){
            $date = date("Y-m-d", strtotime($date));
            return $date;
        }
    }
 /*    $date = new Funciones();
    echo $date->FechaActual()."<br>";
    echo $date->FechaFinal(15); */
?>