<?php
namespace App\Controllers;
use App\Models\Registrar;

class RegistrarPaquete extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Registrar"
        ];
    //la funcion view rsta conformada por 2 parametros: donde se encuentra la vista y el arreglo asociativo
        $vistas= view('genericos/header').  
            view('genericos/navbar').
            view('genericos/registrarPaquete', $data).
            view('genericos/footer').
            view("inicio");
        return $vistas;

        //return view('inicio');
    }

    public function guardar_paquete(){
        $data=[
            "nombre"=>$_POST["nombre"],
            "contenido"=>$_POST["contenido"],
            "fechaInicio"=>$_POST["fechaInicio"],
            "fechaTermino"=>$_POST["fechaTermino"],
            "estado"=>$_POST["estado"],
            "precio"=>$_POST["precio"]
        ];
        $mregistrar= new Registrar(); //instanciando mi modelo
        $mregistrar->insert($data);
        //$mregistrar->guardar_paquete($data);
        echo json_encode(["mensaje"=>"creado el registro"]);
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
?>