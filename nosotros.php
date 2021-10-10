<?php
require 'includes/funciones.php';
includeTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Conoce sobre Nosotros</h1>
    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
            </picture>
        </div>
        <div class="texto-nosotros">
            <blockquote>25 Años de Experiencia</blockquote>

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui, sequi dolorem! Laborum nemo id
                deleniti minus velit, voluptatibus culpa voluptatum quam hic in omnis, quasi ipsa ex natus facere
                beatae Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi id voluptates vero
                voluptatum veritatis nesciunt dignissimos cumque, neque est eaque nisi labore inventore dolores
                libero possimus fugit maiores quae a. </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ducimus optio sed maxime eos
                laboriosam, natus et, culpa error doloribus recusandae ipsum quae ad architecto blanditiis incidunt
                eveniet at impedit. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque repudiandae
                beatae, reiciendis neque fugit est culpa voluptates doloribus deserunt esse quo exercitationem?
                Facere sequi excepturi ducimus molestiae. Enim, eveniet quas.</p>

        </div>
    </div>
</main>
</header>
<section class="contenedor seccion">
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
</section>



<?php
includeTemplate('footer');
?>