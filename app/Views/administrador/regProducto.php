<section>
<div class="container registrarPaquete">
<h2><?= $titulo_seccion; ?></h2>
<p><?= $descripcion; ?></p>
    <form method="post" action="<?php echo base_url().'/guardar_producto'?>">   
        <div>
            <div class="form-outline">
            <label class="form-label" for="nombre">Nombre Producto</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required/>
        </div>
        <div>
            <div class="form-outline">
            <label class="form-label" for="img">Ruta imagen</label>
            <input type="text" id="img" name="img" class="form-control" required/>
        </div>
        <div>
            <div class="form-outline">
            <label class="form-label" for="modelo">Modelo</label>
            <input type="text" id="modelo" name="modelo" class="form-control" required/>
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
        <div>
            <div class="form-outline">
            <label class="form-label" for="clasificacion">Clasificación</label>
            <input type="text" id="clasificacion" name="clasificacion" class="form-control" required/>
        </div>
        <!-- Submit button -->
        <div class="text-center">
            <input type="submit" class="btn btn-success btn-jumbotron btn-block" value="Registrar">
        </div>
    </form>
</div>
</section>
<script type="text/javascript">
    function carga_modal(idProducto){
        alert(idProducto);
    }
</script>