<?php
namespace App\Controllers;
use App\Models\Productos;
use App\Models\Carrito;
use App\Models\Listas;

class Buscador extends BaseController
{
    public function buscar()
    {
        $data=[
            "titulo"=>"Resultado de búsqueda"
        ];
        
        $session = session();
        $data3["name"] = $session->get('name');

        $mCarrito= new Carrito();
        $data5["cantidad"]=$mCarrito->contar_contenido();
        $data2["carrito"]=$mCarrito->traer_carrito();
                
        $session = session();
        $user_id = $session->get('id');
        
        $productosModel = new Productos();
        $buscar = $this->request->getVar('buscar');
        $data2['producto'] = $productosModel->buscar_productos($buscar);

        //si la sesión no ha sido iniciada, se muestra la vista genérica
        if (!empty($data3["name"])){
            $mLista=new Listas();
            $data2["lista"]=$mLista->traer_lista($user_id);
            $data5["cantidadLista"]=$mLista->contar_contenido_Lista($user_id);
            $vistas= view('usuarios/header', $data).  
                view('usuarios/navbar',$data5).
                view('usuarios/resultado', $data2).
                view('usuarios/footer').
                view("inicio");
        } else {
            $vistas= view('genericos/header', $data).  
                view('genericos/navbar').
                view('genericos/resultado', $data2).
                view('genericos/footer').
                view("inicio");
        }
        return $vistas;
    }
}