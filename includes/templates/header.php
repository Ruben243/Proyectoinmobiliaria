<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Inmobiliaria benitez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>Inmobiliaria</title>
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">
                    <img src="/build/img/logo.svg" alt="logotipo empresa">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu resposive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="boton para dark mode">
                    <nav class="navegacion">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncios</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>

                        <?php if ($auth) : ?>
                        <a href="/admin/index.php">Administrador</a>
                        <a href="/cerrarsesion.php">Cerar Sesion</a>
                        <?php elseif (!$auth) : ?>
                        <a href="/login.php">Iniciar Sesion</a>
                        <?php endif ?>
                    </nav>
                </div>

            </div>
            <!--Cierre barra-->
            <?php
            if ($inicio) {
                echo '<h1>Venta de casas y Departamentos exclusivos de lujo</h1>';
            }
            ?>
        </div>
    </header>