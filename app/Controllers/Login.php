<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\Contenido;
use App\Models\Paquetes;
use App\Models\Productos;
use App\Models\Carrito;

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

        
    }
   
    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();
 
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $userModel->where('email', $email)->first();
 
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
        return redirect()->to(base_url('/registrarPaquete'));
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
        // vaciar el carrito de compras
        $mCarrito = new Carrito();
        $mCarrito->borrar_todo();
        //destruir la sesión
        session_destroy();
        return redirect()->to('/inicio');
    }

}