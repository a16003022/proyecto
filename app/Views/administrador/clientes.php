<style>
.wrap{
	width: 800px;
	max-width: 90%;
	margin: 30px auto;
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
	padding: 30px;
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
		padding: 20px;
	}
}
</style>

<div class="container-fluid" style="padding-top: 100px;">
    <div class="row" style="min-height: 100vh;">
        <div class="col-lg-8 mx-auto text-center">

            <div class="wrap">
                <ul class="tabs">
                    <li><a href="#tab1"><span class="bi bi bi-people-fill"></span><span class="tab-text">Clientes</span></a></li>
                    <li><a href="#tab2"><span class="bi bi-box2-fill"></span><span class="tab-text">Pedidos</span></a></li>
                    <li><a href="#tab3"><span class="bi bi-card-checklist"></span><span class="tab-text">Cupones</span></a></li>
                </ul>

                <div class="secciones">
                    <!-- sección clientes --> 
                    <article id="tab1">
                        <h1>Inicio</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea numquam odio voluptate. Aliquam incidunt similique, et quasi ducimus quos aut autem non dignissimos dicta sit provident, voluptatibus ut blanditiis perspiciatis cum, vel temporibus minima enim. Asperiores omnis placeat officiis a tenetur sit recusandae, reprehenderit neque. Tempora quibusdam, perferendis id ratione culpa dolorum! Nemo, animi? Eveniet eaque perspiciatis, libero quia, pariatur iusto, ipsum porro quod, ut tempora cum quo non illum. Non eligendi incidunt sequi, molestias quia perspiciatis architecto repudiandae quod.</p>
                    </article>

                    <!-- sección pedidos --> 
                    <article id="tab2">
                        <h1>Nosotros</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel voluptates unde, consequuntur aliquid architecto rem numquam expedita minima dolorem pariatur recusandae, eius quod quia aspernatur id impedit, tenetur! Aspernatur incidunt molestiae dolores animi ea praesentium ipsam tenetur voluptas cupiditate perspiciatis eum nihil, natus exercitationem libero earum fuga dignissimos impedit numquam, quasi, placeat officiis voluptates, ad reprehenderit fugiat? Fugiat aperiam et magni, molestiae, numquam consectetur vitae sapiente cupiditate totam laboriosam voluptate obcaecati, aliquam placeat? Suscipit dolores fuga laudantium sed, qui magni iusto dolore quia. Quis fugit exercitationem porro. Rerum nihil omnis recusandae ratione fuga alias eligendi, earum sunt veritatis praesentium eum perspiciatis. Molestias deserunt, iure neque animi quod! Impedit reprehenderit cumque, numquam velit quae cum eius quidem similique laudantium hic deleniti!</p>
                    </article>

                    <!-- sección cupones --> 
                    <article id="tab3">
                        <h2 style="font-family: adineue PRO, sans-serif;">Gestionar cupones</h2>
                        <p>La siguiente tabla muestra todos los cupones disponibles</p>
                        <div class="table">
                            <table id="tabla-ejemplo" class="display table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID usuario</th>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Descuento</th>
                                        <th>Usado</th>
                                        <th>Acción</th>
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
                                        echo '<td><i class="fa-solid fa-pen-to-square" style="color: #9162dd;" data-id="'. $dat['id'] .'"></i></td>';
                                        // echo "<td><input class='cantidad' type='number' value='".$dat["cantidad"]."' min='1' max='999'></td>";
                                    echo "</tr>";
                                }
                                ?>
                                </tbody>

                            </table>
                    </article>
                    <!-- termina sección cupones --> 
                </div>
            </div>

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