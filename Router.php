<?php 

namespace MVC;

class Router {

    //almacenar rutas del index
    public $rutasGET = [];
    public $rutasPOST = [];

    //recibe las rutas y funciones asociadas del index y las agrega a las variables de arriba
    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    //recibe las rutas y funciones asociadas del index y las agrega a las variables de arriba
    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }


    public function comprobarRutas()
    {   
        session_start();
        $auth = $_SESSION['login'] ?? null;

        //arreglo de rutas protegidas
        $rutas_protegidas = [
            '/admin', 
            '/propiedades/crear', 
            '/propiedades/actualizar', 
            '/propiedades/eliminar', 
            '/vendedores/crear', 
            '/vendedores/actualizar', 
            '/vendedores/eliminar'
        ];

        //obtiene la url donde se esta posicionado
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        //obtiene el metodo utilizado GET o POST
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        if($metodo === 'GET'){
            //identifica si la url actual existe
            $fn = $this->rutasGET[$urlActual] ?? null;
            
        }else{
            //identifica si la url actual existe
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //proteger las rutas
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location: /');
        }

        if($fn){
            //permite llamar una funcion sin saber como se llama
            //esto trae la clase y metodo de la url, $this es el objeto con todas las url y fn validas
            call_user_func($fn, $this);
        }else{
            header('Location: /');
            echo "pagina NO encontrada";
        }
    }

    //muestra la vista
    public function render($view, $datos = []){
        foreach($datos as $key => $value){
            $$key = $value;
        }

        ob_start();

        include_once __DIR__ . "/views/$view.php";
        
        $contenido = ob_get_clean();

        include_once __DIR__ . "/views/layout.php";
    }
}
?>
