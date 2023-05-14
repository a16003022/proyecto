<?php 
namespace App\Controllers;
use App\Models\Cupones;

class CuponesUsuarios extends BaseController
{
    public function index()
    {
        $data2=[
            'titulo'=>"Gestionar Cupones",
            'titulo_seccion'=>"Gestionar Cupones",
            'descripcion'=>"La siguiente tabla muestra todos los cupones disponibles."
        ];
    $mCupones=new Cupones();
    $data3["Cupon"]=$mCupones->obtenerCupones();
    $data4["name"] = $_SESSION['name'];
        $vistas= view('administrador/header', $data2).  
            view('administrador/navbar',$data4).
            view('administrador/cupones', $data3).
            view('administrador/footer').
            view("inicio");
        return $vistas;
    }

  


}

?>