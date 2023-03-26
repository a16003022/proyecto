<body>
  <section class="bgCat">
    <div class="container">
      <div class="row justify-content-center align-items-stretch" style="padding-top:20vh;">
        <?php
        foreach($producto as $dat){ ?>
          <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
            <div class="card h-100">
              <img src="<?php echo base_url()?>/imagenes/<?php echo $dat['img']?>" style="width: 100%; height: 30vh" class="card-img-top img-fluid d-block" alt="Producto 1">
              <div class="card-body">
                <h5 class="card-title"><?php echo $dat['nombre']?></h5>
                <p class="card-text">Marca: <?php echo $dat['marca']?><br> 
                Modelo: <?php echo $dat['modelo']?><br>
                Medida: <?php echo $dat['medida']?></p>
                <h5 style="font-weight:bold; color:#1BBABA;">$<?php echo $dat['precio']?></h5>
              </div>
              <div class="card-footer" style="border: none; background-color: transparent;">              
                <a href="<?php echo base_url()?>/usuarios" class="btn btn-primary btn-jumbotron">Comprar</a>
              </div>
            </div>
          </div>                     
        <?php } ?>        
      </div>
    </div>
  </section>
</body>