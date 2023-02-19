<?php

namespace App\Controllers;

class ContactoController extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Inicio"
        ];
    //la funcion view rsta conformada por 2 parametros: donde se encuentra la vista y el arreglo asociativo
        $vistas= view('contacto/header', $data).  
            view('contacto/menu').
            view('contacto/inicio').
            view('contacto/footer');
        return $vistas;
    }
    public function catalogo($numeroCatalogo){
        $data=['titulo'=>"catalogo"];
        $catalogo=['numero'=>$numeroCatalogo];
        echo view('contacto/header',$data);
        echo view('contacto/menu');
        echo view('contacto/catalogo',$catalogo);
        echo view('contacto/footer');

    }
}
