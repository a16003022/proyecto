<div class="container-fluid" style="padding-top: 130px;">
    <div class="row" style="min-height: 100vh;">
        <div class="col-lg-4">
            <h2 style="font-family: adineue PRO, sans-serif;"><?= $titulo_seccion; ?></h2>
            <p><?= $descripcion; ?></p>
                <form method="post" action="<?php echo base_url().'/guardar_paquete'?>"> 
                    <?php if (!empty($paquete)){ ?>
                        <input type="hidden" name="idPaquete" value="<?= $paquete[0]['idPaquete'] ?>">
                        <input type="hidden" name="accion" value="actualizar">
                    <?php }else { ?>
                        <input type="hidden" name="accion" value="agregar"> 
                    <?php } ?>
                    <div>
                        <div class="form-outline">
                            <label class="form-label" for="nombre">Nombre Paquete</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= !empty($paquete) ? $paquete[0]['nombre']:''?>" required/>
                        </div>
                    </div>
                    <div>
                        <div class="form-outline">
                            <label class="form-label" for="descripcion">Descripción del paquete</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control" value="<?= !empty($paquete) ? $paquete[0]['descripcion']:'' ?>" required/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="fechaInicio" class="form-label">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="<?= !empty($paquete) ? $paquete[0]['fechaInicio']:'' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="fechaTermino" class="form-label">Fecha de término</label>
                        <input type="date" class="form-control" id="fechaTermino" name="fechaTermino" value="<?= !empty($paquete) ? $paquete[0]['fechaTermino']:'' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Status</label>
                        <select id="estado" name="estado" class="form-select" aria-label="Default select example">
                            <option value="" <?= empty($paquete) || $paquete[0]['estado'] == '' ? 'selected' : '' ?>>Selecciona un estado</option>
                            <option value="Activo" <?= !empty($paquete) && $paquete[0]['estado'] == 'Activo' ? 'selected' : '' ?>>Activo</option>
                            <option value="Inactivo" <?= !empty($paquete) && $paquete[0]['estado'] == 'Inactivo' ? 'selected' : '' ?>>Inactivo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" value="<?= !empty($paquete) ? $paquete[0]['precio']:'' ?>">
                    </div>
                    <!-- Submit button -->
                    <?php if (!empty($paquete)) { ?>
                        <div class="text-center">
                        <input type="submit" class="btn btn-success btn-jumbotron btn-block mb-4" value="Guardar">
                    </div>
                    <?php }else { ?>    
                    <div class="text-center">
                        <input type="submit" class="btn btn-success btn-jumbotron btn-block mb-4" value="Registrar">
                    </div>
                    <?php } ?>
                </form>
        </div>
    
        <div class="col-lg-8">
            <div id="contenido_de_la_tabla" class="container">
                <h2 style="font-family: adineue PRO, sans-serif;">Catalogo de paquetes</h2>
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
                            foreach($paquetes as $dat){
                                echo "<tr>";
                                    echo "<td>".$dat['nombre']."</td>";
                                    echo "<td>".$dat['descripcion']."</td>";
                                    echo "<td>".$dat['fechaInicio']."</td>";
                                    echo "<td>".$dat['fechaTermino']."</td>";
                                    echo "<td>".$dat['estado']."</td>";
                                    echo "<td>".$dat['precio']."</td>";
                                    echo "<td style='display: flex; justify-content: space-between;'>
                                        <a href='".base_url('añadirProductos/')."/".$dat['idPaquete']."' class='bi bi-plus-circle-fill'></a>
                                        <a href='".base_url('editarPaquete')."/".$dat['idPaquete']."' class='bi bi-pencil-square'></a>
                                        <a href='".base_url('eliminarPaquete/')."/".$dat['idPaquete']."' class='bi bi-trash-fill'></a>
                                    </td>";
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
        $('#tabla-ejemplo').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json",
            "responsive": true
        }
        });
      });
</script>