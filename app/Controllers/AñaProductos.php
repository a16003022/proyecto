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
            'descripcion'=>"A continuación se muestran todos los productos disponibles en la base de datos. Aquellos
            que ya se encuentran relacionados con el paquete seleccionado aparecerán marcados. Ustede puede tanto
            seleccionar más productos para dicho paquete o desmarcar productos para eliminarnos del paquete."
        ];
    $mPaquete=new Paquetes();
    $data3["paquete"] = $mPaquete->traer_paquete($idPaquete);
    $mProductos=new Productos();
    $data3["productos"]=$mProductos->traer_productos();
    $mRelaciones=new PackProductos();
    $data3["relaciones"]=$mRelaciones->getProductosRelacionados($idPaquete);
        $vistas= view('administrador/header', $data2).  
            view('administrador/navbar').
            view('administrador/añadir_productos', $data3).
            view('administrador/footer').
            view("inicio");
        return $vistas;
    }

    public function relacionarProd($idPaquete) {
        try{
            $packProductosModel = new PackProductos();
            $productosSeleccionados = $this->request->getPost('productos');
        
            // Obtener las relaciones existentes
            $relacionesActuales = $packProductosModel->getProductosRelacionados($idPaquete);

            // Eliminar las relaciones que ya no están seleccionadas
            foreach ($relacionesActuales as $relacion) {
                if (!in_array($relacion['idProducto'], $productosSeleccionados)) {
                    $packProductosModel->eliminarRelacion($idPaquete, $relacion['idProducto']);
                }
            }

            // Insertar cada producto seleccionado en la tabla detalle_paquete
            foreach ($productosSeleccionados as $idProducto) {
                $packProductosModel->guardarRelacion($idPaquete, $idProducto);
            }

            if (!empty($productosSeleccionados)) {
                // Insertar cada producto seleccionado en la tabla detalle_paquete
        
                foreach ($productosSeleccionados as $idProducto) {
                    $packProductosModel->guardarRelacion($idPaquete, $idProducto);
                }
                
            }
            return redirect()->to(base_url('registrarPaquete'));
    
        } catch (\Exception $e) {
            // Mostrar mensaje de error personalizado
            $mensajeError = 'Ocurrió un error interno. Por favor, intenta nuevamente.';
            $data = [
                'mensajeError' => $mensajeError
            ];
            return view('error', $data);
        }
    }
}
?>