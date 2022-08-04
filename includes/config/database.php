<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '', 'bienesraices_crud');

    if(!$db) {
        echo "Error, no se estableció la conexión";
        exit;
    }
    
    return $db;
}
