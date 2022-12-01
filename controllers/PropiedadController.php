<?php 
namespace Controllers;
use MVC\Router;
use Models\Propiedad;
use Models\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function eliminar(){
        //si hay un post de eliminar entra el if
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //validar que el id sea solo numerico
            $id = $_POST['id'];
            
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            
            if($id){

                $tipo = $_POST['tipo'];

                if(validarTipoPost($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
    public static function index(Router $router){
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        //mostrar alerta de los crud
        $alerta = isset($_GET['m']) ? $_GET['m'] : '';
        
        $router->render("propiedades/admin", [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'alerta' => $alerta
        ]);
    }
    public static function crear(Router $router){
        //array para error de validacion que se va llenando
        $errores = Propiedad::getErrores();
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            //debuguear($_POST);
            /* CREA UNA NUEVA INSTANCIA DE LA CLASE */
            $propiedad = new Propiedad($_POST['propiedad']);
            /* SUBIDA DE ARCHIVOS */
            
            //crear nombre de imagen unico
            $nombreImagenes = md5( uniqid( rand(), true )). ".jpg";
            
            //setear la imagen
            if($_FILES['propiedad']['tmp_name']['imagen']){
                //realizar un rezise a la imagen con libreria intervie
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagenes);//paso el nombre a la clase para que lo guarde
            }
            
            
            //validar
            $errores = $propiedad->validar();
            //si array esta vacio no hay errores, por lo tanto, inserto
            if(empty($errores)){
                //crear carpeta para imagenes
                $carpetaImagenes = $_SERVER["DOCUMENT_ROOT"] . '/images/';
                
                if(!is_dir($carpetaImagenes)){
                    mkdir($carpetaImagenes);
                }
        
                //guardar imagen en el servidor, se pasa la ruta con el nombre
                $image->save($carpetaImagenes . $nombreImagenes);
                
                //guardar en la db
                
                $resultado = $propiedad->crear();
        
                if($resultado){
                    header("Location: /admin?m=1");
                }
            }
        }

        $router->render("propiedades/crear",[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarIdRedireccionar("/admin");

        //obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);

        //array para error de validacion que se va llenando
        $errores = Propiedad::getErrores();
        
        //consulta para obtener todos los vendedores
        $vendedores = Vendedor::all();

        //si la pagina emite un post entra en el if y ejecuta el insert
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            //asignar los atributos de la actualizacion
            $args = $_POST['propiedad'];
            
            //evito poner todos porque hago un array de propiedad, y los incluyo en $args arriba
            //$args['titulo'] = $_POST['titulo'] ?? NULL;

            $propiedad->sincronizar($args);


            
            /* SUBIDA DE ARCHIVOS */

            //crear nombre de imagen unico
            $nombreImagenes = md5( uniqid( rand(), true )). ".jpg";
            
            //setear la imagen
            if($_FILES['propiedad']['tmp_name']['imagen']){
                //realizar un rezise a la imagen con libreria intervie
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagenes);//paso el nombre a la clase para que lo guarde
            }
            //debuguear($image);
            
            
            //validar
            $errores = $propiedad->validar();
            
            //si array esta vacio no hay errores, por lo tanto, inserto
            if(empty($errores)){
                //crear carpeta para imagenes
                $carpetaImagenes = '../../images/';
                
                if(!is_dir($carpetaImagenes)){
                    mkdir($carpetaImagenes);
                }

                if($_FILES['propiedad']['tmp_name']['imagen']){
                //guardar imagen en el servidor, se pasa la ruta con el nombre
                $image->save($carpetaImagenes . $nombreImagenes);
                }
                //guardar en la db
                
                $resultado = $propiedad->actualizar();

                if($resultado){
                    header("Location: /admin?m=2");
                }
            }
        };

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    
}

;?>
