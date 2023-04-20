<section class="bg-login">
    <div class="container contenedor-form p-4 ">
        <div class="mx-0 row align-items-center justify-content-center">
        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
          <?php if(session()->getFlashdata('error')):?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif;?>
            <form action="<?php echo base_url('/login'); ?>" method="post">
              <!-- Inicio-->
            <div class="row">
                <h3 class="text-center" style="font-family: adineue PRO, sans-serif;">Iniciar Sesión</h3>
                <div class="form-outline mb-4">
                    <div class="form-outline">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
                    </div>
                </div>
              <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Contraseña</label>
                    <div class="input-group">
                        <input ID="password" type="password" Class="form-control">
                        <div class="input-group-append">
                            <button id="show_password" class="btn btn-primary btn-pass" type="button" onclick="mostrarPassword()"> 
                            <span class="fa fa-eye-slash icon"></span> 
                            </button>
                        </div>
                    </div>
                </div>

              <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form2Example31"/>
                      <label class="form-check-label" for="form2Example31"> Recordarme </label>
                    </div>
                  </div>
                </div>

              <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-jumbotron btn-block mb-4 w-50">
                    Login
                    </button>
                </div>

                <div class="text-center">
                <p>¿Todavía no eres miembro? <br> <a href="<?php echo base_url()?>/registro">Regístrate gratis ahora</a></p>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
</section>

<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>

<style scoped>
.bg-login{
  background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(https://i2.wp.com/www.fantasticmag.es/wordpress2/wp-content/archivos/2017/03/nike-plus-size-ok.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  min-height: 100vh;
  color: #818181;
  padding: 15%;
}

.contenedor-form {
    max-width: 70vh;
}
@media screen and (max-width: 590px) {
    .bg-login{
        padding-top: 40% !important;
    }
}
</style>
