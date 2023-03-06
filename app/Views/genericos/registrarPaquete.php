<section>
<div class="container registrarPaquete">
    <div>
        <div class="form-outline">
        <label class="form-label" for="inputNombre">Nombre Paquete</label>
        <input type="text" id="inputNombre" class="form-control" required/>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="fechaIni" class="form-label">Fecha de inicio</label>
        <input type="date" class="form-control" id="fechaIni">
    </div>
    <div class="mb-3">
        <label for="fechaTer" class="form-label">Fecha de término</label>
        <input type="date" class="form-control" id="fechaTer">
    </div>
    <div class="mb-3">
    <label for="select" class="form-label">Status</label>
    <select id="select" class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1">Activo</option>
        <option value="2">Inactivo</option>
    </select>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="Precio">
    </div>
    </div>
    <!-- Submit button -->
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-jumbotron btn-block mb-4">
            Registrar
        </button>
    </div>
</div>
</section>