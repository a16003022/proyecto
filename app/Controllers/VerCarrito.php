<?php 
namespace App\Controllers;
use App\Models\Carrito;
use App\Models\Inventarios;
use App\Models\Listas;
use App\Models\Cupones;
use App\Models\ConfigPedido;
class VerCarrito extends BaseController
{
    public function index()
    {
        $data=[
            "titulo"=>"Carrito de compras",
            'titulo_seccion'=>"Carrito de compras",
            'descripcion'=>"Usted puede editar los productos que ha incluido en su carrito de compras, en cuanto a su cantidad por artículo y si lo desea también puede 
            eliminarlos."
        ];
        $mregistrar= new Carrito();
        $data5["cantidad"]=$mregistrar->contar_contenido();
        $mCarrito=new Carrito();
        $data3["carrito"]=$mCarrito->traer_carrito();
        $mLista=new Listas();
        $session = session();
        $user_id = $session->get('id');
        $data5["cantidadLista"]=$mLista->contar_contenido_Lista($user_id);  
    //la funcion view rsta conformada por 2 parametros: donde se encuentra la vista y el arreglo asociativo
        $vistas= view('usuarios/header', $data).  
            view('usuarios/navbar', $data5).
            view('usuarios/carrito', $data3).
            view('usuarios/footer').
            view("inicio");
        return $vistas;

        //return view('inicio');
    }

    public function eliminarProducto() {
        $idProducto = $this->request->getPost('idProducto');
        $mCarrito=new Carrito();
        $mCarrito->eliminar_del_carrito($idProducto);

        //devuelve el stock correspondiente a ese producto
        $cantidad = $this->request->getPost('cantidad');
        $mInventario=new Inventarios();
        $mInventario->agregar_inventario($cantidad, $idProducto);

        return redirect()->back();
    }

    public function procesarCarrito(){
        //actualiza el contenido de inventarios
        $carrito = $this->request->getPost('carrito');
        $mCarrito= new Carrito();
        $data = $mCarrito->traer_carrito();
        $mInventario = new Inventarios();
        foreach ($data as $productoData) {
            foreach ($carrito as $productoCarrito) {
                if ($productoData['idProducto'] == $productoCarrito['idProducto']) {
                    if ($productoData['cantidad'] != $productoCarrito['cantidad']) {
                        // La cantidad ha cambiado, realizar actualización en inventarios
                        $cantidadAnterior = $productoData['cantidad'];
                        $cantidadNueva = $productoCarrito['cantidad'];
                        $cantidad = $cantidadAnterior - $cantidadNueva;
                        $idProducto = $productoData['idProducto'];
                        if ($cantidad < 0){
                            $cantidad = $cantidad*-1;
                            $mInventario->restar_inventario($cantidad, $idProducto);
                        } else {
                            $mInventario->agregar_inventario($cantidad, $idProducto);
                        }
                        break;
                    }
                }
            }
        }

        // foreach($carrito as $car){
        //     echo $car['total'];
        //     echo $car['envio'];
        // }

        $costoEnvio = $this->request->getPost('costoEnvio');
        $totalPagar = $this->request->getPost('totalPagar');
        $totalPagar = number_format($totalPagar, 2);
        
        $mConfig= new ConfigPedido();
        $config_data=[
            'TotalPagar' => $totalPagar,
            'Envio' => $costoEnvio
        ];
        $mConfig->insert($config_data);

        

        //actualiza el contenido del carrito
        $mCarrito= new Carrito();
        foreach ($carrito as $item) {
            $idProducto = $item['idProducto'];
            $cantidad = $item['cantidad'];
            $mInventario = new Inventarios();
            $data2=$mInventario->traer_inventario($idProducto);
            $idInventario=$data2[0]['idProducto'];
            $nuevoStock=$data2[0]['cantidad'];
            if ($idProducto == $idInventario){
                // Actualizar registro en la tabla "carrito"
                $mCarrito->actualizar_carrito($idProducto, $nuevoStock, $cantidad);
            }
        }
    }

    public function AplicarCupon(){
        
        $cuponIngresado = $this->request->getPost('cupon');
        $cupon = new Cupones();
        $CuponBD = $cupon->obtenerCupon($cuponIngresado);
        if($CuponBD){
            foreach($CuponBD as $Cup){
                if($Cup['usado'] ==0){
                    //No se ha usado
                    $descuento = $Cup['descuento'];
                    $cupon->actualizarCupon($cuponIngresado, 1); //Actualizar estado a "usado"
                    $session = session();
                    $session->set('descuento', $descuento);
                    return redirect()->back();
                }else{
                    //Ya se usó
                    $session = session();
                    $session->setFlashdata('error', 'El cupon no es valido o ya se ha utilizado.');

                    return redirect()->back();
                }
            }
        }else{
            //No existe
            $session = session();
            $session->setFlashdata('error', 'El cupon no es valido o ya se ha utilizado.');

            return redirect()->back();
        }

        return redirect()->back();
    }
}

?>