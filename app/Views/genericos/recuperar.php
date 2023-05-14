
<section class="bg-login"> 
<div class="container contenedor-form p-4 ">
  <div class="mx-0 row align-items-center justify-content-center">
    <div class="card bg-glass">
        <div class="card-body px-4 py-5 px-md-5">
            
                    <h5 class="card-title mb-4">ACTUALIZAR CONTRASEÑA</h5>
                    <p>Ingresa tu nueva contraseña.</p>
                    <form id="miFormulario" action="<?php echo base_url('/recuperarcontra'); ?>" method="post">
                       
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="input-group-append">
                            <button id="show_password" class="btn btn-primary btn-pass" type="button" onclick="mostrarPassword('show_password')"> 
                                <span class="fa fa-eye-slash icon"></span> 
                            </button>
                            </div>
                            </div>
                            <?php if(isset($validation)){?>
                            <div id="passwordHelp" class="text-danger"><?= $validation->getError('password')?></div>
                            <?php } else{ ?>
                            <div id="passwordHelp" class="text-danger"></div>
                            <?php };?>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <div class="input-group">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
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
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">ACTUALIZAR CONTRASEÑA</button>
                        </div>
                    </form>
                
            
        </div>
    </div>
    </div>  
</div>
</section> 
<script>
    // Seleccione el campo de contraseña y el elemento de ayuda
var password = $("#password");
var passwordHelp = $("#passwordHelp");
let Contravalida = false;
let Contraigual = false;
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
    Contravalida = true;
  } else {
    var helpText = "Cuidado: La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.";
    Contravalida = false;
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
      Contraigual = false;
    } else {
      // Borrar alerta si las contraseñas coinciden
      passwordHelpText.textContent = '';
      Contraigual = true;
    }
  });

// Selecciona el formulario y escucha el evento de envío
document.querySelector('#miFormulario').addEventListener('submit', function(event) {
    // Previene el envío del formulario
    event.preventDefault();
    
    // Verifica si se ha agregado una dirección
    if (Contravalida&&Contraigual) {
        // Muestra la alerta de Sweet Alert 2
        Swal.fire({
            title: 'Contraseña cambiada con éxito',
            icon: 'success'
        });
        
        // Espera 2 segundos antes de enviar el formulario
            setTimeout(function(){
        // Envía el formulario manualmente
        document.getElementById('miFormulario').submit();
    }, 1500);
    } else {
        // Muestra un mensaje de error si no se ha agregado una dirección
        Swal.fire({
            title: 'Error',
            text: 'Debes agregar una contraseña valida',
            icon: 'error'
        });
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