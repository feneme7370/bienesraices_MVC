<?php 
namespace Controllers;
use MVC\Router;
use Models\Admin;

class LoginController{
    public static function login(Router $router){
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if(empty($errores)){
                //verificar si usuario existe
                $resultado = $auth->existeUsuario();

                if(!$resultado){
                    //mensaje si no existe ususario
                    $errores = Admin::getErrores();
                }else{
                    //verificar password
                    $autenticado = $auth->comprobarPassword($resultado);
                    
                    if(!$autenticado){
                        //error de password mensaje de error
                        $errores = Admin::getErrores();
                    }else{
                        //autenticar usuario
                        $auth->autenticar();
                    }
                }
                

            }
        };

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }
    public static function logout(Router $router){
        $router->render('auth/logout', [
            
        ]);
    }
}

?>
