<!-- cuerpo -->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row center">
      
        <form class="col s12 m6 offset-m3 card" method="POST" action="?view=Autentificacion&action=ValidateRequest">
          <h2 class="header center black-text">Cambiar contraseña</h2>
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
              <i class="material-icons prefix">lock</i>
              <input id="txtPassword" type="password" class="validate" name="txtPassword" required>
              <label for="txtPassword" >Nueva Contraseña</label>
            </div> 
            
            <div class="input-field col s12">
              <i class="material-icons prefix">lock</i>
              <input id="txtConfirmarPass" type="password" class="validate" name="txtConfirmarPass" required>
              <label for="txtConfirmarPass" >Confirmar Contraseña</label>
            </div> 

            <div class="input-field col s12">              
              <button class="btn waves-effect waves-light purple darken-4" >Enviar
              </button>
            </div>
          </div>
        </form>
      </div>
      <br><br>
    </div>
  </div>