<div id="contenido_de_la_tabla" class="container">
        <?php //print_r($datos)?>
        <div>
            <div class="col-sm-12">
                <h2>Catalogo de productos</h2>
                <div class="table table-responsive">
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
</div>

<script type="text/javascript">
      $(document).ready(function() {
        $('#tabla-ejemplo').DataTable();
      });
    </script>