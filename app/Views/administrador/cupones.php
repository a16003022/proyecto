<div class="container-fluid" style="padding-top: 130px;">
    <div class="row" style="min-height: 100vh;">
        <div class="col-lg-8 mx-auto text-center">
            <div id="contenido_de_la_tabla" class="container">
                <h2 style="font-family: adineue PRO, sans-serif;"><?= $titulo_seccion; ?></h2>
                <p><?= $descripcion; ?></p>
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
                        <thead>
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
                    <!-- <button type="button" class="btn btn-success btn-lg btn-block btn-jumbotron mb-4 actualizar-btn" id="btn-pagar" disabled>Actualizar</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabla-ejemplo').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
             }
        });
    });


</script>


       
</script>