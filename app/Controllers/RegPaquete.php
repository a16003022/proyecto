<?php
namespace App\Controllers;
use App\Models\Paquetes;
use App\Models\Productos;
use App\Models\Contenido;

class RegPaquete extends BaseController
{
    public function index($id = null)
    {
        $mPaquetes=new Paquetes();
        if (!is_null($id)){
            $data3["paquete"] = $mPaquetes->traer_paquete($id);
        }
        $data2=[
            'titulo'=>"Registrar paquetes",
            'titulo_seccion'=>"Registro para los paquetes",
            'descripcion'=>"Los siguientes datos son requeridos para poder darlos de alta en nuestro catálogo 
            de paquetes. Complete toda la información solicitada para poder registrar exitosamente."
        ];
        $data3["paquetes"]=$mPaquetes->traer_paquetes();
        $data4["name"] = $_SESSION['name'];
        $vistas= view('administrador/header', $data2).  
            view('administrador/navbar',$data4).
            view('administrador/regPaquete', $data3).
            view('administrador/footer').
            view("inicio");
        return $vistas;
    }

        public function guardar_paquete()
        {
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
            </div>
            <div class='card-footer text-center' style='border: none; background-color: transparent; padding:5px; margin:5px;'>  
                <a class='btn btn-primary btn-promos'>Comprar</a>
            </div>
            </div>
            </div>";

            $dataPaquete = [
                "nombre" => $_POST["nombre"],
                "descripcion" => $_POST["descripcion"],
                "fechaInicio" => $_POST["fechaInicio"],
                "fechaTermino" => $_POST["fechaTermino"],
                "estado" => $_POST["estado"],
                "precio" => $_POST["precio"]
            ];

            //Determinar si debo agregar o actualizar
            $accion = $this->request->getPost('accion');
            if ($accion == "agregar") {
                // Guardar paquete
                $mPaquetes = new Paquetes(); 
                $mPaquetes->guardar_paquete($dataPaquete);
                $idPaquete = $mPaquetes->getInsertID();
        
                // Guardar contenido
                $dataContenido = [
                    "idPaquete" => $idPaquete,
                    "codigo" => $contenidoHTML,
                    "clasificacion" => "paquetes"
                ];
                $mContenido = new Contenido(); 
                $mContenido->guardar_contenido($dataContenido);
            return redirect()->back();
            } else {
                // Actualizar paquete
                $idPaquete = $this->request->getPost('idPaquete');
                $mPaquetes = new Paquetes(); 
                $mPaquetes->actualizar_paquete($dataPaquete, $idPaquete);
                
                // Guardar contenido
                $dataContenido = [
                    "codigo" => $contenidoHTML,
                    "clasificacion" => "paquetes"
                ];
                $mContenido = new Contenido(); 
                $mContenido->actualizar_contenido($dataContenido, $idPaquete);
            return redirect()->to(base_url('registrarPaquete'));
            }
        }
    public function eliminar_paquete($id){
        // eliminar el paquete
        $mPaquetes = new Paquetes();
        $mPaquetes->eliminar_paquete($id);

        // eliminar el contenido
        $mContenido = new Contenido();
        $mContenido->eliminar_contenido($id);
    return redirect()->back();
    }
}
?>