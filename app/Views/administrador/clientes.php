<style>
.wrap{
	max-width: 90%;
	margin: 15px auto;
}

ul.tabs{
	width: 100%;
	background: #fff;
	list-style: none;
	display: flex;
    justify-content: center;
}

ul.tabs li{
	width: 18%;
}

ul.tabs li a{
	color: #000;
	text-decoration: none;
	font-size: 16px;
	text-align: center;

	display: block;
	padding: 20px 0px;
}

.active{
	background: #B79BDB; /* Aquí se cambia el color de la pestaña seleccionada */
}

ul.tabs li a .tab-text{
	margin-left: 8px;
    color: #000;
}

.secciones{
	width: 100%;
	background: #fff;
}

.secciones article{
	padding: 20px;
}

.secciones article p{
	text-align: justify;
}


@media screen and (max-width: 700px){
	ul.tabs li{
		width: none;
		flex-basis: 0;
		flex-grow: 1;
	}
}

@media screen and (max-width: 450px){
	ul.tabs li a{
		padding: 15px 0px;
	}

	ul.tabs li a .tab-text{
		display: none;
	}

	.secciones article{
		padding: 15px;
	}
}
</style>

<div class="container-fluid" style="padding-top: 100px;">
    <div class="row" style="min-height: 100vh;">
        <div class="col-lg-10 mx-auto">

            <div class="wrap">
                <ul class="tabs">
                    <li><a href="#tab1"><span class="bi bi bi-people-fill"></span><span class="tab-text">Clientes</span></a></li>
                    <li><a href="#tab2"><span class="bi bi-wallet-fill"></span><span class="tab-text">Ventas</span></a></li>
                    <li><a href="#tab3"><span class="bi bi-card-checklist"></span><span class="tab-text">Cupones</span></a></li>
                </ul>

                <div class="secciones">
                    <!-- sección clientes --> 
                    <article id="tab1">
                        <h2 style="font-family: adineue PRO, sans-serif; text-align:center">Visualizar clientes</h2>
                        <p style="text-align:center">La siguiente tabla muestra todos los clientes registrados.</p>
                            <div class="table table-responsive">
                                <table id="tabla-ejemplo2" class="display table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre/Apellido</th>
                                            <th>Correo registrado</th>
                                            <th>Dirección</th>
                                            <th>C.P.</th>
                                            <th>Estado</th>
                                            <th>Ciudad</th>
                                            <th>Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach($clientes as $dat){
                                        echo "<tr>";
                                            echo "<td>".$dat['name']." ".$dat['apellido']."</td>";
                                            echo "<td>".$dat['email']."</td>";
                                            echo "<td>".$dat['direccion']."</td>";
                                            echo "<td>".$dat['CP']."</td>";
                                            echo "<td>".$dat['estado']."</td>";
                                            echo "<td>".$dat['ciudad']."</td>";
                                            echo "<td>".$dat['telefono']."</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>    
                    </article>

                    <!-- sección pedidos --> 
                    <article id="tab2">
                        <h2 style="font-family: adineue PRO, sans-serif; text-align:center">Visualizar ventas</h2>
                        <p style="text-align:center">La siguiente tabla muestra todas las ventas realizadas.</p>
                            <div class="table table-responsive">
                                <table id="tabla-ejemplo3" class="display table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No. Venta</th>
                                            <th>Cliente</th>
                                            <th>Fecha y Hora</th>
                                            <th>Direccion</th>
                                            <th>No. Productos</th>
                                            <th>Total</th>
                                            <th>Tarjeta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach($ventas as $dat){
                                        echo "<tr>";
                                            echo "<td>".$dat['idVenta']."</td>";
                                            echo "<td>".$dat['name']." ".$dat['apellido']."</td>";
                                            echo "<td>".$dat['fecha']."</td>";
                                            echo "<td>".$dat['direccion']."</td>";
                                            echo "<td>".$dat['totalProductos']."</td>";
                                            echo "<td>$".$dat['totalPagar']."</td>";
                                            echo "<td>".$dat['numTarjeta']."</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>  

                    </article>

                    <!-- sección cupones --> 
                    <article id="tab3">
                        <h2 style="font-family: adineue PRO, sans-serif; text-align:center">Visualizar cupones</h2>
                        <p style="text-align:center">La siguiente tabla muestra todos los cupones disponibles.</p>
                        <div class="table table-responsive">
                            <table id="tabla-ejemplo" class="display table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID usuario</th>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Descuento</th>
                                        <th>Usado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 0;
                                $valor="";
                                foreach($Cupon as $dat){
                                $contador++;
                                if($dat['usado']==1){
                                    $valor="Sí";
                                }else{
                                    $valor="No";
                                }
                                    echo "<tr data-id='" . $dat['id'] . "'>";
                                        echo "<td>".$contador."</td>";
                                        echo "<td>".$dat['user_id']."</td>";
                                        echo "<td>".$dat['name']."</td>";
                                        echo "<td>".$dat['codigo']."</td>";
                                        echo "<td>".$dat['descuento']."</td>";
                                        echo "<td>".$valor."</td>";
                                        // echo "<td><input class='cantidad' type='number' value='".$dat["cantidad"]."' min='1' max='999'></td>";
                                    echo "</tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                    </article>

                </div>
                <!-- terminan las secciones --> 
            </div>
            <!-- termina contenedor secciones --> 

        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#tabla-ejemplo').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
         }
    });
    $('#tabla-ejemplo2').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
         }
    });
    $('#tabla-ejemplo3').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
         }
    });
});

$('ul.tabs li a:first').addClass('active');
	$('.secciones article').hide();
	$('.secciones article:first').show();

	$('ul.tabs li a').click(function(){
		$('ul.tabs li a').removeClass('active');
		$(this).addClass('active');
		$('.secciones article').hide();

		var activeTab = $(this).attr('href');
		$(activeTab).show();
		return false;
	});
</script>