<!-- cuerpo -->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row center">
      
        <form class="col s12 m6 offset-m3 card" method="POST" action="?view=Autentificacion&action=ValidateRequest">
          <h2 class="header center black-text">Confirmar cuenta</h2>
          <div class="row">
            <div class="col s12">
                <blockquote>
                Por favor escriba aquí el código que se le ha enviado a su cuenta de correo electrónico.
                </blockquote>          
            </div>
            <!-- <div class="col s12 ">
              <?php if(isset($_SESSION['texto'])){ ?>
                <div class="materialert <?php if($_SESSION['tipo'] == "success"){ echo "success";}elseif($_SESSION['tipo'] == "info"){ echo "info";}else{echo "danger"; }?>">
                  <div class="material-icons"> <?php if($_SESSION['tipo'] == "success"){ echo "check";}elseif($_SESSION['tipo'] == "info"){ echo "info_outline";}else{echo "error_outline"; }?> </div>
                  <?php echo $_SESSION['texto'];?>     
                  <?php if($_SESSION['tipo'] == "success"){ echo "Exitos!!! 😊";}elseif($_SESSION['tipo'] == "info"){ echo " 😱";}else{echo "Ooops! Ah Ocurrido un error 😱"; }?> 
                  <?php unset($_SESSION["texto"]); unset($_SESSION["tipo"]); ?>                  
                </div>
              <?php } ?>
            </div> -->

            <?php            
                if(isset($_SESSION['tokengenerate']) && isset($_SESSION['CodeGeneare'])){
                  echo $_SESSION['tokengenerate']."<br>".$_SESSION['CodeGeneare'];
                }
            ?>

            <div class="input-field col s12">
              <i class="material-icons prefix">keyboard</i>
              <input id="txtCodigo" type="text" class="validate" name="txtCodigo" placeholder="000000" maxlength="6" required>
              <label for="txtCodigo" >Código</label>
            </div>

 
            <div class="input-field col s12">              
              <button class="btn waves-effect waves-light purple darken-4" >Verificar
              </button>
            </div>
          </div>
        </form>
      </div>
      <br><br>
    </div>
  </div>