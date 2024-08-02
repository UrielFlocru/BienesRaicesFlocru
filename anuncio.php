<?php

    //Validamos el id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if (!$id) {
        header('location: anuncios.php');
    }

    require 'includes/app.php';
    //Importamos la conexion

    $db = conectarDb();

    //Creacion del query
    $query = "SELECT * FROM propiedades WHERE id = {$id}";
    //Guardar resultado
    $resultado = mysqli_query($db, $query);

    //Validacion para verificar si existe el id
    if ($resultado->num_rows === 0) {
        header('location: anuncios.php');
    }

    $propiedad = mysqli_fetch_assoc($resultado);




    //Plantilla header

    incluirTemplate('header');
    
?>

    <main class="contenedor contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen'];?>" alt="anuncio">

        <p class="precio"><?php echo $propiedad['precio']; ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img loading="lazy" src="build/img/icono_wc.svg" alt="icono_wc">
                <p><?php echo $propiedad['baños']; ?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                <p><?php echo $propiedad['estacionamiento']; ?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono_habitacion">
                <p><?php echo $propiedad['habitaciones']; ?></p>
            </li>
        </ul>
        
        <p><?php echo $propiedad['descripcion']; ?></p>
                
    </main>

    <?php 
        incluirTemplate('footer');
        //Cerrar conexion base de datos
        mysqli_close($db);
    ?>