<?php

require_once '../../include/dbconnect.php';
session_start();

      $idmedicamento = $_POST["id"];

      $querytablamedicamentos = "SELECT IdMedicamento As 'IdMedicamento' ,m.NombreMedicamento As 'Medicamento', u.NombreUnidadMedida As 'Presentacion', c.NombreCategoria As 'Categoria',
                                    l.NombreLaboratorio As 'Laboratorio', m.Existencia As 'Existencia'
                              FROM medicamentos m
                              INNER JOIN laboratorio l on m.IdLaboratorio = l.IdLaboratorio
                              INNER JOIN categoria c on m.IdCategoria = c.IdCategoria
                              INNER JOIN unidadmedida u on m.IdUnidadMedida = u.IdUnidadMedida
                              WHERE IdMedicamento = '$idmedicamento'
                              ORDER BY Medicamento ASC";
      $resultadotablamedicamentos = $mysqli->query($querytablamedicamentos);

      $datos = array();

               while ($test = $resultadotablamedicamentos->fetch_assoc())
                     {
                         $datos["IdMedicamento"] = $test['IdMedicamento'];
                         $datos["Medicamento"] = $test['Medicamento'];
                         $datos["Presentacion"] = $test['Presentacion'];
                         $datos["Categoria"] = $test['Categoria'];
                         $datos["Laboratorio"] = $test['Laboratorio'];
                         $datos["Existencia"] = $test['Existencia'];
                     }

       header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
