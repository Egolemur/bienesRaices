<?php

// Conexion a la Base de Datos
$DB = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');

// Crear un email y password
$email = 'correo@correo.com';
$password = '123456';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Query para insertar en la DB
$query = "INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}');";

echo $query;


// Agregar a la DB

mysqli_query($DB, $query);