<?php

namespace App;

class Propiedad extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'propiedades'; 
    protected static $columnsDb = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'baños', 'estacionamiento','fecha', 'vendedores_id' ];

    //Atributos
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $baños;
    public $estacionamiento;
    public $fecha;
    public $vendedores_id;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->baños = $args['baños'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->fecha = date('Y/m/d');
        $this->vendedores_id = $args['vendedor'] ?? '';
    }

    public function validar (){
        if (!$this->titulo){  
            self::$errores[]= "Debes agregar un título";
        }
        if (!$this->precio){  
            self::$errores[]= "Debes agregar un precio";
        }
        if (strlen($this->descripcion)<50){  
            self::$errores[]= "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }
        if (!$this->habitaciones){
            self::$errores[]= "Debes agrear el número de habitaciones";
        }
        if (!$this->baños){
            self::$errores[]= "Debes agrear el número de baños";
        }
        if (!$this->estacionamiento){
            self::$errores[]= "Debes agrear el número de espacios para estacionar";
        }
        if (!$this->vendedores_id){
            self::$errores[]= "Debes seleccionar un vendedor";
        }
        if (!$this->imagen){
            self::$errores[]= "La imagen es obligatoria";
        }

        return static::$errores;

    }

}
