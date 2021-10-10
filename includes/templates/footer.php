<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

?>

<footer class="footer seccion">
    <div class="contenedor contenedor-footer">
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
    <p class="copyright">Todos los derechos Reservados <?php echo date('Y') ?> &copy;</p>
</footer>


<script src="/build/js/bundle.min.js"></script>
</body>

</html>