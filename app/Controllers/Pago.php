<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\DatosUsuario;
use App\Models\VentasUsuario;
use App\Models\DetalleVenta;
use App\Models\Carrito;
use App\Models\Listas;
use App\Models\TarjetasUsuario;
use App\Models\ConfigPedido;
use TCPDF;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'App/Libraries/PHPMailer/src/Exception.php';
require 'App/Libraries/PHPMailer/src/PHPMailer.php';
require 'App/Libraries/PHPMailer/src/SMTP.php';

class Pago extends BaseController
{
    public function __construct(){
        helper(['form']);
        $this->load = service('load');
    }

    public function index()
    {

        $session = session();
        $user_id = $session->get('id');

        // Borra la variable de sesión que almacena el valor del descuento
        $session->remove('descuento');

        $data=[
            "titulo"=>"Catálogo de Playeras"
        ];
        $DatosUsuario = new DatosUsuario();
        $data["direccion"]=$DatosUsuario->Traerdirecciones($user_id);
        $numero_aleatorio = mt_rand(10000000, 99999999);
        $identificador = base_convert(md5($numero_aleatorio), 16, 10);
        $data["numeroVenta"]= substr($identificador, 0, 8);

        // Verificar si la cookie existe
        if (isset($_COOKIE['pago_nombre']) && isset($_COOKIE['pago_tarjeta'])&& isset($_COOKIE['pago_fecha'])&& isset($_COOKIE['pago_cvv'])) {
            // Establecer los valores de los campos del formulario con los valores almacenados en las cookies
            $data['input-name'] = $_COOKIE['pago_nombre'];
            $data['numTarjeta'] = $_COOKIE['pago_tarjeta'];
            $data['exp'] = $_COOKIE['pago_fecha'];
            $data['cvv'] = $_COOKIE['pago_cvv'];
        }
      
        $mCarrito= new Carrito();
        $data["carrito"]=$mCarrito->traer_carrito();
        $data5["cantidad"]=$mCarrito->contar_contenido();
        $session = session();
        $user_id = $session->get('id');
        $mLista=new Listas();
        $data["lista"]=$mLista->traer_lista($user_id);
        $data5["cantidadLista"]=$mLista->contar_contenido_Lista($user_id);
        $TarjetaUsuario = new TarjetasUsuario();
        $data["Tarjeta"]=$TarjetaUsuario->TraerTarjetas($user_id);
        $data["NumeroTarjetas"]=$TarjetaUsuario->ContarTarjetasUsuario($user_id);
        $mConfig= new ConfigPedido();
        $config = $mConfig->traer_configPedido();
        foreach($config as $conf){
            $data['TotalPago'] = $conf['TotalPagar'];
            $data['Envio'] = $conf['Envio'];
        }

        $vistas= view('usuarios/header', $data).  
            view('usuarios/navbar',$data5).
            view('usuarios/pago', $data).
            view('usuarios/footer').
            view("inicio");
        return $vistas;
    }

    public function guardarDireccion(){
        $model = new DatosUsuario();
        $session = session();
        $user_id = $session->get('id');
        $data = [
            'idUsuario'    => $user_id,
            'direccion'    => $this->request->getVar('calle'),
            'CP'    => $this->request->getVar('CP'),
            'telefono'    => $this->request->getVar('telefono'),
            'estado'    => $this->request->getVar('estado'),
            'ciudad'    => $this->request->getVar('Ciudad')
        ];
        $model->save($data);
        return redirect()->back();

    }

    public function guardarTarjeta(){
        $model = new TarjetasUsuario();
        $session = session();
        $user_id = $session->get('id');
        $Tipo = '';
        $numero_tarjeta = $this->request->getVar('numTarjeta');
        
        $numero_tarjeta_sin_espacios = str_replace(' ', '', $numero_tarjeta);

        $rules = [
            'Tarjeta' => [
                'rules' => 'required|regex_match[/^(4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|3[47][0-9]{13})$/]',
                'errors' => [
                    'regex_match' => 'Error: Ingresa una tarjeta Visa, Mastercard o American Express válida.'
                ]
            ]
            
            
        ];
        
        if (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $numero_tarjeta_sin_espacios)) {
            $Tipo = 'Visa';
        } elseif (preg_match('/^(5[1-5][0-9]{14}|2(22[1-9]|2[3-9][0-9]|2[1-2][0-9]{2}|27[01][0-9]|2720)[0-9]{12})$/', $numero_tarjeta_sin_espacios)) {
            $Tipo = 'Mastercard';
        } elseif (preg_match('/^3[47][0-9]{13}$/', $numero_tarjeta_sin_espacios)) {
            $Tipo = 'AmericanE';
        } else {
            $Tipo = 'Desconocido';
            
        }

        
        $data = [
            'idUsuario'    => $user_id,
            'numTarjeta'    => $this->request->getVar('numTarjeta'),
            'NombreTarjeta'    => $this->request->getVar('input-name'),
            'FechaTarjeta'    => $this->request->getVar('exp'),
            'Tipo' => $Tipo
        ];
        $model->save($data);

        

        
        return redirect()->back();
    }

    public function BorrarDireccion($id){
        // $id = $this->request->getPost('id_direccion');
        $DatosUsuario = new DatosUsuario();
        $DatosUsuario->BorrarDireccion($id);
        return redirect()->back();
    }


    public function RegistrarVenta(){
        $model = new VentasUsuario();
        $session = session();
        $user_id = $session->get('id');
        $idVenta = $this->request->getVar('numero_venta');
        $_SESSION['id_venta'] = $idVenta;
        $data = [
            'idVenta'    => $idVenta,
            'idUsuario'    => $user_id,
            'idDireccion'    => $this->request->getVar('direccionselect'),
            'idTarjeta'    => $this->request->getVar('tarjetaselect'),
            'totalPagar'    => $this->request->getVar('totalPagar'),
        
        ];
        $model->save($data);
        sleep(1.5);

        $mCarrito=new Carrito();
        $data3=$mCarrito->traer_carrito();
        $mDetalle=new DetalleVenta();


        $subtotal = 0;
        $total = 0;
        foreach($data3 as $car){
            $data2 = [
                'idVenta'    => $_SESSION['id_venta'],
                'idProducto'    => $car['idProducto'],
                'cantidad'    => $car['cantidad'],
                'total'    => $car['precio']
           ];
            $mDetalle->save($data2);
        }

        if ($this->request->getVar('rememberPago')) {
            setcookie('pago_nombre', $this->request->getVar('input-name'), time()+60*60*24*30, '/');
            setcookie('pago_tarjeta', $this->request->getVar('numTarjeta'), time()+60*60*24*30, '/');
            setcookie('pago_fecha', $this->request->getVar('exp'), time()+60*60*24*30, '/');
            setcookie('pago_cvv', $this->request->getVar('cvv'), time()+60*60*24*30, '/');
        }else {
            // Si la opción de recordar no fue seleccionada, borrar las cookies existentes
            setcookie('pago_nombre', '', time() - 3600, "/");
            setcookie('pago_tarjeta', '', time() - 3600, "/");
            setcookie('pago_fecha', '', time() - 3600, "/");
            setcookie('pago_cvv', '', time() - 3600, "/");
        }
        
        //Enviar correo de la venta
        $session = session();
        $idVenta = $session->get('id_venta');
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $VentasUsuario = new VentasUsuario();
        $data=$VentasUsuario->TraerVenta($idVenta);
        $model = new TarjetasUsuario();
        $idTarjeta = '';
        foreach($data as $dat){
            $idTarjeta = $dat['idTarjeta'];
        }
        
        $data2=$model->TraerTarjeta($idTarjeta);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tecshirts@gmail.com';                     //SMTP username
            $mail->Password   = 'feceyemxadfgcmpm';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('tecshirts@gmail.com', 'TecShirts');
            foreach ($data as $dat){
                $mail->addAddress($dat['email']);
            }
            //Attachments
            //  $mail->addAttachment($pdfPath);         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mConfig= new ConfigPedido();
            $config = $mConfig->traer_configPedido();
            $envio = 0;
            foreach($config as $conf){
                
                $envio= $conf['Envio'];
            }
            $mDetalleVenta=new DetalleVenta();
            $data5=$mDetalleVenta->Traer_Detalle_Venta($idVenta);
            $mail->Subject = 'Tu pedido de TecShirts #'.$idVenta;
            $mail->isHTML(true);                                  //Set email format to HTML
            // $mail->Body = '<div style="display: flex; justify-content: center; align-items: center;">
            //         <h1 style="text-align:center; color:#9162dd;">Confirmación de compra</h1>
            //     </div>
            //     <div>
            //         <h4 style="display:inline-block;">Pedido #' . $idVenta . '</h4>
            //         <table>
            //             <tr>
            //                 <th>Producto</th>
            //                 <th>Cantidad</th>
            //                 <th>Precio</th>
            //             </tr>';
            // $total = 0;
            // $subtotal = 0;
            // foreach($data5 as $dat){
            //                 $precio = $dat['precio'];
            //                 $cant = $dat['cantidad'];
            //                 $subtotal = $precio * $cant;
            //                 $total = $subtotal + $total;
            //     $mail->Body .= '<tr>
            //                         <td>'.$dat['nombre'].'</td>
            //                         <td style="text-align:center;">'.$dat['cantidad'].'</td>
                                    
            //                         <td style="text-align:center;">'.$subtotal.'</td>
            //                     </tr>';
                                
            // }
            // $mail->Body .= '<tr>';
            // $mail->Body .= '<td><strong>Total:</strong></td>';
            // $mail->Body .= '<td></td>';
            // $mail->Body .= '<td style="text-align:center;"><strong>' . $total . '</strong></td>';
            // $mail->Body .= '</tr>';
           
            // foreach ($data2 as $Tick){
            //     $numTarjeta = $Tick['numTarjeta'];
            //     $ultimosCuatro = substr($numTarjeta, -4);
            //     $asteriscos = str_repeat('*', 12);
            //     $numTarjetaOculto = $asteriscos . ' ' . $ultimosCuatro;
            //     $mail->Body .='
            //     <h4 style="display:inline-block;">Método de pago</h4>
            //     <p>'.$numTarjetaOculto.'</p>';
            // }
            // $mail->Body .= '
            // </table>
            // <h3 style="color:#9162dd;">¡Gracias por tu compra!</h3>
            // </div>';

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
                                                <h1 style="text-align:center; color:#9162dd;">Confirmación de compra</h1>
                                                <h4 style="display:inline-block;">Pedido #' . $idVenta . '</h4>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">¡Muchas gracias por comprar con nosotros!</p>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Un resumen de tu pedido:</p>
                                                <table>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                </tr>';
                                                $total = 0;
                                                $subtotal = 0;
                                                foreach($data5 as $dat){
                                                                $precio = $dat['precio'];
                                                                $cant = $dat['cantidad'];
                                                                $subtotal = $precio * $cant;
                                                                $total = $subtotal + $total;
                                                    $mail->Body .= '<tr>
                                                                        <td>'.$dat['nombre'].'</td>
                                                                        <td style="text-align:center;">'.$dat['cantidad'].'</td>
                                                                        
                                                                        <td style="text-align:center;">$'.$subtotal.'</td>
                                                                    </tr>';
                                                                    
                                                }
                                                $mail->Body .= '<tr>';
                                                $mail->Body .= '<td>Envio:</td>';
                                                $mail->Body .= '<td></td>';
                                                $mail->Body .= '<td style="text-align:center;">$' . $envio . '</td>';
                                                $mail->Body .= '</tr>';
                                                $mail->Body .= '<tr>';
                                                $mail->Body .= '<td><strong>Total:</strong></td>';
                                                $mail->Body .= '<td></td>';
                                                $mail->Body .= '<td style="text-align:center;"><strong>$' . $total+$envio . '</strong></td>';
                                                $mail->Body .= '</tr>';
                                               
                                                foreach ($data2 as $Tick){
                                                    $numTarjeta = $Tick['numTarjeta'];
                                                    $ultimosCuatro = substr($numTarjeta, -4);
                                                    $asteriscos = str_repeat('*', 12);
                                                    $numTarjetaOculto = $asteriscos . ' ' . $ultimosCuatro;
                                                    $mail->Body .='
                                                    <h4 style="display:inline-block;">Método de pago</h4>
                                                    <p>'.$numTarjetaOculto.'</p>';
                                                }
                                                $mail->Body .= '
                                            </table>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Si tienes alguna pregunta o necesitas ayuda con cualquier cosa, no dudes en ponerte en contacto con nuestro equipo de soporte.</p>
                                                <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Gracias,<br>TecShirts</p>

                                            </td>
                                            </tr>
                                            
                                        
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
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        // unlink($pdfPath);
        $mCarrito->borrar_todo();
        return redirect()->to('/ticket');
    }


    public function Ticket(){

        $session = session();
        $user_id = $session->get('id');
        $idVenta = $session->get('id_venta');
        // var_dump($idVenta);
        $data=[
            "titulo"=>"Catálogo de Playeras"
        ];
        $VentasUsuario = new VentasUsuario();
        $data["Ticket"]=$VentasUsuario->TraerVenta($idVenta);
        $Tarjeta=$VentasUsuario->TraerVenta($idVenta);
        $model = new TarjetasUsuario();
        $idTarjeta = '';
        foreach($Tarjeta as $dat){
            $idTarjeta = $dat['idTarjeta'];
        }

        $mConfig= new ConfigPedido();
        $config = $mConfig->traer_configPedido();
        foreach($config as $conf){
            $data['TotalPago'] = $conf['TotalPagar'];
            $data['Envio'] = $conf['Envio'];
        }
        
        $data['Tarjeta']=$model->TraerTarjeta($idTarjeta);
        
        $mDetalle=new DetalleVenta();
        $data["Ventas"]=$mDetalle->Traer_Detalle_Venta($idVenta);

        $mCarrito= new Carrito();
        $data2["carrito"]=$mCarrito->traer_carrito();
        $data5["cantidad"]=$mCarrito->contar_contenido();
        $session = session();
        $user_id = $session->get('id');
        $mLista=new Listas();
        $data["lista"]=$mLista->traer_lista($user_id);
        $data5["cantidadLista"]=$mLista->contar_contenido_Lista($user_id);

        


        $vistas= view('usuarios/header', $data).  
            view('usuarios/navbar',$data5).
            view('usuarios/ticket', $data).
            view('usuarios/footer').
            view("inicio");
        return $vistas;
    }

    public function imprimirTicket($idPedido){

        $VentasUsuario = new VentasUsuario();
        $data=$VentasUsuario->TraerVenta($idPedido);

        $Tarjeta=$VentasUsuario->TraerVenta($idPedido);
        $model = new TarjetasUsuario();
        $idTarjeta = '';
        foreach($Tarjeta as $dat){
            $idTarjeta = $dat['idTarjeta'];
        }
        
        $Tarjeta=$model->TraerTarjeta($idTarjeta);
        
        $mDetalle=new DetalleVenta();
        $data2 = $mDetalle->Traer_Detalle_Venta($idPedido);

        // Cargar modelo, obtener información del pedido y pasarla a la vista
        
        // Generar el PDF del ticket
        $pdf = new TCPDF();
        $pdf->SetTitle('TecShirts - Pedido '.$idPedido.'.pdf');
        $pdf->AddPage();
        // $pdf->SetFont('Helvetica', '', 12);
        // $pdf->Write(0, 'Contenido del ticket aquí');
        
        // Establecer posición y tamaño del logo
        $logo = base_url('imagenes/1.png');
        $logoWidth = 30;
        $logoHeight = 20;
        
        // Agregar imagen del logo en la esquina superior izquierda
        $pdf->Image($logo, $pdf->GetX(), $pdf->GetY(), $logoWidth, $logoHeight, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $pdf->Ln();
        // Definir el título
        $title = 'Detalles finales del pedido #'.$idPedido;
        $pdf->SetFont('helvetica', 'B', 15);
        $pdf->SetTextColor(145, 98, 221);
        // Agregar el título centrado
        $pdf->Cell(0, 10, $title, 0, 1, 'C');

        // Agregar espacio en blanco
        $pdf->Ln();
        $pdf->Ln();

        $pdf->SetFont('helvetica', '', 12); // Fuente regular, tamaño 12
        $pdf->SetTextColor(0, 0, 0); // Color negro

        foreach($data as $dat){
            $fecha = $dat['fecha'];
            $fecha_formateada = date('j \d\e F \d\e Y', strtotime($fecha));
           // Agregar detalles del pedido
        $pdf->SetFont('helvetica', '', 12); // Fuente normal y tamaño 12
        $pedido_info = '<span style="font-weight:bold">Pedido realizado: </span>'.$fecha_formateada.'</span>';
        $pdf->writeHTMLCell(0, 5, '', '', $pedido_info, 0, 1, false, true, 'L');
        $pedido_info2 = '<span style="font-weight:bold">Pedido Tecshirts número: </span>'.$idPedido.'</span>';
        $pdf->writeHTMLCell(0, 5, '', '', $pedido_info2, 0, 1, false, true, 'L');
        $pedido_info3 = '<span style="font-weight:bold">Total del pedido:</span>'.' $'.$dat['totalPagar'].'</span>';
        $pdf->writeHTMLCell(0, 5, '', '', $pedido_info3, 0, 1, false, true, 'L');
        }

        $pdf->Ln();
        $pdf->SetLeftMargin(15);
        // Crear la tabla
        $pdf->SetFillColor(145, 98, 221);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(80, 10, 'Producto', 1);
        $pdf->Cell(20, 10, 'Cantidad', 1);
        $pdf->Cell(40, 10, 'Precio', 1);
        $pdf->Cell(40, 10, 'Total', 1);
        $pdf->Ln();

        $subtotal = 0;
        $total = 0;
        // Recorrer los items
        foreach ($data2 as $item) {
            // Agregar celda con el nombre del producto
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(80, 10, $item['nombre'], 1);

            // Agregar celda con la cantidad
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(20, 10, $item['cantidad'], 1);

            // Agregar celda con la precio
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(40, 10,' $'.$item['precio'], 1);

            $precio = $item['precio'];
            $cant = $item['cantidad'];
            $subtotal = $precio * $cant;
            $total = $subtotal + $total;
                  
            // Agregar celda con el total
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(40, 10,' $'.$subtotal, 1);

            // Agregar salto de línea
            $pdf->Ln();
        }
        $pdf->SetLeftMargin(10);
        $pdf->Ln();

        $pdf->SetFont('helvetica', '', 12); // Fuente normal y tamaño 12

        foreach ($data as $dat){
            $direccion_info = '<span style="font-weight:bold">Dirección de envío: </span>';
            $pdf->writeHTMLCell(0, 5, '', '', $direccion_info, 0, 1, false, true, 'L');
            $direccion_info = '<span>'.$dat['name'].'</span>';
            $pdf->writeHTMLCell(0, 5, '', '', $direccion_info, 0, 1, false, true, 'L');
            $direccion_info = '<span>'.$dat['direccion'].'</span>';
            $pdf->writeHTMLCell(0, 5, '', '', $direccion_info, 0, 1, false, true, 'L');
            $direccion_info = '<span>'.$dat['ciudad'].", ".$dat['estado'].", ".$dat['CP'].'</span>';
            $pdf->writeHTMLCell(0, 5, '', '', $direccion_info, 0, 1, false, true, 'L');
        }
        $pdf->Ln();
        // Definir el título
        $title = 'Información de pago';
        $pdf->SetFont('helvetica', 'B', 15);
        $pdf->SetTextColor(145, 98, 221);
        // Agregar el título centrado
        $pdf->Cell(0, 10, $title, 0, 1, 'C');
        $pdf->SetTextColor(0, 0, 0); // Color negro
        $pdf->SetFont('helvetica', '', 12); // Fuente normal y tamaño 12
        $direccion_info = '<span style="font-weight:bold">Método de pago: </span>';
        $pdf->writeHTMLCell(0, 5, '', '', $direccion_info, 0, 1, false, true, 'L');
        foreach ($Tarjeta as $dat){
            $numTarjeta = $dat['numTarjeta'];
            $ultimosCuatro = substr($numTarjeta, -4);
            
            $numTarjetaOculto =$ultimosCuatro;
        $direccion_info = '<span>Tarjeta | Últimos dígitos: '.$numTarjetaOculto.'</span>';
        $pdf->writeHTMLCell(0, 5, '', '', $direccion_info, 0, 1, false, true, 'L');
        $pdf->Ln();
        
        // AGREGAR CAMBIO ENVIO
        $mConfig= new ConfigPedido();
        $config = $mConfig->traer_configPedido();
        foreach($config as $conf){
            $TotalPago= $conf['TotalPagar'];
            $Envio = $conf['Envio'];
        }

        $direccion_info = '<span>Productos: $'.$total.'</span>';
        $pdf->writeHTMLCell(0, 5, '', '', $direccion_info, 0, 1, false, true, 'L');

        $direccion_info = '<span>Envío: $'.$Envio.'</span>';
        $pdf->writeHTMLCell(0, 5, '', '', $direccion_info, 0, 1, false, true, 'L');

        $direccion_info = '<span>----------------------------</span>';
        $pdf->writeHTMLCell(0, 5, '', '', $direccion_info, 0, 1, false, true, 'L');

        $direccion_info = '<span>Total: $'.$TotalPago.'</span>';
        $pdf->writeHTMLCell(0, 5, '', '', $direccion_info, 0, 1, false, true, 'L');
        }
        
        // Descargar el PDF
        // $pdf->Output('TecShirts - Pedido '.$idPedido.'.pdf', 'I');
        $pdfPath = FCPATH . 'temp/' . $idPedido . '.pdf';
        $pdf->Output($pdfPath, 'I');
        exit();
        unlink($pdfPath);
    }

    
    
    
}