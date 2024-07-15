<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
    
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Imagen Nosotros">
                </picture>
            </div>
            
            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Praesentium ratione dignissimos nam ab, numquam voluptatibus 
                    rem nemo omnis optio vel harum illum ullam minima, perspiciatis quas. 
                    Doloribus, doloremque. Molestias, odit! Lorem ipsum dolor sit, amet consectetur 
                    adipisicing elit. Quia sit possimus, necessitatibus voluptatum eveniet perspiciatis 
                    explicabo veritatis mollitia dicta rerum quo minus suscipit consectetur exercitationem
                    illum in tempora vel officia.
                </p>
    
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt 
                    dolorem illo libero odit consectetur, tempore, ad minus voluptatem 
                    optio cupiditate at doloremque numquam sequi eaque unde. Magni repellendus 
                    voluptate reiciendis?
                </p>
    
                
            </div>

        </div>
        
    </main>
    <section class="contenedor">
        <h1>Mas Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Suspendisse maximus sapien sit amet enim aliquet ornare. Integer 
                imperdiet ut diam eu efficitur. Quisque luctus ac urna in elementum. 
                Fusce vitae neque orci.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Suspendisse maximus sapien sit amet enim aliquet ornare. Integer 
                imperdiet ut diam eu efficitur. Quisque luctus ac urna in elementum. 
                Fusce vitae neque orci.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Suspendisse maximus sapien sit amet enim aliquet ornare. Integer 
                imperdiet ut diam eu efficitur. Quisque luctus ac urna in elementum. 
                Fusce vitae neque orci.</p>
            </div>

        </div>
        
    </section>

    <?php incluirTemplate('footer');?>