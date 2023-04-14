<div class="container-fluid" style="padding-top: 130px;">
    <div class="row" style="min-height: 100vh;">
        <div class="col-lg-8 mx-auto text-center">
            <div id="contenido_de_la_tabla" class="container">
                <h2><?= $titulo_seccion; ?></h2>
                <p><?= $descripcion; ?></p>
                <div class="table">
                    <table id="tabla-ejemplo" class="display table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                            </tr>
                        <thead>
                        <tbody>
                            <?php
                            foreach($producto as $dat){
                                echo "<tr>";
                                    echo "<td>".$dat['idProducto']."</td>";
                                    echo "<td>".$dat['nombre']."</td>";
                                    echo "<td><input class='cantidad' type='number' value='".$dat["cantidad"]."' min='1' max='999'></td>";
                                echo "</tr>";
                            }
                            ?>
                        <tbody>
                    </table>
                    <button type="button" class="btn btn-success btn-lg btn-block btn-jumbotron mb-4 actualizar-btn" id="btn-pagar" disabled>Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabla-ejemplo').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
             }
        });
    });

        // Detectar cambios en la columna "cantidad"
        $('.cantidad').change(function() {
          // Habilitar el botón "Actualizar"
          $('.actualizar-btn').prop('disabled', false);
        });

        // Enviar los datos actualizados al controlador correspondiente al hacer clic en el botón "Actualizar"
        $('.actualizar-btn').click(function() {
          var datos = [];
          $('.cantidad').each(function() {
            datos.push({
              idProducto: $(this).closest('tr').find('td:eq(0)').text(),
              cantidad: $(this).val()
            });
          });
          $.ajax({
            type: 'POST',
            url: '<?= base_url()?>/actualizarInventario',
            data: {datos: datos},
            success: function(response) {
              // Manejar la respuesta del controlador
              window.location.href = '<?php echo base_url();?>/revisarInventario';
            },
            error: function() {
              // Manejar error
              alert('Hubo un error al procesar la petición. Por favor, inténtelo de nuevo más tarde.');
            }
          });
        });
</script>