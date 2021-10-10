<?php

function conectarDB(): mysqli {
    $db = mysqli_connect('us-cdbr-east-04.cleardb.com', 'b02a45bdc5990a', '5ad0803d', 'heroku_04b338d5eb68cd3');

    if (!$db) {
        echo "Error fallo al conectar";
        exit;
    }
    return $db;
}