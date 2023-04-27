<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\Contenido;
use App\Models\Paquetes;
use App\Models\Productos;
use App\Models\Carrito;
use App\Models\Inventarios;

class Login extends BaseController
{
    public function index()
    {

        $data2 = [];

        $data=[
            "titulo"=>"Iniciar sesión"
        ];

        // Verificar si la cookie existe
        if (isset($_COOKIE['login_email']) && isset($_COOKIE['login_password'])) {
            // Establecer los valores de los campos del formulario con los valores almacenados en las cookies
            $data2['email'] = $_COOKIE['login_email'];
            $data2['password'] = $_COOKIE['login_password'];
        }

    //la funcion view rsta conformada por 2 parametros: donde se encuentra la vista y el arreglo asociativo
        $vistas= view('genericos/header', $data).  
            view('genericos/navbar').
            view('genericos/login',$data2).
            view('genericos/footer').
            view("inicio");
        return $vistas;

        
    }
   
    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();
 
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $userModel->where('email', $email)->first();

        if ($this->request->getVar('remember')) {
            setcookie('login_email', $this->request->getVar('email'), time()+60*60*24*30, '/');
            setcookie('login_password', $this->request->getVar('password'), time()+60*60*24*30, '/');
        }else {
            // Si la opción de recordar no fue seleccionada, borrar las cookies existentes
            setcookie('login_email', '', time() - 3600, "/");
            setcookie('login_password', '', time() - 3600, "/");
        }
 
        if(is_null($user)) {
            return redirect()->back()->withInput()->with('error', 'Correo o contraseña incorrecta.');
        }
 
        $pwd_verify = password_verify($password, $user['password']);
 
        if(!$pwd_verify) {
            return redirect()->back()->withInput()->with('error', 'Correo o contraseña incorrecta.');
        }
 
        $ses_data = [
            'id' => $user['user_id'],
            'email' => $user['email'],
            'rol' => $user['rol'],
            'name' => $user['name'],
            'isLoggedIn' => TRUE
        ];
 
        $session->set($ses_data);
        // return redirect()->to('/dashboard');

        $rol = $session->get('rol');

        if ($rol != 'administrador') {
            return redirect()->to(base_url('/usuarios'));
        }
        

        

        return redirect()->to(base_url('/revisarInventario'));
    //     $data2=[
    //         'titulo'=>"Registrar paquetes",
    //         'titulo_seccion'=>"Registro para los paquetes",
    //         'descripcion'=>"Los siguientes datos son requeridos para poder darlos de alta en nuestro catálogo 
    //         de paquetes. Complete toda la información solicitada para poder registrar exitosamente."
    //     ];
    // $mPaquetes=new Paquetes();
    // $data3["paquete"]=$mPaquetes->traer_paquetes();
    //     $vistas= view('administrador/header', $data2).  
    //         view('administrador/navbar').
    //         view('administrador/regPaquete').
    //         view('administrador/listar_paquetes', $data3).
    //         view('administrador/footer').
    //         view("inicio");
    //     return $vistas;

    }
         
        
    
 
    public function logout() {
        $mCarrito = new Carrito();
        $data = $mCarrito->traer_carrito();
        // recuperar stock del carrito
        if (!empty($data)){
            $mInventario = new Inventarios();
            foreach ($data as $dat){
                $idProducto = $dat['idProducto'];
                $cantidad = $dat['cantidad'];
                $mInventario->agregar_inventario($cantidad, $idProducto);
            }
        }
        // vaciar el carrito de compras
        $mCarrito->borrar_todo();
        //destruir la sesión
        session_destroy();
        return redirect()->to('/inicio');
    }

}