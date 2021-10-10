<?php

declare(strict_types=1);
require 'includes/funciones.php';;
includeTemplate('header', $inicio = true);
?>
<main class="contenedor seccion">
    <h1>Mas sobre nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>seguridad</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam similique, voluptatum at nobis in
                illo, eligendi nihil obcaecati magnam culpa fuga et facilis officia ducimus ratione maiores id.
                Blanditiis, exercitationem?</p>
        </div>

        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam similique, voluptatum at nobis in
                illo, eligendi nihil obcaecati magnam culpa fuga et facilis officia ducimus ratione maiores id.
                Blanditiis, exercitationem?</p>
        </div>
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono Tiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam similique, voluptatum at nobis in
                illo, eligendi nihil obcaecati magnam culpa fuga et facilis officia ducimus ratione maiores id.
                Blanditiis, exercitationem?</p>
        </div>
    </div>
</main>
<section class="seccion contenedor">
    <h2>Propiedades en Venta</h2>
    <?php
    $limite = 3;
    include 'includes/templates/anuncios.php';

    ?>

    <div class="alinear-derecha">
        <a href="anuncios.php" class="boton-verde">Ver Todas</a>
    </div>
</section>
<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Rellena el formulario de contacto y un asesor se pondra en contacto contigo</p>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class=entrada-blog>
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type=imagen/webp>
                    <source srcset="build/img/blog1.jpg" type=imagen/jpeg>
                    <img src="build/img/blog1.jpg" alt="Texto enrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>
                    <p>Consejos para construir una terraza en el techo de tu casa,con los mejores materiales y
                        ahorrando dinero</p>
                </a>
            </div>
        </article>

        <article class=entrada-blog>
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type=imagen/webp>
                    <source srcset="build/img/blog2.jpg" type=imagen/jpeg>
                    <img src="build/img/blog2.jpg" alt="Texto enrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoracion de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>21/10/2021</span> por: <span>Admin</span> </p>
                    <p>Maximiza el espacio en tu hogar con esta guia,aprende a combinar colores y muebles para
                        darle vida a u espacio </p>
                </a>
            </div>
        </article>
    </section>


    <section class="testimoniales">
        <h3>Testimonios</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comporto de una anera excelente, muy buena atencion y la casa que me ofrecieron
                cumple
                con todas mis expectativas
            </blockquote>
            <p>-Ruben Gines</p>
        </div>
    </section>
</div>
<?php
includeTemplate('footer');
?>