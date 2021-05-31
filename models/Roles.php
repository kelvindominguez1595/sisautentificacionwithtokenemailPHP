<?php
    class Roles{
        private $DB;
        private $id;
        private $nombre;
        
        public function __CONSTRUCT(){
            try {
                $this->DB = Database::Conexion();
            } catch (Throwable $th) {
                $this->DB = Database::Desconexion();
                die($th->getMessage());
            }
        }

        public function RegistrarRol($data){
            try{
                // Comando SQL
                $sql = "INSERT INTO roles(nombre) VALUES(?)";

                // COMENZAMOS LA CONEXION CON PDO
                $pre = $this->DB->prepare($sql);
                $resul = $pre->execute(array($data->nombre));
                if($resul > 0){ 
                    return true;
                }else{ 
                    return false;
                }
            }catch(Throwable $t){
                die($t->getMessage());
            }
        }
        // Metodo para listar los roles
        public function ListarRoles(){
            try{        
                $commd = $this->DB->prepare("SELECT * FROM roles");
                $commd->execute();
                return $commd->fetchAll(PDO::FETCH_OBJ);
            }catch(Throwable $t){
                die($t->getMessage());
            }
        }

        // Metodo para obtener un registro en especifico
        public function obtenerRegistro($id){
            try{        
                $commd = $this->DB->prepare("SELECT * FROM roles WHERE id = ?");
                $commd->execute(array($id));
                return $commd->fetch(PDO::FETCH_OBJ);
            }catch(Throwable $t){
                die($t->getMessage());
            }
        }

        // Actualizar
        public function actualizarRol($data){
            try{
                // Comando SQL
                $sql = "UPDATE roles SET nombre = ? WHERE id = ?";

                // COMENZAMOS LA CONEXION CON PDO
                $pre = $this->DB->prepare($sql);
                $resul = $pre->execute(array($data->nombre, $data->id));
                if($resul > 0){ 
                    return true;
                }else{ 
                    return false;
                }
            }catch(Throwable $t){
                die($t->getMessage());
            }
        }
        // Borrar
        public function deleteRol($data){
            try{
                // Comando SQL
                $sql = "DELETE FROM roles  WHERE id = ?";
                // COMENZAMOS LA CONEXION CON PDO
                $pre = $this->DB->prepare($sql);
                $resul = $pre->execute(array($data->id));
                if($resul > 0){ 
                    return true;
                }else{ 
                    return false;
                }
            }catch(Throwable $t){
                die($t->getMessage());
            }
        }
        // Para los mensajes
        public function SesionesMessage($texto, $tipo){
            $_SESSION['texto'] = $texto;
            $_SESSION['tipo'] = $tipo;
            header("Location: ?view=Roles");
        }
    }
?>