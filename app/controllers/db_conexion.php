<?php
$usuario = 'root';
$clave = '';
$db = 'g_love';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $clave, $db);

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

?>