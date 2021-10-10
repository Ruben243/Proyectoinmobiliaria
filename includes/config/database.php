<?php

function conectarDB(): mysqli {
    $db = mysqli_connect('eu-cdbr-west-01.cleardb.com
', 'ba447d123d76ff', '1900ef98', 'heroku_fe37d45214b15de');

    if (!$db) {
        echo "Error fallo al conectar";
        exit;
    }
    return $db;
}