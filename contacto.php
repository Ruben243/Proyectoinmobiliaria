<?php
require 'includes/funciones.php';
includeTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
    </picture>

    <h2>Rellene el formulario de contacto</h2>
    <form class="formulario">
        <fieldset>
            <legend>Informacion Personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="nombre">

            <label for="email">Email</label>
            <input type="email" placeholder="Tu email" id="email">

            <label for="telefono">Telefono</label>
            <input type="tel" placeholder="Tu telefono" id="telefono">

            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="opcion">Vende o Compra</label>
            <select name="opciones" id="opciones">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>
            <label for="presupuesto">Presupuesto</label>
            <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto">
        </fieldset>

        <fieldset>
            <legend>informacion de Contacto</legend>
            <p>Forma de Contacto preferida</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                <label for="contactar-email">Email</label>
                <input name="contacto" type="radio" value="email" id="contactar-email">
            </div>
           


            <script src="build/js/bundle.min.js"></script>
            </body>

            </html>

            <p>Si eligío telefono,elija la fecha y la hora </p>


            <label for="fecha">Fecha</label>
            <input type="date" id="fecha">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00">
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">

    </form>
</main>

<?php
includeTemplate('footer');
?>
