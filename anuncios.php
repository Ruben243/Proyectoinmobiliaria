<?php
require 'includes/funciones.php';
includeTemplate('header');
?>
<main class="contenedor seccion">
    <section class="seccion contenedor">
        <h2>Propiedades en Venta</h2>

        <?php
        $limite = 10;
        include 'includes/templates/anuncios.php';

        ?>

</main>

<?php
include 'includes/templates/footer.php';
?>