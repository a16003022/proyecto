<div class="container-fluid" style="padding-top: 130px;" >
    <div class="row" style="min-height: 150vh;">
        <div class="col-lg-4">
        <h2 style="font-family: adineue PRO, sans-serif;"><?= $titulo_seccion; ?></h2>
        <p><?= $descripcion; ?></p>
            <form method="post" action="<?php echo base_url().'/guardar_producto'?>">
                <?php if (!empty($producto)){ ?>
                        <input type="hidden" name="idProducto" value="<?= $producto[0]['idProducto'] ?>">
                        <input type="hidden" name="accion" value="actualizar">
                    <?php }else { ?>
                        <input type="hidden" name="accion" value="agregar"> 
                    <?php } ?>   
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="nombre">Nombre Producto</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?= !empty($producto) ? $producto[0]['nombre']:''?>" required/>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="img">Imagen <?php if (!empty($producto)): echo "(Selecciona una nueva)"; endif; ?></label>
                        <input type="file" id="img" name="img" class="form-control" accept=".jpg, .jpeg, .png, .gif" onchange="document.getElementById('img_text').value = this.value.split('\\').pop()" required/>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="modelo">Modelo</label>
                        <input type="text" id="modelo" name="modelo" class="form-control" value="<?= !empty($producto) ? $producto[0]['modelo']:''?>" required/>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="marca">Marca</label>
                        <input type="text" id="marca" name="marca" class="form-control" value="<?= !empty($producto) ? $producto[0]['marca']:''?>" required/>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="medida">Medida</label>
                        <input type="text" id="medida" name="medida" class="form-control" value="<?= !empty($producto) ? $producto[0]['medida']:''?>" required/>
                    </div>
                </div>
                <div>
                    <div class="form-outline">
                        <label class="form-label" for="precio">Precio</label>
                        <input type="text" id="precio" name="precio" class="form-control" value="<?= !empty($producto) ? $producto[0]['precio']:''?>" required/>
                    </div>
                </div>
                <div class="form-outline">
                    <label for="clasificacion" class="form-label">Clasificación</label>
                        <select id="clasificacion" name="clasificacion" class="form-select" aria-label="Default select example">
                            <option value="" <?= empty($producto) || $producto[0]['clasificacion'] == '' ? 'selected' : '' ?>>Selecciona una clasificacion</option>
                            <option value="Playera" <?= !empty($producto) && $producto[0]['clasificacion'] == 'Playera' ? 'selected' : '' ?>>Playera</option>
                            <option value="Sudadera" <?= !empty($producto) && $producto[0]['clasificacion'] == 'Sudadera' ? 'selected' : '' ?>>Sudadera</option>
                            <option value="Bolsa" <?= !empty($producto) && $producto[0]['clasificacion'] == 'Bolsa' ? 'selected' : '' ?>>Bolsa</option>
                        </select>
                </div>
                <div class="form-outline mb-3">
                    <label class="form-label" for="caracteristicas">Características</label>
                    <textarea id="caracteristicas" name="caracteristicas" class="form-control" placeholder="Escriba las características del producto." required><?= !empty($producto) ? $producto[0]['caracteristicas']:''?></textarea>
                </div>
                <?php if (empty($producto)){ ?>
                <div class="text-center">
                    <div class="form-outline">
                        <label class="form-label" for="stock">Inventario inicial: </label>
                        <input type="number" id="stock" name="stock" min="1" max="999999" required/>
                    </div>
                </div>
                <!-- Submit button -->
                <div class="text-center"><br>
                    <input type="submit" class="btn btn-success btn-jumbotron btn-block mb-4" value="Guardar">
                </div>
                <?php } else { ?>
                <!-- Submit button -->
                <div class="text-center"><br>
                    <input type="submit" class="btn btn-success btn-jumbotron btn-block mb-4" value="Actualizar">
                </div>
                <?php } ?>    
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
                            <th>Clasif.</th>
                            <th>Características</th>
                            <th>Acción</th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        foreach($productos as $dat){
                            echo "<tr>";
                            echo "<td>".$dat['nombre']."</td>";
                            echo "<td>".$dat['img']."</td>";
                            echo "<td>".$dat['modelo']."</td>";
                            echo "<td>".$dat['marca']."</td>";
                            echo "<td>".$dat['medida']."</td>";
                            echo "<td>$".$dat['precio']."</td>";
                            echo "<td>".$dat['clasificacion']."</td>";
                            echo "<td>".$dat['caracteristicas']."</td>";
                            echo "<td style='display: flex; justify-content: space-between;'>
                                <a href='".base_url('editarProducto')."/".$dat['idProducto']."' class='bi bi-pencil-square'></a>
                                <a href='".base_url('eliminarProducto')."/".$dat['idProducto']."' class='bi bi-trash-fill'></a>
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

<script type="text/javascript">
      $(document).ready(function() {
        $('#tabla-ejemplo').DataTable({
            pageLength : 5,
            lengthMenu: [5, 10, 15, 25, 50],
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
        }
        });
      });
</script>