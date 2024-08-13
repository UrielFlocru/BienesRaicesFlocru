<?php

namespace App;

class Vendedor extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'vendedores'; 
    protected static $columnsDb = ['id', 'nombre', 'apellido', 'telefono'];

    //Atributos
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar (){
        if (!$this->nombre){  
            self::$errores[]= "Debes agregar el nombre";
        }
        if (!$this->apellido){  
            self::$errores[]= "Debes agregar un apellido";
        }
        if (!$this->telefono){  
            self::$errores[]= "Debes agregar un numero telefónico";
        }

        if (!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[]= "Número de telefono invalido";

        }

    

        return self::$errores;

    }


}