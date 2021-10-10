<?php
// importar conexion base de datosS
require __DIR__ . '/../config/database.php';
$db = conectarDB();

// colsultar
$query = "select * from propiedades limit ${limite}";
// leer los resultados
$resutado = mysqli_query($db, $query);

?>

<div class="contendor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resutado)) : ?>
    <div class="anuncio">
        <img loading="lazy " src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">
        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
            <p class="precio"><?php echo $propiedad['precio']; ?>€</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Ver Propiedad</a>
        </div>
        <!--contenido-anuncio-->
    </div>
    <!--anuncio-->
    <?php endwhile; ?>

    <?php

    // cerrar conexion
    mysqli_close($db);
    ?>