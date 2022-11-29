<?php 

namespace Controllers;

use MVC\Router;
use Models\Vendedor;

class VendedorController{
    public static function crear( Router $router){
        //array para error de validacion que se va llenando
        $errores = Vendedor::getErrores();  
        //crear clase para poner los values de los input en ''
        $vendedor = new Vendedor();

        //si la pagina emite un post entra en el if y ejecuta el insert
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $vendedor = new Vendedor($_POST['vendedor']);

            //validar campos vacios
            $errores = $vendedor->validar();

            if(empty($errores)){
                $resultado = $vendedor->crear();
                if($resultado){
                    header("Location: /admin?m=1");
                }
            }
        }

        $router->render('/vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarIdRedireccionar("/admin");
        //array para error de validacion que se va llenando
        $errores = Vendedor::getErrores();


        //consulta para obtener todos los vendedores
        $vendedor = Vendedor::find($id);

        //si la pagina emite un post entra en el if y ejecuta el insert
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            //asignar los valores nuevos
            $args = $_POST['vendedor'];

            //sincronizar objeto en momemoria con lo que el usuario puso
            $vendedor->sincronizar($args);
            
            //validacion
            $errores = $vendedor->validar();
            //debuguear($errores);
            if(empty($errores)){
                $resultado = $vendedor->actualizar();
                if($resultado){
                    header("Location: /admin?m=2");
                }
            }
        }

        $router->render('/vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }
    public static function eliminar(){
        //si hay un post de eliminar entra el if
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //validar que el id sea solo numerico
            $id = $_POST['id'];
            
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            
            if($id){

                $tipo = $_POST['tipo'];

                if(validarTipoPost($tipo)){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}
?>
