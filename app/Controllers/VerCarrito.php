<?php 
namespace App\Controllers;
use App\Models\Carrito;

class VerCarrito extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Carrito de compras",
            'titulo_seccion'=>"Carrito de compras",
            'descripcion'=>"Usted puede editar los productos que ha incluido en su carrito de compras, en cuanto a su cantidad por artículo y si lo desea también puede 
            eliminarlos."
        ];
        $mregistrar= new Carrito();
        $data5["cantidad"]=$mregistrar->contar_contenido();
        $mCarrito=new Carrito();
        $data3["carrito"]=$mCarrito->traer_carrito();
    //la funcion view rsta conformada por 2 parametros: donde se encuentra la vista y el arreglo asociativo
        $vistas= view('usuarios/header', $data).  
            view('usuarios/navbar', $data5).
            view('usuarios/carrito', $data3).
            view('usuarios/footer').
            view("inicio");
        return $vistas;

        //return view('inicio');
    }

    public function eliminarProducto() {
        $idProducto = $this->request->getPost('idProducto');
        $mCarrito=new Carrito();
        $mCarrito->eliminar_del_carrito($idProducto);
        return redirect()->back();
    }

    public function procesarCompra(){
        $total = $this->request->getPost('total'); //recuperar el valor total real del carrito
        echo "El total de la compra fue: $".$total;
    }

}

?>