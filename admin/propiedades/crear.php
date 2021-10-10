<?php
require '../../includes/funciones.php';
$auth = estaAutenticado();
if (!$auth) {
    header('Location:/index.php');
}
require '../../includes/config/database.php';
$db = conectarDB();

//consulta para los vendedores
$consulta = "select * from vendedores";
$res = mysqli_query($db, $consulta);


includeTemplate('header');
//ARREGLO CON MENSAJES DE ERRORES
$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = "";
$creado = date('Y/m/d');

//ejecutar ell codiigo despues de enviar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Sanitizar los datos introducidos por el usuario
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "El precio es obligatorio";
    }
    if (!$imagen['name'] || $imagen['error']) {
        $errores[] = "La imagen es requerida";
    }
    // Validar imagen por tamaño (1mb maximo)
    $medida = 1000 * 1000;
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es demasiado grande";
    }

    if (strlen($descripcion) < 50 && !$descripcion) {
        $errores[] = "La descripcion es obligatoria y tiene que tener mas de 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "Indica el numero de habitaciones";
    }
    if (!$wc) {
        $errores[] = "Indica el numero de servicios";
    }
    if (!$estacionamiento) {
        $errores[] = "Indica el numero de estacionamientos";
    }
    if (!$vendedorId) {
        $errores[] = "Elije un vendedor";
    }


    if (empty($errores)) {

        /*  Subida de archivos   */
        // crear nombe de la carpeta
        $carpetaImagenes = '../../imagenes/';
        // verificar que no existe
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }
        // generar nombre aleatorio y añadir la extension
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        // Subir imagenes
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);



        //insertar base de datos
        $query = "insert into propiedades(titulo,precio,imagen,descripcion,habitaciones,wc,estacionamiento,creado,vendedorId) 
    values('$titulo','$precio','$nombreImagen','$descripcion','$habitaciones','$wc','$estacionamiento','$creado','$vendedorId')";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            //Redireccion al usuario
            header('Location:/admin?resultado=1');
        }
    }
}

?>
<main class="contenedor seccion">
    <h1>CREAR</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php
    foreach ($errores as $error) : ?>
    <div class="alerta error">
        <?php echo $error;  ?>
    </div>
    <?php endforeach  ?>

    <form action="/admin/propiedades/crear.php" method="POST" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <legend>
                Informacion General
            </legend>
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name='titulo' placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name='precio' placeholder="Precio Propiedad" value="<?php echo $precio ?>">

            <label for="imagen">imagen</label>
            <input type="file" id="imagen" name='imagen' accept="image/jpeg,image/png" name="imagen">

            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $titulo ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="habitaciones">Habitaciones</label>
            <input type="number" id="habitaciones" name='habitaciones' placeholder="Ej:3" min="1" max="9"
                value="<?php echo $habitaciones ?>">

            <label for="wc">Baños</label>
            <input type="number" id="wc" name='wc' placeholder="Ej:3" min="1" max="9" value="<?php echo $wc ?>">

            <label for="estacionamientos">Estacionamientos</label>
            <input type="number" id="estacionamientos" name='estacionamiento' placeholder="Ej:3" min="1" max="9"
                value="<?php echo $estacionamiento ?>">


        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="vendedor">
                <option value="">--Seleccione un vendedor--</option>
                <?php while ($vendedor = mysqli_fetch_assoc($res)) : ?>
                <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?>
                    value="<?php echo $vendedor['id']; ?>">
                    <?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php
includeTemplate('footer');
?>