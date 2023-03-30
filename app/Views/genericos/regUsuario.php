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
          <form  action="<?php echo base_url('/RegUsuario'); ?>" method="post">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <h3 class="text-center">Registro</h3>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="name">Nombre(s)</label>
                    <input type="name" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="inputApellido">Apellido</label>
                    <input type="text" id="inputApellido" class="form-control" required/>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label for="password" class="form-label">Contraseña</label>                
                <div class="input-group">
                <input type="password" class="form-control" id="password" name="password">
                    <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('password') ?></small>
                    <?php endif;?>
                  <div class="input-group-append">
                    <button id="show_password" class="btn btn-primary btn-pass" type="button" onclick="mostrarPassword()"> 
                      <span class="fa fa-eye-slash icon"></span> 
                    </button>
                  </div>
                </div>
              </div>
              <!-- Password input -->
              <div class="form-outline mb-4">
                <label for="confirm_password" class="form-label">Confirmar contraseña</label>
                <div class="input-group">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                   <?php if(isset($validation)):?>
                      <small class="text-danger"><?= $validation->getError('confirm_password') ?></small>
                   <?php endif;?>
                  <div class="input-group-append">
                    <button id="show_password_2" class="btn btn-primary btn-pass" type="button" onclick="mostrarPassword()">
                      <span class="fa fa-eye-slash icon"></span> 
                    </button>
                  </div>
                </div>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="terms" required/>
                <label class="form-check-label" for="terms">
                  Acepto términos y condiciones
                </label>
              </div>

              <div class="d-flex justify-content-center mb-4 g-recaptcha brochure__form__captcha" data-sitekey="6Lfqa3okAAAAAFeDDk0pDfN9TZJ3DrL57bCICsxI" style="display: inline-block;"></div>

              <!-- Submit button -->
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-jumbotron btn-block mb-4">
                  Registrar
                </button>
              </div>

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
function mostrarPassword(id){
  var cambio = document.getElementById(id);
  if(cambio.type == "password"){
    cambio.type = "text";
    $('#' + id + '_icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  }else{
    cambio.type = "password";
    $('#' + id + '_icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }
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

<script src="https://www.google.com/recaptcha/api.js" async defer></script>