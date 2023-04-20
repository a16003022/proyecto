
<style>

    .visa{
        width: 3em;
    }

    .progress {
    background-color: #eaeaea;
    height: 20px;
    border-radius: 5px;
    overflow: hidden;
    }

    .progress-bar {
    background-color: #9162dd;
    height: 100%;
    border-radius: 5px;
    transition: width 0.5s ease-in-out;
    }


    .btn-back {
    width: 140px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
    position: relative;
    background-color: transparent;
    transition: .2s cubic-bezier(0.19, 1, 0.22, 1);
    opacity: 0.6;
    color: #9162dd;
    }

    .btn-back::after {
    content: '';
    border-bottom: 3px double rgb(145, 98, 221);
    width: 0;
    height: 100%;
    position: absolute;
    margin-top: -5px;
    top: 0;
    left: 5px;
    visibility: hidden;
    opacity: 1;
    transition: .2s linear;
    }

    .btn-back .icon {
    transform: translateX(0%);
    transition: .2s linear;
    animation: attention 1.2s linear infinite;
    }

    .btn-back:hover::after {
    visibility: visible;
    opacity: 0.7;
    width: 90%;
    }

    .btn-back:hover {
    letter-spacing: 2px;
    opacity: 1;
    }

    .btn-back:hover > .icon {
    transform: translateX(30%);
    animation: none;
    }

    @keyframes attention {
    0% {
        transform: translateX(0%);
    }

    50% {
        transform: translateX(30%);
    }
    }

    
    .btn-modal{
        border-color: #9162dd !important; 
        color: #9162dd !important; 
    }

    .btn-modal:hover{
        background-color: #9162dd !important; 
        color: #fff !important; 
    }
    .form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 20px;
    }

    .payment--options {
    width: calc(100% - 40px);
    display: grid;
    grid-template-columns: 33% 34% 33%;
    gap: 20px;
    padding: 10px;
    }

    .payment--options button {
    height: 55px;
    background: #F2F2F2;
    border-radius: 11px;
    padding: 0;
    border: 0;
    outline: none;
    }

    .payment--options button svg {
    height: 18px;
    }

    .payment--options button:last-child svg {
    height: 22px;
    }

    .separator {
    width: calc(100% - 20px);
    display: grid;
    grid-template-columns: 1fr 2fr 1fr;
    gap: 10px;
    color: #8B8E98;
    margin: 0 10px;
    }

    .separator > p {
    word-break: keep-all;
    display: block;
    text-align: center;
    font-weight: 600;
    font-size: 11px;
    margin: auto;
    }

    .separator .line {
    display: inline-block;
    width: 100%;
    height: 1px;
    border: 0;
    background-color: #e8e8e8;
    margin: auto;
    }

    .credit-card-info--form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    }

    .input_container {
    width: 100%;
    height: fit-content;
    display: flex;
    flex-direction: column;
    gap: 5px;
    }

    .split {
    display: grid;
    grid-template-columns: 4fr 2fr;
    gap: 15px;
    }

    .split input {
    width: 100%;
    }

    .input_label {
    font-size: 10px;
    color: #8B8E98;
    font-weight: 600;
    }

    .input_field {
    width: auto;
    height: 40px;
    padding: 0 0 0 16px;
    border-radius: 9px;
    outline: none;
    background-color: #F2F2F2;
    border: 1px solid #e5e5e500;
    transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
    }

    .input_field:focus {
    border: 1px solid transparent;
    box-shadow: 0px 0px 0px 2px #242424;
    background-color: transparent;
    }

    .purchase--btn {
    height: 55px;
    background: #9162dd !important;
    border-radius: 11px;
    border: 0;
    outline: none;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    background: linear-gradient(180deg, #363636 0%, #1B1B1B 50%, #000000 100%);
    box-shadow: 0px 0px 0px 0px #FFFFFF, 0px 0px 0px 0px #000000;
    transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
    width:100%;
    margin-top: 4vh;
    }

    .purchase--btn:hover {
    box-shadow: 0px 0px 0px 2px #FFFFFF, 0px 0px 0px 4px #0000003a;
    }

    /* Reset input number styles */
    .input_field::-webkit-outer-spin-button,
    .input_field::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    .input_field[type=number] {
    -moz-appearance: textfield;
    }

    /* CARDS*/
    .active {
  border-color: #9162dd !important;
  background-color: #f2f2f2;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.18), 0 3px 6px rgba(0, 0, 0, 0.23);
    }

    .card {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15), 0 2px 5px rgba(0, 0, 0, 0.2);
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
    }
</style>

<div class="section" style="padding-top: 15vh; height: 95vh;" >
<div class="container" style="padding-bottom: 10vh;">
    <button class="btn-back" onclick="window.location.href='<?php echo base_url('/carrito'); ?>'">
        <svg height="15px" width="15px" class="icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 20L7 12L15 4" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Regresar
    </button>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div id="countdown"></div>
    <form class="form" name="miFormulario" id="miFormulario" action="<?php echo base_url('/registrarventa'); ?>" method="post">
        <div class="row">
            <div class="col-lg-6  col-sm-12">
                <h1>Información de pago</h1>
                    <div class="payment--options">
                        <button name="paypal" type="button">
                        <img class="visa" src="<?php echo base_url('/imagenes/visa.png'); ?>" alt="">
                        </button>
                        <button name="apple-pay" type="button">
                        <img class="visa" src="<?php echo base_url('/imagenes/Mastercard-logo.png'); ?>" alt="">
                        </button>
                        <button name="google-pay" type="button">
                        <img class="visa" src="<?php echo base_url('/imagenes/American.png'); ?>" alt="">
                        </button>
                    </div>
                    <div class="separator">
                        <hr class="line">
                        <p>Tarjetas bancarias participantes</p>
                        <hr class="line">
                    </div>
                    <div class="credit-card-info--form">
                        <div class="input_container">
                        <label for="password_field" class="input_label">Nombre completo</label>
                        <input id="password_field" class="input_field" type="text" name="input-name" title="Inpit title" placeholder="Ingresa tu nombre completo" required>
                        </div>
                        <div class="input_container">
                        <label for="password_field" class="input_label">Número de tarjeta</label>
                        <input  class="input_field" type="text" name="numTarjeta" placeholder="0000 0000 0000 0000" size="18" id="cr_no" minlength="19" maxlength="19" required>
                        </div>
                        <div class="input_container">
                        <label for="password_field" class="input_label">Fecha de expiración / CVV</label>
                        <div class="split">
                        <input class="input_field" type="text" name="exp" placeholder="MM/YY" size="6" id="exp" minlength="5" maxlength="5" required>
                        <input type="password" name="cvv" class="input_field" size="1" minlength="3" maxlength="3" placeholder="000" required>
                        <input type="hidden" name="numero_venta" value="<?php echo $numeroVenta; ?>">
                        </div>
                        </div>
                    </div>
                        <?php
                            $subtotal = 0;
                            $total = 0;
                        foreach($carrito as $cart){
                            $precio = $cart['precio'];
                            $cant = $cart['cantidad'];
                            $subtotal = $precio * $cant;
                            $total = $subtotal + $total;
                            
                        }?>
                        <input type="hidden" name="totalPagar" value="<?php echo $total; ?>">
                        <button type="submit" class="purchase--btn">Pagar $<?php echo $total;?></button>
                        
                        
            </div>
            <div class="col-lg-6  col-sm-12">
                <h1>Información de envío</h1>
            
                <button type="button" class="btn btn-outline-primary mt-3 mb-3 btn-modal btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Dirección</button>
                
            <div class="form-group row">
                <div class="col-12">
                    <div class="card-deck">
                        
                        <?php 
                        $contador = 0;
                        $total = 0;
                        foreach($direccion as $dir) {
                            $contador=$contador+1;
                            echo    '<div id="'.$dir['id'].'-card" class="card mb-4">';
                            echo     '<div class="card-body" role="button">';
                                echo '<h5 class="card-title"><input id="'.$dir['id'].'" type="radio" name="direccionselect" value="'.$dir['id'].'"required>';
                                        echo '<label for="elephant">Dirección '.$contador.'</label></h5>';
                                    echo '<p class="card-text"><i class="fa-sharp fa-solid fa-location-dot"></i> '.$dir['direccion'].'. '.$dir['ciudad'].', '.$dir['estado'].' '.$dir['CP'].'</p>';
                                    // echo '<p class="card-text"><i class="fa-sharp fa-solid fa-location-dot"></i> '.$dir['ciudad'].', '.$dir['estado'].'</p>';
                                    echo '<p class="card-text"><i class="fa-solid fa-phone"></i> '.$dir['telefono'].'</p>';
                                    echo '</div>';
                                echo '</div>';
                    }?>
                    </div>
                </div>
    </form>
            </div> 
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Dirección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('/registrardireccion'); ?>" method="post" class="form">
                        <div class="container-fluid">
                            <div class="input_container credit-card-info--form">
                                <label for="">Calle y número</label>
                                <input id="calle" class="input_field" type="text" name="calle" title="calle" placeholder="Calle, número ext e int">
                            </div>
                            <div class="row">
                                <div class="col-6 ">
                                    <label for="">Código Postal</label>
                                    <input id="CP" class="input_field" type="number" name="CP" title="CP" placeholder="Por ejemplo,01000">
                                </div>
                                <div class="col-6">
                                    <label for="">Número de teléfono</label>
                                    <input id="telefono" class="input_field" type="number" name="telefono" title="telefono">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 ">
                                    <label for="">Estado &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <select name="estado" class="input_field">
                                        <option value="no">Seleccione uno...</option>
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="CDMX">Ciudad de México</option>
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Estado de México">Estado de México</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="Michoacán">Michoacán</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="">Ciudad &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input id="Ciudad" class="input_field" type="text" name="Ciudad" title="Ciudad">
                                </div>
                            </div>
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar Dirección</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
<script>

    // var countdownElement = document.getElementById("countdown");
    // var progressBarElement = document.querySelector(".progress-bar");

    // var totalTime = 120; // tiempo en segundos
    // var remainingTime = totalTime;

    // var interval = setInterval(function() {
    //     remainingTime--;
    //     if (remainingTime <= 0) {
    //     clearInterval(interval);
    //     window.location.href = document.referrer; // redirigir a la página anterior
    //     } else {
    //     var progress = (totalTime - remainingTime) / totalTime;
    //     progressBarElement.style.width = progress * 100 + "%";
    //     countdownElement.innerHTML = Math.round(remainingTime) + " segundos restantes";
    //     }
    // }, 1000);




   $(document).ready(function(){

    //For Card Number formatted input
    var cardNum = document.getElementById('cr_no');
    cardNum.onkeyup = function (e) {
        if (this.value == this.lastValue) return;
        var caretPosition = this.selectionStart;
        var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
        var parts = [];
        
        for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
            parts.push(sanitizedValue.substring(i, i + 4));
        }
        
        for (var i = caretPosition - 1; i >= 0; i--) {
            var c = this.value[i];
            if (c < '0' || c > '9') {
                caretPosition--;
            }
        }
        caretPosition += Math.floor(caretPosition / 4);
        
        this.value = this.lastValue = parts.join(' ');
        this.selectionStart = this.selectionEnd = caretPosition;
    }

    //For Date formatted input
    var expDate = document.getElementById('exp');
    expDate.onkeyup = function (e) {
        if (this.value == this.lastValue) return;
        var caretPosition = this.selectionStart;
        var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
        var parts = [];
        
        for (var i = 0, len = sanitizedValue.length; i < len; i += 2) {
            parts.push(sanitizedValue.substring(i, i + 2));
        }
        
        for (var i = caretPosition - 1; i >= 0; i--) {
            var c = this.value[i];
            if (c < '0' || c > '9') {
                caretPosition--;
            }
        }
        caretPosition += Math.floor(caretPosition / 2);
        
        this.value = this.lastValue = parts.join('/');
        this.selectionStart = this.selectionEnd = caretPosition;
    }

    });


    // Selecciona el formulario y escucha el evento de envío
    document.querySelector('#miFormulario').addEventListener('submit', function(event) {
    // Previene el envío del formulario
    event.preventDefault();
    
    // Muestra la alerta de Sweet Alert 2
    Swal.fire({
        title: 'Pago realizado',
        text: '¡Gracias por comprar con nosotros!',
        icon: 'success'
    });
    
    // Envía el formulario manualmente
    this.submit();
    });

    

    $(document).ready(function () {
    $('input:radio').change(function () {//Clicking input radio
        var radioClicked = $(this).attr('id');
        unclickRadio();
        removeActive();
        clickRadio(radioClicked);
        makeActive(radioClicked);
    });
    $(".card").click(function () {//Clicking the card
        var inputElement = $(this).find('input[type=radio]').attr('id');
        unclickRadio();
        removeActive();
        makeActive(inputElement);
        clickRadio(inputElement);
    });
    });

    function unclickRadio() {
        $("input:radio").prop("checked", false);
    }

    function clickRadio(inputElement) {
        $("#" + inputElement).prop("checked", true);
    }

    function removeActive() {
        $(".card").removeClass("active");
    }

    function makeActive(element) {
        $("#" + element + "-card").addClass("active");
    }
</script>
