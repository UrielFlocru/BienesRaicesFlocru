<?php
    //Importar la base de datos

    $db = conectarDb();

    //Consultar

    $query = "SELECT * FROM propiedades LIMIT {$limite}";

    //Guardar el resultado

    $resultado = mysqli_query($db, $query);



?>



<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) :?>
    <div class="anuncio">

        <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen'];?>" alt="anuncio">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
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

            <a href="anuncio.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">Ver Propiedad</a>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php 
    //Cerrar la conmexion
    mysqli_close($db);
?>