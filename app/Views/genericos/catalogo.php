<body>
  <section class="bgCat" style="min-height: 95vh;">
    <div class="container">
      <div class="row justify-content-center align-items-stretch" style="padding-top:20vh;">
        <?php
        foreach($producto as $dat){ ?>
          <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
            <div class="card h-100">
              <img src="<?php echo base_url()?>/imagenes/<?php echo $dat['img']?>" style="width: 100%; height: 30vh" class="card-img-top img-fluid d-block" alt="Producto 1">
              <div class="card-body">
                  <h5 class="card-title title" style="color:#1BBABA;"><?php echo $dat['nombre']?></h5>
                  <p class="card-text"><b>Marca:</b><?php echo $dat['marca']?><br> 
                  <b>Modelo:</b> <?php echo $dat['modelo']?><br>
                  <b>Medida:</b> <?php echo $dat['medida']?><br>
                  <b>Características:</b> <?php echo $dat['caracteristicas']?><br>
                  <b>Disponible:</b> <?php echo $dat['cantidad']?></p>
                  <h5 style="font-weight:bold; color:#1BBABA;">$<?php echo $dat['precio']?></h5>
                </div>
              <div class="card-footer" style="border: none; background-color: transparent;">              
                <a href="<?php echo base_url()?>/usuarios" class="btn btn-primary botonComprar btn-jumbotron">Comprar</a>
              </div>
            </div>
          </div>                     
        <?php } ?>        
      </div>
    </div>
  </section>
</body>
<script>
  introJs().start();
  introJs().setOptions({
  dontShowAgainLabel: "No mostrar de nuevo.",
  dontShowAgain: true,
  steps: [
  {
    element: document.querySelector('.card'),
    intro: '¡Hola! Este es un tour por nuestro catálogo.',
    position: 'left'
  },
  {
    element: document.querySelector('.card-title'),
    intro: 'Este es el nombre completo del producto.',
    position: 'left'
  },
  {
    element: document.querySelector('.card-text'),
    intro: 'Aquí puede ver sus detalles y características.',
    position: 'bottom'
  },
  {
    element: document.querySelector('.botonComprar'),
    intro: 'Y si desea adquirirlo presione comprar para registrarse.',
    position: 'top'
    position: 'top'
  },
  ]

}).start();
</script>