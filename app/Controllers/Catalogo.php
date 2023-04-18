<?php 
namespace App\Controllers;
use App\Models\Productos;
use App\Models\Carrito;
use App\Models\Listas;
use App\Models\Inventarios;

class Catalogo extends BaseController
{

    public function guardar_contenido(){
        $data=[
            "idProducto"=>$_POST["idProducto"],
            "nombre"=>$_POST["nombre"],
            "precio"=>$_POST["precio"],
            "stock"=>$_POST["stock"],
            "cantidad"=>$_POST["cantidad"]
        ];
        $mregistrar= new Carrito();
        $mregistrar->guardar_contenido($data);

        //restar el inventario correspondiente a ese producto
        $mregistrar= new Inventarios();
        $idProducto = $this->request->getPost('idProducto');
        $cantidad = $this->request->getPost('cantidad');
        $mregistrar->restar_inventario($cantidad,$idProducto);

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
        
        
        $session = session();
        $user_id = $session->get('id');
        


        //si la sesión no ha sido iniciada, se muestra la vista genérica
        if (!empty($data3["name"])){
            $mLista=new Listas();
            $data2["lista"]=$mLista->traer_lista($user_id);
            $data5["cantidadLista"]=$mLista->contar_contenido_Lista($user_id);
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

        $session = session();
        $user_id = $session->get('id');
        
        //si la sesión no ha sido iniciada, se muestra la vista genérica
        if (!empty($data3["name"])){
            $mLista=new Listas();
            $data2["lista"]=$mLista->traer_lista($user_id);
            $data5["cantidadLista"]=$mLista->contar_contenido_Lista($user_id);
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

        $session = session();
        $user_id = $session->get('id');
        

        //si la sesión no ha sido iniciada, se muestra la vista genérica
        if (!empty($data3["name"])){
            $mLista=new Listas();
            $data2["lista"]=$mLista->traer_lista($user_id);
            $data5["cantidadLista"]=$mLista->contar_contenido_Lista($user_id);
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