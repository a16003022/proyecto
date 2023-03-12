<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Iniciar sesión"
        ];
    //la funcion view rsta conformada por 2 parametros: donde se encuentra la vista y el arreglo asociativo
        $vistas= view('genericos/header', $data).  
            view('genericos/navbar').
            view('genericos/login').
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