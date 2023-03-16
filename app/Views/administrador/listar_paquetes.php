<div id="contenido_de_la_tabla" class="container">
        <?php //print_r($datos)?>
        <div>
            <div class="col-sm-12">
                <h2>Catalogo de paquetes</h2>
                <div class="table table-responsive">
                    <table id="tabla-ejemplo" class="display table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Termino</th>
                            <th>Estado</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php
                        foreach($paquete as $dat){
                            echo "<tr>";
                                echo "<td>".$dat['nombre']."</td>";
                                echo "<td>".$dat['descripcion']."</td>";
                                echo "<td>".$dat['fechaInicio']."</td>";
                                echo "<td>".$dat['fechaTermino']."</td>";
                                echo "<td>".$dat['estado']."</td>";
                                echo "<td>".$dat['precio']."</td>";
                                echo "<td><a href='" . base_url('añadirProductos/')."/".$dat['idPaquete'] . "' class='btn btn-success'>Editar productos</a></td>";
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

    