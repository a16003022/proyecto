<!-- Section: Design Block -->
<section class="background-imagn overflow-hidden">
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
          <form>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <h3 class="text-center">Registro</h3>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="inputNombre">Nombre(s)</label>
                    <input type="text" id="inputNombre" class="form-control" required/>
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
                <label class="form-label " for="inputEmail" >Correo electrónico</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="nombre@ejemplo.com" required/>
                
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="inputPassword">Contraseña</label>
                <div class="input-group">
                  <input ID="txtPassword" type="Password" Class="form-control">
                  <div class="input-group-append">
                    <button id="show_password" class="btn btn-primary btn-pass" type="button" onclick="mostrarPassword()"> 
                      <span class="fa fa-eye-slash icon"></span> 
                    </button>
                  </div>
                </div>
              </div>
              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="confirmPass">Confirmar contraseña</label>
                <div class="input-group">
                  <input ID="txtPassword" type="Password" Class="form-control">
                  <div class="input-group-append">
                    <button id="show_password" class="btn btn-primary btn-pass" type="button" onclick="mostrarPassword()">
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
<!-- Section: Design Block 
<div class=" row centrar-marca text-center p-3">
    <div class="col-4 col-sm-12 col-md-4 caja">
    <img src="<?php echo base_url()?>/imagenes/nike.png" class="marcas ">
    </div>
    <div class="col-4 col-sm-12 col-md-4  caja">
    <img src="<?php echo base_url()?>/imagenes/Adidas.png" class="marcas" >
    </div>
    <div class="col-4 col-sm-12 col-md-4  caja">
    <img src="<?php echo base_url()?>/imagenes/puma.png" class="marcas" >
    </div>
</div>-->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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