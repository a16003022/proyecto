<!-- Vista del carrito de compras -->
<section style="padding-top: 15vh; height: 95vh;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="stars"><?= $titulo_seccion; ?></h2>
        <p><?= $descripcion; ?></p>
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
          <?php /*
            <div class="form-group">
              <label>Código de descuento</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Ingrese código de descuento">
                <div class="input-group-append">
                  <button type="button" class="btn btn-primary">Aplicar</button>
                </div>
              </div>
            </div>
            */ ?>
          </div>
          <div class="col-md-4">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Envío</td>
                    <td>$0.00</td>
                  </tr> 
                  <tr>
                    <td><b>Total</b></td>
                    <td id="total">$<?php echo number_format($total, 2, '.', ',') ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <form method="post" action="<?= base_url()?>/procesarCompra">
              <button type="button" class="btn btn-success btn-lg btn-block btn-jumbotron mb-4" id="btn-pagar">Pagar</button>
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
    $('#total').html('$' + total.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
  }

  $('#btn-pagar').click(function() {
    var data = [];
    $('#tabla-carrito tbody tr').each(function() {
      var idProducto = $(this).find('input[name="idProducto"]').val();
      var cantidad = $(this).find('.cantidad').val();
      data.push({ idProducto: idProducto, cantidad: cantidad });
    });
    $.ajax({
      type: 'POST',
      url: '<?= base_url()?>/procesarCarrito',
      data: { carrito: data },
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







