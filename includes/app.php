<?php

    require 'funciones.php';
    require 'config/database.php';
    require __DIR__. '/../vendor/autoload.php';

    //Conectar a base de datos
    $db = conectarDb();

    use App\ActiveRecord;

    ActiveRecord::setDb($db);

