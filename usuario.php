<?php 

    //Importar la base de datos
    require 'includes/config/database.php';
    $db = conectarDb();

    //Crear un email y un password
    $email = "uafc102010@gmail.com";
    $pass = "12345678";
    $passHash = password_hash($pass, PASSWORD_DEFAULT);

    // Query para crear los usuarios
    $query = "INSERT INTO users (email, password) VALUES ('{$email}', '{$passHash}'); ";

    // Insertar en la base de datos
    mysqli_query($db, $query);





