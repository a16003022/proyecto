<?php
 
namespace App\Controllers;
use App\Models\Contenido;
use App\Controllers\BaseController;
use App\Models\Contador;

class Usuarios extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Página de Inicio"
        ];
        $mPaquetes=new Contenido();
        $data2["paquete"]=$mPaquetes->traer_paquetes();
        $mregistrar= new Contador();
        $data5["cantidad"]=$mregistrar->contar_contenido();
        $vistas= view('usuarios/header', $data).  
            view('usuarios/navbar',$data5).
            view('usuarios/container', $data2).
            view('usuarios/image').
            view('usuarios/footer').
            view("inicio");
        return $vistas;
    
    }
}