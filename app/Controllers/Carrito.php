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
        $session = session();
        $data4["name"] = $session->get('name');
    //la funcion view rsta conformada por 2 parametros: donde se encuentra la vista y el arreglo asociativo
        $vistas= view('usuarios/header', $data).  
            view('usuarios/navbar', $data4).
            view('usuarios/carrito').
            view('usuarios/footer').
            view("inicio");
        return $vistas;

        //return view('inicio');
    }
}

?>