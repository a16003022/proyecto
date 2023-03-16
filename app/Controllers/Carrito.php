<?php 
namespace App\Controllers;
use App\Models\Contenido;


class Carrito extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Carrito de compras",
            'titulo_seccion'=>"Carrito de compras",
            'descripcion'=>"Usted puede editar los productos que ha incluido en su carrito de compras, en cuanto a su cantidad por artículo y si lo desea también puede 
            eliminarlos. Adicionalmente si cuenta con un código de descuento para aplicarlo al total de su compra."
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