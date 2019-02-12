<?php
   use yii\helpers\Html;
   use yii\widgets\DetailView;
   
   
   include '../include/dbconnect.php';
   
   
   /* @var $this yii\web\View */
   /* @var $model app\models\Persona */
   
   $idpersonaid = $model->IdPersona;
   $idusuarioid = $_SESSION['IdUsuario'];
   $enfermeria = $_SESSION['user'];
   $dates = date('Y-m-d');
   
    // CONSULTA PARA CARGAR EL CBO DE LOS EXAMENES
    $querytiporayosx = "SELECT IdTipoRayosx, NombreRayosx, DescripcionRayosx FROM tiporayosx";
    $resultadotiporayosx = $mysqli->query($querytiporayosx);
   
   // CONSULTA PARA CARGAR EL CBO DE LOS RAYOS X
    $querytipoexamen = "SELECT IdTipoExamen, NombreExamen, DescripcionExamen FROM tipoexamen";
    $resultadotipoexamen = $mysqli->query($querytipoexamen);
   
    // CONSULTA PARA CARGAR EXPEDIENTE DEL PACIENTE
    $queryexpedientes = "SELECT PER.IdPersona as 'IdPersona', PER.Nombres as 'Nombres', PER.APellidos as 'Apellidos', PER.FechaNacimiento, Direccion, PER.Dui, PER.IdGeografia, GEO.Nombre as 'NombreDepartamento', PER.Genero, EC.Nombre as 'IdEstadoCivil', Correo, IdParentesco, Telefono, Celular, Alergias, Medicamentos, Enfermedad, TelefonoResponsable, NombresResponsable, 
             ApellidosResponsable, Parentesco, DuiResponsable, PA.NombrePais as 'Pais', CONCAT(PER.Nombres,' ',PER.Apellidos) as 'Paciente'
      FROM persona PER
      INNER JOIN geografia GEO on PER.IdGeografia = GEO.IdGeografia
      LEFT JOIN estadocivil EC on PER.IdEstadoCivil = EC.IdEstadoCivil
      LEFT JOIN pais PA on PER.IdPais = PA.IdPais WHERE IdPersona  = '$idpersonaid'";
    $resultadoexpedientes = $mysqli->query($queryexpedientes);
    while ($test = $resultadoexpedientes->fetch_assoc()) {
      $nombres = $test['Nombres'];
      $apellidos = $test['Apellidos'];
      $dui = $test['Dui'];
      $idpersona = $test['Paciente'];
      $duiresponsable = $test['DuiResponsable'];
      $fnacimiento = $test['FechaNacimiento'];
      $geografia = $test['IdGeografia'];
      $departamento = $test['NombreDepartamento'];
      $direccion = $test['Direccion'];
      $genero = $test['Genero'];
      $estadocivil = $test['IdEstadoCivil'];
      $nombreResponsable = $test['NombresResponsable'];
      $apellidoResponsable = $test['ApellidosResponsable'];
      $parentesco = $test['Parentesco'];
      $telefono = $test['Telefono'];
      $celular = $test['Celular'];
      $correo = $test['Correo'];
      $alergias = $test['Alergias'];
      $medicinas = $test['Medicamentos'];
      $enfermedad = $test['Enfermedad'];
      $pais = $test['Pais'];
      $telefonoresponsable = $test['TelefonoResponsable'];
      $date = date("Y-m-d H:i:s");
    }
   
   
    // CONSULTA PARA CARGAR DEPARTAMENTOS EN EL EXPEDIENTE
    $querydepartamentos = "SELECT * FROM geografia WHERE IdGeografia='$geografia'";
    $resultadodepartamentos = $mysqli->query($querydepartamentos);
   
   
   
   
    // CONSULTA PARA CARGAR LA TABLA DE LAS CONSULTAS EN EL EXPEDIENTE DEL PACIENTE
    $querytablaconsulta = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                                         CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.NombreModulo As 'Especialidad', c.IdEstado as 'Estado'
                                         FROM consulta c
                                         INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                                         INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                                         INNER JOIN persona p ON c.IdPersona = p.IdPersona
                                         WHERE c.Activo = 0 AND c.IdPersona = $idpersonaid
                                         ORDER BY c.FechaConsulta DESC";
    $resultadotablaconsulta = $mysqli->query($querytablaconsulta);
   
    $querytablaconsulta2 = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                                         CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.Descripcion As 'Especialidad', c.IdEstado as 'Estado'
                                         FROM consulta c
                                         INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                                         INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                                         INNER JOIN persona p ON c.IdPersona = p.IdPersona
                                         WHERE c.Activo = 0 AND c.IdPersona = $idpersonaid
                                         ORDER BY c.FechaConsulta DESC";
    $resultadotablaconsulta2 = $mysqli->query($querytablaconsulta2);
   
   
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
   
   
    // CONSULTA PARA CARGAR ENFERMEDADES EN SELECT DE DIAGNOSTICO
    $querytablaenfermedad = "SELECT IdEnfermedad, CONCAT(CodigoICD,' ',Nombre) AS 'Nombre'
                                          FROM enfermedad";
    $resultadotablaenfermedad = $mysqli->query($querytablaenfermedad);
   
   
    $querytablaenfermedad2 = "SELECT IdEnfermedad, CONCAT(CodigoICD,' ',Nombre) AS 'Nombre'
                                          FROM enfermedad";
    $resultadotablaenfermedad2 = $mysqli->query($querytablaenfermedad2);
   
    $querytablaenfermedadICD = "SELECT IdCodigoICD, NombreCodigo 
                                          FROM codigoicd";
    $resultadotablaenfermedadICD = $mysqli->query($querytablaenfermedadICD);
   
     $queryusuarioenfe = "SELECT u.IdUsuario as 'IdUsuario', CONCAT(u.Nombres,  ' ', u.Apellidos) as 'NombreCompletoEnf', p.Descripcion
        from usuario u
        inner join puesto = p on u.IdPuesto = p.IdPuesto
        where  u.Activo = 1 and u.InicioSesion = '$enfermeria'";
    $resultadousuarioenfe = $mysqli->query($queryusuarioenfe);
   
   
    $querytablaprocedimientos = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente',
                    CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Modulo',m.Descripcion As 'Moduloing', ep.FechaProcedimiento As 'Fecha',
                      mp.Nombre As 'Motivo', ep.Observaciones As 'Observaciones', ep.Estado As 'Estado'
                      FROM enfermeriaprocedimiento ep
                      INNER JOIN persona p ON p.IdPersona = ep.IdPersona
                      INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
                      INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
                      INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
                      WHERE p.IdPersona = '$idpersonaid' and ep.Estado = 2
                      order by ep.IdEnfermeriaProcedimiento DESC";
    $resultadotablaprocedimientos = $mysqli->query($querytablaprocedimientos);
   
   
    $querytablaconsultaprocedimientodeldia = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente',
          CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Modulo', m.Descripcion as 'ModuloIngles' ,ep.FechaProcedimiento As 'Fecha', 
            mp.Nombre As 'Motivo', ep.Observaciones As 'Observaciones', ep.Estado As 'Estado'   
            FROM enfermeriaprocedimiento ep
            INNER JOIN persona p ON p.IdPersona = ep.IdPersona
            INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
            INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
            INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
            WHERE p.IdPersona = '$idpersonaid' and FechaProcedimiento = '$dates'
            order by ep.IdEnfermeriaProcedimiento DESC";
   
    $resultadotablaconsultaprocedimientodeldia = $mysqli->query($querytablaconsultaprocedimientodeldia);
   
   
    $querytablaconsultatabla = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente',
          CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Modulo', ep.FechaProcedimiento As 'Fecha', 
            mp.Nombre As 'Motivo', ep.Observaciones As 'Observaciones', ep.Estado As 'Estado'   
            FROM enfermeriaprocedimiento ep
            INNER JOIN persona p ON p.IdPersona = ep.IdPersona
            INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
            INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
            INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
            WHERE p.IdPersona = '$idpersonaid' and FechaProcedimiento = '$dates'
            order by ep.IdEnfermeriaProcedimiento DESC";
   
    $resultadotablaconsultatabla = $mysqli->query($querytablaconsultatabla);
   
    $queryobteneridenfermedadprocedimiento = "SELECT ep.IdEnfermeriaProcedimiento As 'ID'  
            FROM enfermeriaprocedimiento ep
            INNER JOIN persona p ON p.IdPersona = ep.IdPersona
            INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
            INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
            INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
            WHERE p.IdPersona = '$idpersonaid' and FechaProcedimiento = '$dates'
            order by ep.IdEnfermeriaProcedimiento DESC";
   
    $resultadoobteneridenfermedadprocedimiento = $mysqli->query($queryobteneridenfermedadprocedimiento);
        if(mysqli_num_rows($resultadoobteneridenfermedadprocedimiento)==0){
      $IdEnfermeriaProcedimiento = 0;
    }
    else{
    while ($test = $resultadoobteneridenfermedadprocedimiento->fetch_assoc()) {
      $IdEnfermeriaProcedimiento = $test['ID'];
    }
    }
   
   
   
    $queryselectprocedimiento = "SELECT * FROM motivoprocedimiento";
    $resultadoselectprocedimiento = $mysqli->query($queryselectprocedimiento);
   
    $querymodulo = "SELECT * from modulo where NombreModulo = 'Enfermeria' order by NombreModulo asc";
    $resultadomodulo = $mysqli->query($querymodulo);
   
   
        // CONSULTA PARA CARGAR LA TABLA DE LAS EXAMENES ASIGNADOS AL PACIENTE
    $querytablaexameneslabasignados = "SELECT LE.IdListaExamen as 'IdListaExamen',TE.NombreExamen AS 'NombreExamen', TE.DescripcionExamen AS 'NombreExamening', CONCAT(US.Nombres,' ', US.Apellidos) As 'Medico', LE.Indicacion as 'Indicacion'  
                                        FROM listaexamen LE
                                        INNER JOIN TipoExamen TE on LE.IdTipoExamen = TE.IdTipoExamen
                                        INNER JOIN Usuario US on LE.IdUsuario = US.IdUsuario
                                        WHERE LE.Activo = 1 and LE.IdUsuario =  '$idusuarioid' and LE.IdEnfermeriaProcedimiento = $IdEnfermeriaProcedimiento";
    $resultadotablaexameneslabasignados = $mysqli->query($querytablaexameneslabasignados);
   
   
            // CONSULTA PARA CARGAR LA TABLA DE LOS RAYOS X ASIGNADOS AL PACIENTE
    $querytablarayosxasignados = "SELECT LE.IdListaRayosx as 'IdListaRayosx',TE.NombreRayosx AS 'NombreRayosx', TE.DescripcionRayosx AS 'NombreRayosxing', CONCAT(US.Nombres,' ', US.Apellidos) As 'Medico', LE.Indicacion as 'Indicacion'  
                                        FROM listarayosx LE
                                        INNER JOIN TipoRayosx TE on LE.IdTipoRayosx = TE.IdTipoRayosx
                                        INNER JOIN Usuario US on LE.IdUsuario = US.IdUsuario
                                        WHERE LE.Activo = 1 and LE.IdUsuario =  '$idusuarioid' and LE.IdEnfermeriaProcedimiento = $IdEnfermeriaProcedimiento";
    $resultadotablarayosxasignados = $mysqli->query($querytablarayosxasignados);
   
   
   $label = '';
   if($_SESSION['IdIdioma'] == 1){
    $label = 'Medico - Consulta';
   }else{
    $label = 'Physician - Visits';
   }   
   
   $this->title = $model->fullName;
   $this->params['breadcrumbs'][] = ['label' => $label, 'url' => ['index']];
   $this->params['breadcrumbs'][] = $this->title;
   
   ?>
<style>
   .example-modal .modal {
   position: relative;
   top: auto;
   bottom: auto;
   right: auto;
   left: auto;
   display: block;
   z-index: 1;
   }
   .example-modal .modal {
   background: transparent !important;
   }
</style>
<link rel="stylesheet" href="../template/parsley/parsley.css">
<script src="../template/parsley/parsley.min.js"></script>
<script src="../template/i18n/es.js"></script>
<div class="wrapper wrapper-content animated fadeIn">
<div class="row">
   <div class="col-lg-12">
      <div class="ibox float-e-margins">
         <div class="ibox-title">
            <h5 id='encabezadoform1'></h5>
            &nbsp;&nbsp;<small id='encabezadoform2'></small>
            <div class="ibox-tools">
            </div>
         </div>
         <div class="form-horizontal">
            <div class="tabs-container">
               <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#tab-CONSULTA" id='tabgeneral1'></a></li>
                  <li class=""><a data-toggle="tab" href="#tab-EXPEDIENTE" id='tabgeneral2'></a></li>
                  <li class=""><a data-toggle="tab" href="#tab-HISTORIAL" id='tabgeneral3'></a></li>
                  <li class="pull-right">
                     <?php if ($_SESSION['IdIdioma'] == 1 ){ ?>
                     <?php
                        $queryvalidacionprocedimientodiario = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente',
                          CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Modulo', ep.FechaProcedimiento As 'Fecha', 
                            mp.Nombre As 'Motivo', ep.Observaciones As 'Observaciones', ep.Estado As 'Estado'   
                            FROM enfermeriaprocedimiento ep
                            INNER JOIN persona p ON p.IdPersona = ep.IdPersona
                            INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
                            INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
                            INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
                            WHERE p.IdPersona = '$idpersonaid' and FechaProcedimiento = '$dates'
                            order by ep.IdEnfermeriaProcedimiento DESC";
                        $resultqueryvalidacionprocedimientodiario = $mysqli->query($queryvalidacionprocedimientodiario);
                        
                        if(mysqli_num_rows($resultqueryvalidacionprocedimientodiario)==0){?>
                     <button type="button" class="btn  btn-danger dim"   data-toggle="modal" data-target="#modalConsulta">Ingresar Diagnostico  <i class="fa fa-heart"></i></button>
                     <?php } else{?>
                     <button type="button" class="btn  btn-danger dim"   data-toggle="modal" data-target="#modalConsulta">Ingresar Diagnostico  <i class="fa fa-heart"></i></button>
                     <?php }?>   
                     <button type="button" class="btn  btn-info dim"  data-toggle="modal" data-target="#modalGuardarExamenes"> Ingresa Examen <i class="fa fa-bars"></i></button>
                     <?php } else {
                        ?>
                     <?php
                        $queryvalidacionprocedimientodiario = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente',
                          CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Modulo', ep.FechaProcedimiento As 'Fecha', 
                            mp.Nombre As 'Motivo', ep.Observaciones As 'Observaciones', ep.Estado As 'Estado'   
                            FROM enfermeriaprocedimiento ep
                            INNER JOIN persona p ON p.IdPersona = ep.IdPersona
                            INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
                            INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
                            INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
                            WHERE p.IdPersona = '$idpersonaid' and FechaProcedimiento = '$dates'
                            order by ep.IdEnfermeriaProcedimiento DESC";
                        $resultqueryvalidacionprocedimientodiario = $mysqli->query($queryvalidacionprocedimientodiario);
                        if(mysqli_num_rows($resultqueryvalidacionprocedimientodiario)==0){?>
                     <button type="button" class="btn  btn-danger dim"  data-toggle="modal" data-target="#modalConsulta">Data  <i class="fa fa-heart"></i></button>
                     <?php } else{?>
                     <button type="button" class="btn  btn-danger dim" style="display: none;"  data-toggle="modal" data-target="#modalConsulta">Enter Data  <i class="fa fa-heart"></i></button>
                     <?php }?>    
                     <button type="button" class="btn  btn-info dim"  data-toggle="modal" data-target="#modalGuardarExamenes"> LAB <i class="fa fa-bars"></i></button>
                     <button type="button" class="btn  btn-warning dim"  data-toggle="modal" data-target="#modalGuardarExamenes"> REF <i class="fa fa-folder-o"></i></button>
                     <button type="button" class="btn  btn-default dim"  data-toggle="modal" data-target="#modalGuardarRayosX"> X-Rays <i class="fa fa-times"></i></button>
                     <?php } ?>              
                  </li>
               </ul>
               <div class="tab-content">
                  <div class="tab-content">
                     <div id="tab-CONSULTA" class="tab-pane active">
                        <div class="panel-body">
                           <div class="box-header with-border">
                              <h4 class="box-title" id='tablaprocedimientohoy1'>PROCEDIMIENTO DE HOY</h4>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                              <table id="example2" class="table table-bordered table-hover">
                                 <?php
                                    echo"<thead>";
                                    echo"<tr>";
                                    echo"<th id='tablaprocedimientohoy2'>Fecha</th>";
                                    echo"<th id='tablaprocedimientohoy3'>Nombre de Paciente</th>";
                                    echo"<th id='tablaprocedimientohoy4'>Nombre de Medico</th>";
                                    echo"<th id='tablaprocedimientohoy5'>Nombre de Especialidad</th>";
                                    echo"<th id='tablaprocedimientohoy6'>Motivo</th>";
                                    echo"<th style = 'width:110px' id='tablaprocedimientohoy7'>Accion</th>";
                                    echo"</tr>";
                                    echo"</thead>";
                                    echo"<tbody>";
                                    while ($row = $resultadotablaconsultaprocedimientodeldia->fetch_assoc()) {
                                    
                                        $idSignosVitales = $row['ID'];
                                        echo"<tr>";
                                        echo"<td>" . $row['Fecha'] . "</td>";
                                        echo"<td>" . $row['Paciente'] . "</td>";
                                        echo"<td>" . $row['Medico'] . "</td>";
                                        if($_SESSION['IdIdioma']==1){
                                          echo"<td>" . $row['Modulo'] . "</td>";
                                        }
                                        else{
                                         echo"<td>" . $row['ModuloIngles'] . "</td>";
                                        }
                                       
                                        echo"<td>" . $row['Motivo'] . "</td>";
                                        if($_SESSION['IdIdioma'] == 1){
                                           if ($row['Estado'] == 1) {
                                              echo "<td>" .
                                              "<span id='btn" . $idSignosVitales . "' style='width:100px' class='btn btn-success btn-mdles'>+ Procedimiento</span>" .
                                              "</td>";
                                          } else {
                                              echo "<td>" .
                                              "<span id='btn" . $idSignosVitales . "' style='width:100px' class='btn btn-warning btn-mdls'>Ver Consulta</span>" .
                                              "</td>";
                                          }
                                        }else{
                                         if ($row['Estado'] == 1) {
                                              echo "<td>" .
                                              "<span id='btn" . $idSignosVitales . "' style='width:100px' class='btn btn-success btn-mdles'>+ Procedure</span>" .
                                              "</td>";
                                          } else {
                                              echo "<td>" .
                                              "<span id='btn" . $idSignosVitales . "' style='width:100px' class='btn btn-warning btn-mdls'>See Procedure</span>" .
                                              "</td>";
                                          }
                                        }
                                        echo"</tr>";
                                        echo"</body>  ";
                                    }
                                    ?>
                              </table>
                           </div>
                           </br>
                           <div class="box-header with-border">
                              <h4 class="box-title" id='tblexamenasignado'></h4>
                           </div>
                           <div class="box-body">
                              <table id="example2" class="table table-bordered table-hover">
                                 <?php
                                    echo"<thead>";
                                    echo"<tr>";
                                    echo"<th style = 'width:110px' id='tblexamenasignadoexamen'>Tipo de Examen</th>";
                                    echo"<th id='tblexamenasignadomedico'>Medico</th>";
                                    echo"<th id='tblexamenasignadoindicacion'>Indicacion</th>";
                                    echo"<th style = 'width:110px' id='tblexamenasignadoaccion'>Accion</th>";
                                    echo"</tr>";
                                    echo"</thead>";
                                    echo"<tbody>";
                                    if($_SESSION['IdIdioma'] == 1){
                                          while ($row = $resultadotablaexameneslabasignados->fetch_assoc()) {
                                            $idexamenasignado = $row['IdListaExamen'];
                                            echo"<tr>";
                                            echo"<td>" . $row['NombreExamen'] . "</td>";
                                            echo"<td>" . $row['Medico'] . "</td>";
                                            echo"<td>" . $row['Indicacion'] . "</td>";
                                            echo "<td><a style='width:100px'  class='btn  btn-danger dim' href='../../views/enfermeriaprocedimiento/eliminarexamenasignado.php?did=".$idexamenasignado."'>Eliminar</a></td>";
                                            echo"</tr>";
                                            echo"</body>  ";
                                        }
                                    }
                                    else{
                                       while ($row = $resultadotablaexameneslabasignados->fetch_assoc()) {
                                        $idexamenasignado = $row['IdListaExamen'];
                                        echo"<tr>";
                                        echo"<td>" . $row['NombreExamening'] . "</td>";
                                        echo"<td>" . $row['Medico'] . "</td>";
                                        echo"<td>" . $row['Indicacion'] . "</td>";
                                        echo "<td><a style='width:100px'  class='btn  btn-danger dim' href='../../views/enfermeriaprocedimiento/eliminarexamenasignado.php?did=".$idexamenasignado."'>Delete</a></td>";
                                        echo"</tr>";
                                        echo"</body>  ";
                                    }
                                    }
                                    
                                    ?>
                              </table>
                           </div>
                           </br>
                           <div class="box-header with-border">
                              <h4 class="box-title" id='tblrayosxasignado'></h4>
                           </div>
                           <div class="box-body">
                              <table id="example2" class="table table-bordered table-hover">
                                 <?php
                                    echo"<thead>";
                                    echo"<tr>";
                                    echo"<th style = 'width:110px' id='tblrayosasignadoexamen'>Tipo de Examen</th>";
                                    echo"<th id='tblrayosasignadomedico'>Medico</th>";
                                    echo"<th id='tblrayosxasignadoindicacion'>Indicacion</th>";
                                    echo"<th style = 'width:110px' id='tblrayosxasignadoaccion'>Accion</th>";
                                    echo"</tr>";
                                    echo"</thead>";
                                    echo"<tbody>";
                                    if($_SESSION['IdIdioma'] == 1){
                                          while ($row = $resultadotablarayosxasignados->fetch_assoc()) {
                                            $idexamenasignado = $row['IdListaRayosx'];
                                            echo"<tr>";
                                            echo"<td>" . $row['NombreRayosx'] . "</td>";
                                            echo"<td>" . $row['Medico'] . "</td>";
                                            echo"<td>" . $row['Indicacion'] . "</td>";
                                            echo "<td><a style='width:100px'  class='btn  btn-danger dim' href='../../views/enfermeriaprocedimiento/eliminarrayosxasignado.php?did=".$idexamenasignado."'>Eliminar</a></td>";
                                            echo"</tr>";
                                            echo"</body>  ";
                                        }
                                    }
                                    else{
                                       while ($row = $resultadotablarayosxasignados->fetch_assoc()) {
                                        $idexamenasignado = $row['IdListaRayosx'];
                                        echo"<tr>";
                                        echo"<td>" . $row['NombreRayosxing'] . "</td>";
                                        echo"<td>" . $row['Medico'] . "</td>";
                                        echo"<td>" . $row['Indicacion'] . "</td>";
                                        echo "<td><a style='width:100px'  class='btn  btn-danger dim' href='../../views/enfermeriaprocedimiento/eliminarrayosxasignado.php?did=".$idexamenasignado."'>Delete</a></td>";
                                        echo"</tr>";
                                        echo"</body>  ";
                                    }
                                    }
                                    
                                    ?>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div id="tab-EXPEDIENTE" class="tab-pane">
                        <div class="panel-body">
                           <div class="tabs-container">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a data-toggle="tab" href="#EXPDATOGEN" id='tabexpediente19'></a></li>
                                 <li class=""><a data-toggle="tab" href="#EXPRESPON" id='tabexpediente20'></a></li>
                                 <li class=""><a data-toggle="tab" href="#EXPMED" id='tabexpediente21'></a></li>
                                 <li class=""><a data-toggle="tab" href="#EXPHMED" id='tabexpediente22'></a></li>
                                 <li class=""><a data-toggle="tab" href="#EXPVAC" id='tabexpediente23'></a></li>
                              </ul>
                              <div class="tab-content">
                                 <div id="EXPDATOGEN" class="tab-pane active">
                                    <div class="panel-body">
                                       <div class="form-group">
                                          <label for="txtNombres" class="col-sm-2 control-label" id='tabexpediente1'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input type="text" class="form-control" id="txtNombres" name="txtNombres" disabled="disabled" required="" value="<?php echo $nombres ?>">
                                             </div>
                                          </div>
                                          <label for="txtApellidos" class="col-sm-2 control-label" id='tabexpediente2'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input type="text" class="form-control" id="txtApellidos" name="txtApellidos" disabled="disabled" required="" value="<?php echo $apellidos ?>" >
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="txtFechaNacimiento" class="col-sm-2 control-label" id='tabexpediente3'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFechaNacimiento" id="txtFechaNacimiento" required="" value="<?php echo $fnacimiento ?>" disabled="disabled">
                                             </div>
                                          </div>
                                          <label for="txtGenero" class="col-sm-2 control-label" id='tabexpediente4'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-genderless"></i></div>
                                                <input type="text" class="form-control" name="txtFechaNacimiento" id="txtGenero" value="<?php echo $genero ?>" disabled="disabled">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="txtIdEstadoCivil" class="col-sm-2 control-label" id='tabexpediente5'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                                <input type="text" class="form-control" name="txtFechaNacimiento" id="txtFechaNacimiento" required="" value="<?php echo $estadocivil ?>" disabled="disabled">
                                             </div>
                                          </div>
                                          <label for="txtDui" class="col-sm-2 control-label" id='tabexpediente6'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                                <input type="text" class="form-control" data-mask="99999999-9" name="txtDui" id="txtDui" value="<?php echo $dui ?>" disabled="disabled" >
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="txtDireccion" class="col-sm-2 control-label" id='tabexpediente7'></label>
                                          <div class="col-sm-10">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-arrows"></i></div>
                                                <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required="" value="<?php echo $direccion ?>" disabled="disabled">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="txtTelefono" class="col-sm-2 control-label" id='tabexpediente8'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                                <input type="text" class="form-control"  data-mask="9999-9999" id="txtTelefono" name="txtTelefono" value="<?php echo $telefono ?>" disabled="disabled" />
                                             </div>
                                          </div>
                                          <label for="txtCelular" class="col-sm-2 control-label" id='tabexpediente9'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                                <input type="text" class="form-control" data-mask="9999-9999" id="txtCelular" name="txtCelular" value="<?php echo $celular ?>" disabled="disabled"/>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="txtCorreo" class="col-sm-2 control-label" id='tabexpediente10'></label>
                                          <div class="col-sm-10">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                <input type="text" value="<?php echo $correo ?>" disabled="disabled" class="form-control" id="txtCorreo" name="txtCorreo"  data-parsley-trigger="change">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="EXPRESPON" class="tab-pane">
                                    <div class="panel-body">
                                       <div class="form-group">
                                          <label for="txtNombresResponsable"  class="col-sm-2 control-label" id='tabexpediente11'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input type="text" class="form-control" id="txtNombresResponsable" value="<?php echo $nombreResponsable ?>" disabled="disabled"  name="txtNombresResponsable"/>
                                             </div>
                                          </div>
                                          <label for="txtApellidosResponsable" class="col-sm-2 control-label" id='tabexpediente12'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input type="text" class="form-control" id="txtApellidosResponsable" value="<?php echo $apellidoResponsable ?>" disabled="disabled"  name="txtApellidosResponsable"/>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="txtParentesco" class="col-sm-2 control-label" id='tabexpediente13'></label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                <input type="text" class="form-control" id="txtApellidosResponsable" value="<?php echo $parentesco ?>" disabled="disabled"  name="txtApellidosResponsable"/>
                                             </div>
                                          </div>
                                          <label for="txtDuiResponsable" class="col-sm-2 control-label" id='tabexpediente14'> </label>
                                          <div class="col-sm-4">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                                <input type="text" class="form-control" id="txtApellidosResponsable" value="<?php echo $duiresponsable ?>" disabled="disabled"  name="txtApellidosResponsable"/>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="txtTelefonoResponsable" class="col-sm-2 control-label" id='tabexpediente15'></label>
                                          <div class="col-sm-10">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                                <input type="text" value="<?php echo $telefonoresponsable ?>" disabled="disabled" class="form-control"  data-inputmask='"mask": "9999-9999"' data-mask id="txtTelefonoResponsable" name="txtTelefonoResponsable" />
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="EXPMED" class="tab-pane">
                                    <div class="panel-body">
                                       <div class="form-group">
                                          <label for="txtEnfermedad" class="col-sm-2 control-label" id='tabexpediente16'></label>
                                          <div class="col-sm-10">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                                <input type="text" value="<?php echo $enfermedad ?>" disabled="disabled" rows="3" class="form-control" id="txtEnfermedad" name="txtEnfermedad" >
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="txtAlergias" class="col-sm-2 control-label" id='tabexpediente17'></label>
                                          <div class="col-sm-10">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                                <input type="text" value="<?php echo $alergias ?>" disabled="disabled" rows="3" class="form-control" id="txtAlergias" name="txtAlergias" data-parsley-maxlength="100">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label for="txtMedicamentos" class="col-sm-2 control-label" id='tabexpediente18'></label>
                                          <div class="col-sm-10">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                                <input type="text" value="<?php echo $medicinas ?>" disabled="disabled" rows="3" class="form-control" id="txtMedicamentos"  name="txtMedicamentos" data-parsley-maxlength="100">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="EXPHMED" class="tab-pane">
                                    <div class="panel-body">
                                       <div id="historialclinico"></div>
                                    </div>
                                 </div>
                                 <div id="EXPVAC" class="tab-pane">
                                    <div class="panel-body">
                                       <div id="vacunacion"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="tab-HISTORIAL" class="tab-pane">
                        <div class="panel-body">
                           <div class="tabs-container">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a data-toggle="tab" href="#HISTDATOGEN" id='tab2historial1'>CONSULTAS</a></li>
                                 <li class=""><a data-toggle="tab" href="#HISTRESPON" id='tab2historial2'>EXAMENES</a></li>
                                 <li class=""><a data-toggle="tab" href="#HISTMED" id='tab2historial3'>PROCEDIMIENTOS</a></li>
                              </ul>
                              <div class="tab-content">
                                 <div id="HISTDATOGEN" class="tab-pane active">
                                    <div class="panel-body">
                                       <div class="box-header with-border" >
                                          <h3 class="box-title" id='tab2historialconsultabla6'>HISTORIAL DE CONSULTAS</h3>
                                       </div>
                                       <!-- /.box-header -->
                                       <div class="box-body">
                                          <table id="example2" class="table table-bordered table-hover">
                                             <?php
                                                echo"<thead>";
                                                echo"<tr>";
                                                echo"<th id='tab2historialconsultabla1'></th>";
                                                echo"<th id='tab2historialconsultabla2'></th>";
                                                echo"<th id='tab2historialconsultabla3'></th>";
                                                echo"<th id='tab2historialconsultabla4'></th>";
                                                echo"<th style = 'width:110px' id='tab2historialconsultabla5'></th>";
                                                echo"</tr>";
                                                echo"</thead>";
                                                echo"<tbody>";
                                                
                                                  while ($row = $resultadotablaconsulta->fetch_assoc()) {
                                                      $idSignosVitales = $row['IdConsulta'];
                                                      echo"<tr>";
                                                      echo"<td>" . $row['FechaConsulta'] . "</td>";
                                                      echo"<td>" . $row['Paciente'] . "</td>";
                                                      echo"<td>" . $row['Medico'] . "</td>";
                                                      echo"<td>" . $row['Especialidad'] . "</td>";
                                                         if($_SESSION['IdIdioma'] == 1){
                                                            echo "<td>".
                                                                   "<span id='btn".$idSignosVitales."' style='width:100px' class='btn  btn-success btn-mdl'> Ver Consulta</span>".
                                                                   "</td>";
                                                            }
                                                         else{
                                                            echo "<td>".
                                                                   "<span id='btn".$idSignosVitales."' style='width:100px' class='btn  btn-success btn-mdl'> See Visits </span>".
                                                                   "</td>";
                                                         }
                                                
                                                
                                                
                                                      echo"</tr>";
                                                      echo"</body>  ";
                                                  }
                                                ?>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="HISTRESPON" class="tab-pane">
                                    <div class="panel-body">
                                       <div class="box-header with-border">
                                          <h3 class="box-title" id='tab2historialexamabla1'>HISTORIAL DE EXAMENES</h3>
                                       </div>
                                       <!-- /.box-header -->
                                       <div class="box-body">
                                          <table id="example2" class="table table-bordered table-hover">
                                             <?php
                                                echo"<thead>";
                                                echo"<tr>";
                                                echo"<th id='tab2historialexamabla2'>Fecha de Examen</th>";
                                                echo"<th id='tab2historialexamabla3'>Nombre de Paciente</th>";
                                                echo"<th id='tab2historialexamabla4'>Nombre de Medico</th>";
                                                echo"<th id='tab2historialexamabla5'>Examen</th>";
                                                echo"<th style = 'width:110px' id='tab2historialexamabla6'>Accion</th>";
                                                echo"</tr>";
                                                echo"</thead>";
                                                echo"<tbody>";
                                                while ($row = $resultadotablaexamenes->fetch_assoc()) {
                                                    $IdListaExamen = $row['IdListaExamen'];
                                                    echo"<tr>";
                                                    echo"<td>" . $row['Fecha'] . "</td>";
                                                    echo"<td>" . $row['Paciente'] . "</td>";
                                                    echo"<td>" . $row['Medico'] . "</td>";
                                                    echo"<td>" . $row['Examen'] . "</td>";
                                                     if($_SESSION['IdIdioma'] == 1){
                                                            echo "<td>" .
                                                    "<span id='btn" . $IdListaExamen . "' style='width:100px' class='btn btn-md btn-warning btn-mdlrex'>Ver Resultados</span>" .
                                                    "</td>";
                                                            }
                                                         else{
                                                            echo "<td>" .
                                                    "<span id='btn" . $IdListaExamen . "' style='width:100px' class='btn btn-md btn-warning btn-mdlrex'>See Results</span>" .
                                                    "</td>";
                                                         }
                                                    echo"</tr>";
                                                    echo"</body>  ";
                                                }
                                                ?>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="HISTMED" class="tab-pane">
                                    <div class="panel-body">
                                       <div class="box-header with-border">
                                          <h3 class="box-title" id='tab2historialprocetabla1'>HISTORIAL DE PROCEDIMIENTOS</h3>
                                       </div>
                                       <div class="box-body">
                                          <table id="example2" class="table table-bordered table-hover">
                                             <?php
                                                echo"<thead>";
                                                echo"<tr>";
                                                echo"<th id='tab2historialprocetabla2'>Fecha</th>";
                                                echo"<th id='tab2historialprocetabla3'>Nombre de Paciente</th>";
                                                echo"<th id='tab2historialprocetabla4'>Nombre de Medico</th>";
                                                echo"<th id='tab2historialprocetabla5'>Nombre de Especialidad</th>";
                                                echo"<th id='tab2historialprocetabla6'>Motivo</th>";
                                                echo"<th style = 'width:110px' id='tab2historialprocetabla7'>Accion</th>";
                                                echo"</tr>";
                                                echo"</thead>";
                                                echo"<tbody>";
                                                if($_SESSION['IdIdioma'] == 1){
                                                while ($row = $resultadotablaprocedimientos->fetch_assoc()) {
                                                    $idSignosVitales = $row['ID'];
                                                    echo"<tr>";
                                                    echo"<td>" . $row['Fecha'] . "</td>";
                                                    echo"<td>" . $row['Paciente'] . "</td>";
                                                    echo"<td>" . $row['Medico'] . "</td>";
                                                    echo"<td>" . $row['Modulo'] . "</td>";
                                                    echo"<td>" . $row['Motivo'] . "</td>";
                                                    if($_SESSION['IdIdioma'] == 1){
                                                            echo "<td>" .
                                                    "<span id='btn" . $idSignosVitales . "' style='width:100px' class='btn btn-md btn-warning btn-proce'>Ver Consulta</span>" .
                                                    "</td>";}
                                                         else{
                                                            echo "<td>" .
                                                    "<span id='btn" . $idSignosVitales . "' style='width:100px' class='btn btn-md btn-warning btn-proce'>See Visit</span>" .
                                                    "</td>";
                                                         }
                                                    echo"</tr>";
                                                    echo"</body>  ";}}else{
                                                      while ($row = $resultadotablaprocedimientos->fetch_assoc()) {
                                                    $idSignosVitales = $row['ID'];
                                                    echo"<tr>";
                                                    echo"<td>" . $row['Fecha'] . "</td>";
                                                    echo"<td>" . $row['Paciente'] . "</td>";
                                                    echo"<td>" . $row['Medico'] . "</td>";
                                                    echo"<td>" . $row['Moduloing'] . "</td>";
                                                    echo"<td>" . $row['Motivo'] . "</td>";
                                                    if($_SESSION['IdIdioma'] == 1){
                                                            echo "<td>" .
                                                    "<span id='btn" . $idSignosVitales . "' style='width:100px' class='btn btn-md btn-warning btn-proce'>Ver Consulta</span>" .
                                                    "</td>";}
                                                         else{
                                                            echo "<td>" .
                                                    "<span id='btn" . $idSignosVitales . "' style='width:100px' class='btn btn-md btn-warning btn-proce'>See Visit</span>" .
                                                    "</td>";
                                                         }
                                                    echo"</tr>";
                                                    echo"</body>  ";}
                                                    }
                                                
                                                
                                                ?>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <center>
            <form class="form-horizontal" action="../../views/consultamedico/finalizarconsulta.php" method="POST" >
               <div class="hidden">
                  <textarea  type="text" rows="1" class="form-control"   name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
               </div>
               <button type="submit" class="btn btn-success dim" id='btnfinalizarconsulta'></button>
            </form>
         </center>
         <!-- MODAL INGRESAR PROCEDIMIENTO -->
         <div class="modal inmodal" id="modalSignosVitales" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content animated fadeIn">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <i class="fa fa-stethoscope modal-icon"></i>
                     <h4 class="modal-title" id='mdlsignosvitalesencabezado1'>SIGNOS VITALES</h4>
                     <small id='mdlsignosvitalesencabezado2'>INGRESE LOS DATOS REQUERIDOS</small>
                  </div>
                  <div class="modal-body">
                     <form class="form-horizontal" action="../../views/enfermeriaprocedimiento/guardarindicadorprocedimiento.php"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
                        <div class="tabs-container">
                           <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-1" id='tab1signosvitales1'></a></li>
                              <li class=""><a data-toggle="tab" href="#tab-2" id='tab1signosvitales2'></a></li>
                              <!-- <li class=""><a data-toggle="tab" href="#tab-3" id='tab1signosvitales3'></a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-4" id='tab1signosvitales4'></a></li> -->
                              <li class=""><a data-toggle="tab" href="#tab-5" id='tab1signosvitales5'></a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="tab-1" class="tab-pane active">
                                 <div class="panel-body">
                                    <div class="form-group hidden">
                                       <div class="col-sm-5"><input type="text"  name="txtIdConsulta" id="idconsulta" value=""></div>
                                       <div class="col-sm-5"><input type="text"  name="txtIdProcedimiento" id="idindicadorprocedimiento" value=""></div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersonaid?>">  </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1paciente'>Paciente</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                             <input type="text" class="form-control" id="pacientes" name="txtPaciente" disabled="disabled">
                                          </div>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1medico'>Medico</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                             <input type="text" class="form-control" id="medicos" name="txtMedico" disabled="disabled">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1especialidad'>Especialidad</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                             <input type="text" class="form-control" id="modulos" name="txtMedico" disabled="disabled">
                                          </div>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1fecha'>Fecha</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                             <input type="text" class="form-control" id="fechas" name="txtfecha" disabled="disabled">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-2" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2peso'></label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-slideshare"></i></div>
                                             <input type="text" class="form-control" data-inputmask='"mask": "999.9"' data-mask name="txtPeso" id="peso" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <select class="form-control select2" name="cboUnidadPeso" id="unidadpeso">
                                             <option value="1">lbs</option>
                                             <option Value="2">kg</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2altura'></label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-arrows-v"></i></div>
                                             <input type="text" class="form-control" data-inputmask='"mask": "9.99"' data-mask name="txtAltura" id="altura" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <select class="form-control select2" name="cboUnidadAltura" id="unidadaltura">
                                             <option value="1">Mts</option>
                                             <option Value="2">Cms</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2temperatura'></label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-thermometer-quarter"></i></div>
                                             <input type="text" class="form-control" data-inputmask='"mask": "99.9"' data-mask name="txtTemperatura" id="temperatura" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <select class="form-control select2" name="cboUnidadTemperatura" id="unidadtemperatura">
                                             <option value="1">C</option>
                                             <option Value="2">F</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2fr'></label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                             <input type="text" class="form-control"  name="txtFR" id="FR" required="">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2pulso'></label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                             <input type="text" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtPulso" id="pulso" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <label for="inputEmail3" class="control-label">lat/min</label>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2presion'></label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-heart-o"></i></div>
                                             <input type="text" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtMax" placeholder="MAX" id="max" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                             <input type="text" class="form-control" data-inputmask='"mask": "99"' data-mask name="txtMin" placeholder="MIN" id="min" required="">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2glucotex'></label></div>
                                       <div class="col-sm-10">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></div>
                                             <input type="text" class="form-control"  name="txtGluco"  id="gluco" required="">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-3" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3menstruacion'>Ult. Menstrua</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                             <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUmestruacion" id="ultimamestruacion">
                                          </div>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3pap'>Ult.PAP</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                             <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUpap" id="ultimapap">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-4" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">P/C</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-toggle-down"></i></div>
                                             <input type="text" class="form-control" name="txtpc" id="pc">
                                          </div>
                                       </div>
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">P/T</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-toggle-up"></i></div>
                                             <input type="text" class="form-control"  name="txtpt" id="pt">
                                          </div>
                                       </div>
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">P/A</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-toggle-right"></i></div>
                                             <input type="text" class="form-control"  name="txtpa" id="pa">
                                          </div>
                                       </div>
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-5" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab5observaciones'>Observaciones</label></div>
                                       <div class="col-sm-10">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                             <textarea type="text" rows="4" class="form-control" name="txtObservaciones" data-parsley-maxlength="100" id="observaciones" data-parsley-maxlength="100"> </textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab5motivo'>Motivo de Visita</label></div>
                                       <div class="col-sm-10">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                             <textarea type="text" rows="4" class="form-control" name="txtMotivo" data-parsley-maxlength="100" id="motivo" data-parsley-maxlength="100" required=""> </textarea>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                  <button type="button" class="btn btn-danger" data-dismiss="modal" id='btnmodalsignoscerrar'></button>
                  </div>
                  <div class="col-sm-2">
                  <button type="submit" class="btn btn-primary" name="guardarIndicador" id='btnmodalsignosguardar'></button>
                  </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- MODAL PARA EXAMEN HEMOGRAMA -->
         <div class="modal inmodal" id="modalCargarExamenHemograma" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <form class="form-horizontal"  role="form"  id="demo-form1" data-parsley-validate="">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-gittip modal-icon"></i>
                        <h4 class="modal-title" id='modalconsultahemograma1'>EXAMEN HEMOGRAMA</h4>
                        <small id='modalconsultahemograma2'></small> <small><label id="ExamenHemogramaFechas"></label> </small>
                     </div>
                     <div class="modal-body ">
                        <div class="form-group">
                           <div class="col-sm-2" ><label for="inputEmail3"  class="control-label" id='modalconsultahemograma3'>Paciente</label></div>
                           <div class="col-sm-4">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                 <input type="text" class="form-control" disabled="disabled" id="ExamenHemogramaPaciente" name="txtPaciente" disabled="disabled">
                              </div>
                           </div>
                           <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modalconsultahemograma4'>Medico</label></div>
                           <div class="col-sm-4">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                 <input type="text" class="form-control" disabled="disabled" id="ExamenHemogramaMedico" name="txtMedico" disabled="disabled">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modalconsultahemograma5'>Fecha</label></div>
                           <div class="col-sm-10">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                 <input type="text" class="form-control" disabled="disabled" id="ExamenHemogramaFecha" name="txtfecha" disabled="disabled">
                              </div>
                           </div>
                        </div>
                        <div class="tabs-container">
                           <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#MDLHEMOGRAMA1" id='modalconsultahemograma6'>FICHA 1</a></li>
                              <li class=""><a data-toggle="tab" href="#MDLHEMOGRAMA2" id='modalconsultahemograma7'>FICHA 2</a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="MDLHEMOGRAMA1" class="tab-pane active">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma8'>Globulos Rojos</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaGlobulosRojos" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>X mm3</small></label>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma9'>Hemoglobina</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaHemoglobina" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>Gr/dl</small></label>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma10'>Hematocrito</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaHematocrito" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma11'>VGM</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaVgm" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>Micras cubicas</small></label>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma12'>HCM</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaHcm" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>Micro microgramos</small></label>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma13'>CHCM</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaChcm" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma14'>Leucocitos</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaLeucocitos" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>X mm3</small></label>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma15'>Neutrofilos en Banda</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaNeutrofilos" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                                    </div>
                                 </div>
                              </div>
                              <div id="MDLHEMOGRAMA2" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma16'>Linfocitos</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaLinfocitos" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                                       <label for="inputEmail3" class="col-sm-2 control-label">Monocitos</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaMonocitos" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma17'>Eosinofilos</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaEosinofilos" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma18'>Basofilos</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaBasofilos" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma19'>Plaquetas</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaPlaquetas" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>X mm3</small></label>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma20'>Eritro Sedimentacion</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaEritrosedimentacion" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>mm/h</small></label>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma21'>Otros</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenHemogramaOtros" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultahemograma22'>Neutrofilos Segmentados</label>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" id="ExamenHemogramaNeutrofilosSegmentados" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-1 control-label"><small>X mm3</small></label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                  </form>
                  </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger"  data-dismiss="modal" id='modalconsultahemograma23'>Cerrar</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- MODAL PARA CARGAR EXAMEN HECES -->
         <div class="modal inmodal" id="modalCargarExamenHeces" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <form class="form-horizontal"  role="form"  id="demo-form1" data-parsley-validate="">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-gittip modal-icon"></i>
                        <h4 class="modal-title" id='modalconsultaheces1'>EXAMEN HECES</h4>
                        <small id='modalconsultaheces2'></small>RESULTADOS DE EXAMENES DE FECHA:<small> <label id="ExamenHecesFechas"></label> </small>
                     </div>
                     <div class="modal-body ">
                        <div class="form-group">
                           <div class="col-sm-2"><label for="inputEmail3"  class="control-label" id='modalconsultaheces3'>Paciente</label></div>
                           <div class="col-sm-4">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                 <input type="text" class="form-control" disabled="disabled" id="ExamenHecesPaciente" name="txtPaciente" disabled="disabled">
                              </div>
                           </div>
                           <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modalconsultaheces4'>Medico</label></div>
                           <div class="col-sm-4">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                 <input type="text" class="form-control" disabled="disabled" id="ExamenHecesMedico" name="txtMedico" disabled="disabled">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modalconsultaheces5'>Fecha</label></div>
                           <div class="col-sm-10">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                 <input type="text" class="form-control" disabled="disabled" id="ExamenHecesFecha" name="txtfecha" disabled="disabled">
                              </div>
                           </div>
                        </div>
                        <div class="tabs-container">
                           <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#MDLHECES1" id='modalconsultaheces6'>FICHA 1</a></li>
                              <li class=""><a data-toggle="tab" href="#MDLHECES2" id='modalconsultaheces7'>FICHA 2</a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="MDLHECES1" class="tab-pane active">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces8'>Color</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenHecesColor" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces9'>Consistencia</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenHecesConsistencia" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces10'>Mucus</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenHecesMucus" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces11'>Hematies</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenHecesHematies" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces12'>Leucocitos</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenHecesLeucocitos" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces13'>Restos Alimenticios</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenHecesRestosAlimenticios" disabled="disabled">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="MDLHECES2" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces14'>Macroscopios</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenHecesMacrocopios" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces15'>Microscopios</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenHecesMicroscopicos" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces16'>Flora Bacteriana</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenHecesFlora" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces1'>Otros</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenHecesOtros" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces17'>PActivos</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenHecesPActivos" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaheces18'>PQuistes</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenHecesPQuistes" disabled="disabled">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                  </form>
                  </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger"  data-dismiss="modal" id='modalconsultaheces19'>Cerrar</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- MODAL PARA CARGAR EXAMEN VARIOS -->
         <div class="example-modal modal fade" id="modalCargarExamenVarios">
            <div class="modal">
               <div class="modal-dialog modal-lg ">
                  <div class="modal-content">
                     <form class="form-horizontal"  role="form"  id="demo-form1" data-parsley-validate="">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id='modalconsultavarios1'>Examen Varios</h4>
                        </div>
                        <div class="modal-body ">
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultavarios2'>Paciente</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" id="ExamenesVariosPaciente" disabled="disabled">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultavarios3'>Medico</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" id="ExamenesVariosMedico" disabled="disabled">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultavarios4'>Examen</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" id="ExamenesVariosNombreExamen" disabled="disabled">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultavarios5'>Fecha</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" id="ExamenesVariosFecha" disabled="disabled">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultavarios6'>Resultado</label>
                              <div class="col-sm-9">
                                 <textarea type="text" rows="3" id="ExamenesVariosResultado" class="form-control" disabled="disabled"></textarea>
                              </div>
                  