<?php

namespace Models;

class ActiveRecord {
        //static es porque se crea el codigo una vez y se reutiliza, no se crea cada vez que se hace un objeto, esto ahorra recursos

    //conexion a BS static, vacia y luego se llena porque es siempre la misma
    protected static $db;
    
    //identificar columnas para recorrer datos con foreach luego, tienen que ser las mismas que la tabla
    protected static $columnasDB = [];

    //
    protected static $tabla = "";
    //validacion de errores, array vacio para luego llenar en caso de errores
    protected static $errores = [];

    /* FUNCIONES */

    //definir conexion a DB, $database trae desde app y lo llena en $db de el protected static de la clase arriba
    public static function setDB($database){
        self::$db = $database; // se deja el self porque todos se conectan a la misma db, y solo se pide una vez la conexion y no cada vez por clase
    }


    //actaulizar

    //  public function guardar(){
    //      if(!$this->id == ""){
    //         $this->actualizar();
    //     }else{
            
    //          $this->crear();
    //      }
    //  }
    public function actualizar(){
        $atributos = $this->sanitizarDatos();
        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
        };
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id =  ' " . self::$db->escape_string($this->id) . " ' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);
        return $resultado;
    
    }
    //ejecutar la inserccion de datos a la db
    public function crear(){
        //sanitizar datos, funcion atributos->sanitiza->guardar
        $atributos = $this->sanitizarDatos();
        
        //convierte el array de atributos en string, saca los key que son los titulos de las tablas, y los valores, y reemplaza en el query de instartar datos
        $titulos = join(', ', array_keys($atributos));
        $valores = join("', '", array_values($atributos));

        $query = " INSERT INTO " . static::$tabla ." ( ";
        $query .= $titulos;
        $query .= " ) VALUES (' ";
        $query .= $valores;
        $query .= " ') ";

        //llamar db
        $resultado = self::$db->query($query);
        return $resultado;
        
    }
    public function eliminar(){
        $query = "DELETE FROM ". static::$tabla ." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1"; 
        
        $resultado = self::$db->query($query);
        if($resultado){
            $this->borrarImagen();
			header("Location: /admin?m=3");
		}
        
        
        
    }
    
    //identificar y unir los atributos de la BD, mapear columnas con el array en memoria
    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    //a el objeto creado en la funcion atributos, se los sanitiza
    public function sanitizarDatos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //subida de imagen
    public function setImagen($imagen){
        //elimina imagen previa
        if(!$this->id == ""){
            $this->borrarImagen();
        };
        //asignar eal atributo imagen el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    //eliminar imagen al borrar
    public function borrarImagen(){
        //comprobar si exite, es prque se esta editando
        $ruta = __DIR__ . "/../public/images/" . $this->imagen;
        $existeArchivo = file_exists($ruta);
        if($existeArchivo){
            unlink($ruta);
        }
    }

    //funcion para llamar desde crear.php el static array que se va llenando
    public static function getErrores(){
        return static::$errores;
    }

    //se llena con los datos de las clases individuales
    public function validar(){
        static::$errores;
        return static::$errores;
    }

    //listar todas las propiedades (registros)
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla . " ";
        
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //listar una cierta cantidad de propiedades (registros)
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //consulta los datos a la db y los trae como objetos
    public static function consultarSQL($query){
        //consultar db
        $resultado = self::$db->query($query);
        //iterar resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
        //liberar la memoria
        $resultado->free();
        //retornar resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    
    //buscar un registro por su id
    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);//trae el primer elemento de un array, en ese caso el objeto solicitado
    }



    //sincronizar el objeto en memoria con los cambios de actualizar
    public function sincronizar( $args = [] ){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
        
    }
}