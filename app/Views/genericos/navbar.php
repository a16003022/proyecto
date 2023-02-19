<nav class="navbar navbar-expand-lg navbar-light bg-light fijado">
  <div class="container-fluid">
      <a href="<?php echo base_url()?>/inicio">
        <img class="logo" src="<?php echo base_url()?>/imagenes/1.png">
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#about">NOSOTROS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">CONTACTO</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">CATÁLOGO</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">PLAYERAS</a></li>
            <li><a class="dropdown-item" href="#">SUDADERAS</a></li>
            <li><a class="dropdown-item" href="#">BOLSA TÉRMICA</a></li>
          </ul>
        </li>
        
      </ul>
      <ul class="navbar-nav ms-auto">
      <button class="btnbuscar btn btn-light " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></i></button>

        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">LOGIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>/registro">REGISTRO</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Encuentra tu producto</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <input type="search" id="search" class="form-control shadow-sm" placeholder="Buscar">
  </div>
</div>

