<?php
/*     require_once 'Model/Productos.php';
    require_once 'Model/Categorias.php';
    require_once 'Model/Ventas.php'; */
    class HomeController{
        private $model;
        private $modelCategorias;
        private $modelVentas;

        public function __CONSTRUCT(){
    /*         $this->model = new Productos();
            $this->modelCategorias = new Categorias();
            $this->modelVentas = new Ventas(); */
        }
        
        public function Home(){
            // require_once 'views/frontend/header.php';
            // require_once 'views/frontend/Home/index.php';
            // require_once 'views/frontend/footer.php';
        }

        public function Roles(){
     /*    require_once 'views/frontend/header.php';
        require_once 'views/frontend/Contacto/index.php';
        require_once 'views/frontend/footer.php'; */
        }

        public function Usuarios(){
           /*  require_once 'views/frontend/header.php';
            require_once 'views/frontend/Home/acerca.php';
            require_once 'views/frontend/footer.php'; */
        }

        public function Reportes(){
         /*    require_once 'views/frontend/header.php';
            require_once 'views/frontend/Home/acerca.php';
            require_once 'views/frontend/footer.php'; */
        }
    }
?><?php
require_once('models/Usuarios.php');
class AutentificacionController{
    private $model;
    public function __CONSTRUCT(){
        $this->model = new Usuarios();
    }

    public function Index(){

        /*           unset($_SESSION['id']);
        unset($_SESSION['nombres']);
        unset($_SESSION['apellidos']);
        unset($_SESSION['usuario']);
        unset($_SESSION['imagen']);
        unset($_SESSION['roles_id']);
        unset($_SESSION['state']);    */
        unset($_SESSION['authen']);
        $_SESSION['authen'] = 2;
        require_once 'views/layouts/headeauten.php';
        require_once 'views/pages/login/index.php';
        require_once 'views/layouts/footerauten.php';
    }

    public function ValidateRequest(){
        $this->model->email = $_REQUEST['txtUsuario'];
        $this->model->$pass = $_REQUEST['txtClave'];
        
        $auten = $this->model->Validate($this->model);
        $this->model->Logged($auten);
    }

    public function Registrousuario(){
        require_once 'views/layouts/headeauten.php';
        require_once 'views/pages/login/Registerusernormal.php';
        require_once 'views/layouts/footerauten.php';
    }

    public function Confirmarcuenta(){            
        require_once 'views/layouts/headeauten.php';
        require_once 'views/pages/validacion/confirmarcuenta.php';
        require_once 'views/layouts/footerauten.php';
    }

    public function Verificacion(){

    }

    public function Resetpassword(){
        require_once 'views/layouts/headeauten.php';
        require_once 'views/pages/validacion/resetpasswordEmail.php';
        require_once 'views/layouts/footerauten.php';
    }

    public function NewPassword(){
        /** esperar parametros */
        require_once 'views/layouts/headeauten.php';
        require_once 'views/pages/validacion/changepassword.php';
        require_once 'views/layouts/footerauten.php';
    }
}
?>