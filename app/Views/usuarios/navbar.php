<nav class="navbar navbar-expand-lg navbar-light bg-light fijado">
  <div class="container-fluid">
    
    <a class="logo" href="<?php echo base_url()?>/usuarios"><img class="logo" src="<?php echo base_url()?>/imagenes/1.png"></a>
    
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <!-- <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>/usuarios">NOSOTROS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>/usuarios/#contact">CONTACTO</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">CATÁLOGO</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url()?>/catalogoPlayeras">PLAYERAS</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url()?>/catalogoSudaderas">SUDADERAS</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url()?>/catalogoBolsas">BOLSA TÉRMICA</a></li>
          </ul>
        </li>
        
      </ul> -->
      <ul class="navbar-nav ms-auto">
      <button class="btnbuscar btn btn-light " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg></i></button>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>/carrito"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg><?php if(!$cantidad ==0){
?><asp:Label ID="lblCartCount" runat="server" CssClass="badge badge-warning"  ForeColor="White"/><?php echo ($cantidad); ?></span>
</a><?php
}else{?>
  </a><?php
}
?>

        </li>
        <li class="nav-item">
          <a class="nav-link "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg>
          <?php echo $_SESSION['name']; ?>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link " aria-current="page" href="<?php echo base_url('/logout'); ?>">Cerrar Sesión</a>
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
</nav>