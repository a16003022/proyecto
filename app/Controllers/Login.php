<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\Contenido;
use App\Models\Paquetes;
use App\Models\Productos;
use App\Models\Carrito;
use App\Models\Inventarios;
use App\Models\Correos;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'App/Libraries/PHPMailer/src/Exception.php';
require 'App/Libraries/PHPMailer/src/PHPMailer.php';
require 'App/Libraries/PHPMailer/src/SMTP.php'; 

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
         
    public function RecuperarContraseña(){
        $mail = new PHPMailer(true);
        
        $mail->CharSet = 'UTF-8';
        $email = $this->request->getVar('email');
        $correoModel = new Correos();
        $email_exists = $correoModel->traerCorreo($email);
        $session = session();
        if ($email_exists) {
            // Enviar correo electrónico con instrucciones para restablecer contraseña

            // Genera un token aleatorio único
            $token = bin2hex(random_bytes(32));
            foreach($email_exists as $dat){
            $id = $dat['user_id'];
            $link = site_url('recuperar/' . $id . '/' . $token);


            }
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'tecshirts@gmail.com';                     //SMTP username
                $mail->Password   = 'feceyemxadfgcmpm';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                //Recipients
                $mail->setFrom('tecshirts@gmail.com', 'TecShirts');
                $mail->addAddress($email);
                //Attachments
                //  $mail->addAttachment($pdfPath);         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                $mail->addCustomHeader('X-MSMail-Priority: High');
                $mail->addCustomHeader('Importance: High');
                
                //Content
                $mail->Subject = 'Solicitud para restablecer la contraseña';
                $mail->isHTML(true);                                  //Set email format to HTML
                foreach($email_exists as $dat){
                $mail->Body = '
                            <!DOCTYPE html>
                            <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
                            <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width,initial-scale=1">
                            <meta name="x-apple-disable-message-reformatting">
                            <title></title>
                            <style>
                                table, td, div, h1, p {font-family: Arial, sans-serif;}
                            </style>
                            </head>
                            <body style="margin:0;padding:0;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
                                <tr>
                                <td align="center" style="padding:0;">
                                    <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                                    <tr>
                                        <td align="center" style="padding:40px 0 30px 0;background:#8C52FF;">
                                        <img src="https://i.postimg.cc/qRynRGRx/Black-Pink-Bold-Elegant-Monogram-Personal-Brand-Logo.jpg" alt="" width="300" style="height:auto;display:block;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:36px 30px 42px 30px;">
                                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                            <tr>
                                            <td style="padding:0 0 36px 0;">
                                                <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif; color:#153643;">Hola, '.$dat['name'].'</h1>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Hemos recibido tu solicitud para restablecer tu contraseña, podrás hacerlo <a href="'.$link.'" style="color:#8C52FF;text-decoration:underline;">aquí</a>.</p>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Tu nueva contraseña debe incluir lo siguiente:</p>
                                                <ul>
                                                    <li style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Mínimo 8 caracteres</li>
                                                    <li style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Una letra mayúsucla</li>
                                                    <li style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Una letra minúscula</li>
                                                    <li style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Un número</li>
                                                </ul>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Si tú no solicitaste el restablecimiento de tu contraseña, por favor comunícate con nosotros.</p>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Gracias,<br>TecShirts</p>

                                            </td>
                                            </tr>
                                            
                                        </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:30px;background:#8C52FF;">
                                        <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                            <tr>
                                            <td style="padding:0;width:50%;" align="left">
                                                <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                                                &reg; 2023 TecShirts Todos los derechos reservados.
                                                </p>
                                            </td>
                                            <td style="padding:0;width:50%;" align="right">
                                                <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                                                <tr>
                                                    <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                                                    </td>
                                                    <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                                                    </td>
                                                </tr>
                                                </table>
                                            </td>
                                            </tr>
                                        </table>
                                        </td>
                                    </tr>
                                    </table>
                                </td>
                                </tr>
                            </table>
                            </body>
                            </html>
                
                
                
                ';
            
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                $mail->send();
                $response = ['success' => true, 'mensaje' => 'Correo electrónico enviado con éxito.'];

                 }

        } else {
            $response =['success' => false, 'mensaje' => 'El correo electrónico ingresado no existe en nuestra base de datos.'];
        }
        return $this->response->setJSON($response);         
        
    }
        
    public function Recuperar(){

        $id = $this->request->uri->getSegment(2);
        $rules = [
            'password' => [
                'rules' => 'required|min_length[8]|max_length[255]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]+$/]',
                'errors' => [
                    'regex_match' => 'Error: La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.',
                    'min_length' => 'Error: La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.'
                ]
            ],
            'confirm_password' => [
                'label' => 'confirm password',
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Error: Las contraseñas no coinciden.'
                ]
            ]
        ];
           
 
        if($this->validate($rules)){
            $usuario = new UserModel();
            $data = [
                'password' => $this->request->getPost('password')

             ];
             $id = $this->request->getPost('id');

            
            
            
            // Actualiza la contraseña del usuario en la base de datos
            
            $usuario->ActualizarContra($id,$data);
        
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
         }else{
            // return redirect()->back();
         }

         $data=[
            "titulo"=>"Iniciar sesión"
        ];
        $data2=[
            'id' => $id
        ];
         
         $vistas= view('genericos/header', $data).  
         view('genericos/navbar').
         view('genericos/recuperar',$data2).
         view('genericos/footer').
         view("inicio");
     return $vistas;
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