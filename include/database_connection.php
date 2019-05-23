<?php

//database_connection.php
$array = split("\n", file_get_contents('C:\xampp\htdocs\SistemaTPV\config\db.txt'));
$localhost = $array[0];
$db = trim($array[1]);
$usuario = trim($array[2]);
$clave = trim($array[3]);


$connect = new PDO('mysql:host=localhost;dbname='. $db.'',''.$usuario.'',''.$clave.'');

?>