<div class="container-fluid" style="padding-top: 130px;">
    <div class="row" style="height: 80vh;">
        <div class="col-lg-5">
        <h2><?= $titulo_seccion; ?></h2>
        <p><?= $descripcion; ?></p>
                <form method="post" action="<?php echo base_url().'/guardar_paquete'?>">   
                    <div>
                        <div class="form-outline">
                        <label class="form-label" for="nombre">Nombre Paquete</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required/>
                    </div>
                    <div>
                        <div class="form-outline">
                        <label class="form-label" for="descripcion">Descripción del paquete</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="fechaInicio" class="form-label">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                    </div>
                    <div class="mb-3">
                        <label for="fechaTermino" class="form-label">Fecha de término</label>
                        <input type="date" class="form-control" id="fechaTermino" name="fechaTermino">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Status</label>
                        <select id="estado" name="estado" class="form-select" aria-label="Default select example">
                            <option selected>Selecciona un estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio">
                    </div>
                    </div>
                    <!-- Submit button -->
                    <div class="text-center">
                        <input type="submit" class="btn btn-success btn-jumbotron btn-block mb-4" value="Registrar">
                    </div>
                </form>
        </div>
    </div>
    <div class="col-lg-7">
        <div id="contenido_de_la_tabla" class="container">
            <h2>Catalogo de paquetes</h2>
            <div class="table">
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
                                echo "<td><a href='" . base_url('añadirProductos/')."/".$dat['idPaquete'] . "' class='btn btn-success'>Agregar</a></td>";
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
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
        }
        });
      });
</script>