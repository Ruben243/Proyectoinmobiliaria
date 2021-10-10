<?php
require 'includes/config/database.php';
$db = conectarDB();

$errores = [];
// autenticar usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio o no es valido";
    }
    if (!$password) {
        $errores[] = "El password es obligatorio o no es valido";
    }

    if (empty($errores)) {

        // comprobar si existe el usuario
        $query = "select * from usuarios where email='${email}'";

        $resultado = mysqli_query($db, $query);
        if ($resultado->num_rows) {
            // revisar usuario correcto
            $usuario = mysqli_fetch_assoc($resultado);

            // verificar si el password es correcto o no   
            $auth = password_verify($password, $usuario['password']);
            if ($auth) {
                // usuario autenticado
                session_start();
                // llenar array de sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
                header("Location:/admin/index.php");
            } else {
                // no autentificado
                $errores[] = "El password es erroneo";
            }
        } else {
            $errores[] = "El Usuario no existe";
        }
    }
}

require 'includes/funciones.php';
includeTemplate('header');

?>
<main class="contenedor seccion contenido-centrado">
    <h1>INICIAR SESION</h1>
    <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>
    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Tu email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu password" id="password" required>
        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>

<?php
includeTemplate('footer');
?>