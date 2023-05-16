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
                <h3 class="text-center" style="font-family: adineue PRO, sans-serif;">Iniciar Sesión<br></h3>

                <?php if(isset($confirmacion)){?>
                  <div style="text-align: center;">
                    <div class="alert alert-success text-center"><?php echo $confirmacion ?></div>
                  </div>
                <?php }?>

                <div class="form-outline mb-4">
                    <div class="form-outline">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_COOKIE['login_email']) ? $_COOKIE['login_email'] : ''; ?>" required>
                    </div>
                </div>
              <!-- Password input -->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group">
                     <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_COOKIE['login_password']) ? $_COOKIE['login_password'] : ''; ?>">
                        <div class="input-group-append">
                            <button id="show_password" class="btn btn-primary btn-pass" type="button" onclick="mostrarPassword()"> 
                            <span class="fa fa-eye-slash icon"></span> 
                            </button>
                            </div>
                </div>

              <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1" <?php if(isset($_COOKIE['login_email']) && $_COOKIE['login_password']) echo 'checked'; ?>>
                    <label class="form-check-label" for="remember">Recuerdame</label>
                    </div>
                  </div>
                </div>

              <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-jumbotron btn-block mb-4 w-50">
                    Iniciar sesión
                    </button>
                </div>

                <div class="text-center">
                <p>¿Todavía no eres miembro? <br> <a href="<?php echo base_url()?>/registro">Regístrate gratis ahora</a></p>
                <p class="text-center"><a href="<?php echo base_url('/'); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">¿Olvidaste tu contraseña?</a><p>
                </form>
          </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RESTABLECER TU CONTRASEÑA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Ingresa tu dirección de correo electrónico y te enviaremos instrucciones para restablecer la contraseña.</p>
        <form id="miFormulario" action="<?php echo base_url('/recuperarcontraseña');?>" method="POST">
            <input type="email" name="email" placeholder="Dirección de correo electrónico" style="WIDTH: 100%;" required>
            <?php if(session()->getFlashdata('message')):?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('message') ?>
                        </div>
                <?php endif;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Restablecer</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">

function mostrarPassword(){
    var cambio = document.getElementById("password");
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

$('#miFormulario').submit(function(event) {
    var form = $('#miFormulario');
  event.preventDefault(); // previene la acción por defecto del formulario (recargar la página)
  var formData = form.serialize(); // obtiene los datos del formulario
  $.ajax({
    url: $(this).attr('action'), // la URL a la que se enviarán los datos del formulario
    type: $(this).attr('method'), // el método HTTP utilizado para enviar los datos del formulario (POST)
    data: formData, // los datos del formulario
    success: function(response) {
        console.log(response);
      if (response.success) {
        // Mensaje de éxito
        $('#miFormulario .alert').remove();
        $('#miFormulario').append('<div class="alert alert-success">' + response.mensaje + '</div>');
      } else {
        // Mensaje de error
        $('#miFormulario .alert').remove();
        $('#miFormulario').append('<div class="alert alert-danger">' + response.mensaje + '</div>');
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
});

$('#exampleModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
    $('.modal-body').find('.alert').remove();
    $('.modal-body').find('.alert-success').remove();
})

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
