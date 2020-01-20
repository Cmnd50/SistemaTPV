<?php
$id = $model->IdPersona;
$bc = $model->CodigoPaciente;


$querydepartamentos = "SELECT IdPersona, TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) AS EDAD, concat(Nombres,' ',Apellidos) as 'Nombre Completo',
  CASE WHEN TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) < 15 THEN 'PEDIATRIA'
     WHEN FechaNacimiento IS NULL THEN 'FECHA DE NACIMIENTO SIN REGISTRARSE' ELSE 'GENERAL' END AS 'CLASIFICACION',
  CASE WHEN Direccion = '' THEN 'ACTUALIZAR DIRECCION' ELSE 'ACTUALIZADO' END as 'DIRECCION',
  CASE WHEN genero = '' THEN 'ACTUALIZAR GENERO' ELSE 'ACTUALIZADO' END AS 'GENERO',
  CASE WHEN FechaNacimiento IS NULL THEN 'FECHA DE NACIMIENTO SIN REGISTRARSE'
     WHEN TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) < 15 AND NombresResponsable = '' THEN 'ACTUALIZAR RESPONSABLE' 
  ELSE 'ACTUALIZADO' END AS 'RESPONSABLE'
FROM persona WHERE IdPersona = $id";
$resultadodepartamentos = $mysqli->query($querydepartamentos);
while ($test = $resultadodepartamentos->fetch_assoc()) {
    $direccion = $test['DIRECCION'];
    $responsable = $test['RESPONSABLE'];
    $genero = $test['GENERO'];
    $edad = $test['EDAD'];
}

//OBTENER CONFIGURACION GENERAL
$queryobtenerconfig = "SELECT IpServidora, NombreCarpeta, UnidadServer FROM configuraciongeneral WHERE IdConfiguracionGeneral = 1";
$resultadoobtenerconfig = $mysqli->query($queryobtenerconfig);
while ($test = $resultadoobtenerconfig->fetch_assoc()) {
    $ip = $test['IpServidora'];
    $unidad = $test['UnidadServer'];
    $nombrecarpeta = $test['NombreCarpeta'];
}


//OBTENER ID DEL MODULO
$queryobtenermodulomedgeneral = "SELECT IdModulo FROM modulo WHERE NombreModulo = 'Medicina General'";
$resultadoobtenermodulomedgeneral = $mysqli->query($queryobtenermodulomedgeneral);
while ($test = $resultadoobtenermodulomedgeneral->fetch_assoc()) {
    $medgeneral = $test['IdModulo'];
}


$queryobtenermodulopediatria = "SELECT IdModulo FROM modulo WHERE NombreModulo = 'Pediatria'";
$resultadoobtenermodulopediatria = $mysqli->query($queryobtenermodulopediatria);
while ($test = $resultadoobtenermodulopediatria->fetch_assoc()) {
    $pediatria = $test['IdModulo'];
}


$queryobtenermoduloginecologia = "SELECT IdModulo FROM modulo WHERE NombreModulo = 'Ginecologia'";
$resultadoobtenermoduloginecologia = $mysqli->query($queryobtenermoduloginecologia);
while ($test = $resultadoobtenermoduloginecologia->fetch_assoc()) {
    $ginecologia = $test['IdModulo'];
}


//SET IDGEOGRAFIA, IDPAIS, IDPERSONA
$IdGeografia = $model->IdGeografia;
$IdPais = $model->IdPais;
$idpersonaid = $model->IdPersona;
$idpersona = $model->IdPersona;

//SET GEOGRAFIA
$queryobtenermunicipiodepa = "SELECT GEO1.Nombre as 'Municipio', (SELECT Nombre FROM geografia GEO2 where GEO2.IdGeografia = GEO1.IdPadre) as 'Departamento'
       FROM geografia GEO1 where GEO1.IdGeografia = '$IdGeografia'";
//echo  $queryfichaconsulta;
$resultadoobtenermunicipiodepa = $mysqli->query($queryobtenermunicipiodepa);
while ($test = $resultadoobtenermunicipiodepa->fetch_assoc()) {
    $Municipio = $test['Municipio'];
    $Departamento = $test['Departamento'];
}

$queryobtenerpais = "SELECT NombrePais FROM pais where IdPais = '$IdPais'";
$resultadoobtenerpais = $mysqli->query($queryobtenerpais);
while ($test = $resultadoobtenerpais->fetch_assoc()) {
    $Pais = $test['NombrePais'];
}


$queryusuario = "SELECT u.IdUsuario, CONCAT(u.Nombres,  ' ', u.Apellidos) as 'NombreCompleto'
         from usuario u
         inner join puesto = p on u.IdPuesto = p.IdPuesto
         where u.IdUsuario = 3 and u.Activo = 1 ";
$resultadousuario = $mysqli->query($queryusuario);


$querymodulo = "SELECT * FROM modulo WHERE IdModulo in(3,6,7) order by NombreModulo asc";
$resultadomodulo = $mysqli->query($querymodulo);


$querytablaenfermedad = "SELECT IdEnfermedad, CONCAT(CodigoICD,' ',Nombre) AS 'Nombre' FROM enfermedad";
$resultadotablaenfermedad = $mysqli->query($querytablaenfermedad);

// CONSULTA PARA CARGAR LA TABLA DE LAS CONSULTAS EN EL EXPEDIENTE DEL PACIENTE MEDICINA GENERAL
$querytablaconsulta = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                                            CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.NombreModulo As 'Especialidad', c.IdEstado as 'Estado'
                                            FROM consulta c
                                            INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                                            INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                                            INNER JOIN persona p ON c.IdPersona = p.IdPersona
                                            WHERE c.Activo = 0 AND c.IdPersona = $idpersonaid and C.IdModulo = '$medgeneral' AND c.Consultaimaurl is null
                                            ORDER BY c.FechaConsulta DESC";
$resultadotablaconsulta = $mysqli->query($querytablaconsulta);


// CONSULTA PARA CARGAR LA TABLA DE LAS CONSULTAS EN EL EXPEDIENTE DEL PACIENTE PEDIATRIA
$querytablaconsultapediatria = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                                            CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.NombreModulo As 'Especialidad', c.IdEstado as 'Estado'
                                            FROM consulta c
                                            INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                                            INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                                            INNER JOIN persona p ON c.IdPersona = p.IdPersona
                                            WHERE c.Activo = 0 AND c.IdPersona = $idpersonaid and C.IdModulo = '$pediatria' AND c.Consultaimaurl is null
                                            ORDER BY c.FechaConsulta DESC";
$resultadotablaconsultapediatria = $mysqli->query($querytablaconsultapediatria);


// CONSULTA PARA CARGAR LA TABLA DE LAS CONSULTAS EN EL EXPEDIENTE DEL PACIENTE GINECOLOGIA
$querytablaconsultaginecologia = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                                            CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.NombreModulo As 'Especialidad', c.IdEstado as 'Estado'
                                            FROM consulta c
                                            INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                                            INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                                            INNER JOIN persona p ON c.IdPersona = p.IdPersona
                                            WHERE c.Activo = 0 AND c.IdPersona = $idpersonaid and C.IdModulo = '$ginecologia' AND c.Consultaimaurl is null
                                            ORDER BY c.FechaConsulta DESC";
$resultadotablaconsultaginecologia = $mysqli->query($querytablaconsultaginecologia);

// CONSULTA PARA CARGAR LA TABLA DE LOS EXAMENES FINALIZADOS EN EL EXPEDIENTE DEL PACIENTE
$querytablaexamenes = "SELECT le.IdListaExamen As 'IdListaExamen', c.IdConsulta As 'Consulta', le.FechaExamen As 'Fecha', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', te.IdTipoExamen As IdTipoExamen, te.NombreExamen As 'Examen', le.Activo
                                 FROM listaexamen le
                                 INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
                                 INNER JOIN persona p ON le.IdPersona = p.IdPersona
                                 LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
                                 INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
                                           WHERE le.Activo = 0 and le.IdPersona = $idpersonaid
                                           ORDER BY le.FechaExamen DESC";
$resultadotablaexamenes = $mysqli->query($querytablaexamenes);




// CONSULTA PARA CARGAR LA TABLA DE LAS CONSULTAS CARGADAS EN PDF PARA LOS EXPEDIENTES DEL PACIENTE
$querytablaconsultasima = "SELECT IdConsulta, FechaConsulta, Consultaimaurl FROM consulta where Consultaimaurl IS NOT NULL and IdPersona = $idpersonaid and IdModulo = '$medgeneral' ORDER BY FechaConsulta DESC";
$resultadotablaconsultasima = $mysqli->query($querytablaconsultasima);


// CONSULTA PARA CARGAR LA TABLA DE LAS CONSULTAS CARGADAS EN PDF PARA LOS EXPEDIENTES DEL PACIENTE EN PEDIATRIA
$querytablaconsultasimaped = "SELECT IdConsulta, FechaConsulta, Consultaimaurl FROM consulta where Consultaimaurl IS NOT NULL and IdPersona = $idpersonaid and IdModulo = '$pediatria' ORDER BY FechaConsulta DESC";
$resultadotablaconsultasimaped = $mysqli->query($querytablaconsultasimaped);

// CONSULTA PARA CARGAR LA TABLA DE LAS CONSULTAS CARGADAS EN PDF PARA LOS EXPEDIENTES DEL PACIENTE EN GINECOLOGIA
$querytablaconsultasgineco = "SELECT IdConsulta, FechaConsulta, Consultaimaurl FROM consulta where Consultaimaurl IS NOT NULL and IdPersona = $idpersonaid and IdModulo = '$ginecologia' ORDER BY FechaConsulta DESC";
$resultadotablaconsultasgineco = $mysqli->query($querytablaconsultasgineco);


// CONSULTA PARA CARGAR LA TABLA DE LOS PROCEDIMIENTOS CARGADOS EN PDF PARA LOS EXPEDIENTES DEL PACIENTE
$querytablaprocedimientoima = "SELECT IdEnfermeriaProcedimiento, FechaProcedimiento, Procedimientoimaurl FROM enfermeriaprocedimiento where Procedimientoimaurl IS NOT NULL and IdPersona = $idpersonaid  ORDER BY FechaProcedimiento DESC";
$resultadotablaprocedimientoima = $mysqli->query($querytablaprocedimientoima);

// CONSULTA PARA CARGAR LA TABLA DE LAS RECETAS CARGADAS EN PDF PARA LOS EXPEDIENTES DEL PACIENTE
$querytablarecetasima = "SELECT IdReceta, Fecha, Consultaimaurl FROM receta where Consultaimaurl IS NOT NULL and IdPersona = $idpersonaid  ORDER BY Fecha DESC";
$resultadotablarecetasima = $mysqli->query($querytablarecetasima);

// CONSULTA PARA CARGAR EL CBO DE LOS EXAMENES
$querytipoexamen = "SELECT IdTipoExamen, NombreExamen, DescripcionExamen FROM tipoexamen";
$resultadotipoexamen = $mysqli->query($querytipoexamen);


// CONSULTA PARA CARGAR LAS ENFERMEDADES
$querytablaenfermedad2 = "SELECT IdEnfermedad, CONCAT(CodigoICD,' ',Nombre) AS 'Nombre'
                                            FROM enfermedad";
$resultadotablaenfermedad2 = $mysqli->query($querytablaenfermedad2);
