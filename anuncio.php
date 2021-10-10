<?php
require 'includes/funciones.php';
includeTemplate('header');

require 'includes/config/database.php';
$db = conectarDB();

// colsultar
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
    header('Location: /admin');
}

// $consulta propiedad especifica
$consultaPropiedad = "select * from propiedades where id=${id}";
$resultadoPropiedad = mysqli_query($db, $consultaPropiedad);
$propiedad = mysqli_fetch_assoc($resultadoPropiedad);

if (!$resultadoPropiedad->num_rows) {
    header('Location: /index.php');
}

?>
<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad['titulo']; ?></h1>
    <img loading="lazy " src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">


    <div class="resumen-propiedad">
        <p class="precio"><?php echo $propiedad['precio']; ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" src="build/img/icono_wc.svg" alt="icono wc">
                <p><?php echo $propiedad['wc']; ?></p>
            </li>
            <li>
                <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p><?php echo $propiedad['estacionamiento']; ?></p>
            </li>

            <li>
                <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                <p><?php echo $propiedad['habitaciones']; ?></p>
            </li>

        </ul>
        <p><?php echo $propiedad['descripcion']; ?> </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo placeat deleniti tenetur sunt, velit
            expedita
            ipsum eum obcaecati in laborum laboriosam vel aliquid aperiam similique praesentium ex perferendis?
            Amet,
            sit Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima nostrum delectus laborum neque
            quisquam
            quidem officiis a magni, nam ipsum dolorem praesentium quae reiciendis amet cupiditate sunt accusamus
            rerum
            sequi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et iure similique laudantium
            necessitatibus, magnam temporibus nobis expedita quia totam iusto distinctio molestiae fugiat sequi cum
            eveniet debitis voluptates quaerat id. </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo placeat deleniti tenetur sunt, velit
            expedita
            ipsum eum obcaecati in laborum laboriosam vel aliquid aperiam similique praesentium ex perferendis?
            Amet,
            sit Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima nostrum delectus laborum neque
            quisquam
            quidem officiis a magni, nam ipsum dolorem praesentium quae reiciendis amet cupiditate sunt accusamus
            rerum
            sequi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et iure similique laudantium
            necessitatibus, magnam temporibus nobis expedita quia totam iusto distinctio molestiae fugiat sequi cum
            eveniet debitis voluptates quaerat id. </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo placeat deleniti tenetur sunt, velit
            expedita
            ipsum eum obcaecati in laborum laboriosam vel aliquid aperiam similique praesentium ex perferendis?
            Amet,
            sit Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima nostrum delectus laborum neque
            quisquam
            quidem officiis a magni, nam ipsum dolorem praesentium quae reiciendis amet cupiditate sunt accusamus
            rerum
            sequi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et iure similique laudantium
            necessitatibus, magnam temporibus nobis expedita quia totam iusto distinctio molestiae fugiat sequi cum
            eveniet debitis voluptates quaerat id. </p>
    </div>


</main>


<?php
include 'includes/templates/footer.php';
mysqli_close($db);
?>