<style>
  #FormCupon {
  float: right;
}

#submitForm {
  color: #9162dd;
  text-decoration: underline;
  cursor: pointer;
}


#FormCupon .input-group-append {
  display: flex;
  justify-content: center; /* Centra horizontalmente */
  align-items: center; /* Centra verticalmente */
}


@media screen and (max-width: 767px) {
    #FormCupon {
    float: none;
    }

}


</style>

<!-- Vista del carrito de compras -->
<section style="padding-top: 15vh; min-height: 95vh;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="stars" style="font-family: adineue PRO, sans-serif;"><?= $titulo_seccion; ?></h2>
        <p style="font-family: 'Quicksand', sans-serif;"><?= $descripcion; ?></p>
        <div class="table-responsive">
          <table class="table table-striped" id="tabla-carrito">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $contador = 0;
              $subtotal = 0;
              $total = 0;
              foreach($carrito as $carrit): 
                $contador=$contador+1;
                $subtotal=$carrit["precio"]*$carrit["cantidad"];
                echo "<tr>";
                  echo "<th scope='row'>".$contador."</th>";
                  echo "<td>".$carrit["nombre"]."</td>";
                  echo "<td>$".number_format($carrit["precio"], 2)."</td>";
                  echo "<td>";
                    echo "<input type='number' value='".$carrit["cantidad"]."' min='1' max='".$carrit["stock"]+$carrit["cantidad"]."' class='cantidad' data-precio='".$carrit["precio"]."' onkeydown='return false;'>";
                  echo "</td>";
                  echo "<td class='subtotal'>$".number_format($subtotal, 2)."</td>";
                  echo "<td>";
                    echo "<form method='POST' action='".base_url()."/eliminarProducto'>";
                    echo "<input type='hidden' name='idProducto' value='".$carrit["idProducto"]."'>";
                    echo "<input type='hidden' name='cantidad' value='".$carrit["cantidad"]."'>";
                    echo "<button type='submit' class='btn btn-danger btn-sm btn-jumbotron'><i class='fa fa-trash'></i></button>";
                    echo "</form>";
                    echo "</td>";
                echo "</tr>";
                $total = $total + $subtotal;
              endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-md-8">
            <form class="" id="FormCupon" method='POST' action='<?= base_url()."/aplicarcupon" ?>'>
              <div class="form-group">
                <label>Código de descuento</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="cupon" id="cupon" placeholder="Ingrese código">
                  <div class="input-group-append  ms-2">
                  <a class="" href="#" id="submitForm" onclick="document.getElementById('FormCupon').submit(); return false;">Aplicar</a>
                </div>
                </div>
              </div>
              <?php if (session()->getFlashdata('error')) : ?>
                <div class="mt-3 alert alert-danger" role="alert">
                  <?= session()->getFlashdata('error') ?>
                </div>
              <?php endif; ?>
            </form>

            <?php
            // AGREGAR CAMBIO ENVIO
                  $total_pago = $total; // Aquí iría el total de pago del usuario
                  $porcentajes = array(0.05, 0.1, 0.15); // Opciones de porcentaje
                  $random_index = rand(0, count($porcentajes) - 1); // Genera un índice aleatorio del array
                  $porcentaje = $porcentajes[$random_index]; // Obtiene el porcentaje correspondiente
                  $precio_envio = $total_pago * $porcentaje; // Calcula el precio del envío
                  $precio_envio = number_format($precio_envio, 2);
            ?>
            
            <input type='text' name='envio' id="envio" value='<?php echo $precio_envio ?>' hidden>
          
          </div>
          <div class="col-md-4">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Envío</td>
                    <td><?php echo '$'.$precio_envio ?></td>
                  </tr> 
                  <?php 
                      $session = session();
                      $descuento = $session->get('descuento');
                      $descuento_decimal = $descuento / 100;
                      $descuento_aplicado = $total * $descuento_decimal;
                      $total_con_descuento = $total - $descuento_aplicado; // calcula el total con el descuento aplicado
                      $descuento_aplicado = number_format($descuento_aplicado, 2);
                      if($descuento) {
                          echo "<tr><td>Descuento aplicado: " . $descuento."%</td>";
                          echo "<td> $".$descuento_aplicado."</td></tr>";
                      }

                      $totalpedido=$total_con_descuento+$precio_envio;
                  ?>
                  <tr>
                    <td><b>Total</b></td>
                    <td id="total2">$<?php  echo number_format($totalpedido, 2, '.', ',') ?></td>
                  </tr>
                  <input type='text' name='total' id="total" value='<?php echo $totalpedido ?>'hidden>
                </tbody>
              </table>
            </div>
            <form method="post" action="<?= base_url()?>/procesarCompra">
              <button type="button" class="btn btn-success btn-lg btn-block btn-jumbotron mb-4" style="font-family: 'Quicksand', sans-serif; font-weight:bold; font-size: 16px;" id="btn-pagar">Pagar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function() {
  $('.cantidad').on('input', function() {
    var precio = $(this).data('precio');
    var cantidad = $(this).val();
    var subtotal = precio * cantidad;
    $(this).parent().next('.subtotal').html('$' + subtotal.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
    actualizarTotal();
  });

  function actualizarTotal() {
    var total = 0;
    $('.subtotal').each(function() {
      total += parseFloat($(this).html().replace('$', '').replace(',', ''));
    });
    $('#total2').html('$' + total.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
  }

  $('#btn-pagar').click(function() {
    // Obtener los datos de los productos del carrito
    var productos = [];
    $('#tabla-carrito tbody tr').each(function() {
        var idProducto = $(this).find('input[name="idProducto"]').val();
        var cantidad = $(this).find('.cantidad').val();
        productos.push({ idProducto: idProducto, cantidad: cantidad });
    });

    // Obtener el costo de envío y el total a pagar
    var costoEnvio = $('#envio').val();
    var totalPagar = $('#total').val();
    
    // Enviar los datos como objeto JSON
    var data = {
        carrito: productos,
        costoEnvio: costoEnvio,
        totalPagar: totalPagar
    };

    $.ajax({
        type: 'POST',
        url: '<?= base_url()?>/procesarCarrito',
        data: data,
        success: function(response) {
            // Manejar respuesta del servidor
            window.location.href = '<?php echo base_url();?>/pagos'; //AQUÍ PONDRÁN LA RUTA DE LA VISTA DEL PAGO
        },
        error: function() {
            // Manejar error
            alert('Hubo un error al procesar la petición. Por favor, inténtelo de nuevo más tarde.');
        }
    });
});
 

  
  
  
});
</script>







