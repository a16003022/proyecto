
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

    p {
        margin: 0px;
    }

    .h8 {
        font-size: 25px;
        font-weight: 600;
        color: white;
    }

    /* .card .atm {
        width: 90px;
        height: 90px;
        object-fit: cover;
    }

    .card .visa {
        width: 50px;
        height: 20px;
        object-fit: fill;
    }

    .card .master {
        width: 50px;
        height: 50px;
        object-fit: fill;
    } */

    .debit-card {
        width: 100%;
        height: 100%;
        padding: 2%;
        /* background-color: #0093E9; */
        /* background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%); */
        position: relative;
        border-radius: 5px;
        box-shadow: 3px 3px 5px #0000001a;
        transition: all 0.3s ease-in;
        cursor: pointer;
    }

    .debit-card:hover {
        box-shadow: 5px 3px 5px #000000a2;
    }

    .card-2 {
        background-color: #21D4FD;
        background-image: linear-gradient(116deg, #21D4FD 0%, #B721FF 100%);
    }

    .text-muted {
        font-size: 0.8rem;
    }

    .text-white {
        font-size: 1em;
    }

    .numero{
        color: #fff;
        font-size: .9em;
        background: rgba( 0, 0, 0, 0.4 );
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 6px );
        -webkit-backdrop-filter: blur( 6px );
        border-radius: 5px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
    }

    .visa-card {
        background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%) !important; /* color para tarjeta Visa */
    }

    .mastercard-card {
        background-image: linear-gradient(to bottom right, #ff5f6d, #ffc371)!important; /* color para tarjeta Mastercard */
    }

    .americane-card {
        background-image: linear-gradient(160deg, #0C1F54 0%, #7B50A0 100%)!important;
    }

    .visa-img  {
        width: 30%;
        padding-bottom: 10.5%;
    }

    .mastercard-img  {
        width: 26%;
    }

    .american-img  {
        width: 20%;
    }
    .tarjeta {
        width: 50%;
        height: 60%; /* o cualquier otra altura deseada */
    }

    .nombre  {
        font-size: 14px;
    }

    body {
    -webkit-user-select: none; /* Para navegadores webkit (Chrome, Safari) */
    -moz-user-select: none; /* Para navegadores basados en Gecko (Firefox) */
    -ms-user-select: none; /* Para Internet Explorer */
    user-select: none; /* Para navegadores modernos */
    }

   

    .btn-crsl {
        display: inline-block;
        transform: translate(-15%, -15%);
        top: 50%;
        left: 50%;
        font-weight: 600;
        height: 40px;
        line-height: 40px;
        cursor: pointer;
        background-color: inherit;
        border: none;
        outline: none;
        color: #000;
        margin-left: 5%;
    }

    .btn-crsl:hover{
        color: #fff;
    }

    .btn-crsl:hover .background {
        height: inherit;
        width: 120%;
        top: 50%;
    
    }

    .btn-crsl .background {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 3px;
        width: 100%;
        background-color: #9162dd;
        z-index: -1;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .creditosvg{
        width:30%;
    }

    @media screen and (max-width: 480px) {
        .creditosvg{
        width:40%;
    }

        .tarjeta {
            width: 80%;
            height: 60%; /* o cualquier otra altura deseada */
        }

        .infoenvio{
            padding-top: 10%;
        }
    }

   

 

    .svg-container {
        display: flex;
        justify-content: center;
        align-items: center;
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
                <button type="button" class="btn btn-outline-primary mt-3 mb-3 btn-modal btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#exampleModal2">Agregar Tarjeta</button>
                <div class="tarjetas-container">
                    <div class="row">
                        <?php
                        $existe ="";
                        $contador = 0;
                        $total = 0;

                        foreach($Tarjeta as $Tar){
                            if($Tar > 1){
                                $existe = TRUE;
                                $numTarjeta = $Tar['numTarjeta'];
                                    $ultimosCuatro = substr($numTarjeta, -4);
                                    $asteriscos = str_repeat('●', 4);
                                    $numTarjetaOculto = $asteriscos . ' ' . $ultimosCuatro;
                                    $imagen_tarjeta = '';
                                    if ($Tar['Tipo'] == 'Visa') {
                                        $imagen_tarjeta = 'visa.png';
                                        $tipo_tarjeta = 'visa-img';
                                      } elseif ($Tar['Tipo'] == 'Mastercard') {
                                        $imagen_tarjeta = 'Mastercard-logo.png';
                                        $tipo_tarjeta = 'mastercard-img';
                                      } elseif ($Tar['Tipo'] == 'AmericanE') {
                                        $imagen_tarjeta = 'American.png';
                                        $tipo_tarjeta = 'american-img';
                                      }

                                    echo '
                                    <div class=" tarjeta col-lg- col-sm-12 pt-2 mx-auto">
                                        <div class="debit-card ' . strtolower($Tar['Tipo']) . '-card">
                                            <div class="d-flex flex-column h-100">
                                                <label class="d-block">
                                                    <div class="d-flex position-relative">
                                                        <div>
                                                            <img src="'.base_url().'/imagenes/'.$imagen_tarjeta.'" class="'.$tipo_tarjeta.'" alt="">
                                                            <p class="mt-2 mb-4 text-white fw-bold nombre">'.$Tar['NombreTarjeta'].'</p>
                                                        </div>
                                                        <div class="input">
                                                            <input type="radio" name="tarjetaselect" id="'.$Tar['id'].'-tar" value="'.$Tar['id'].'" required>
                                                        </div>
                                                    </div>
                                                </label>
                                                <div class="mt-auto fw-bold d-flex align-items-center justify-content-between">
                                                    <p class="numero">'.$numTarjetaOculto.'</p>
                                                    <p class="numero">'.$Tar['FechaTarjeta'].'</p>
                                                </div>
                                            </div>
                                        </div>                
                                    </div>
                                ';
                                

                            }else {
                                $existe = FALSE;
                            }
                            
                        }?>
                            </div>
                        </div>
                        
                    <?php
                        if($existe == TRUE){
                            $subtotal = 0;
                            $total = 0;
                                foreach($carrito as $cart){
                                    $precio = $cart['precio'];
                                    $cant = $cart['cantidad'];
                                    $subtotal = $precio * $cant;
                                    $total = $subtotal + $total;
                                    
                                }
                            echo  '<div class="text-center pt-4 ">
                                <button id="anterior-btn" class="btn-crsl">Anterior
                                    <div class="background"></div>
                                </button>
                                <button id="siguiente-btn" class="btn-crsl">Siguiente
                                    <div class="background"></div>
                                </button>
                            </div>';
                            echo '<input type="hidden" name="numero_venta" value="'.$numeroVenta.'">';
                            echo '<input type="hidden" name="totalPagar" value="'.$total.'">';
                            echo '<button type="submit" class="purchase--btn">Pagar $'.$total.'</button>';
                        }else{
                            echo '<div class="svg-container">';
                            echo '<svg class="creditosvg" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="567.1704" height="250.30967" viewBox="0 0 567.1704 517.30967" xmlns:xlink="http://www.w3.org/1999/xlink"><rect x="326.03543" y="307.38928" width="495" height="45" transform="translate(-385.45426 -17.88532) rotate(-16.24392)" fill="#3f3d56"/><path d="M386.40028,575.96948,316.35377,335.55639a7.0001,7.0001,0,0,1,4.76257-8.67871L784.8346,191.76928a7.00645,7.00645,0,0,1,8.67871,4.76221l62.05591,212.98877-1.92016.55957L791.59315,197.09106a5.00865,5.00865,0,0,0-6.19922-3.40186L321.67579,328.7976a5.00029,5.00029,0,0,0-3.40186,6.19922l70.04651,240.41309Z" transform="translate(-316.07106 -191.48811)" fill="#3f3d56"/><path d="M752.93324,410.51a6.51233,6.51233,0,0,1-6.24341-4.6831l-11.74854-40.32324a6.50734,6.50734,0,0,1,4.42212-8.0586l40.32349-11.74853a6.50722,6.50722,0,0,1,8.05859,4.42285L799.494,390.44262a6.50733,6.50733,0,0,1-4.42212,8.05859l-40.32349,11.74854A6.47854,6.47854,0,0,1,752.93324,410.51Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M385.31751,336.3a11.691,11.691,0,0,0-.43017-1.22,11.99972,11.99972,0,0,0-22.90967,6.67,11.37989,11.37989,0,0,0,.29,1.26,12.01924,12.01924,0,0,0,11.52978,8.64,11.74908,11.74908,0,0,0,3.3501-.48A12.01262,12.01262,0,0,0,385.31751,336.3Zm-8.73,12.95a10.01322,10.01322,0,0,1-12.3999-6.8,11.435,11.435,0,0,1-.28027-1.26,9.99681,9.99681,0,0,1,19.04-5.54,8.33837,8.33837,0,0,1,.45019,1.21A10.00446,10.00446,0,0,1,376.58753,349.25006Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M355.88508,344.87a11.00221,11.00221,0,0,1,4.20834-12.0571,11,11,0,1,0,5.81753,19.96694A11.00221,11.00221,0,0,1,355.88508,344.87Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M666.7472,394.43005a6.04249,6.04249,0,0,0-7.44971-4.2L592.90736,408.8l-7.14991,2h44.89991l7.1499-2,24.75-6.92A6.04864,6.04864,0,0,0,666.7472,394.43005Z" transform="translate(-316.07106 -191.48811)" fill="#ccc"/><path d="M619.77747,380.56005a6.04513,6.04513,0,0,0-7.45019-4.19l-99.61963,27.86a6.06838,6.06838,0,0,0-4.37012,6.57h25.79l7.15967-2,74.30029-20.78A6.05544,6.05544,0,0,0,619.77747,380.56005Z" transform="translate(-316.07106 -191.48811)" fill="#ccc"/><path d="M876.24147,408.79777H393.241a7.00787,7.00787,0,0,0-7,7v286a7.00755,7.00755,0,0,0,7,7H876.24147a7.00786,7.00786,0,0,0,7-7v-286A7.00818,7.00818,0,0,0,876.24147,408.79777Zm5,293a5.00181,5.00181,0,0,1-5,5H393.241a5.0018,5.0018,0,0,1-5-5v-286a5.00213,5.00213,0,0,1,5-5H876.24147a5.00213,5.00213,0,0,1,5,5Z" transform="translate(-316.07106 -191.48811)" fill="#3f3d56"/><path d="M440.23744,447.8a12,12,0,1,1,12-12A12.01375,12.01375,0,0,1,440.23744,447.8Zm0-22a10,10,0,1,0,10,10A10.0113,10.0113,0,0,0,440.23744,425.8Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M421.58526,435.8a11.00221,11.00221,0,0,1,7.413-10.39858,11,11,0,1,0,0,20.79717A11.00222,11.00222,0,0,1,421.58526,435.8Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M488.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,488.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M512.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,512.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M536.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,536.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M573.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,573.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M597.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,597.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M621.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,621.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M658.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,658.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M682.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,682.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M706.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,706.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M743.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,743.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M767.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,767.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M791.88112,577.57805a9.01031,9.01031,0,0,1-9-9v-27a9,9,0,0,1,18,0v27A9.01032,9.01032,0,0,1,791.88112,577.57805Z" transform="translate(-316.07106 -191.48811)" fill="#9162dd"/><path d="M549.89914,677.745H420.45883a6.04736,6.04736,0,1,1,0-12.09472H549.89914a6.04736,6.04736,0,1,1,0,12.09472Z" transform="translate(-316.07106 -191.48811)" fill="#e6e6e6"/><path d="M508.39914,651.745H461.95883a6.04736,6.04736,0,1,1,0-12.09472h46.44031a6.04736,6.04736,0,1,1,0,12.09472Z" transform="translate(-316.07106 -191.48811)" fill="#e6e6e6"/><rect x="71.81005" y="277.08994" width="493" height="2" fill="#3f3d56"/></svg>';
                            echo " <h4 class='pt-5 ms-3' style='text-align: center;'>Registra una tarjeta de crédito para continuar con la compra</h4>";
                            echo '</div>';
                        }


                    ?> 
            </div>
            <div class="infoenvio col-lg-6  col-sm-12">
                <h1>Información de envío</h1>
            
                <button type="button" class="btn btn-outline-primary mt-3 mb-3 btn-modal btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Dirección</button>
                
            <div class="form-group row">
                <div class="col-12">
                <div class="card-deck">
                        <script>let direccionAgregada = false;</script>
                        <?php 
                        $existe2 ="";
                        $contador = 0;
                        $total = 0;
                        foreach($direccion as $dir) {
                            if($dir >1){
                                ?><script> direccionAgregada = true;</script><?php
                                $existe2 =TRUE;
                            $contador=$contador+1;
                            echo    '<div id="'.$dir['id'].'-card" class="card mb-4">';
                            echo     '<div class="card-body" role="button">';
                                echo '<h5 class="card-title"><input id="'.$dir['id'].'" type="radio" name="direccionselect" value="'.$dir['id'].'"class="direccion-radio" required>';
                                        echo '<label for="elephant">Dirección '.$contador.'</label></h5>';
                                    echo '<p class="card-text"><i class="fa-sharp fa-solid fa-location-dot"></i> '.$dir['direccion'].'. '.$dir['ciudad'].', '.$dir['estado'].' '.$dir['CP'].'</p>';
                                    // echo '<p class="card-text"><i class="fa-sharp fa-solid fa-location-dot"></i> '.$dir['ciudad'].', '.$dir['estado'].'</p>';
                                    echo '<p class="card-text"><i class="fa-solid fa-phone"></i> '.$dir['telefono'].'</p>';
                                    echo '</div>';
                                echo '</div>';
                            }else{
                                $existe2 =TRUE;
                            }
                        }?>
                    </div>
                    <?php 
                    if($existe2 == FALSE){
                        echo '<div class="svg-container">';
                        echo  '<svg class="creditosvg" xmlns="http://www.w3.org/2000/svg" data-name="afcb9ff3-8250-4c7a-bd11-73381c22471b" width="806" height="250.71263" viewBox="0 0 806 712.71263" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M770.29584,711.7651l-1.07324-.40235c-.23584-.08886-23.7085-9.082-34.70411-29.47363-10.99609-20.39258-5.61181-44.94531-5.55615-45.19043l.25342-1.11816,1.07275.40234c.23584.08887,23.708,9.082,34.7041,29.47363,10.9961,20.39258,5.61182,44.94532,5.55616,45.19043ZM736.27924,680.94c9.29638,17.24122,27.84521,26.07911,32.54492,28.09668.89355-5.03711,3.6958-25.40625-5.59229-42.63086-9.28711-17.22265-27.84326-26.07421-32.54492-28.09668C729.79291,643.34908,726.99164,663.71627,736.27924,680.94Z" transform="translate(0 0.00002)" fill="#3f3d56"/><path d="M742.92163,674.73605c19.76056,11.88861,27.371,35.50268,27.371,35.50268s-24.42779,4.33881-44.18835-7.5498-27.371-35.50263-27.371-35.50263S723.16107,662.84743,742.92163,674.73605Z" transform="translate(0 0.00002)" fill="#9162dd"/><path d="M424.79175,381.96429a12.52013,12.52013,0,0,1,18.45947-2.87711,11.918,11.918,0,0,1,1.21039,1.15509l49.211-7.16434,2.73877-37.00512a10.73344,10.73344,0,0,1,21.40857,1.58127q-.00733.09877-.01642.19738l-4.79712,51.92527-.02313.11557a9.72362,9.72362,0,0,1-9.39484,6.82034l-57.88263-.99939a11.71287,11.71287,0,0,1-.72607.99188,12.52078,12.52078,0,0,1-18.66761.76392q-.3738-.38278-.70825-.791A12.55948,12.55948,0,0,1,424.79175,381.96429Z" transform="translate(0 0.00002)" fill="#ffb7b7"/><polygon points="524.006 697.479 509.97 697.478 503.293 643.341 524.008 643.342 524.006 697.479" fill="#ffb7b7"/><path d="M527.58527,711.08419l-45.25653-.00171V710.51a17.616,17.616,0,0,1,17.61511-17.61474h.0011l27.64111.0011Z" transform="translate(0 0.00002)" fill="#2f2e41"/><polygon points="622.082 684.754 608.798 689.284 585 640.202 604.607 633.515 622.082 684.754" fill="#ffb7b7"/><path d="M629.86218,696.47494l-42.83362,14.60925-.18481-.54175a17.616,17.616,0,0,1,10.985-22.35852l.001-.00036,26.16138-8.92273Z" transform="translate(0 0.00002)" fill="#2f2e41"/><path d="M539.46124,224.126s-13.96991-4.61358-22.9505,13.84086-22.9505,38.7543-22.9505,38.7543l7.98279,1.84543s1.99567-12.91809,6.985-14.76355l-1.99567,16.609s59.871,19.37713,86.81293-1.84543l-.99787-6.45908s3.9914.92273,3.9914,6.45908l2.99353-2.76816s-2.99353-5.53632-11.97425-12.91809c-5.89453-4.84506-7.9201-14.06278-8.61621-19.82584a23.10194,23.10194,0,0,0-5.9732-13.06512C566.80054,223.5934,555.92584,216.79543,539.46124,224.126Z" transform="translate(0 0.00002)" fill="#2f2e41"/><circle cx="544.61072" cy="263.08761" r="25.5152" fill="#ffb7b7"/><path d="M510.59039,309.61294l-4.6391-1.54639s-9.27826,3.86594-9.27826,10.82462-1.54638,34.79345-1.54638,34.79345l20.8761,2.31958Z" transform="translate(0 0.00002)" fill="#cbcbcb"/><path d="M593.62225,461.69747a12.06379,12.06379,0,0,1-.27588-15.744L580.32312,336.88656a9.7219,9.7219,0,0,1,19.418-1.00061q.00284.05342.00494.10684l11.65064,109.18265a11.71108,11.71108,0,0,1,1.16455,1.36346,12.14374,12.14374,0,0,1-2.7243,16.95642q-.20088.1452-.40748.28217h0a12.155,12.155,0,0,1-10.27014,1.48492A12.00615,12.00615,0,0,1,593.62225,461.69747Z" transform="translate(0 0.00002)" fill="#ffb7b7"/><path d="M581.69482,353.68462l20.8761-2.31955s-1.54638-27.83474-1.54638-34.79345-9.27826-10.82462-9.27826-10.82462l-4.63916,1.54636Z" transform="translate(0 0.00002)" fill="#cbcbcb"/><path d="M513.68317,392.30447s-17.78333,32.51349-17.78333,71.946S494.35345,684.609,494.35345,684.609s23.19562,10.82465,37.113-2.31958l12.371-200.25568,48.71082,196.38971s23.19562,4.63916,34.02026-3.09277l-20.876-136.85413s-8.50506-128.34918-31.70068-137.62744S513.68317,392.30447,513.68317,392.30447Z" transform="translate(0 0.00002)" fill="#2f2e41"/><path d="M517.03937,263.24938c9.03259-6.537,16.34424-14.06632,21.18091-23.02274,0,0,16.57641,18.41822,26.70642,19.33911s.9209-22.10183.9209-22.10183l-18.41822-4.60465-17.49731,1.84183-13.81366,9.20911Z" transform="translate(0 0.00002)" fill="#2f2e41"/><path d="M570.12585,301.10787s.73633-.39526-43.29632,1.20871l-18.429,5.07538-2.4494.67459s2.31958,46.39127,8.50507,54.89633,4.6391,13.1442,3.09277,13.91739-5.41229-.77319-3.09277,3.09274,5.41229,1.54639,2.31958,3.86594-4.63916,10.82462-4.63916,10.82462l68.04053,9.27826s2.31958-30.15433,8.50506-45.61808,7.73187-21.64926,7.73187-21.64926L591.775,305.747Z" transform="translate(0 0.00002)" fill="#cbcbcb"/><path d="M440.76672,169.22353h-3.91266V62.03681A62.03672,62.03672,0,0,0,374.81744,0H147.72766A62.03676,62.03676,0,0,0,85.69073,62.03657v588.035a62.03674,62.03674,0,0,0,62.03666,62.0368H374.81708a62.03677,62.03677,0,0,0,62.037-62.03656h0V245.52087h3.91266Z" transform="translate(0 0.00002)" fill="#3f3d56"/><path d="M423.65088,62.47263v587.17a46.28864,46.28864,0,0,1-46.24725,46.33H149.1409a46.29739,46.29739,0,0,1-46.33-46.26471V62.47262a46.29736,46.29736,0,0,1,46.26471-46.33h27.7453a22.008,22.008,0,0,0,20.38,30.32h130.1a22.008,22.008,0,0,0,20.38-30.32h29.64a46.28851,46.28851,0,0,1,46.33,46.24691v.08311Z" transform="translate(0 0.00002)" fill="#fff"/><path d="M423.65076,149.34266v-20h-30.27v-110.34a46.18578,46.18578,0,0,0-16.06006-2.8601h-3.93994v113.2001h-105v-82.88h-20v82.88h-88v-113.2H149.141a45.88934,45.88934,0,0,0-8.76025.83v112.37h-37.5698v20h37.56983v46.26056L102.81143,217.293v23.1l37.56934-21.68973v137.6394H102.81094v20h37.56983v199H102.81094v20h37.56983V695.1426a45.90089,45.90089,0,0,0,8.76025.83h11.23975v-100.63h88v100.63h20v-100.63h105v100.63h3.93994a46.18452,46.18452,0,0,0,16.06006-2.86v-97.7699h30.27v-20h-30.27v-87h30v-20h-30v-92h30.27v-20h-30.27v-122h30.27v-20h-30.27v-65Zm-203.13916,0-.00049.0003-60.12988,34.72-.00049.00024V149.34266Zm-60.13086,57.81056.00049-.00024,87.99951-50.80976V356.34264h-88Zm0,368.18945v-199h88v199Zm213,0h-105v-87h105Zm0-107h-105v-92h105Zm0-112h-105v-122h105Zm0-142h-105v-65h105Z" transform="translate(0 0.00002)" fill="#e5e5e5"/><path d="M440.38086,214.71261c0,63.51272-115,205-115,205s-115-141.48728-115-205a115,115,0,0,1,230,0Z" transform="translate(0 0.00002)" fill="#9162dd"/><path d="M393.3822,209.71261a68,68,0,1,1-68-68h0a67.96875,67.96875,0,0,1,68,67.93756Z" transform="translate(0 0.00002)" fill="#fff"/><circle cx="325.14557" cy="211.22241" r="25.33334" fill="#9162dd"/><path d="M361.912,269.08257a68.07245,68.07245,0,0,1-73.06983-.01,37.999,37.999,0,0,1,73.06983.01Z" transform="translate(0 0.00002)" fill="#9162dd"/><circle cx="325.38089" cy="471.71259" r="31" fill="#9162dd"/><path d="M805,712.71261H1a1,1,0,0,1,0-2H805a1,1,0,0,1,0,2Z" transform="translate(0 0.00002)" fill="#cbcbcb"/></svg>';
                        echo " <h4 class='pt-5' style='text-align: center;'>Registra una dirección para continuar con la compra</h4>";
                        echo '</div>';
                    }
                    
                    ?>
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

<!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Tarjeta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="FormTarjeta" action="<?php echo base_url('/registrartarjeta'); ?>" method="post" class="form">
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
                        <div class="credit-card-info--form pb-3">
                            <div class="input_container">
                            <label for="password_field" class="input_label">Nombre completo</label>
                            <input id="password_field" class="input_field" type="text" name="input-name" title="Inpit title" placeholder="Ingresa tu nombre completo" value="<?php echo isset($_COOKIE['pago_nombre']) ? $_COOKIE['pago_nombre'] : ''; ?>" required>
                            </div>
                            <div class="input_container">
                            <label for="password_field" class="input_label">Número de tarjeta</label>
                            <input  class="input_field" type="text" name="numTarjeta" placeholder="0000 0000 0000 0000" size="18" id="cr_no" minlength="19" maxlength="19" value="<?php echo isset($_COOKIE['pago_tarjeta']) ? $_COOKIE['pago_tarjeta'] : ''; ?>" required>
                                <?php if(isset($validation)){?>
                                <div id="tarjetaHelp" class="text-danger"><?= $validation->getError('Tarjeta')?></div>
                                <?php } else{ ?>
                                <div id="tarjetaHelp" class="text-danger"></div>
                                <?php };?>
                            </div>
                            <div class="input_container">
                            <label for="password_field" class="input_label">Fecha de expiración / CVV</label>
                            <div class="split">
                            <input class="input_field" type="text" name="exp" placeholder="MM/YY" size="6" id="exp" minlength="5" maxlength="5" value="<?php echo isset($_COOKIE['pago_fecha']) ? $_COOKIE['pago_fecha'] : ''; ?>" required>
                            <input type="password" name="cvv" class="input_field" size="1" minlength="3" maxlength="3" placeholder="000" value="<?php echo isset($_COOKIE['pago_cvv']) ? $_COOKIE['pago_cvv'] : ''; ?>" required>
                        </div>
                    </div>
                                
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar Tarjeta</button>
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

    const telefonoInput = document.getElementById('telefono');
    telefonoInput.addEventListener('input', (e) => {
    if (telefonoInput.value.length > 10) {
        telefonoInput.value = telefonoInput.value.slice(0, 10);
    }
    });

    const CPInput = document.getElementById('CP');
    CPInput.addEventListener('input', (e) => {
    if (CPInput.value.length > 5) {
        CPInput.value = CPInput.value.slice(0, 5);
    }
    });

    $(document).ready(function() {
    var tarjetas = $(".tarjeta");
    var index = 0;
    
    // Oculta todas las tarjetas excepto la primera
    tarjetas.hide().eq(index).show();
    
    // Maneja el evento de hacer clic en el botón "anterior"
    $("#anterior-btn").click(function() {
        event.preventDefault(); // detiene el comportamiento predeterminado del botón
        tarjetas.eq(index).hide();
        index = (index - 1 + tarjetas.length) % tarjetas.length;
        tarjetas.eq(index).show();
    });
    
    // Maneja el evento de hacer clic en el botón "siguiente"
    $("#siguiente-btn").click(function(event) {
        event.preventDefault(); // detiene el comportamiento predeterminado del botón
        tarjetas.eq(index).hide();
        index = (index + 1) % tarjetas.length;
        tarjetas.eq(index).show();
    });
    });

    $(document).ready(function() {
        var cards = document.querySelectorAll('.debit-card');
        var selectedCardIndex = -1;

        for (let i = 0; i < cards.length; i++) {
            const card = cards[i];
            card.addEventListener('click', function() {
                if (selectedCardIndex != i) {
                    if (selectedCardIndex > -1) {
                        cards[selectedCardIndex].classList.remove('selected');
                    }
                    selectedCardIndex = i;
                    card.classList.add('selected');
                    const selectedCardId = card.querySelector('.input input').getAttribute('id');
                    document.querySelector('#card-id').value = selectedCardId;
                }
            });
        }
    });



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

    var tarjeta = $("#cr_no");
    var tarjetaHelp = $("#tarjetaHelp");
    var formValid = false;
    // Verificar la contraseña en tiempo real
    tarjeta.on("input", function() {
    var value = tarjeta.val();
    
    var numero_tarjeta_sin_espacios = value.replace(/ /g,'');
    console.log(numero_tarjeta_sin_espacios);
    let cardType = '';
    let TarjetaValida = false;
        // Evalúa si la tarjeta es Visa
        if (/^4[0-9]{12}(?:[0-9]{3})?$/.test(numero_tarjeta_sin_espacios)) {
            cardType = 'Visa';
            TarjetaValida = true;
            console.log(TarjetaValida)
        }
        // Evalúa si la tarjeta es Mastercard
        else if (/^(5[1-5][0-9]{14}|2(22[1-9]|2[3-9][0-9]|2[1-2][0-9]{2}|27[01][0-9]|2720)[0-9]{12})$/.test(numero_tarjeta_sin_espacios)) {
            cardType = 'Mastercard';
            TarjetaValida = true;
            console.log(TarjetaValida)
        }
        // Evalúa si la tarjeta es American Express
        else if (/^3[47][0-9]{13}$/.test(numero_tarjeta_sin_espacios)) {
            cardType = 'American Express';
            TarjetaValida = true;
            console.log(TarjetaValida)
        }else{
             TarjetaValida = false;
             console.log(TarjetaValida)
        }


    
    if (TarjetaValida === true) {
        tarjetaHelp.html("");
        formValid = true;
    } else {
        var helpText = "Ingresa una tarjeta Visa, Mastercard o American Express válida.";
        tarjetaHelp.html(helpText);
        formValid = false;
    }

    
    });

    $('#FormTarjeta').on('submit', function(event) {
        // aquí irá la validación de tus campos
        
        if (!formValid) {
            event.preventDefault(); // previene que se envíe el formulario
        }
    });


    // Selecciona el formulario y escucha el evento de envío
    document.querySelector('#miFormulario').addEventListener('submit', function(event) {
        // Previene el envío del formulario
        event.preventDefault();
        
        // Verifica si se ha agregado una dirección
        if (direccionAgregada) {
            // Muestra la alerta de Sweet Alert 2
            Swal.fire({
                title: 'Pago realizado',
                html: '¡Gracias por comprar con nosotros!<br><br>Se ha enviado el ticket de compra al correo registrado',
                icon: 'success'
            });
            
            // Envía el formulario manualmente
            this.submit();
        } else {
            // Muestra un mensaje de error si no se ha agregado una dirección
            Swal.fire({
                title: 'Error',
                text: 'Debes agregar una dirección antes de realizar el pago',
                icon: 'error'
            });
        }
    });

    

    $(document).ready(function () {
        $('.direccion-radio').change(function () {//Clicking input radio
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
        $(".direccion-radio").prop("checked", false);
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
