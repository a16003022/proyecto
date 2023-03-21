<style>
        .efecto img {
            transition: 0.5s all ease-in-out;
        }
     
        .efecto:hover img {
            transform: scale(1.1);
        }

        .centered {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
        }

        .thumbnail {
          position: relative;
          text-align: center;
          color: white;
        }

        .subtitle{
          font-size: 5em;
          text-shadow: 2px 2px #FFF;
        }

        @media screen and (max-width: 480px) {
          .subtitle{
          font-size: 2em;
        }
        }

        @media screen and (max-width: 1925px) {
          .subtitle{
          font-size: 2em;
        }
        }

    </style>

<!-- Container (Portfolio Section) -->
<div id="productos" class="container-fluid text-center bgCat" style="padding-top: 60px; padding-bottom: 60px;">
  <h3 class="text-white">CATÁLOGO</h3><br>
  <div class="row text-center ">
    <div class="col-md-4 efecto">
      <div class="thumbnail">
      <a href="<?php echo base_url()?>/catalogoPlayeras"><img class="img-fluid" src="<?php echo base_url()?>/imagenes/playeras.jfif" alt="Playeras" style="max-width:60%;"> </a>
      
        <p class="subtitle centered"><strong>Playeras</strong></p>
      </div>
    </div>
    <div class="col-md-4 efecto">
      <div class="thumbnail">
      <a href="<?php echo base_url()?>/catalogoSudaderas"><img src="<?php echo base_url()?>/imagenes/sudadera2.jpg" alt="New York" style="max-width:60%;"></a>
        <p class="subtitle centered"><strong>Sudaderas</strong></p>
      </div>
    </div>
    <div class="col-md-4 efecto">
      <div class="thumbnail">
      <a href="<?php echo base_url()?>/catalogoBolsas">
      <img src="<?php echo base_url()?>/imagenes/bolsa3.jpg" alt="San Francisco" style="max-width:68%;"></a>
        <p class="subtitle centered"><strong>Bolsas térmicas</strong></p>
      </div>
    </div>
  </div>
</div>
