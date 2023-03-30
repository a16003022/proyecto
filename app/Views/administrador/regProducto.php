<div class="container-fluid" style="padding-top: 130px;">
    <div class="row" style="height: 80vh;">
        <div class="col-lg-4">
        <h2><?= $titulo_seccion; ?></h2>
        <p><?= $descripcion; ?></p>
            <form method="post" action="<?php echo base_url().'/guardar_producto'?>">   
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="nombre">Nombre Producto</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required/>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="img">Imagen</label>
                        <input type="file" id="img" name="img" class="form-control" accept=".jpg, .jpeg, .png, .gif" onchange="document.getElementById('img_text').value = this.value.split('\\').pop()" required/>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="modelo">Modelo</label>
                        <input type="text" id="modelo" name="modelo" class="form-control" required/>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="marca">Marca</label>
                        <input type="text" id="marca" name="marca" class="form-control" required/>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="medida">Medida</label>
                        <input type="text" id="medida" name="medida" class="form-control" required/>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="precio">Precio</label>
                        <input type="text" id="precio" name="precio" class="form-control" required/>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="clasificacion" class="form-label">Clasificación</label>
                        <select id="clasificacion" name="clasificacion" class="form-select" aria-label="Default select example">
                            <option selected>Selecciona una clasificacion</option>
                            <option value="Playera">Playera</option>
                            <option value="Sudadera">Sudadera</option>
                            <option value="Bolsa">Bolsa</option>
                        </select>
                </div>
                <!-- Submit button -->
                <div class="text-center">
                    <input type="submit" class="btn btn-success btn-jumbotron btn-block mb-4" value="Registrar">
                </div>
            </form>
        </div>
        <div class="col-lg-8">
            <div>
                <h2>Catalogo de productos</h2>
                <table id="tabla-ejemplo" class="display table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Medida</th>
                            <th>Precio</th>
                            <th>Clasificación</th>
                            <th>Acciones</th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        foreach($producto as $dat){
                            echo "<tr>";
                            echo "<td>".$dat['nombre']."</td>";
                            echo "<td>".$dat['img']."</td>";
                            echo "<td>".$dat['modelo']."</td>";
                            echo "<td>".$dat['marca']."</td>";
                            echo "<td>".$dat['medida']."</td>";
                            echo "<td>".$dat['precio']."</td>";
                            echo "<td>".$dat['clasificacion']."</td>";
                            echo "<td><button type='button' class='btn btn-success' onclick='carga_modal(".$dat["idProducto"].")'>Editar</button></td>";
                        echo "</tr>";
                        }
                        ?>
                    <tbody>
                </table>
            </div>
        </div>
    </div>    
</div>

<script type="text/javascript">
      $(document).ready(function() {
        $('#tabla-ejemplo').DataTable({
            pageLength : 5,
            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
        }
        });
      });
</script>
<script type="text/javascript">
    function carga_modal(idProducto){
        alert(idProducto);
    }
</script>