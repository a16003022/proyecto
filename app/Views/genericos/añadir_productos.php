<div class="container registrarPaquete">
    <h2>Agregar productos al paquete</h2>
    <h3>Paquete: <?php echo $paquete[0]['nombre']; ?></h3>
    <form action="<?php echo base_url('relacionarProd/' . $paquete[0]['idPaquete']); ?>" method="post">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Medida</th>
                    <th>Clasificación</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productos as $producto): ?>
                    <tr>
                        <td><input type="checkbox" name="productos[]" value="<?php echo $producto['idProducto']; ?>"></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['modelo']; ?></td>
                        <td><?php echo $producto['marca']; ?></td>
                        <td><?php echo $producto['medida']; ?></td>
                        <td><?php echo $producto['clasificacion']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Agregar Productos</button>
    </form>
</div>
