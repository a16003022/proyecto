<?php 
namespace App\Controllers;
use App\Models\Inventarios;

class Inventariado extends BaseController
{
    public function index()
    {
        $data2=[
            'titulo'=>"Revisar Inventario",
            'titulo_seccion'=>"Inventariado de productos",
            'descripcion'=>"La siguiente tabla muestra todo el inventario disponible, para editar modifique la cantidad deseada y presiona Actualizar."
        ];
    $mInventario=new Inventarios();
    $data3["producto"]=$mInventario->producto_inventario();
    $data4["name"] = $_SESSION['name'];
        $vistas= view('administrador/header', $data2).  
            view('administrador/navbar',$data4).
            view('administrador/inventario', $data3).
            view('administrador/footer').
            view("inicio");
        return $vistas;
    }

    public function actualizarInventario(){
        $mInventario = new Inventarios();
        $datos = $this->request->getPost('datos');
        foreach($datos as $dat){
            $idProducto = $dat['idProducto'];
            $cantidad = $dat['cantidad'];
            $mInventario->actualizar_inventario($cantidad, $idProducto);
        }
    }
}

?>