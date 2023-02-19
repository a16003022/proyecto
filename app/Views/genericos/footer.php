<footer class="container-fluid text-center">
<div class="container">
      <div class="row p-0 mx-0 align-items-center">
        <div class= "col-lg-4 col-md-12 col-sm-12">
        <img class="logo-footer"  src="<?php echo base_url()?>/imagenes/1.png">
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
          <a href="" target="_blank"><img  class= "social-buttons"  src="<?php echo base_url()?> /imagenes/fb.png"></a>
          <a href="https://www.instagram.com/vibretmx/" target="_blank"><img  class= "social-buttons" src="<?php echo base_url()?> /imagenes/instagram.png"></a>
          <a href="" target="_blank"><img  class= "social-buttons" src="<?php echo base_url()?> /imagenes/whats.png"></a>
        </div>
        <div class= "col-lg-4 col-md-12 col-sm-12">
          <a id="terminos" data-toggle="modal" data-target="#terms" >Términos y Condiciones</a>
        </div>
      </div>
    </div>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>