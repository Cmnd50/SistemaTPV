  <?php

require_once '../../include/dbconnect.php';
session_start();

 $queryexpedientesu = "SELECT 
			CASE WHEN per.Genero = 'Masculino' THEN COUNT(per.Genero) ELSE 0 END as 'CountMasculino', 
			CASE WHEN per.Genero = 'Femenino' THEN COUNT(per.Genero) ELSE 0 END as 'CountFemenino',
			CASE MONTH(con.FechaConsulta) 
			WHEN 1 THEN 'Enero'
			WHEN 2 THEN  'Febrero'
			WHEN 3 THEN 'Marzo' 
			WHEN 4 THEN 'Abril' 
			WHEN 5 THEN 'Mayo'
			WHEN 6 THEN 'Junio'
			WHEN 7 THEN 'Julio'
			WHEN 8 THEN 'Agosto'
			WHEN 9 THEN 'Septiembre'
			WHEN 10 THEN 'Octubre'
			WHEN 11 THEN 'Noviembre'
			WHEN 12 THEN 'Diciembre'
			END as 'Mes', YEAR(con.FechaConsulta) as 'Anio'
			FROM consulta con
			INNER JOIN persona per on per.IdPersona = con.IdPersona
			GROUP BY CASE MONTH(con.FechaConsulta) 
			WHEN 1 THEN 'Enero'
			WHEN 2 THEN  'Febrero'
			WHEN 3 THEN 'Marzo' 
			WHEN 4 THEN 'Abril' 
			WHEN 5 THEN 'Mayo'
			WHEN 6 THEN 'Junio'
			WHEN 7 THEN 'Julio'
			WHEN 8 THEN 'Agosto'
			WHEN 9 THEN 'Septiembre'
			WHEN 10 THEN 'Octubre'
			WHEN 11 THEN 'Noviembre'
			WHEN 12 THEN 'Diciembre'
			END
			ORDER BY con.FechaConsulta";


$resultadoexpedientesu = $mysqli->query($queryexpedientesu);

   $datos = array();

            while ($test = $resultadoexpedientesu->fetch_assoc())
                  {
                      $datos["CountMasculino"] = $test['CountMasculino'];
                      $datos["CountFemenino"] = $test['CountFemenino'];
                      $datos["Mes"] = $test['Mes'];
                      $datos["Anio"] = $test['Anio'];

                  }

    header("Content-Type","application/json");

    print_r(json_encode($datos));
