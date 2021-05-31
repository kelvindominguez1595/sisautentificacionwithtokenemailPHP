<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Proyecto DWEB-2021</title>

  <!-- CSS  -->
  <link href="assets/css/icon.css" rel="stylesheet">
  <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  
<!-- INICIO DEL MENÚ -->
  <nav class="purple darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Inicio</a></li>
        <li><a class='dropdown-trigger tooltipped' href="#" data-target='dropdown_registro' data-position="bottom" data-tooltip="Guardar información">Registro<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class='dropdown-trigger tooltipped' href="#" data-target='dropdown_consultas' data-position="bottom" data-tooltip="Ver información">Consultas<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class='dropdown-trigger tooltipped' href="#" data-target='dropdown_usuario' data-position="bottom" data-tooltip="Usuario activo"><i class="material-icons">account_circle</i></a></li>
      </ul>

      <!-- lista desplegable usuario -->
      <ul id='dropdown_usuario' class='dropdown-content'>
        <li><a href="users/password_page.html"><i class="material-icons">vpn_key</i>Clave</a></li>
        <li><a href="users/create_user_page.html"><i class="material-icons">insert_drive_file</i>Nuevo</a></li>
        
        <li><a href="users/update_user_page.html"><i class="material-icons">edit</i>Editar</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="../index.html"><i class="material-icons">exit_to_app</i>Salir</a></li>
      </ul>
      
      <!-- lista desplegable consultas -->
      <ul id='dropdown_consultas' class='dropdown-content'>
        <li><a href="types/read_type_page.html
          "><i class="material-icons">verified_user</i>Tipos</a></li>
        <li><a href="users/read_user_page.html"><i class="material-icons">account_circle</i>Usuarios</a></li>        
      </ul>
      
      <!-- lista desplegable registro -->
      <ul id='dropdown_registro' class='dropdown-content'>
        <li><a href="types/create_type_page.html"><i class="material-icons">verified_user</i>Tipos</a></li>
        <li><a href="users/create_user_page.html"><i class="material-icons">account_circle</i>Usuarios</a></li>        
      </ul>

      <!-- menú cell -->
      <ul id="nav-mobile" class="sidenav blue-grey lighten-4">        
        <li><a href="#">Inicio</a></li>
        <li><a class='dropdown-trigger tooltipped' href="#" data-target='dropdown_registro_movil' data-position="bottom" data-tooltip="Guardar información">Registro<i class="material-icons right">arrow_drop_down</i></a></li>

        <li><a class='dropdown-trigger tooltipped' href="#" data-target='dropdown_consultas_movil' data-position="bottom" data-tooltip="Ver información">Consultas<i class="material-icons right">arrow_drop_down</i></a></li>

        <li><a class='dropdown-trigger tooltipped' href="#" data-target='dropdown_usuario_movil' data-position="bottom" data-tooltip="Usuario activo"><i class="material-icons">account_circle</i><i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>

      
      <!-- lista desplegable usuario MOVIL -->
      <ul id='dropdown_usuario_movil' class='dropdown-content'>
        <li><a href="users/password_page.html"><i class="material-icons">vpn_key</i>Clave</a></li>

        <li><a href="users/create_user_page.html"><i class="material-icons">insert_drive_file</i>Nuevo</a></li>
        
        <li><a href="users/update_user_page.html"><i class="material-icons">edit</i>Editar</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="../index.html"><i class="material-icons">exit_to_app</i>Salir</a></li>
      </ul>
      
      <!-- lista desplegable consultas MOVIL -->
      <ul id='dropdown_consultas_movil' class='dropdown-content'>
        <li><a href="types/read_type_page.html"><i class="material-icons">verified_user</i>Tipos</a></li>
        <li><a href="users/read_user_page.html"><i class="material-icons">account_circle</i>Usuarios</a></li>        
      </ul>
      
      <!-- lista desplegable registro MOVIL -->
      <ul id='dropdown_registro_movil' class='dropdown-content'>
        <li><a href="types/create_type_page.html"><i class="material-icons">verified_user</i>Tipos</a></li>
        <li><a href="users/create_user_page.html"><i class="material-icons">account_circle</i>Usuarios</a></li>        
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<!-- FIN DEL MENÚ -->