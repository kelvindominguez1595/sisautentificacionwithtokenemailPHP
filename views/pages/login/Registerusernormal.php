  <!-- cuerpo -->
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row center">
      <form class="col s12 card" action="?view=Usuarios&action=Crearusuario" method="POST">
          <h3 class="header center black-text">Nuevo usuario</h3>
          
          <div class="row">

          <div class="col s12 ">
              <?php if(isset($_SESSION['texto'])){ ?>
                <div class="materialert <?php if($_SESSION['tipo'] == "success"){ echo "success";}elseif($_SESSION['tipo'] == "info"){ echo "info";}else{echo "danger"; }?>">
                  <div class="material-icons"> <?php if($_SESSION['tipo'] == "success"){ echo "check";}elseif($_SESSION['tipo'] == "info"){ echo "info_outline";}else{ echo "error"; }?> </div>
                  <?php echo $_SESSION['texto'];?>     
                  <?php if($_SESSION['tipo'] == "success"){ echo "Exitos!!! 😊";}elseif($_SESSION['tipo'] == "info"){ echo " 😱";}else{echo "😪"; }?> 
                  <?php unset($_SESSION["texto"]); unset($_SESSION["tipo"]); ?>                  
                </div>
              <?php } ?>
            </div>

            <div class="input-field col s12 m6 l6 xl6">
              <i class="material-icons prefix">person</i>         
   
              <input id="txtNombres" type="text" class="validate" name="txtNombres" value="<?php if(isset($_SESSION['txtNombres'])){ echo $_SESSION['txtNombres']; } ?>" required>
              <label for="txtNombres" >Nombres</label>
            </div>
            <div class="input-field col s12 m6 l6 xl6">
              <i class="material-icons prefix">person</i>
              <input id="txtApellidos" type="text" class="validate" name="txtApellidos" value="<?php if(isset($_SESSION['txtApellidos'])){ echo $_SESSION['txtApellidos']; } ?>" required>
              <label for="txtApellidos" >Apellidos</label>
            </div>

            <div class="input-field col s12 m12 l8 xl8">
              <i class="material-icons prefix">email</i>
              <input type="email" name="txtEmail" id="txtEmail" class="validate" value="<?php if(isset($_SESSION['txtEmail'])){ echo $_SESSION['txtEmail']; } ?>" required>
              <label for="txtEmail">Email</label>
            </div>
            <div class="input-field col s12 m12 l4 xl4">
              <i class="material-icons prefix">event</i>
              <input type="date" name="txtFechaCumpleanos" id="txtFechaCumpleanos" value="<?php if(isset($_SESSION['txtFechaCumpleanos'])){ echo $_SESSION['txtFechaCumpleanos']; } ?>" class="validate datepicker" required>
              <label for="txtFechaCumpleanos">Fecha cumpleaños</label>
            </div>
            <div class="input-field col s12 m12 l12 xl12">
              <i class="material-icons prefix">location_on</i>
              <input type="text" name="txtDireccion" id="txtDireccion" value="<?php if(isset($_SESSION['txtDireccion'])){ echo $_SESSION['txtDireccion']; } ?>" class="validate" required>
              <label for="txtDireccion">Dirección</label>
            </div>

            <div class="input-field col s12 m6 l6 xl6">
              <i class="material-icons prefix">lock</i>
              <input id="txtPassowrd" type="password" class="validate" name="txtPassowrd" required>
              <label for="txtPassowrd" >Contraseña</label>
            </div>

            <div class="input-field col s12 m6 l6 xl6">
              <i class="material-icons prefix">lock</i>
              <input id="txtConfirmPassword" type="password" class="validate" name="txtConfirmPassword" required>
              <label for="txtConfirmPassword" >Repetir contraseña</label>
            </div>

            <div class="input-field col s12 m6 l6 xl6">
              <i class="material-icons prefix">phone</i>
              <input id="txtTelefono" name="txtTelefono" type="text" class="validate" value="<?php if(isset($_SESSION['txtTelefono'])){ echo $_SESSION['txtTelefono']; } ?>" placeholder="+(503)0000-0000" >
              <label for="txtTelefono">Telefóno</label>
              <input type="hidden" name="rol_id" id="rol_id" value="2">
            </div>
            <div class="input-field col s12 m6 l6 xl6">
                  <select id="sexo" name="sexo" required>
                    <option value="" disabled selected>Sexo</option>
                    <option value="Hombre" <?php if(isset($_SESSION['rol_id'])){ if($_SESSION['rol_id'] == 'Hombre'){ echo 'selected'; } }?> >Hombre</option>
                    <option value="Mujer" <?php if(isset($_SESSION['rol_id'])){ if($_SESSION['rol_id'] == 'Mujer'){ echo 'selected'; } }?> >Mujer</option>
                    <option value="Prefiero no decir" <?php if(isset($_SESSION['rol_id'])){ if($_SESSION['rol_id'] == 'Prefiero no decir'){ echo 'selected'; } }?> >Prefiero no decir</option>
                  </select>
                  <label>Sexo</label>
            </div>



          </div>

          <div class="row">
            <div class="input-field col s12">    
            <a href="?view=Autentificacion&action=Index" class="waves-effect waves-light btn purple darken-4"><i class="material-icons right">send</i>Iniciar Sesión</a>
          
              <button type="submit" class="btn waves-effect waves-light black" >guardar
                <i class="material-icons right">save</i>
              </button>        
            </div>
            
          </div>
        </form>

  
      </div>
      
      <br><br>

    </div>
  </div>
<!--fin del cuerpo -->