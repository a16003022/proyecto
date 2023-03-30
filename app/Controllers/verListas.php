<?php 
namespace App\Controllers;
use App\Models\Carrito;
use App\Models\Listas;
use App\Models\ProdLista;


class verListas extends BaseController
{

    public function __construct(){
        helper(['form']);
    }

    public function index()
    {
        $data=[
            "titulo"=>"Wish list",
        ];
        $mregistrar= new Carrito();
        $data5["cantidad"]=$mregistrar->contar_contenido();
        $data3["carrito"]=$mregistrar->traer_carrito();
        

        $session = session();
        $user_id = $session->get('id');

        $mLista=new Listas();
        $data3["lista"]=$mLista->traer_lista($user_id);

        $vistas= view('usuarios/header', $data).  
            view('usuarios/navbar', $data5).
            view('usuarios/lista', $data3).
            view('usuarios/footer').
            view("inicio");
        return $vistas;
    }

    // public function crearLista(){
    //     $session = session();
    //     $user_id = $session->get('id');
    //     $mLista=new Listas();
    //     $data = [
    //         'user_id'    => $user_id,
    //         'nombre'    => $this->request->getVar('nombre')
    //     ];
    //     $mLista->save($data);
    //     return redirect()->to('/lista');
    // }

    public function AgregarALista(){

        $session = session();
        $user_id = $session->get('id');
        $mLista= new Listas();
        $data=[
            "idUsuario" => $user_id,
            "nombre"=>$_POST["nombre"],
            "idProducto"=>$_POST["idProducto"],
            "precio"=>$_POST["precio"],
            "img"=>$_POST["img"]
        ];
        
        $mLista->save($data);
        return redirect()->back();
    }

    public function EliminarProductoLista(){
        $idProducto = $this->request->getPost('idProducto');
        $session = session();
        $user_id = $session->get('id');
        $mLista= new Listas();
        $mLista->eliminar_Producto_lista($idProducto,$user_id);
        return redirect()->back();
    }

    public function EliminarLista(){
        $mLista= new Listas();
        $session = session();
        $user_id = $session->get('id');
        $mLista->EliminarLista($user_id);
        return redirect()->back();
    }

}

?>