<?php

namespace App;

class ActiveRecord {

    //Base de datos
    protected static $db;
    protected static $columnsDb = [];
    protected static $errores = [];
    protected static $tabla = "";

    public function create (){

        //Samitizar la entrada de datos
        $atributos = $this->sanitizarAtributos();

        //Insertar en la base de datos
        $query = "INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query( $query );
        if ($resultado){
            // Redireccionar al usuario
            header ('Location: ../index.php?resultado=1' );
        }
    }

    public function update(){
        //Samitizar la entrada de datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key=>$value){
            $valores[] = "{$key} = '{$value}'";
        }

        $query = "UPDATE " . static::$tabla. " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id). "' " ;
        $query .= "LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado){
            // Redireccionar al usuario
            header ('Location: ../index.php?resultado=2' );
        }
    }

    public function delete (){
        //Eliminar la propiedad
        $query = "DELETE FROM ". static::$tabla ." WHERE id = ". self::$db->escape_string($this->id . " LIMIT 1");
        $resultado = self::$db->query($query);

        if ($resultado){
            $this->deleteImg();
            header("location: index.php?resultado=3");
        }
    }

    public static function setDb ($database) {
        self::$db = $database;
    }

    //Identificar y unir atributos de la BD
    public function atributos (){
        $atributos = [];
        foreach (static::$columnsDb as $columna){
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
        //Eliminar imagen previa
        if (!is_null($this->id)){
            $this->deleteImg();
        }

        //Setear imagen
        if ($image){
            $this->imagen=$image;
        }
    }

    public function deleteImg(){
        //Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }

    }

    //Errores
    public static function getErrores (){
        
        return static::$errores;
    }

    //Validar
    public function validar (){
        static::$errores = [];
        return static::$errores;
    }

    //Listar todas las propiedades
    public static function all() {
        $query = "SELECT * FROM ".static::$tabla;
        $resultado = self::consultarSQL($query);
        
        return $resultado;
    }
    //Encontrar propiedad
    public static function find($id){
        $query= "SELECT * FROM ". static::$tabla . " WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    //Sincronizar el objeto en memoria
    public function sincronizar ($args = []){
        foreach ($args as $key=>$value){
            if (property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }

    }

    public static function consultarSQL($query){
        //Consultar base de datos
        $resultado = self::$db->query($query);
        //Iterar los resultados
        $array = [];

        while ($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
        //Liberar la memoria
        $resultado->free();

        //Retornar los resultados
        return $array;

    }

    protected static function crearObjeto ($registro){
        //Creando una nueva instancia del mismo objeto
        $objeto = new static;

        //Asignando los valores de la base de datos 
        foreach ($registro as $key=> $value){
            if (property_exists($objeto ,$key)){
                $objeto->$key = $value;

            }
        } 
        return $objeto;
    }
    //Mostrar cierto número de registros
    public static function getRegisters($limit){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $limit;
        $resultado = self::consultarSQL($query);
        return $resultado;

    }


}
