<div class="video_header" style="padding-top: 60px;">

  <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
  <div class="overlay"></div>

  <!-- The HTML5 video element that will create the background video on the header -->
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="<?php echo base_url()?>/imagenes/video_header.mp4" type="video/mp4">
  </video>

  <!-- The header content -->
  <div class="container  h-100">
    <div class="d-flex h-100 text-center align-items-center ">
      <div class="w-100 text-white">
        <h1 class="display-3 video-text">TEC-SHIRTS</h1>
        <p class="lead mb-0 text-10">¡Inscribete a la 10° carrera 10k-Yucatán y recibe tu kit TEC-SHIRTS! </p>
        <form class="form col-lg-6 col-sm-12 center">
          <div>
              <button type="button" class="btn btn-danger btn-jumbotron w-25">Inscribirme</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<section style="height: 80vh;">
      <div class="row p-0 mx-0">
        <div class="col-12 col-lg-6 col-md-6 col-sm-12 centrado" id="about">
            <div class="mx-auto">
                <div class="container p-5 text-about">
                    <h2 class="text-about">Sobre nosotros</h2>
                    <h6>Somos Tec-Shirts, una empresa ubicada en Mérida, Yucatán, dedicada a la producción y venta de ropa de alta calidad. Nos enorgullece ofrecer productos con un estilo fresco y moderno, hechos con materiales de la más alta calidad.<br> <br>Además de nuestra amplia gama de ropa, en Tec-Shirts también ofrecemos una línea de bolsas térmicas de alta calidad. Estas bolsas están diseñadas para mantener tus alimentos y bebidas a la temperatura perfecta, ya sea en el trabajo, en un picnic o en un viaje.
                    <br><br>Nos esforzamos por utilizar materiales duraderos y respetuosos con el medio ambiente en la fabricación de nuestras bolsas térmicas, y por ofrecer una amplia variedad de tamaños y estilos para satisfacer las necesidades de todos nuestros clientes.</h6>
                    <br><button type="button" class="btn btn-dark btn_contacto"><a class="btn-contact" href="#contact">Contáctanos</a></button>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6 col-sm-12 p-0">
            <img class="w-100 my-auto" src="<?php echo base_url()?>/imagenes/sudadera3.jpg"/>
        </div>
    </div>
</section>
<!-- Container (About Section) 
<div id="about" class="container nosotros">
  <div class="row d-flex  align-items-center">
    <div class="col-lg-10 col-md-12">
      <h2>Sobre Nosotros</h2><br>
      <h4>Somos Tec-Shirts, una empresa ubicada en Mérida, Yucatán, dedicada a la producción y venta de ropa de alta calidad. Nos enorgullece ofrecer productos con un estilo fresco y moderno, hechos con materiales de la más alta calidad.<br> <br>Además de nuestra amplia gama de ropa, en Tec-Shirts también ofrecemos una línea de bolsas térmicas de alta calidad. Estas bolsas están diseñadas para mantener tus alimentos y bebidas a la temperatura perfecta, ya sea en el trabajo, en un picnic o en un viaje.

      <br><br>Nos esforzamos por utilizar materiales duraderos y respetuosos con el medio ambiente en la fabricación de nuestras bolsas térmicas, y por ofrecer una amplia variedad de tamaños y estilos para satisfacer las necesidades de todos nuestros clientes.</p>
      <br><button type="button" class="btn btn-dark btn_contacto"><a class="btn-contact" href="#contact">Contáctanos</a></button>
    </div>
    <div class="col-lg-2 imgdiv">
      <img class="nosotros_img" src="<?php echo base_url()?>/imagenes/sudadera3.jpg"/>
    </div>
  </div>
</div>-->
<!--Carousel-->
<div id="promoCarousel" class="carousel slide" data-bs-ride="carousel" >
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active text-center" data-bs-interval='5000'>
                <img src="<?php echo base_url()?>/imagenes/carousel3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption px-4 col-7 col-lg-5 col-md-5 col-sm-7">
                    <h2 class="text-white">¡Registrate!</h2>
                    <p>
                    ¡Obtén un 15% de descuento en tu primera compra!
                    </p>
                    <a href="#section-contacto" class="btn-jumbotron btn btn-primary mr-auto">Registrarme</a>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval='3000'>
                <img src="<?php echo base_url()?>/imagenes/carousel1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption px-4 col-7 col-lg-5 col-md-5 col-sm-7">
                    <h2 class="text-white text-left col-8 mr-auto">Misión</h2>
                    <p>
                    Nuestra misión es proporcionar a nuestros clientes ropa de alta calidad, con un enfoque en la moda y el estilo, mientras mantenemos una cultura de responsabilidad social y sostenibilidad. 
                    </p>
                    <a href="#section-contacto" class="btn-jumbotron btn btn-primary mr-auto " data-toggle="modal" data-target="modal-contacto" data-backdrop="static" data-keyboard="false">Contactános! </a>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval='5000'>
                <img src="<?php echo base_url()?>/imagenes/cr1.jfif" class="d-block w-100" alt="...">
                <div class="carousel-caption px-4 col-7 col-lg-5 col-md-5 col-sm-7">
                    <h2 class="text-white text-justify">Visión</h2>
                    <p>
                    Nuestra visión es ser reconocidos como líderes en la industria de la moda, innovando constantemente en diseño y tecnología para ofrecer a nuestros clientes una experiencia de compra única y memorable. 
                    </p>
                    <a href="#section-contacto" class="btn-jumbotron btn btn-primary mr-auto" data-toggle="modal" data-target="modal-contacto" data-backdrop="static" data-keyboard="false">Ver productos</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
      </div>
<!-- <div class="container-fluid bg-grey ">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div> 
    <div class="col-10 nosotros">
      <h2>Nuestros valores</h2><br>
      <h4><strong>MISIÓN:</strong>Nuestra misión es proporcionar a nuestros clientes ropa de alta calidad, con un enfoque en la moda y el estilo, mientras mantenemos una cultura de responsabilidad social y sostenibilidad. Nos esforzamos por crear productos que reflejen la diversidad y la inclusión, y por mantener una comunicación transparente y ética con todos nuestros stakeholders.</h4><br>
      <p><strong>VISIÓN:</strong> Nuestra visión es ser reconocidos como líderes en la industria de la moda, innovando constantemente en diseño y tecnología para ofrecer a nuestros clientes una experiencia de compra única y memorable. Aspiramos a ser una empresa respetada y admirada por nuestra dedicación a la sostenibilidad y el impacto positivo en la sociedad y el medio ambiente.</p>
    </div>
  </div>
</div>-->

<!-- Container (Services Section) -->
<!--<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>POWER</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>LOVE</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>JOB DONE</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>GREEN</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>CERTIFIED</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4 style="color:#303030;">HARD WORK</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
  </div>
</div>-->

<!-- Container (Portfolio Section) -->
<div id="productos" class="container-fluid text-center">
  <h2>Nuestros productos</h2><br>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img class="img-fluid" src="<?php echo base_url()?>/imagenes/playeras.jfif" alt="Playeras" style="max-width:60%;">
        <p class="subtitle"><strong>Playeras</strong></p>
        <p>¡Consigue el estilo que buscas con nuestras playeras!</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="<?php echo base_url()?>/imagenes/sudadera2.jpg" alt="New York" style="max-width:60%;">
        <p class="subtitle"><strong>Sudaderas</strong></p>
        <p>¡Brilla con estilo en cualquier ocasión con nuestras sudaderas!</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="<?php echo base_url()?>/imagenes/bolsa.jpg" alt="San Francisco" style="max-width:68%;">
        <p class="subtitle"><strong>Bolsas térmicas</strong></p>
        <p>¡Mantén tus alimentos frescos y tus bebidas calientes donde quiera que vayas con nuestras bolsas térmicas!</p>
      </div>
    </div>
  </div>
</div>

<!-- <div class="bg-grey p-3">
  <h2 class="p-3 text-center">Comentarios de nuestros clientes</h2>
  <div id="myCarousel" class="carousel slide text-center" data-bs-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <!-- <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"Esta empresa es la mejor. ¡Estoy tan feliz con el resultado!"<br><span>Michael Roe, Vice President, Comment Box</span></h4>
      </div>
      <div class="item">
        <h4>"Una palabra... WOW!!"<br><span>John Doe, Salesman, Rep Inc</span></h4>
      </div>
      <div class="item">
        <h4>"¿Podría ... Estar más contento con esta empresa?<br><span>Chandler Bing, Actor, FriendsAlot</span></h4>
      </div>
    </div> -->

    <!-- Left and right controls -->
    <!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> -->
<!-- </div> -->

<section class="slideanim" style="color: #000; background-color: #f3f2f2;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-xl-8 text-center">
        <h3 class="fw-bold mb-4">Comentarios de nuestros clientes</h3>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="card">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="<?php echo base_url()?>/imagenes/Persona1.jpeg"
                class="imag" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Teresa May</h5>
            <h6 class="font-weight-bold my-3">Founder at ET Company</h6>
            <ul class="list-unstyled d-flex justify-content-center">
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star-half-alt fa-sm text-info stars"></i>
              </li>
            </ul>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>Esta empresa es la mejor. ¡Estoy tan feliz!
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="card">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="<?php echo base_url()?>/imagenes/Persona 2.jpeg"
                class="imag" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Maggie McLoan</h5>
            <h6 class="font-weight-bold my-3">Photographer at Studio LA</h6>
            <ul class="list-unstyled d-flex justify-content-center">
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
            </ul>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>Una palabra... WOW!!
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-0">
        <div class="card">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="<?php echo base_url()?>/imagenes/Persona 3.jpeg"
                class="imag" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Daniel Ricciardo</h5>
            <h6 class="font-weight-bold my-3">Front-end Developer in NY</h6>
            <ul class="list-unstyled d-flex justify-content-center">
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-info stars"></i>
              </li>
              <li>
                <i class="far fa-star fa-sm text-info stars"></i>
              </li>
            </ul>
            <p class="mb-2">
              <i class="fas fa-quote-left pe-2"></i>¿Podría ... Estar más contento con esta empresa?
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Container (Pricing Section) -->

<div id="promos" class="container-fluid">
  <div class="text-center">
    <h1><br>Paquetes</h1>
    <h4>¡Selecciona un paquete para ti!</h4>
  </div>
  <div class="row slideanim ">
    <div class="col-lg-4 col-md-4 col-sm-12" style="backgrund-color:grey; padding: 2%;">
      <div class="card h-100 p-4">
        <div class="card-body text-center" style="padding:0px; margin:0px;">
        <i class="fa-sharp fa-solid fa-shirt-running"></i>
            <h4 class="card-title mb-0 p-2">Básico</h4>
            <p><strong>2</strong> Playeras</p>
            <p><strong>1</strong> Sudadera</p>
            <p class="regalo-promo">¡Llevate de regalo un termo ADIDAS!</p>
            <h3>$699</h3>
            <br>
          <br>
        </div>
        <div class="card-footer text-center" style="border: none; background-color: transparent; padding:5px; margin:5px;">  
        <a class="btn btn-primary btn-promos">Comprar</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12" style="backgrund-color:grey; padding: 2%;">
      <div class="card h-100 p-4">
        <div class="card-body text-center" style="padding:0px; margin:0px;">
            <h4 class="card-title mb-0 p-2">Intermedio</h4>
            <p><strong>1</strong> Playera</p>
            <p><strong>1</strong> Sudadera</p>
            <p><strong>1</strong> Bolsa térmica</p>
            <p class="regalo-promo">¡Llevate de regalo una bolsa Puma!</p>
            <h3>$999</h3>
            <br>
          <br>
        </div>
        <div class="card-footer text-center" style="border: none; background-color: transparent; padding:5px; margin:5px;">  
        <a class="btn btn-primary btn-promos">Comprar</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12" style="backgrund-color:grey; padding: 2%;">
      <div class="card h-100 p-4">
        <div class="card-body text-center" style="padding:0px; margin:0px;">
            <h4 class="card-title mb-0 p-2">Premium</h4>
            <p><strong>2</strong> Playeras</p>
            <p><strong>1</strong> Sudadera</p>
            <p><strong>3</strong> Bolsas térmicas</p>
            <p class="regalo-promo">¡Llevate de regalo una sudadera Nike!</p>
            <h3>$1699</h3>
            <br>
          <br>
        </div>
        <div class="card-footer text-center" style="border: none; background-color: transparent; padding:5px; margin:5px;">  
        <a class="btn btn-primary btn-promos">Comprar</a>
        </div>
      </div>
    </div>
  </div>
</div>
    <!--<div class="col-sm-4 col-xs-12 ">
      <div class="panel panel-default text-center ">
        <div class="panel-heading promociones">
          <h1>Básico</h1>
        </div>
        <div class="panel-body">
        <h4>Incluye:</h4>
          <p><strong>2</strong> Playeras</p>
          <p><strong>1</strong> Sudadera</p>
          <br>
          <br>
        </div>
        <div class="panel-footer">
          <h3>$699</h3>
          <button class="btn btn-lg promociones">Comprar</button>
        </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Intermedio</h1>
        </div>
        <div class="panel-body">
          <h4>Incluye:</h4>
          <p><strong>1</strong> Playera</p>
          <p><strong>1</strong> Sudadera</p>
          <p><strong>1</strong> Bolsa térmica</p>
          <p><strong></strong> </p>
        </div>
        <div class="panel-footer">
          <h3>$999</h3>
          <button class="btn btn-lg promociones">Comprar</button>
        </div>
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading ">
          <h1>Premium</h1>
        </div>
        <div class="panel-body">
          <h4>Incluye:</h4>
          <p><strong>2</strong> Playeras</p>
          <p><strong>1</strong> Sudaderas</p>
          <p><strong>3</strong> Bolsas térmicas</p>
        </div>
        <div class="panel-footer">
          <h3>$1699</h3>
          <button class="btn btn-lg promociones">Comprar</button>
        </div>
      </div>      
    </div>    
  </div>
</div>-->
<!--Alianzas-->
<div class=" row centrar-marca text-center p-3">
    <div class="col-4 col-sm-4 col-md-4 caja">
    <img src="<?php echo base_url()?>/imagenes/Adidas.png" class="marcas ">
    </div>
    <div class="col-4 col-sm-4 col-md-4  caja">
    <img src="<?php echo base_url()?>/imagenes/puma.png" class="marcas" >
    </div>
    <div class="col-4 col-sm-4 col-md-4  caja">
    <img src="<?php echo base_url()?>/imagenes/Nike.png" class="marcas" >
    </div>
</div>
<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid text-center contact p-2">
  <h1 class="text-center cnt-txt">CONTACTO</h1>
  <div class="row">
    <div class="col-sm-5 mapouter">
      <div class="gmap_canvas">
        <iframe width="575" height="350" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d238369.6251760993!2d-89.69094874903467!3d21.011653670251686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1675963341248!5m2!1ses!2smx" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      </div>
      <p>Póngase en contacto con nosotros y nos pondremos en contacto con usted dentro de las 24 horas.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Mérida, Yucatán, México</p>
      <p><span class="glyphicon glyphicon-phone"></span> +52 9995875487</p>
      <p><span class="glyphicon glyphicon-envelope"></span> contacto@tecshirts.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row p-0 mx-0 align-items-center">
        <div class="col-sm-6 form-group p-2">
          <input class="form-control" id="name" name="name" placeholder="Nombre" type="text" required>
        </div>
        <div class="col-sm-6 form-group p-2">
          <input class="form-control" id="email" name="email" placeholder="Correo" type="email" required>
        </div>
      </div>
      <textarea class="form-control p-4" id="comments" name="comments" placeholder="Comentario" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <!-- <img src="https://cf-assets.www.cloudflare.com/slt3lc6tev37/79wsjD0Xy7FmmYvR0sCncy/5b732b7e26adb7d6c06d943d14dc4acd/not-a-robot.png" style="max-width:35%;"> -->
          <div class="g-recaptcha brochure__form__captcha" data-sitekey="6Lfqa3okAAAAAFeDDk0pDfN9TZJ3DrL57bCICsxI" style="display: inline-block;"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-dark pull-right promociones" type="submit">Enviar</button>
        </div>
      </div>
      <!-- <div class="row me-auto">
      <div class="g-recaptcha brochure__form__captcha" data-sitekey="6Lfqa3okAAAAAFeDDk0pDfN9TZJ3DrL57bCICsxI"></div>

      </div> -->
    </div>
  </div>
</div>

<script src="https://www.google.com/recaptcha/api.js"></script>