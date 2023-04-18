<?php
 
namespace App\Controllers;
use App\Models\Contenido;
use App\Controllers\BaseController;
use App\Models\Carrito;
use App\Models\Listas;

class Usuarios extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Página de Inicio"
        ];
        $mPaquetes=new Contenido();
        $data2["paquete"]=$mPaquetes->traer_paquetes();
        $mregistrar= new Carrito();
        $data5["cantidad"]=$mregistrar->contar_contenido();
        $mLista=new Listas();
        $session = session();
        $user_id = $session->get('id');
        $data5["cantidadLista"]=$mLista->contar_contenido_Lista($user_id);
        $vistas= view('usuarios/header', $data).  
            view('usuarios/navbar',$data5).
            view('usuarios/container', $data2).
            view('usuarios/image').
            view('usuarios/footer').
            view("inicio");
        return $vistas;
    
    }
}