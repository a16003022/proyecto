<?php 
namespace App\Controllers;
use App\Models\Productos;
use App\Models\Carrito;

class Catalogo extends BaseController
{

    public function guardar_contenido(){
        $data=[
            "idProducto"=>$_POST["idProducto"],
            "nombre"=>$_POST["nombre"],
            "precio"=>$_POST["precio"]
        ];
        $mregistrar= new Carrito();
        $mregistrar->guardar_contenido($data);
        return redirect()->back();
    }

    public function Playeras()
    {
        $data=[
            "titulo"=>"Catálogo de Playeras"
        ];
        $mPaquetes=new Productos();
        $data2["producto"]=$mPaquetes->traer_playeras();
        $session = session();
        $data3["name"] = $session->get('name');
        $mCarrito= new Carrito();
        $data2["carrito"]=$mCarrito->traer_carrito();
        $data5["cantidad"]=$mCarrito->contar_contenido();
        //si la sesión no ha sido iniciada, se muestra la vista genérica
        if (!empty($data3["name"])){
            $vistas= view('usuarios/header', $data).  
                view('usuarios/navbar',$data5).
                view('usuarios/catalogo', $data2).
                view('usuarios/footer').
                view("inicio");
        } else {
            $vistas= view('genericos/header', $data).  
                view('genericos/navbar').
                view('genericos/catalogo', $data2).
                view('genericos/footer').
                view("inicio");
        }
        return $vistas;
    }

    public function Sudaderas()
    {
        $data=[
            "titulo"=>"Catálogo de Sudaderas"
        ];
        $mPaquetes=new Productos();
        $data2["producto"]=$mPaquetes->traer_sudaderas();
        $session = session();
        $data3["name"] = $session->get('name');
        $mCarrito= new Carrito();
        $data2["carrito"]=$mCarrito->traer_carrito();
        $data5["cantidad"]=$mCarrito->contar_contenido();
        //si la sesión no ha sido iniciada, se muestra la vista genérica
        if (!empty($data3["name"])){
            $vistas= view('usuarios/header', $data).  
                view('usuarios/navbar',$data5).
                view('usuarios/catalogo', $data2).
                view('usuarios/footer').
                view("inicio");
        } else {
            $vistas= view('genericos/header', $data).  
                view('genericos/navbar').
                view('genericos/catalogo', $data2).
                view('genericos/footer').
                view("inicio");
        }
        return $vistas;
    }

    public function Bolsas()
    {
        $data=[
            "titulo"=>"Catálogo de Bolsas"
        ];
        $mPaquetes=new Productos();
        $data2["producto"]=$mPaquetes->traer_bolsas();
        $session = session();
        $data3["name"] = $session->get('name');
        $mCarrito= new Carrito();
        $data2["carrito"]=$mCarrito->traer_carrito();
        $data5["cantidad"]=$mCarrito->contar_contenido();
        //si la sesión no ha sido iniciada, se muestra la vista genérica
        if (!empty($data3["name"])){
            $vistas= view('usuarios/header', $data).  
                view('usuarios/navbar',$data5).
                view('usuarios/catalogo', $data2).
                view('usuarios/footer').
                view("inicio");
        } else {
            $vistas= view('genericos/header', $data).  
                view('genericos/navbar').
                view('genericos/catalogo', $data2).
                view('genericos/footer').
                view("inicio");
        }
        return $vistas;
    }
}

?>