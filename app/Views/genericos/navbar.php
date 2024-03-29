<nav class="navbar navbar-expand-lg navbar-light bg-light fijado">
  <div class="container-fluid">
    
    <a class="logo" href="<?php echo base_url()?>/inicio"><img class="logo" src="<?php echo base_url()?>/imagenes/2.png"></a>
    
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>/inicio">NOSOTROS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>/inicio/#contact">CONTACTO</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">CATÁLOGO</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url()?>/catalogoPlayeras">PLAYERAS</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url()?>/catalogoSudaderas">SUDADERAS</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url()?>/catalogoBolsas">BOLSA TÉRMICA</a></li>
          </ul>
        </li>
        
      </ul>
      <ul class="navbar-nav">
      <button class="btnbuscar btn btn-light " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></i></button>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>/login">LOGIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>/registro">REGISTRO</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
<div class="offcanvas-body">
    <form method="get" action="<?php echo base_url('buscar'); ?>">
      <input type="search" id="buscar" name="buscar" class="form-control shadow-sm" placeholder="Escriba una palabra clave">
      <button type="submit" class="btn btn-primary mt-2 btn-jumbotron">Buscar</button>
    </form>
</div>
</div>
</nav>
