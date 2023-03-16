<?php
namespace App\Controllers;
use App\Models\Productos;

class RegProducto extends BaseController
{
    public function index()
    {
        $data2=[
            'titulo'=>"Registrar productos",
            'titulo_seccion'=>"Registro para los productos",
            'descripcion'=>"Los siguientes datos son requeridos para poder darlos de alta en nuestro catálogo 
            de productos. Complete toda la información solicitada para poder registrar exitosamente."
        ];
    $mProductos=new Productos();
    $data3["producto"]=$mProductos->traer_productos();
    $data4["name"] = $_SESSION['name'];
        $vistas= view('administrador/header', $data2).  
            view('administrador/navbar',$data4).
            view('administrador/regProducto',  $data3).
            view('administrador/footer').
            view("inicio");
        return $vistas;
    }

    public function guardar_producto(){
        $data=[
            "nombre"=>$_POST["nombre"],
            "img"=>$_POST["img"],
            "modelo"=>$_POST["modelo"],
            "marca"=>$_POST["marca"],
            "medida"=>$_POST["medida"],
            "clasificacion"=>$_POST["clasificacion"]
        ];
        $mregistrar= new Productos();
        $mregistrar->guardar_producto($data);
        return redirect()->back();
    }
}
?>