<?php
  // Crear sesiones
  session_start();
  // Conexion a la base de datos
  require_once('config/Database.php');
// echo $_SESSION['logged'];
  if (isset($_SESSION['logged'])) {
    // if (isset($_REQUEST['view'])) {
      if($_SESSION['logged'] == 1){
        $controller = $_REQUEST['view'];
        if (isset($_REQUEST['action'])) {
          $accion = $_REQUEST['action'];
        }else{
          $controller = 'Home';
          $accion = 'Home';
        }
        require_once 'controller/'.$controller.'Controller.php';
        $controller = $controller.'Controller';
        $controller = new $controller;
        call_user_func(array($controller, $accion));
      }
  } else {
     if (isset($_REQUEST['view'])) {
      $controller = $_REQUEST['view'];
      if (isset($_REQUEST['action'])) {
        $accion = $_REQUEST['action'];
      }
      require_once 'controller/'.$controller.'Controller.php';
      $controller = $controller.'Controller';
      $controller = new $controller;
      call_user_func(array($controller, $accion));
     }else{
       $controller = 'Autentificacion';
       require_once 'controller/'.$controller.'Controller.php';
       $controller = new AutentificacionController();
       $controller->Index();
     }
  }
?>