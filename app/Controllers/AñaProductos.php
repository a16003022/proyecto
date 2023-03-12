<?php
namespace App\Controllers;
use App\Models\Paquetes;
use App\Models\Productos;
use App\Models\PackProductos;

class AñaProductos extends BaseController
{
    public function index($idPaquete)
    {
        $data2=[
            'titulo'=>"Añadir a paquetes",
            'titulo_seccion'=>"Añadir productos al paquete",
            'descripcion'=>"A continuación se muestran los productos disponibles en la base de datos. Seleccione
            los que vaya a incluir en los paquetes y presione guardar."
        ];
    $mPaquete=new Paquetes();
    $data3["paquete"] = $mPaquete->traer_paquete($idPaquete);
    $mProductos=new Productos();
    $data3["productos"]=$mProductos->traer_productos();
    $mRelaciones=new PackProductos();
    $data3["relaciones"]=$mRelaciones->getProductosRelacionados($idPaquete);
        $vistas= view('genericos/header', $data2).  
            view('genericos/navbar').
            view('genericos/añadir_productos', $data3).
            view('genericos/footer').
            view("inicio");
        return $vistas;
    }

    public function relacionarProd($idPaquete) {
        $productosSeleccionados = $this->request->getPost('productos');
    
        if (!empty($productosSeleccionados)) {
            // Insertar cada producto seleccionado en la tabla detalle_paquete
            $packProductosModel = new PackProductos();
    
            foreach ($productosSeleccionados as $idProducto) {
                $param = [
                    'cantidad' => 1, // Puedes cambiar esta cantidad si lo necesitas
                    'idPaquete' => $idPaquete,
                    'idProducto' => $idProducto
                ];
                $packProductosModel->guardar_paquete($param);
            }
        }
        return redirect()->to(base_url('registrarPaquete'));
    }
    
}
?>