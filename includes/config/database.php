<?php

function conectarDB(): mysqli {
    $db = mysqli_connect('localhost:3306', 'ruben', 'Cuelebre243*', 'bienesRaices');

    if (!$db) {
        echo "Error fallo al conectar";
        exit;
    }
    return $db;
}