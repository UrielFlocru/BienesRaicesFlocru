<?php
function conectarDb () : mysqli{
    $db= mysqli_connect("localhost","root","password","bienesraices_crud","3306");
    
    if (!$db){
        echo "No Conectada";
        exit;
    }

    return $db;
}   

