<?php

function conectarDB(): mysqli {
    $db = mysqli_connect('', '', '', '');

    if (!$db) {
        echo "Error fallo al conectar";
        exit;
    }
    return $db;
}