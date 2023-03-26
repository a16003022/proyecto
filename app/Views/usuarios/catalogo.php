<body>
  <section class="bgCat">
    <div class="container">
      <div class="row justify-content-center align-items-stretch" style="padding-top:15vh;">
          
          <?php
          foreach($producto as $dat): ?>
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
                  <form action="<?php echo base_url('/catalogoPlayeras'); ?>" method="POST"> 
                    <input id="idProducto" name="idProducto" type="hidden" value=<?php echo $dat['idProducto']?>>
                    <input id="nombre" name="nombre" type="hidden" value="<?php echo $dat['nombre']?>">
                    <input id="precio" name="precio" type="hidden" value="<?php echo $dat['precio']?>">
                    
                    <?php $prodAñadido = false; 
                      foreach($carrito as $prod):
                        if ($prod["idProducto"] == $dat["idProducto"]){
                          $prodAñadido = true;
                          break;
                        }
                      endforeach;
                      if ($prodAñadido){ ?>
                      <button type="submit" class="btn btn-primary btn-jumbotron" disabled>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                          </svg>
                        </button>
                      <?php }else{ ?>
                      <button type="submit" class="btn btn-primary btn-jumbotron">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                          <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                        </svg> Añadir
                      </button>  
                      <?php } ?>
                  </form>	
                </div>
              </div>
            </div>                     
          <?php endforeach; ?>
                  
      </div>
    </div>
  </section>
</body>

