<!-- Vista del carrito de compras -->
<div class="container" style="padding-top: 100px;">
  <div class="row">
    <div class="col-md-12">
      <h2><?= $titulo_seccion; ?></h2>
      <p><?= $descripcion; ?></p>
      <div class="table-responsive">
        <table class="table table-striped">
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
            $total = 0;
            foreach($carrito as $carrit): 
              $contador=$contador+1;
              echo "<tr>";
                echo "<th scope='row'>".$contador."</th>";
                echo "<td>".$carrit["nombre"]."</td>";
                echo "<td>$".$carrit["precio"]."</td>";
                echo "<td>";
                  echo "<input type='number' value='1' min='1' max='10' class='cantidad' data-precio='".$carrit["precio"]."'>";
                echo "</td>";
                echo "<td class='subtotal'>$".$carrit["precio"]."</td>";
                echo "<td>";
                  echo "<form method='POST' action='".base_url()."/eliminarProducto'>";
                  echo "<input type='hidden' name='idProducto' value='".$carrit["idProducto"]."'>";
                  echo "<button type='submit' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>";
                  echo "</form>";
                  echo "</td>";
              echo "</tr>";
              $total = $total + $carrit["precio"];
            endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-md-7">
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
        <div class="col-md-5">
          <div class="table-responsive">
            <table class="table">
              <tbody>
              <?php /*
                <tr>
                  <td>Subtotal</td>
                  <td>$25.00</td>
                </tr>
                <tr>
                  <td>Envío</td>
                  <td>$0.00</td>
                </tr>
                <tr>
                  <td>Descuento</td>
                  <td>$0.00</td>
                </tr>
                */ ?> 
                <tr>
                  <td>Total</td>
                  <td id="total">$<?php echo $total ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <form method="post" action="<?= base_url()?>/procesarCompra">
            <input type="hidden" name="total" value="<?= $total ?>" id="total_hidden">
            <button type="submit" class="btn btn-success btn-lg btn-block mb-4">Comprar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $('.cantidad').on('input', function() {
    var precio = $(this).data('precio');
    var cantidad = $(this).val();
    var subtotal = precio * cantidad;
    $(this).parent().next('.subtotal').html('$' + subtotal);
    actualizarTotal();
  });

  function actualizarTotal() {
  var total = 0;
  $('.subtotal').each(function() {
    total += parseInt($(this).html().replace('$', ''));
  });
  $('#total').html('$' + total);
  $('#total_hidden').val(total); // actualiza el valor real para poder pasarlo a otra vista
}

});
</script>





