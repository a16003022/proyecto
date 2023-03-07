<section>
<div class="container registrarPaquete">
    <form method="post" action="<?php echo base_url().'/guardar_paquete'?>">   
        <div>
            <div class="form-outline">
            <label class="form-label" for="nombre">Nombre Paquete</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required/>
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="3"></textarea>
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
</section>