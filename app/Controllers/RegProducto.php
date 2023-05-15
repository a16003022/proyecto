<?php
namespace App\Controllers;
use App\Models\Productos;
use App\Models\Inventarios;

class RegProducto extends BaseController
{
    public function index($id = null)
    {
        $mProductos=new Productos();
        if (!is_null($id)){
            $data3["producto"] = $mProductos->traer_producto($id);
        }
        $data2=[
            'titulo'=>"Registrar productos",
            'titulo_seccion'=>"Registro para los productos",
            'descripcion'=>"Los siguientes datos son requeridos para poder darlos de alta en nuestro catálogo 
            de productos."
        ];
    $data3["productos"]=$mProductos->traer_productos();
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
            "precio"=>$_POST["precio"],
            "clasificacion"=>$_POST["clasificacion"]
        ];
        $mregistrar= new Productos();
        $mregistrar->guardar_producto($data);

        //guardo el inventario correspondiente a ese producto
        $idProducto = $mregistrar->insertID();
        $data2=[
            "idProducto"=>$idProducto,
            "nombre"=>$_POST["nombre"],
            "cantidad"=>$_POST["stock"]
        ];
        $mregistrar= new Inventarios();
        $mregistrar->insertar_inventario($data2);

        return redirect()->back();
    }

    public function buscar()
    {
    $mProducto= new Productos();
    $searchTerm = $this->request->getGet('q');
    $productos = $mProducto->buscar($searchTerm);
    return json_encode($productos);
    }
}
?>