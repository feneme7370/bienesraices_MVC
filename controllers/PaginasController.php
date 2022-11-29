<?php 
namespace Controllers;

use MVC\Router;
use Models\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController{
    public static function index(Router $router){
        $imgHeader = true;
        $propiedades = Propiedad::get(3);

        $router->render("paginas/index",[
            'imgHeader' => $imgHeader,
            'propiedades' => $propiedades
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros', [
            
        ]);
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = validarIdRedireccionar("/propiedades");
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router){
        $router->render('paginas/blog', [

        ]);
    }
    public static function entrada(Router $router){
        $router->render('paginas/entrada', [

        ]);
    }
    public static function contacto(Router $router){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
            $respuestas = $_POST['contacto'];
            //debuguear($respuestas);
            //crear instancia de PHPMAIL
            $mail = new PHPMailer();
        
            //configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'userdehost';
            $mail->Password = 'passworddehost';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //configurar contenido del mail
            $mail->setFrom('admin@admin.com');
            $mail->addAddress('admin@admin', 'usuario publico');
            $mail->Subject = 'tienes un nuevo mensaje';

            //habilitar html
            $mail->isHTML(true);
            $mail->CharSet = 'UtF-8';

            //definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Eligio ser contactado por telefono  </p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';
                
            }else{
                $contenido .= '<p>Eligio ser contactado por email</p>';
                $contenido .= '<p>Mail: ' . $respuestas['email'] . '</p>';

            }

            $contenido .= '<p>Vende o Compra: ' . $respuestas['operacion'] . '</p>';
            $contenido .= '<p>Preferencia: ' . $respuestas['presupuesto'] . '</p>';
        
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'texto alternativo al html';

            //enviar mail
            if($mail->Send()){
                $mensaje = "mensaje enviado correctamente";
            }else{
                $mensaje = "No se pudo enviar el mensaje";
            }
        }
        $router->render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);

    }
}
?>
