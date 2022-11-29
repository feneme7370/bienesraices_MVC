<?php 

namespace Models;

class Admin extends ActiveRecord{
    //base de datos
    protected static $table = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar(){
        if(!$this->email){
            self::$errores[] = 'se debe ingresar un mail';
        }
        if(!$this->password){
            self::$errores[] = 'se debe ingresar un password';
        }
        return self::$errores;
    }
    public function existeUsuario(){
        //revisar si un usuario existe o no
        $query = "SELECT * FROM " . self::$table . " WHERE email =  '" . $this->email . "'  LIMIT 1";
        //consulta desde ActiveRecord
        $resultado = self::$db->query($query);
        
        if(!$resultado->num_rows){
            self::$errores[] = "el usuario no existe";
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();

        //comprueba el password ingresado $this con el hash de la db $usuario
        //$autenticado = password_verify($this->password, $usuario->password);
 
        $autenticado = $this->password === $usuario->password;
        
        if(!$autenticado){
            self::$errores[] = "el password no existe";
            return false;
        }
        return $autenticado;
    }
    public function autenticar(){
        session_start();
        //llenar el arreglo de session
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        header('Location: /admin');
    }
}

?>
