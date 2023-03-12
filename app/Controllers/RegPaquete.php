<?php
namespace App\Controllers;
use App\Models\Paquetes;
use App\Models\Productos;

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
        $vistas= view('genericos/header', $data2).  
            view('genericos/navbar').
            view('genericos/regPaquete').
            view('genericos/listar_paquetes', $data3).
            view('genericos/footer').
            view("inicio");
        return $vistas;
    }

    public function guardar_paquete(){
        $data=[
            "nombre"=>$_POST["nombre"],
            "descripcion"=>$_POST["descripcion"],
            "fechaInicio"=>$_POST["fechaInicio"],
            "fechaTermino"=>$_POST["fechaTermino"],
            "estado"=>$_POST["estado"],
            "precio"=>$_POST["precio"]
        ];
        $mregistrar= new Paquetes(); 
        $mregistrar->guardar_paquete($data);
        return redirect()->back();
    }

}
?>