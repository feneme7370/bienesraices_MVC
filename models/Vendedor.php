<?php
//subnombre para la clase por si se repiten
namespace Models;

class Vendedor extends ActiveRecord{

    protected static $tabla = ' vendedores ';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    //se asignan los datos enviados del formulario a los atributos de la clase, vacios en caso de que algo no llegue
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    //funcion que va llenando el static array errores si hay campos que incumplen, retorna el array con los datos
    public function validar(){

        if(!$this->nombre){
            self::$errores[] = "debes insertar un nombre al vendedor";
        }
        if(!$this->apellido){
            self::$errores[] =  "debes insertar un apellido al vendedor";
        }
        if(!$this->telefono){
            self::$errores[] =  "ingresar un numero de telefono";
        }
        //buscar un patron dentro de un texto, solo numeros del 0 al 9
        if(!preg_match('/[0-9]/', $this->telefono)){
            self::$errores[] =  "formato de telefono no valido";
        }
        
        return self::$errores;
    }
};