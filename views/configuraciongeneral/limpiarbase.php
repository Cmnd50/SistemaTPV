<?php

require_once '../../include/dbconnect.php';

$consultaquerytablas = "SELECT IdLimpiarTabla, Query, Orden FROM limpiartablas WHERE Activo = 1 ORDER BY Orden ASC";
$resultadoconsultaquerytablas = $mysqli->query($consultaquerytablas);

while ($test = $resultadoconsultaquerytablas->fetch_assoc()) {
	$query = $test['Query'];

	$accionquery = "$query";
	$resultadoaccionquery = $mysqli->query($accionquery);
	header('Location: ../../web/configuraciongeneral/index');
}
