<?php

    require 'includes/app.php';

    //Importar clase
    use App\Propiedad;

    //Validamos el id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if (!$id) {
        header('location: anuncios.php');
    }

    //Buscar propiedad
    $propiedad = Propiedad::find($id);
    
    //Validar si existe propiedad
    if (!$propiedad){
        header('location: anuncios.php');
    }

    //Plantilla header
    incluirTemplate('header');
    
?>

    <main class="contenedor contenido-centrado">
        <h1><?php echo $propiedad->titulo; ?></h1>

        <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen;?>" alt="anuncio">

        <p class="precio"><?php echo $propiedad->precio; ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img loading="lazy" src="build/img/icono_wc.svg" alt="icono_wc">
                <p><?php echo $propiedad->baños; ?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono_habitacion">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>
        
        <p><?php echo $propiedad->descripcion; ?></p>
                
    </main>

    <?php 
        incluirTemplate('footer');
    ?>