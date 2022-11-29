<?php
//subnombre para la clase por si se repiten
namespace Models;

class Propiedad extends ActiveRecord{

    protected static $tabla = ' propiedades ';

    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'wc', 'estacionamiento', 'habitaciones', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    //se asignan los datos enviados del formulario a los atributos de la clase, vacios en caso de que algo no llegue
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date("Y/m/d");
        $this->vendedorId = $args['vendedorId'] ?? '';
    }
    
    //funcion que va llenando el static array errores si hay campos que incumplen, retorna el array con los datos
    public function validar(){

        if(!$this->titulo){
            self::$errores[] = "debes insertar un titulo a la propiedad";
        }
        if(!$this->precio){
            self::$errores[] =  "debes insertar un precio a la propiedad";
        }
        if(strlen($this->descripcion) < 10 ){
            self::$errores[] =  "debes insertar una descripcion con al menos 50 caracteres";
        }
        if(!$this->wc){
            self::$errores[] =  "ingresar cantidad de baños";
        }
        if(!$this->estacionamiento){
            self::$errores[] =  "ingresar cantidad de estacionamiento";
        }
        if(!$this->habitaciones){
            self::$errores[] =  "ingresar cantidad de habitaciones";
        }
        if(!$this->vendedorId){
            self::$errores[] =  "tienes que ingresar un vendedor";
        }

        if(!$this->imagen){
            self::$errores[] =  "tienes que cargar la foto de portada";
        }
        
        return self::$errores;
    }
};