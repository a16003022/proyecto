<style>

    .border-detalles{
        border-radius: 8px;
        box-shadow: none;
        border: 1px #D5D9D9 solid;
    }

    .product-thumb{
        display: table-cell;
        vertical-align: top;
        width: 130px;
        padding-right: 20px;
        display: table-cell !important;
    }

    .product-thumb>img{
        display: block;
        width: 100%;
    }

    .titulo{
        color: #9162dd;
        margin: 0;  
    }

    .precio{
        color: #b12704;
        font-size: 0.9em;
        margin: 0;
    }

    .cantidad{
        font-size: 0.9em;
        margin: 0;
    }

    .total{
        font-size: 0.9em;
        margin: 0;
    }

    .ticket{
        background-color: #9162dd !important;
        border: none;
    }

</style>

<div class="section" style="padding-top: 15vh; padding-bottom: 15vh;">
<div class="container" >
    <div class="row justify-content-md-center mt-5">
        <div class="col-12">
            <h1>Ticket del pedido</h1>
            <div class="container mb-2 p-0">
                <div class="row ">
                    <div class="col-lg-10 col-sm-12">
                        <?php 
                            foreach ($Ticket as $Tick){
                                $fecha = $Tick['fecha'];
                                $fecha_formateada = date('j \d\e F \d\e Y', strtotime($fecha));
                                echo "<span>Pedido el ".$fecha_formateada."</span>";
                                echo '&nbsp;  | &nbsp; ';
                                echo '<span>Pedido n.º '.$_SESSION['id_venta'].'</span>';
                            }?>
                            
                    </div>
                    <div class="col-lg-2 col-sm-12 d-flex">
                        <a href="<?php echo base_url('ticket/'.$_SESSION['id_venta']); ?>" class="btn btn-sm btn-primary ms-auto ticket shadow-none" target="_blank">Imprimir ticket</a>
                    </div>
                </div>
            </div>
            <div class="container border-detalles p-4 ">
                <div class="row ">
                    <div class="col-lg-4">
                        <h5>Dirección de envío</h5>
                        <div class="direccion">
                            <ul class="list-unstyled">
                            <?php 
                            foreach ($Ticket as $Tick){
                                 echo "<li>".$Tick['name']."</li>";
                                 echo "<li>".$Tick['direccion']."</li>";
                                 echo "<li>".$Tick['ciudad'].", ".$Tick['estado'].", ".$Tick['CP']."</li>";
                            }?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <h5>Método de pago</h5>
                    <div class="metodo-pago">
                        <ul class="list-unstyled">
                            <?php
                                foreach ($Tarjeta as $Tick){
                                    $numTarjeta = $Tick['numTarjeta'];
                                    $ultimosCuatro = substr($numTarjeta, -4);
                                    $asteriscos = str_repeat('*', 12);
                                    $numTarjetaOculto = $asteriscos . ' ' . $ultimosCuatro;
                                    echo "<li><i class='fa-solid fa-credit-card' style='color: #9162dd;'></i> ".$numTarjetaOculto."</li>";
                                }
                            ?>
                        </ul>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <h5>Resumen del pedido</h5>
                        <div class="resumen-pedido">
                        <table >
                        <tr>
                            <th style="">Productos</th>
                            <th style="padding: 10px; text-align:center;">Envío</th>
                            <th style="padding: 10px; text-align:center;">Total</th>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">
                            <?php foreach ($Ticket as $Tick) {
                                echo "$" . $Tick['totalPagar'] . "<br>";
                            } ?>
                            </td>
                            <td style="padding: 10px;">$<?= $Envio ?></td>
                            <td style="padding: 10px;">$<?= $TotalPago ?></td>
                        </tr>
                        </table>


                        </div>
                    </div>
                </div>
            </div>

            <div class="container border-detalles p-4 mt-4">
                    <?php
                        foreach($Ventas as $ven){
                            $subtotal = 0;
                            $total = 0;
                            echo "<div class='row pb-4'>";
                            echo "<div class='col-4'>";
                            echo "<img class='product-thumb' src='".base_url()?>/imagenes/<?php echo $ven['img']."' alt='Product'>";
                            echo "</div>";
                            echo "<div class='col-8'>";
                            echo "<p class='titulo'>".$ven['nombre']."</p>";
                            echo "<p class='precio'>$".$ven['precio']."</p>";
                            echo "<p class='cantidad'>Cantidad: ".$ven['cantidad']."</p>";
                            $precio = $ven['precio'];
                            $cant = $ven['cantidad'];
                            $subtotal = $precio * $cant;
                            $total = $subtotal + $total;
                            echo "<p class='total'>Total: $".$total."</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>                       
            </div>
        </div>
    </div>
</div>
</div>
