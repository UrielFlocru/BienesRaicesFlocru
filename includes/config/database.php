<?php
function conectarDb () : mysqli{
    $db= new mysqli("localhost","root","password","bienesraices_crud","3306");
    
    if (!$db){
        echo "No Conectada";
        exit;
    }

    return $db;
}   

