<?php

include '../../include/dbconnect.php';
session_start();

$id = $_POST["IdGeografia"];
$query = "SELECT IdGeografia,Nombre from geografia where IdPadre='$id' order by Nombre";

$tbl = $mysqli->query($query);
$datos = array();

while ($f = $tbl->fetch_assoc())
{
  $datos[] = $f;
}

header("Content-Type","application/json");
print_r(json_encode($datos));

?>