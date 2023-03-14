<?php
 
namespace App\Controllers;
use App\Models\Contenido;
use App\Controllers\BaseController;
 
class Usuarios extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Página de Inicio"
        ];
        $mPaquetes=new Contenido();
        $data2["paquete"]=$mPaquetes->traer_paquetes();
        $vistas= view('usuarios/header', $data).  
            view('usuarios/navbar').
            view('usuarios/jumbotron.php').
            view('usuarios/container', $data2).
            view('usuarios/image').
            view('usuarios/footer').
            view("inicio");
        return $vistas;
    
    }
}