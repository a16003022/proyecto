<div class="container-fluid" style="padding-top: 120px; padding-bottom: 60px;">
    <div class="row">
        <div class="col-lg-5">
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
                        <label class="form-label" for="img">Ruta imagen</label>
                        <input type="text" id="img" name="img" class="form-control" required/>
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
                        <label class="form-label" for="clasificacion">Clasificación</label>
                        <input type="text" id="clasificacion" name="clasificacion" class="form-control" required/>
                    </div>
                </div>
                <!-- Submit button -->
                <div class="text-center">
                    <input type="submit" class="btn btn-success btn-jumbotron btn-block" value="Registrar">
                </div>
            </form>
        </div>
        <div class="col-lg-7">
            <div>
                <h2>Catalogo de productos</h2>
                <table id="tabla-ejemplo" class="display table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Ruta imagen</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Medida</th>
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
                            echo "<td>".$dat['clasificacion']."</td>";
                            echo "<td><button type='button' class='btn btn-success' onclick='carga_modal(".$dat["idProducto"].")'>Editar/Borrar</button></td>";
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
        $('#tabla-ejemplo').DataTable();
      });
</script>
<script type="text/javascript">
    function carga_modal(idProducto){
        alert(idProducto);
    }
</script>