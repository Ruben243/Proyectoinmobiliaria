<?php
require '../includes/funciones.php';
$auth = estaAutenticado();
if (!$auth) {
    header('Location:/index.php');
}
// importar la conexsion
require '../includes/config/database.php';
$db = conectarDB();
// escribir el query
$query = "SELECT * FROM propiedades";

// Consultar la DB
$res = mysqli_query($db, $query);


//muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if ($id) {
        // eliminar archivo
        $query = "select imagen from propiedades where id=${id}";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink('../imagenes/' . $propiedad['imagen']);

        // eliminar propiedad
        $query = "delete from propiedades where id=${id}";
        $resultadoDelete = mysqli_query($db, $query);
        if ($resultado) {
            header('Location:/admin?resultado=3');
        }
    }
}
includeTemplate('header');
?>
<main class="contenedor seccion">
    <h1>ADMINISTRADOR DE BIENES RAICES</h1>
    <?php if (intval($resultado) === 1) : ?>
    <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php elseif (intval($resultado) === 2) : ?>
    <p class="alerta exito">Anuncio Actualizado correctamente</p>

    <?php elseif (intval($resultado) === 3) : ?>
    <p class="alerta exito">Anuncio Eliminado correctamente</p>

    <?php endif; ?>
    <a href="propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
</main>
<table class="propiedades">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <!--Mostrar resultados-->
        <?php while ($propiedad = mysqli_fetch_assoc($res)) : ?>
        <tr>
            <td><?php echo $propiedad['id']; ?></td>
            <td><?php echo $propiedad['titulo']; ?></td>
            <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"></td>
            <td><?php echo $propiedad['precio']; ?></td>
            <td>
                <form method="POST" class="w-100">
                    <input type="hidden" name="id" value="<?php echo $propiedad['id'] ?>">
                    <input type="submit" value="Eliminar" class="boton-rojo-block">

                </form>
                <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'];  ?>"
                    class="boton-verde-block">Actualizar</a>
            </td>
        </tr>

        <?php endwhile ?>
    </tbody>
</table>
<?php
// cerrar la conxion
mysqli_close($db);

includeTemplate('footer');
?>