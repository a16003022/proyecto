<?php

namespace App\Controllers;
use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use App\Models\Cupones;
require 'App/Libraries/PHPMailer/src/Exception.php';
require 'App/Libraries/PHPMailer/src/PHPMailer.php';
require 'App/Libraries/PHPMailer/src/SMTP.php';  

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
            'email' => [
                'rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]',
                'errors' => [
                    'valid_email' => 'Error: El correo electrónico no es válido.',
                    'is_unique' => 'Error: El correo electrónico ya está registrado.'
                ]
            ],
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

        // Verificar el captcha
        $captcha = $_POST['g-recaptcha-response'];
        $secretkey = '6Lf8L8MlAAAAADkr6k5AEMBfyuk3MR2suNVNF_kn';
        $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha");
        $atributos = json_decode($respuesta, TRUE);
           
        if($this->validate($rules) && $atributos['success']){
            $model = new UserModel();
            $data = [
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'name'    => $this->request->getVar('name'),
                'apellido'    => $this->request->getVar('apellido')
                
            ];
            $model->save($data);


            $usuario_id = $model->insertID();
            $cupon = new Cupones();
                $cupon_data = [
                    'codigo' => 'TS' . strtoupper(substr(uniqid(), 7, 5)), // Código de cupón aleatorio con prefijo 'TECSHIRTS'
                    'descuento' => 10, // Descuento del 10%
                    'usado' => false, // El cupón aún no ha sido utilizado
                    'idUsuario' => $usuario_id // ID del usuario al que se asignará el cupón
                ];
            $cupon->insert($cupon_data);

            // Enviar correo electrónico con instrucciones para restablecer contraseña
            $email = $this->request->getVar('email');
            $name = $this->request->getVar('name');
            $apellido = $this->request->getVar('apellido');
            $mail = new PHPMailer(true);
            $mail->CharSet = 'UTF-8';
            try{
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
                $mail->Subject = 'Bienvenido a TechShirts';
                $mail->isHTML(true);                                  //Set email format to HTML
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
                                                <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif; color:#153643;">Hola, '. $name.' '.$apellido.'</h1>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">¡Muchas gracias por registrarte con nosotros!</p>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Como agradecimiento, te regalamos un cupón de descuento del 10% en tu primera compra. El código de tu cupón es: <span style="font-weight: bold; color:#9162dd">'.$cupon_data['codigo'].'</span></p>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Tu información de registro es la siguiente:</p>
                                                <ul>
                                                    <li style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Nombre de usuario: '.$name.'</li>
                                                    <li style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Dirección de correo electrónico: '.$email.'</li>
                                                </ul>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Si tienes alguna pregunta o necesitas ayuda con cualquier cosa, no dudes en ponerte en contacto con nuestro equipo de soporte.</p>
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
               // $response = ['success' => true, 'mensaje' => 'Correo electrónico enviado con éxito.'];


            } catch (Exception $e) {
                
                //$response = ['success' => False, 'mensaje' => 'Hubo un error al enviar el Correo electrónico.'];
            }
            
            
            //return $this->response->setJSON($response); 
            
            // Regresa a la vista con el mensaje de que el correo ha sido enviado.
            $data=[
                "titulo"=>"Iniciar sesión"
            ];
            $data2['confirmacion'] = 'Correo de confirmación enviado. Revise su bandeja de entrada o spam.';
            $vistas= view('genericos/header', $data).  
            view('genericos/navbar').
            view('genericos/login',$data2).
            view('genericos/footer').
            view("inicio");
            return $vistas;
        }else{
            if (!($this->validate($rules))){
                $data['validation'] = $this->validator;
            }
            if (!($atributos['success'])){
                $data['captcha_error'] = 'Por favor, resuelve el captcha correctamente.';
            }
            $data2=[
               "titulo"=>"Registrarse"
            ];
             $vistas= view('genericos/header', $data2).  
             view('genericos/navbar').
             view('genericos/regUsuario',$data).
             view('genericos/footer').
             view("inicio");
         return $vistas;
        }
           
    }

}
?>