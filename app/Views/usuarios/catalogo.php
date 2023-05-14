<style>
    label {
  cursor: pointer;
  user-select: none;
  
  }

  .container-corazon input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
  }

  .container-corazon {
    float:right;
    cursor: pointer;
    font-size: 20px;
    user-select: none;
    transition: 100ms;
  }

  .checkmark {
    top: 0;
    left: 0;
    height: 1.5em;
    width: 1.5em;
    transition: 100ms;
    animation: dislike_effect 400ms ease;
  }

  .container-corazon input:checked ~ .checkmark path {
    fill: #FF5353;
    stroke-width: 0;
  }

  .container-corazon input:checked ~ .checkmark {
    animation: like_effect 400ms ease;
  }

  .container-corazon:hover {
    transform: scale(1.1);
  }
  .title{
    font-family: adineue PRO, sans-serif;
  }

  @keyframes like_effect {
    0% {
      transform: scale(0);
    }

    50% {
      transform: scale(1.2);
    }

    100% {
      transform: scale(1);
    }
  }

  @keyframes dislike_effect {
    0% {
      transform: scale(0);
    }

    50% {
      transform: scale(1.2);
    }

    100% {
      transform: scale(1);
    }
  }

    form {
      display:table;
      }


</style>

<body>
  <section class="bgCat" style="min-height: 95vh;">
    <div class="container">
      <div class="row justify-content-center align-items-stretch" style="padding-top:15vh;">
          
          <?php
          foreach($producto as $dat): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4" >
              <div class="card h-100" id="card">
                <img src="<?php echo base_url()?>/imagenes/<?php echo $dat['img']?>" style="width: 100%; height: 30vh; border-radius:5%" class="card-img-top img-fluid d-block" alt="Producto 1">
                <div class="card-body">
                  <h5 class="card-title title" style="color:#1BBABA;"><?php echo $dat['nombre']?></h5>
                  <p class="card-text">Marca: <?php echo $dat['marca']?><br> 
                  Modelo: <?php echo $dat['modelo']?><br>
                  Medida: <?php echo $dat['medida']?><br>
                  <b>Disponible: <?php echo $dat['cantidad']?></b></p>
                  <h5 style="font-weight:bold; color:#1BBABA;">$<?php echo $dat['precio']?></h5>
                </div>
                <div class=" row card-footer" style="border: none; background-color: transparent;">

                  <div class="col-4">
                  <form action="<?php echo base_url('/agregarLista'); ?>" method="POST">
                      <input id="idProducto" name="idProducto" type="hidden" value=<?php echo $dat['idProducto']?>>
                              <?php $prodAñadido2 = false; 
                        foreach($lista as $list):
                          if ($list["idProducto"] == $dat["idProducto"]){
                            $prodAñadido2 = true;
                            break;
                          }
                        endforeach;
                        if ($prodAñadido2){ ?>
                        <label class="container-corazon">
                                <input  type="checkbox" checked="checked"  onChange="this.form.submit()" disabled>
                                  <div class="checkmark">
                                    <svg viewBox="0 0 256 256">
                                    <rect fill="none" height="256" width="256"></rect>
                                    <path d="M224.6,51.9a59.5,59.5,0,0,0-43-19.9,60.5,60.5,0,0,0-44,17.6L128,59.1l-7.5-7.4C97.2,28.3,59.2,26.3,35.9,47.4a59.9,59.9,0,0,0-2.3,87l83.1,83.1a15.9,15.9,0,0,0,22.6,0l81-81C243.7,113.2,245.6,75.2,224.6,51.9Z" stroke-width="20px" stroke="#9162dd" fill="none"></path></svg>
                                  </div>
                        </label>
                        <?php }else{ ?>
                          <label class="container-corazon">
                                <input  type="checkbox" onChange="this.form.submit()">
                                  <div class="checkmark">
                                    <svg viewBox="0 0 256 256">
                                    <rect fill="none" height="256" width="256"></rect>
                                    <path d="M224.6,51.9a59.5,59.5,0,0,0-43-19.9,60.5,60.5,0,0,0-44,17.6L128,59.1l-7.5-7.4C97.2,28.3,59.2,26.3,35.9,47.4a59.9,59.9,0,0,0-2.3,87l83.1,83.1a15.9,15.9,0,0,0,22.6,0l81-81C243.7,113.2,245.6,75.2,224.6,51.9Z" stroke-width="20px" stroke="#9162dd" fill="none"></path></svg>
                                  </div>
                          </label>
                        <?php } ?>
                  </form> 
                  </div>
                  <div class="col-8">
                    <form action="<?php echo base_url('/catalogoPlayeras'); ?>" method="POST" style="float:right;" onsubmit="restarStock()"> 
                      <input id="idProducto" name="idProducto" type="hidden" value=<?php echo $dat['idProducto']?>>
                      <input id="nombre" name="nombre" type="hidden" value="<?php echo $dat['nombre']?>">
                      <input id="precio" name="precio" type="hidden" value="<?php echo $dat['precio']?>">
                      <input id="stock" name="stock" type="hidden" value="<?php echo $dat['cantidad']-1?>">
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
                            </svg> Añadido
                          </button>
                        <?php }else{ ?>
                        <button type="submit" class="btn btn-primary btn-jumbotron botonComprar">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                          </svg>
                        </button>
                        <input class="m-1 text-center" id="cantidad" name="cantidad" type="number" min="1" max="<?php echo $dat['cantidad']?>" value="1">
 
                        <?php } ?>
                    </form>	
                  </div>                  
                </div>
              </div>
            </div>                     
          <?php endforeach; ?>     
      </div>
    </div>
  </section>
</body>

<script>
    function restarStock() {
        var cantidadInputs = document.querySelectorAll("input[id^='cantidad']");
        for (var i = 0; i < cantidadInputs.length; i++) {
            var cantidad = parseFloat(cantidadInputs[i].value);
            var stock = parseFloat(cantidadInputs[i].parentNode.querySelector("input[id^='stock']").value);
            cantidadInputs[i].parentNode.querySelector("input[id^='stock']").value = stock - cantidad + 1;
        }
    }

  introJs().start();
  introJs().setOptions({
  dontShowAgainLabel: "No mostrar de nuevo",
  dontShowAgain: true,
  steps: [
  {
    element: document.querySelector('.card'),
    intro: '¡Hola! Este es un tour por nuestro catálogo',
    position: 'left'
  },
  {
    element: document.querySelector('.card-title'),
    intro: 'Aquí se puede ver el nombre del producto',
    position: 'left'
  },
  {
    element: document.querySelector('.card-text'),
    intro: 'Aquí se ven los detalles del producto',
    position: 'bottom'
  },
  {
    element: document.querySelector('.botonComprar'),
    intro: 'Aquí puede agregarlo al carrito',
    position: 'top'
  },
  {
    element: document.querySelector('.container-corazon'),
    intro: 'Aquí puede agregarlo a su lista de deseos',
    position: 'top'
  }]

}).start();
</script>




