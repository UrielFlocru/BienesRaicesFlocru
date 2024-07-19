<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
    
?>

    <main class="seccion contenedor">
        <h1>Casas y Depas en Venta</h1>
        <?php
            $limite = 6;
            include 'includes/templates/anuncios.php'; 
        ?>

    </main>

    <?php incluirTemplate('footer');?>