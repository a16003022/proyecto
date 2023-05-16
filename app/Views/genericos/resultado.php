<body>
  <section class="bgCat" style="min-height: 95vh;">
    <div class="container">
    <?php $busqueda = $_GET['buscar']; ?>
      <div class="row justify-content-center align-items-stretch" style="padding-top:20vh;">
      <h3 class="text-white" style="font-family: Quicksand, sans-serif; font-size: 35px; text-align: center; text-transform: none;">Resultados de la búsqueda: "<?php echo $busqueda ?>"</h3><br>
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