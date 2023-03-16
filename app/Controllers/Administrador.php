<?php
 
namespace App\Controllers;
use App\Models\Paquetes;
use App\Models\Productos;
use App\Models\Contenido;
use App\Controllers\BaseController;
 
class Administrador extends BaseController
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
    $data4["name"] = $session['name'];
        $vistas= view('administrador/header', $data2).  
            view('administrador/navbar',$data4).
            view('administrador/regPaquete', $data3).
            view('administrador/añadir_productos').
            view('administrador/footer').
            view("inicio");
        return $vistas;
    }
}