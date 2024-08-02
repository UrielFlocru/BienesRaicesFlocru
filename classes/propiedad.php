<?php

namespace App;

class Propiedad {

    //Base de datos
    protected static $db;
    protected static $columnsDb = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'baños', 'estacionamiento','fecha', 'vendedores_id' ];
    protected static $errores = [];

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
        $this->habitaciones = $args['rooms'] ?? '';
        $this->baños = $args['wc'] ?? '';
        $this->estacionamiento = $args['car'] ?? '';
        $this->fecha = date('Y/m/d');
        $this->vendedores_id = $args['vendedor'] ?? '';


    }


    public function create (){

        //Samitizar la entrada de datos
        $atributos = $this->sanitizarAtributos();

        //Insertar en la base de datos
        $query = "INSERT INTO propiedades (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query( $query );
        return $resultado;

    }

    public static function setDb ($database) {
        self::$db = $database;
    }

    //Identificar y unir atributos de la BD
    public function atributos (){
        $atributos = [];
        foreach (self::$columnsDb as $columna){
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtributos (){
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string( $value );
        }

        return $sanitizado;
    }


    public function setImage ($image){
        if ($image){
            $this->imagen=$image;
        }
        
    }

    //Errores
    public static function getErrores (){
        return self::$errores;
    }

    //Validar
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

        return self::$errores;

    }


}
