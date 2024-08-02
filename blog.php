<?php
    require 'includes/app.php';
    incluirTemplate('header');
    
?>

    <main class="contenedor contenido-centrado">
        <h1>Nuestro Blog</h1>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source src="build/img/blog1.webp" type="image/webp">
                    <source src="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/06/2024</span> por <span>Admin</span></p>

                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores
                        materiales y ahorrando dinero.
                    </p>
                    
                </a>

            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source src="build/img/blog2.webp" type="image/webp">
                    <source src="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/06/2024</span> por <span>Admin</span></p>

                    <p>Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles y colores
                        para darle vida a tu espacio.
                    </p>

                </a>

            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source src="build/img/blog2.webp" type="image/webp">
                    <source src="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/06/2024</span> por <span>Admin</span></p>

                    <p>Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles y colores
                        para darle vida a tu espacio.
                    </p>

                </a>

            </div>
        </article>

        
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source src="build/img/blog2.webp" type="image/webp">
                    <source src="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/06/2024</span> por <span>Admin</span></p>

                    <p>Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles y colores
                        para darle vida a tu espacio.
                    </p>

                </a>

            </div>
        </article>
    </main>

    <?php incluirTemplate('footer');?>