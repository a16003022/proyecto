<?php

namespace App\Controllers;
use App\Models\UserModel;
class RegUsuario extends BaseController
{
    public function __construct(){
        helper(['form']);
    }
 

    public function index()
    {
        $data=[
            "titulo"=>"Registrarse"
        ];
    //la funcion view rsta conformada por 2 parametros: donde se encuentra la vista y el arreglo asociativo
        $vistas= view('genericos/header', $data).  
            view('genericos/navbar').
            view('genericos/regUsuario').
            view('genericos/footer').
            view("inicio");
        return $vistas;

       
    }
   
    public function register()
    {
        $rules = [
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            'confirm_password'  => [ 'label' => 'confirm password', 'rules' => 'matches[password]']
        ];
           
 
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'name'    => $this->request->getVar('name')
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
             $data['validation'] = $this->validator;
             $data2=[
                "titulo"=>"Registrarse"
            ];
             $vistas= view('genericos/header', $data2,$data).  
             view('genericos/navbar').
             view('genericos/regUsuario').
             view('genericos/footer').
             view("inicio");
         return $vistas;
        }
           
    }

}
?>