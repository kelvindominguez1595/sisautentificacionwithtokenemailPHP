<!-- cuerpo -->
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row center">
      
        <form class="col s12 m6 offset-m3 card" method="POST" action="?view=Autentificacion&action=ValidateRequest">
          <h2 class="header center black-text">Inicio de Sesión</h2>
          <div class="row">
            <div class="col s12 ">
              <?php if(isset($_SESSION['texto'])){ ?>
                <div class="materialert <?php if($_SESSION['tipo'] == "success"){ echo "success";}elseif($_SESSION['tipo'] == "info"){ echo "info";}else{echo "danger"; }?>">
                  <div class="material-icons"> <?php if($_SESSION['tipo'] == "success"){ echo "check";}elseif($_SESSION['tipo'] == "info"){ echo "info_outline";}else{echo "error_outline"; }?> </div>
                  <?php echo $_SESSION['texto'];?>     
                  <?php if($_SESSION['tipo'] == "success"){ echo "Exitos!!! 😊";}elseif($_SESSION['tipo'] == "info"){ echo " 😱";}else{echo "Ooops! Ah Ocurrido un error 😱"; }?> 
                  <?php unset($_SESSION["texto"]); unset($_SESSION["tipo"]); ?>                  
                </div>
              <?php } ?>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">account_circle</i>
              <input id="txtUsuario" type="text" class="validate" name="txtUsuario" required>
              <label for="txtUsuario" >Nombre de usuario</label>
            </div>

            <div class="input-field col s12">
              <i class="material-icons prefix">keyboard</i>
              <input id="txtClave" type="password" class="validate" name="txtClave" required>
              <label for="txtClave">Clave</label>
            </div>
            
 
            <div class="input-field col s12">              
              <button class="btn waves-effect waves-light purple darken-4" >Entrar
                <i class="material-icons right">send</i>
              </button>
            </div>
            <div class="col s12">
              <a href="?view=Autentificacion&action=Resetpassword">¿Has olvidado tu contraseña?</a>
            </div>
            <div class="input-field col s12">              
              <hr>
                <a href="?view=Autentificacion&action=Registrousuario" class="waves-effect waves-light btn purple darken-4"><i class="material-icons right">person_add</i>Crear cuenta</a>

            </div>


          </div>
        </form>
      </div>
      <br><br>
    </div>
  </div>