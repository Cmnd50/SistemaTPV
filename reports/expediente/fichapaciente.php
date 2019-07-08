<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Ficha de Paciente</title>
      <link href="../../web/template/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../web/template/font-awesome/css/font-awesome.css" rel="stylesheet">
      <link href="../../web/template/css/animate.css" rel="stylesheet">
      <link href="../../web/template/css/style.css" rel="stylesheet">
      <link rel="apple-touch-icon" sizes="76x76" href="../../web/template2/assets/img/apple-icon.png" />
      <link rel="icon" type="image/png" href="../../web/template/img/uqsolutions.png" />
   </head>
   <?php include '../../include/dbconnect.php'; ?>
   <?php 
      $d = 0;
      $idpersona =$_POST['idpersona'];
      
           $queryobtenerinformaciongeneral = "SELECT 
                        p.CodigoPaciente as 'Codigo',
                        CONCAT(p.Nombres,' ',p.Apellidos) as 'NombrePaciente',
                        p.dui as 'DUI',
                        p.FechaNacimiento as 'FNacimiento',
                        p.Direccion as 'Direccion',
                        g.Nombre as 'Municipio',
                        pa.NombrePais as 'Pais',
                        (select nombre from geografia where IdGeografia = (select IdPadre from geografia where IdGeografia = p.IdGeografia)) as 'Departamento',
                        p.Telefono as 'Telefono',
                        p.Celular as 'Celular',
                        p.Genero as 'Genero',
                        ec.Nombre as 'EstadoC',
                        p.FechaNacimiento as 'FechaNac',
                        TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) AS 'Edad',
                        CONCAT(p.NombresResponsable,' ',p.ApellidosResponsable) as 'NombreResponsable',
                        p.DuiResponsable as 'DuiResp',
                        p.TelefonoResponsable as 'TelResp',
                        p.Parentesco as 'Parentezco',
                        p.Categoria as 'Categoria',
                        p.Alergias as 'Alergias',
                        p.Medicamentos as 'Medicamentos',
                        p.Enfermedad as 'EnfermedadP'
                        FROM persona p
                        INNER JOIN geografia g on p.IdGeografia = g.IdGeografia
                        INNER JOIN estadocivil ec on p.IdEstadoCivil = ec.IdEstadoCivil
                        INNER JOIN pais pa on p.IdPais = pa.IdPais
                        WHERE p.IdPersona = $idpersona";
            $resultadoobtenerinformaciongeneral = $mysqli->query($queryobtenerinformaciongeneral);
            while ($test = $resultadoobtenerinformaciongeneral->fetch_assoc()) {
                 $CodPaciente = $test['Codigo'];
                 $NombrePaciente = $test['NombrePaciente'];
                 $DUIprint = $test['DUI'];
                 $FNacimiento = $test['FNacimiento'];
                 $Direccion = $test['Direccion'];
                 $Municipio = $test['Municipio'];
                 $Paisprint = $test['Pais'];
                 $Departamentoprint = $test['Departamento'];
                 $Telefono = $test['Telefono'];
                 $Celular = $test['Celular'];
                 $Genero = $test['Genero'];
                 $EstadoC = $test['EstadoC'];
                 $FechaNac = $test['FechaNac'];
                 $Edad = $test['Edad'];
                 $NombreResponsable = $test['NombreResponsable'];
                 $DuiResp = $test['DuiResp'];
                 $TelResp = $test['TelResp'];
                 $Parentezco = $test['Parentezco'];
                 $Categoria = $test['Categoria'];
                 $Alergias = $test['Alergias'];
                 $Medicamentos = $test['Medicamentos'];
                 $EnfermedadP = $test['EnfermedadP'];
             }
      
           $queryobtenerhistoclinico = "SELECT c.Nombre as Pregunta, (case when IdRespuesta is null then b.Detalle
                  else (select Nombre from respuesta where IdRespuesta = b.IdRespuesta) end) as Respuesta
                    FROM test a
                    LEFT JOIN testdetalle b on a.IdTest = b.IdTest
                    LEFT JOIN pregunta c on b.IdPregunta = c.IdPregunta
                    WHERE a.IdPersona=5993 and b.IdFactor=2";
             //echo  $queryfichaconsulta;
             $resultadoobtenerhistoclinico = $mysqli->query($queryobtenerhistoclinico);
      
            $queryobtenersocioeconomico = "SELECT c.Nombre as Pregunta, (case when IdRespuesta is null then b.Detalle
                  else (select Nombre from respuesta where IdRespuesta = b.IdRespuesta) end) as Respuesta
                    FROM test a
                    LEFT JOIN testdetalle b on a.IdTest = b.IdTest
                    LEFT JOIN pregunta c on b.IdPregunta = c.IdPregunta
                    WHERE a.IdPersona=5993 and b.IdFactor=1";
             //echo  $queryfichaconsulta;
             $resultadoobtenersocioeconomico = $mysqli->query($queryobtenersocioeconomico);
      
             $queryobtenervacunacion = "SELECT c.Nombre as Pregunta, (case when IdRespuesta is null then b.Detalle
                  else (select Nombre from respuesta where IdRespuesta = b.IdRespuesta) end) as Respuesta
                    FROM test a
                    LEFT JOIN testdetalle b on a.IdTest = b.IdTest
                    LEFT JOIN pregunta c on b.IdPregunta = c.IdPregunta
                    WHERE a.IdPersona=5993 and b.IdFactor=3";
             //echo  $queryfichaconsulta;
             $resultadoobtenervacunacion = $mysqli->query($queryobtenervacunacion);
           
      ?>
   <body class="white-bg" >
      <div class="wrapper wrapper-content">
         <div class="ibox-content">
            <div class="row">
               <div class="col-xs-2">
                  <div style='position: relative;'>
                     <img src='../../web/uploads/usuarios/logo.jpg' style='width: 100px; height: 90px;' />
                  </div>
               </div>
               <div class="col-xs-5">
                  <h2>FICHA DE PACIENTE</h2>
                  <small>
                     <address>
                        <strong>CENTRO MEDICO FAMILIAR SHALOM</strong><br>
                        Bo Concepción Cl José Mariano Calderón No 11, Stgo Texac<br>
                        Santiago Texacuangos - San Salvador<br>
                        <abbr title="Phone">P:</abbr> (503) 2220-8689
                     </address>
                  </small>
               </div>
               <div class="col-xs-3">
               </div>
               <div class="col-xs-2">
                  <br>
                  <center>
                     <div id="barcode"></div>
                  </center>
               </div>
            </div>
            <h3>DATOS PERSONALES</h3>
            <div class="row">
               <div class="col-xs-5">
                  <strong>DUI:</strong> / DUI
               </div>
               <div class="col-xs-5">
                  <?php echo $DUIprint; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Nombre Completo:</strong> / Complete Name
               </div>
               <div class="col-xs-5">
                  <?php echo $NombrePaciente; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Direccion:</strong>/ Address
               </div>
               <div class="col-xs-5">
                  <?php echo $Direccion; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Departamento</strong> / Departament
               </div>
               <div class="col-xs-5">
                  <?php echo $Departamentoprint; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Municipio</strong> / Municipality
               </div>
               <div class="col-xs-5">
                  <?php echo $Municipio; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Telefono</strong> / Phone
               </div>
               <div class="col-xs-5">
                  <?php echo $Telefono; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Celular</strong> / Cellphone
               </div>
               <div class="col-xs-5">
                  <?php echo $Celular; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Sexo</strong> 
               </div>
               <div class="col-xs-5">
                  <?php echo $Genero; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Fecha de Nacimiento</strong> / Birthdate
               </div>
               <div class="col-xs-5">
                  <?php echo $FNacimiento; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Edad</strong> / Age
               </div>
               <div class="col-xs-5">
                  <?php echo $Edad; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Correo Electronico</strong> / E-Mail
               </div>
               <div class="col-xs-5">
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Facebook</strong> / Facebook
               </div>
               <div class="col-xs-5">
               </div>
            </div>
            <br>
            <h3>DATOS DEL RESPONSABLE</h3>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Responsable</strong> / Responsible Adult
               </div>
               <div class="col-xs-5">
                  <?php echo $NombreResponsable; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>DUI Responsable</strong> / DUI Responsible
               </div>
               <div class="col-xs-5">
                  <?php echo $DuiResp; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Parentesco</strong> / Family Relationship
               </div>
               <div class="col-xs-5">
                  <?php echo $Parentezco; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Categoria</strong> / Category
               </div>
               <div class="col-xs-5">
                  <?php echo $Categoria; ?>
               </div>
            </div>
            <br>
            <h3>DATOS MEDICOS</h3>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Alergias</strong> / Responsible Adult
               </div>
               <div class="col-xs-5">
                  <?php echo $Alergias; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Medicamentos</strong> / Responsible Adult
               </div>
               <div class="col-xs-5">
                  <?php echo $Medicamentos; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-5">
                  <strong>Enfermedades</strong> / Responsible Adult
               </div>
               <div class="col-xs-5">
                  <?php echo $EnfermedadP; ?>
               </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <center>
               <small>
                  <address>CENTRO MEDICO FAMILIAR SHALOM, Santiago Texacuangos, San Salvador </address>
               </small>
            </center>
            <center>
               <small>
                  <address><?php echo ++$d ?></address>
               </small>
            </center>
            <br>
            <div class="row">
               <div class="col-xs-8">
                  <h3>HISTORIAL CLINICO</h3>
               </div>
               <div class="col-xs-4">
                  <small>
                     <address>PACIENTE: <?php echo $NombrePaciente; ?> <br> CODIGO: <?php echo $CodPaciente ?> </address>
                  </small>
               </div>
            </div>
            <br>
            <table class="table table-striped table-hover table-bordered" >
               <?php
                  $i=0;
                     echo"<thead>";
                     echo"<tr>";
                     echo"<th class='text-center' style='width: 5%'>No.</th>";
                     echo"<th class='text-center' style='width: 55%'>Pregunta</th>";
                     echo"<th class='text-center' style='width: 40%'>Valor</th>";
                     echo"</tr>";
                     echo"</thead>";
                     echo"<tbody>";
                     
                       while ($row = $resultadoobtenerhistoclinico->fetch_assoc()) {
                           echo"<tr>";
                           echo "<td class='text-center'>". ++$i . "</td>";
                           echo"<td>" . $row['Pregunta'] . "</td>";
                           echo"<td>" . $row['Respuesta'] . "</td>";
                           echo"</tr>";
                           echo"</body>  ";
                       }
                     ?>
            </table>
            <br><br><br><br><br><br><br><br><br>
            <center>
               <small>
                  <address>CENTRO MEDICO FAMILIAR SHALOM, Santiago Texacuangos, San Salvador </address>
               </small>
            </center>
            <center>
               <small>
                  <address><?php echo ++$d ?></address>
               </small>
            </center>
            <br>
            <div class="row">
               <div class="col-xs-8">
                  <h3>SOCIOECONOMICO</h3>
               </div>
               <div class="col-xs-4">
                  <small>
                     <address>PACIENTE: <?php echo $NombrePaciente; ?> <br> CODIGO: <?php echo $CodPaciente ?> </address>
                  </small>
               </div>
            </div>
            <br>
            <table class="table table-striped table-hover table-bordered" >
               <?php
                  $i=0;
                     echo"<thead>";
                     echo"<tr>";
                     echo"<th class='text-center' style='width: 5%'>No.</th>";
                     echo"<th class='text-center' style='width: 55%'>Pregunta</th>";
                     echo"<th class='text-center' style='width: 40%'>Valor</th>";
                     echo"</tr>";
                     echo"</thead>";
                     echo"<tbody>";
                     
                       while ($row = $resultadoobtenersocioeconomico->fetch_assoc()) {
                           echo"<tr>";
                           echo "<td class='text-center'>". ++$i . "</td>";
                           echo"<td>" . $row['Pregunta'] . "</td>";
                           echo"<td>" . $row['Respuesta'] . "</td>";
                           echo"</tr>";
                           echo"</body>  ";
                       }
                     ?>
            </table>
            <br>
            <h3>VACUNACION</h3>
            <br>
            <table class="table table-striped table-hover table-bordered" >
               <?php
                  $i=0;
                     echo"<thead>";
                     echo"<tr>";
                     echo"<th class='text-center' style='width: 5%'>No.</th>";
                     echo"<th class='text-center' style='width: 55%'>Pregunta</th>";
                     echo"<th class='text-center' style='width: 40%'>Valor</th>";
                     echo"</tr>";
                     echo"</thead>";
                     echo"<tbody>";
                     
                       while ($row = $resultadoobtenervacunacion->fetch_assoc()) {
                           echo"<tr>";
                           echo "<td class='text-center'>". ++$i . "</td>";
                           echo"<td>" . $row['Pregunta'] . "</td>";
                           echo"<td>" . $row['Respuesta'] . "</td>";
                           echo"</tr>";
                           echo"</body>  ";
                       }
                     ?>
            </table>
            <br><br><br><br><br>
            <center>
               <small>
                  <address>CENTRO MEDICO FAMILIAR SHALOM, Santiago Texacuangos, San Salvador </address>
               </small>
            </center>
            <center>
               <small>
                  <address><?php echo ++$d ?></address>
               </small>
            </center>
         </div>
      </div>
      <!-- Mainly scripts -->
      <script src="../../web/template/js/jquery-3.1.1.min.js"></script>
      <script src="../../web/template/barcode/jquery-barcode.min.js"></script>
      <script src="../../web/template/js/bootstrap.min.js"></script>
      <script src="../../web/template/js/plugins/metisMenu/jquery.metisMenu.js"></script>
      <!-- Custom and plugin javascript -->
      <script src="../../web/template/js/inspinia.js"></script>
   </body>
</html>
<script type="text/javascript">
   $(function() {   
    $("#barcode").barcode(
     "<?php echo $CodPaciente ?>", // Valor del codigo de barras
   "code128" // tipo (cadena)
   );
    window.print();
    window.close();
   });
</script>