<?php
    require_once('models/Usuarios.php');

    class UsuariosController{
        private $model;
        public function __CONSTRUCT(){
            $this->model = new Usuarios();
        }

        public function Index(){



        }

        public function Crearusuario(){
            $this->model->nombres           = $_REQUEST['txtNombres'];
            $this->model->apellidos         = $_REQUEST['txtApellidos'];
            $this->model->telefono          = $_REQUEST['txtTelefono'];
            $this->model->direccion         = $_REQUEST['txtDireccion'];
            $this->model->fechanacimiento   = $this->model->functions->Fechaformater($_REQUEST['txtFechaCumpleanos']);
            $this->model->pass              = $_REQUEST['txtPassowrd'];
            $this->model->email             = $_REQUEST['txtEmail'];
            $this->model->rol_id            = $_REQUEST['rol_id'];
            $this->model->confirmPass       = $_REQUEST['txtConfirmPassword'];
            $this->model->sexo              = $_REQUEST['sexo'];
            $this->model->created_at        = $this->model->functions->FechaActual();
            $this->model->updated_at        = $this->model->functions->FechaActual(); 
            $this->model->Register($this->model);
        }

        public function Verificacion(){

        }
    }
?>