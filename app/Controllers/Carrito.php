<?php 
namespace App\Controllers;
use App\Models\Contenido;


class Carrito extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Carrito de compras"
        ];
        $mPaquetes=new Contenido();
        $data2["paquete"]=$mPaquetes->traer_paquetes();
    //la funcion view rsta conformada por 2 parametros: donde se encuentra la vista y el arreglo asociativo
        $vistas= view('genericos/header', $data).  
            view('genericos/navbar').
            view('usuarios/carrito').
            view('genericos/footer').
            view("inicio");
        return $vistas;

        //return view('inicio');
    }
}

?>