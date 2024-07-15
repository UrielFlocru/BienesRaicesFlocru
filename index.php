<?php
    require 'includes/funciones.php';
    incluirTemplate('header',$inicio=true);
    
?>

    <main class="contenedor">
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
        
    </main>
    
    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture> 
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
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

                    <a href="anuncio.html" class="boton-amarillo-block">Ver Propiedad</a>
                </div>
            </div>
            <div class="anuncio">
                <picture> 
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio2.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa terminados de lujo</h3>
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

                    <a href="anuncio.html" class="boton-amarillo-block">Ver Propiedad</a>
                </div>
            </div>
            <div class="anuncio">
                <picture> 
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio3.jpg" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa con alberca</h3>
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

                    <a href="anuncio.html" class="boton-amarillo-block">Ver Propiedad</a>
                </div>
            </div>
        </div>

        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra las clase de tus sueños</h2>
        <p>Llena el siguiente formulario y un asesor se pondra en contacto contigo a la brevedad.</p>
        <a href="contacto.html" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source src="build/img/blog1.webp" type="image/webp">
                        <source src="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
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
                    <a href="entrada.html">
                        <h4>Guía para la decoracion de tu hogar</h4>
                        <p>Escrito el: <span>20/06/2024</span> por <span>Admin</span></p>

                        <p>Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles y colores
                            para darle vida a tu espacio.
                        </p>

                    </a>

                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención
                    y la casa que me ofrecieron cumplió con todas mis expecativas.
                </blockquote>
                <p>-Flocru</p>
            </div>
        </section>
    </div>

<?php incluirTemplate('footer');?>