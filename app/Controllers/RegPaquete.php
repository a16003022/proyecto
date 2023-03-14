<?php
namespace App\Controllers;
use App\Models\Paquetes;
use App\Models\Productos;
use App\Models\Contenido;

class RegPaquete extends BaseController
{
    public function index()
    {
        $data2=[
            'titulo'=>"Registrar paquetes",
            'titulo_seccion'=>"Registro para los paquetes",
            'descripcion'=>"Los siguientes datos son requeridos para poder darlos de alta en nuestro catálogo 
            de paquetes. Complete toda la información solicitada para poder registrar exitosamente."
        ];
    $mPaquetes=new Paquetes();
    $data3["paquete"]=$mPaquetes->traer_paquetes();
        $vistas= view('administrador/header', $data2).  
            view('administrador/navbar').
            view('administrador/regPaquete').
            view('administrador/listar_paquetes', $data3).
            view('administrador/footer').
            view("inicio");
        return $vistas;
    }

        public function guardar_paquete()
        {
            $dataPaquete = [
                "nombre" => $_POST["nombre"],
                "descripcion" => $_POST["descripcion"],
                "fechaInicio" => $_POST["fechaInicio"],
                "fechaTermino" => $_POST["fechaTermino"],
                "estado" => $_POST["estado"],
                "precio" => $_POST["precio"]
            ];
    
            // Guardar paquete
            $mPaquetes = new Paquetes(); 
            $mPaquetes->guardar_paquete($dataPaquete);
            $idPaquete = $mPaquetes->getInsertID();
    
            // Generar código HTML para el contenido
            $contenidoHTML = "<div class='col-lg-4 col-md-4 col-sm-12' style='backgrund-color:grey; padding: 2%;'>
                                 <div class='card h-100 p-4'>
                                   <div class='card-body text-center' style='padding:0px; margin:0px;'>
                                     <h4 class='card-title mb-0 p-2'>".$_POST['nombre']."</h4>
                                     <p><strong>Fecha Inicio: </strong>".$_POST['fechaInicio']."</p>
                                     <p><strong>Fecha Termino: </strong>".$_POST['fechaTermino']."</p>
                                     <p class='regalo-promo'>".$_POST['descripcion']."</p>
                                     <h2>$".$_POST['precio']."</h2>
                                     <br>
                                     <br>
                                   </div>
                                   <div class='card-footer text-center' style='border: none; background-color: transparent; padding:5px; margin:5px;'>  
                                     <a class='btn btn-primary btn-promos'>Comprar</a>
                                   </div>
                                 </div>
                               </div>";
    
            $dataContenido = [
                "idPaquete" => $idPaquete,
                "codigo" => $contenidoHTML
            ];
    
            // Guardar contenido
            $mContenido = new Contenido(); 
            $mContenido->guardar_contenido($dataContenido);
    
            return redirect()->back();
        }
}
?>