<section class="background-imagn overflow-hidden" style="padding-top: 60px;">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Regístrate para <br/>
          <span style="color: #9162DD">obtener beneficios</span>
        </h1>
        <p class="mb-4">
          <li class="text-promos">Obtendrás un 15% de descuento en tu primera compra</li>
          <li class="text-promos">Tendrás acceso a contenido y productos exclusivos</li>
          <li class="text-promos">Participar en carreras patrocinadas con Kits Tec-Shirts</li>
          <li class="text-promos">Podrás obtener meses sin intereses y envíos gratis</li>
          <li class="text-promos">Recibirás promociones especiales antes que los demás</li>
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form id="miFormulario" action="<?php echo base_url('/RegUsuario'); ?>" method="post">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <h3 class="text-center" style="font-family: adineue PRO, sans-serif;">Registro</h3>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="name">Nombre(s)</label>
                    <input type="name" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="inputApellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" value="<?= set_value('apellido') ?>" required/>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                <?php if(isset($validation)){?>
                    <div id="emailHelp" class="text-danger"><?= $validation->getError('email')?></div>
                    <?php } else{ ?>
                    <div id="emailHelp" class="text-danger"></div>
                    <?php };?>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label for="password" class="form-label">Contraseña</label>                
                <div class="input-group">
                  <input type="password" class="form-control" id="password" name="password" required>
                    <div class="input-group-append">
                      <button id="show_password" class="btn btn-primary btn-pass" type="button" onclick="mostrarPassword('show_password')"> 
                        <span class="fa fa-eye-slash icon"></span> 
                      </button>
                    </div>
                    <?php if(isset($validation)){?>
                    <div id="passwordHelp" class="text-danger"><?= $validation->getError('password')?></div>
                    <?php } else{ ?>
                    <div id="passwordHelp" class="text-danger"></div>
                    <?php };?>
                </div>
              </div>
              <!-- Password input -->
              <div class="form-outline mb-4">
                <label for="confirm_password" class="form-label">Confirmar contraseña</label>
                <div class="input-group">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                  <div class="input-group-append">
                    <button id="show_password_2" class="btn btn-primary btn-pass" type="button" onclick="mostrarPassword('show_password_2')">
                      <span class="fa fa-eye-slash icon"></span> 
                    </button>
                  </div>
                </div>
                <?php if(isset($validation)){?>
                <div id="passwordMatch" class="text-danger"><?= $validation->getError('confirm_password') ?></div>
                <?php }else{ ?>
                <div id="passwordMatch" class="text-danger"></div>
                <?php } ;?>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <label class="form-check-label" for="terms">
                Este formulario se encuentra protegido por el servicio de Google ReCAPTCHA versión 2.
                </label>
              </div>
              
              <!-- Captcha -->
              <?php if(isset($captcha_error)){?>
              <div style="text-align: center;">
                <div id="captchaError" class="text-danger"><?php echo $captcha_error ?></div>
              </div>
              <?php } ?>
              <div class="d-flex justify-content-center mb-4 g-recaptcha" data-sitekey="6Lf8L8MlAAAAAPeWtV9JjVtDpz9Hmjv-dgTc-QV1"></div>
  
              <!-- Submit button -->
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-jumbotron btn-block mb-4">
                  Registrar
                </button>
              </div>
              <div id="mensaje"></div>

              <!-- Register buttons -->
              <div class="text-center">
                <p>También puedes registarte con:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f icon-register"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google icon-register"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter icon-register"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">

// Seleccione el campo de contraseña y el elemento de ayuda
var password = $("#password");
var passwordHelp = $("#passwordHelp");

// Verificar la contraseña en tiempo real
password.on("input", function() {
  var value = password.val();
  var validLength = value.length >= 8;
  var hasNumber = /\d/.test(value);
  var hasUppercase = /[A-Z]/.test(value);
  var hasLowercase = /[a-z]/.test(value);
  var validPassword = validLength && hasNumber && hasUppercase && hasLowercase;
  if (validPassword) {
    passwordHelp.html("");
  } else {
    var helpText = "Cuidado: La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.";
    passwordHelp.html(helpText);
  }
});

  // Obtener referencias a los elementos de los inputs
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('confirm_password');
  const passwordHelpText = document.getElementById('passwordMatch');

  // Agregar listener al evento "input" del input de confirmación de contraseña
  confirmPasswordInput.addEventListener('input', function() {
    if (confirmPasswordInput.value !== passwordInput.value) {
      // Mostrar alerta si las contraseñas no coinciden
      passwordHelpText.textContent = 'Cuidado: Las contraseñas no coinciden.';
    } else {
      // Borrar alerta si las contraseñas coinciden
      passwordHelpText.textContent = '';
    }
  });

function mostrarPassword(idBoton) {
  var passwordField = document.getElementById(idBoton).parentNode.previousElementSibling;
  var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordField.setAttribute('type', type);
  var icon = document.getElementById(idBoton).getElementsByTagName('span')[0];
  icon.classList.toggle('fa-eye-slash');
  icon.classList.toggle('fa-eye');
}

$(document).ready(function () {
  //CheckBox mostrar contraseña
  $('#show_password').click(function () {
    mostrarPassword('password');
  });
  
  $('#show_password_2').click(function () {
    mostrarPassword('confirm_password');
  });
});

//  $('#miFormulario').submit(function(event) {
//    var form = $('#miFormulario');
//  event.preventDefault(); // previene la acción por defecto del formulario (recargar la página)
//  var formData = form.serialize(); // obtiene los datos del formulario
//  $.ajax({
//    url: $(this).attr('action'), // la URL a la que se enviarán los datos del formulario
//    type: $(this).attr('method'), // el método HTTP utilizado para enviar los datos del formulario (POST)
//    data: formData, // los datos del formulario
//    success: function(response) {
//        console.log(response);
//      if (response && response.success) {
//        // Mensaje de éxito
//        $('#mensaje').html('<div class="alert alert-success">' + response.mensaje + '</div>');
//        setTimeout(function() {
//        window.location.href = '<?php //echo base_url('/login'); ?>';
//    }, 3500);
//      } else {
//        // Mensaje de error
//        $('#mensaje').html('<div class="alert alert-danger">' + response.mensaje + '</div>');
//      }
//    },
//    error: function(jqXHR, textStatus, errorThrown) {
//      console.log(textStatus, errorThrown);
//    }
//  });
//});
</script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>