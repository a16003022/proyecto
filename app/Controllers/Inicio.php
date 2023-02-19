<?php

namespace App\Controllers;

class Inicio extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Inicio"
        ];
    //la funcion view rsta conformada por 2 parametros: donde se encuentra la vista y el arreglo asociativo
        $vistas= view('genericos/header', $data).  
            view('genericos/navbar').
            view('genericos/jumbotron.php').
            view('genericos/container').
            view('genericos/image').
            view('genericos/footer').
            view("inicio");
        return $vistas;

        //return view('inicio');
    }
   /* public function catalogo($numeroCatalogo){
        $data=['titulo'=>"catalogo"];
        $catalogo=['numero'=>$numeroCatalogo];
        echo view('contacto/header',$data);
        echo view('contacto/menu');
        echo view('contacto/catalogo',$catalogo);
        echo view('contacto/footer');
    }*/
}