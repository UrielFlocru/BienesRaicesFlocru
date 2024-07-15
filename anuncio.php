<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
    
?>

    <main class="contenedor contenido-centrado">
        <h1>Casa en Venta</h1>

        <picture>
            <source srcset="build/img/anuncio1.webp" type="image/webp">
            <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
        </picture>
            
        <h3>Casa de Lujo en el Lago</h3>
        <p>Casa en el lago con excelente vista y a buen precio</p>
        <p class="precio">$3,000,000</p>
        <ul class="iconos-caracteristicas">
            <li>
                <img loading="lazy" src="build/img/icono_wc.svg" alt="icono_wc">
                <p>3</p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                <p>3</p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono_habitacion">
                <p>4</p>
            </li>
        </ul>
        
        <p>Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Quidem, quam? Perferendis, animi
            deleniti quam dignissimos qui quae id ratione perspiciatis
            deleniti quam dignissimos qui quae id ratione perspiciatis
            deleniti quam dignissimos qui quae id ratione perspiciatis
            deleniti quam dignissimos qui quae id ratione perspiciatis
            deleniti quam dignissimos qui quae id ratione perspiciatis
            ex vitae iste quia, doloribus, quos quisquam harum dolor
            reiciendis?
        </p>
        <p>Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Quidem, quam? Perferendis, animi
            deleniti quam dignissimos qui quae id ratione perspiciatis
            deleniti quam dignissimos qui quae id ratione perspiciatis
            ex vitae iste quia, doloribus, quos quisquam harum dolor
            reiciendis?
        </p>
                
    </main>

    <?php incluirTemplate('footer');?>