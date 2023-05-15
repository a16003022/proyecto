<?php 
namespace App\Controllers;
use App\Models\Cupones;
use App\Models\UserModel;

class Clientes extends BaseController
{
    public function index()
    {
        $data2=[
            'titulo'=>"Gestionar Clientes",
        ];
    $mCupones=new Cupones();
    $data3["Cupon"]=$mCupones->obtenerCupones();
    $mClientes=new UserModel;
    $data3["clientes"]=$mClientes->traer_clientes();
    $data4["name"] = $_SESSION['name'];
        $vistas= view('administrador/header', $data2).  
            view('administrador/navbar',$data4).
            view('administrador/clientes', $data3).
            view('administrador/footer').
            view("inicio");
        return $vistas;
    }

  


}

?>