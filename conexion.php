<?php
define('DB_SERVER','localhost');
define('DB_NAME','bd_proyecto');
define('DB_USER','root');
define('DB_PASS','');

$conexion = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if($conexion->connect_error){
    die("Conexion fallida: ".$conexion->connect_error);
}

?>