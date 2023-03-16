<!-- Vista del carrito de compras -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mb-4">Carrito de compras</h2>
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
            <tr>
              <th scope="row">1</th>
              <td>Producto 1</td>
              <td>$10.00</td>
              <td>
                <input type="number" value="1" min="1" max="10">
              </td>
              <td>$10.00</td>
              <td>
                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Producto 2</td>
              <td>$15.00</td>
              <td>
                <input type="number" value="1" min="1" max="10">
              </td>
              <td>$15.00</td>
              <td>
                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Código de descuento</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Ingrese código de descuento">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary">Aplicar</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>Subtotal</td>
                  <td>$25.00</td>
                </tr>
                <tr>
                  <td>Descuento</td>
                  <td>$0.00</td>
                </tr>
                <tr>
                  <td>Envío</td>
                  <td>$0.00</td>
                </tr>
                <tr>
                  <td>Total</td>
                  <td>$25.00</td>
                </tr>
              </tbody>
            </table>
          </div>
          <button type="button" class="btn btn-success btn-lg btn-block">Comprar</button>
        </div>
      </div>
    </div>
  </div>
</div>
