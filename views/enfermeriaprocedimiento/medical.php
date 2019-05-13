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
                     <button type="button" class="btn  btn-danger dim"  data-toggle="modal" data-target="#modalConsulta">Data<i class="fa fa-heart"></i></button>
                     <button type="button" class="btn  btn-info dim" style="display: none; data-toggle="modal" data-target="#modalGuardarExamenes"> LAB <i class="fa fa-bars"></i></button>
                     <button type="button" class="btn  btn-warning dim" style="display: none; data-toggle="modal" data-target="#modalGuardarExamenes"> REF <i class="fa fa-folder-o"></i></button>
                     <button type="button" class="btn  btn-default dim" style="display: none; data-toggle="modal" data-target="#modalGuardarRayosX"> X-Rays <i class="fa fa-times"></i></button>
                     <?php } else{?>
                     <button type="button" class="btn  btn-danger dim" style="display: none;"  data-toggle="modal" data-target="#modalConsulta">Enter Data  <i class="fa fa-heart"></i></button>
                     <button type="button" class="btn  btn-info dim"  data-toggle="modal" data-target="#modalGuardarExamenes"> LAB <i class="fa fa-bars"></i></button>
                     <button type="button" class="btn  btn-warning dim"  data-toggle="modal" data-target="#modalGuardarExamenes"> REF <i class="fa fa-folder-o"></i></button>
                     <button type="button" class="btn  btn-default dim"  data-toggle="modal" data-target="#modalGuardarRayosX"> X-Rays <i class="fa fa-times"></i></button>
                     
                     <?php }?>    
                     
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
               <button type="submit" class="btn btn-success dim" id='btnfinalizarconsulta'> Finalizar Consulta</button>
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
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger" data-dismiss="modal"  id='modalconsultavarios7'>Cerrar</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- MODAL PARA CARGAR EXAMEN ORINA -->
         <div class="modal inmodal" id="modalCargarExamenOrina" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <form class="form-horizontal"  role="form"  id="demo-form1" data-parsley-validate="">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-gittip modal-icon"></i>
                        <h4 class="modal-title" id='modalconsultaorina1'>EXAMEN ORINA</h4>
                        <small id='modalconsultaorina2'>RESULTADOS DE ORINA DE FECHA: </small> <small><label id="ExamenOrinaFechas"></label> </small>
                     </div>
                     <div class="modal-body ">
                        <div class="form-group">
                           <div class="col-sm-2"><label for="inputEmail3"  class="control-label" id='modalconsultaorina3'>Paciente</label></div>
                           <div class="col-sm-4">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                 <input type="text" class="form-control" disabled="disabled" id="ExamenOrinaPaciente" name="txtPaciente" disabled="disabled">
                              </div>
                           </div>
                           <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modalconsultaorina4'>Medico</label></div>
                           <div class="col-sm-4">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                 <input type="text" class="form-control" disabled="disabled" id="ExamenOrinaMedico" name="txtMedico" disabled="disabled">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modalconsultaorina5'>Fecha</label></div>
                           <div class="col-sm-10">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                 <input type="text" class="form-control" disabled="disabled" id="ExamenOrinaFecha" name="txtfecha" disabled="disabled">
                              </div>
                           </div>
                        </div>
                        <div class="tabs-container">
                           <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#MDLORINA1" id='modalconsultaorina6'>FICHA 1</a></li>
                              <li class=""><a data-toggle="tab" href="#MDLORINA2" id='modalconsultaorina7'>FICHA 2</a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="MDLORINA1" class="tab-pane active">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaorina8'>Color</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenOrinaColor" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaorina9'>Aspecto</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenOrinaAspecto" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaorina10'>Densidad</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenOrinaDendisdad" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaorina11'>Ph</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenOrinaPh" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaorina12'>Proteinas</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenOrinaProteinas" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaorina13'>Glucosa</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenOrinaGlucosa" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaorina14'>Sangre Oculta</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenOrinaSangreOculta" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaorina15'>Cuerpos Cetomicos</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenOrinaCuerposCetomicos" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaorina16'>Uroblinogeno</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenOrinaUrobilinogeno" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaorina17'>Bilirrubina</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenOrinaBilirrubina" disabled="disabled">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="MDLORINA2" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label">Esterasa Leucocitaria</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenOrinaEsterasaLeucocitaria" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label">Cilindros</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenOrinaCilindros" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label">Hematies</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenOrinaHematies" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label">Leucocitos</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenOrinaLeucocitos" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label">Celulas Epiteliales</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenOrinaCelulasEpiteliales" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label">Elementos Minerales</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenOrinaElementosMinerales" disabled="disabled">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="inputEmail3" class="col-sm-2 control-label">Parasitos</label>
                                       <div class="col-sm-3">
                                          <input type="text" class="form-control" id="ExamenOrinaParasitos" disabled="disabled">
                                       </div>
                                       <label for="inputEmail3" class="col-sm-2 control-label">Observaciones</label>
                                       <div class="col-sm-4">
                                          <input type="text" class="form-control" id="ExamenOrinaObservaciones" disabled="disabled">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                  </form>
                  </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger"  data-dismiss="modal" id='modalconsultaorina18'>Cerrar</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- MODAL PARA CARGAR EXAMEN QUIMICA -->
         <div class="example-modal modal fade" id="modalCargarExamenQuimica">
            <div class="modal">
               <div class="modal-dialog modal-lg ">
                  <div class="modal-content">
                     <form class="form-horizontal"  role="form"  id="demo-form1" data-parsley-validate="">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id='modalconsultaquimico1'>Examen Quimico</h4>
                        </div>
                        <div class="modal-body ">
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico2'>Paciente</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" id="ExamenQuimicaPaciente" disabled="disabled">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico3'>Medico</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" id="ExamenQuimicaMedico" disabled="disabled">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico4'>Examen</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" id="ExamenQuimicaNombreExamen" disabled="disabled">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico5'>Fecha</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" id="ExamenQuimicaFecha" disabled="disabled">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico6'>Glucosa</label>
                              <div class="col-sm-2">
                                 <input type="text" class="form-control" id="ExamenQuimicaGlucosa" disabled="disabled">
                              </div>
                              <label for="inputEmail3" class="col-sm-2 control-label">70 - 110 mg/dl</label>
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico7'>Glucosa Post</label>
                              <div class="col-sm-3">
                                 <input type="text" class="form-control" id="ExamenQuimicaGlucosaPost" disabled="disabled">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico8'>Colesterol Total</label>
                              <div class="col-sm-2">
                                 <input type="text" class="form-control" id="ExamenQuimicaColesterolTotal" disabled="disabled">
                              </div>
                              <label for="inputEmail3" class="col-sm-2 control-label">Hasta 200 mg/dl</label>
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico9'>Triglicerido</label>
                              <div class="col-sm-1">
                                 <input type="text" class="form-control" id="ExamenQuimicaTriglicerido" disabled="disabled">
                              </div>
                              <label for="inputEmail3" class="col-sm-2 control-label">Hasta 150 mg/dl</label>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico10'>Acido Urico</label>
                              <div class="col-sm-2">
                                 <input type="text" class="form-control" id="ExamenQuimicaAcidoUrico" disabled="disabled">
                              </div>
                              <label for="inputEmail3" class="col-sm-2 control-label">M: 2.0 – 6.0 mg/dl H: 3.4 – 7.0 mg/dl</label>
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico11'>Creatinina</label>
                              <div class="col-sm-1">
                                 <input type="text" class="form-control" id="ExamenQuimicaCreatinina" disabled="disabled">
                              </div>
                              <label for="inputEmail3" class="col-sm-2 control-label">0.6 - 1.2 mg/dl</label>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico12'>Nitrogeno Ureico</label>
                              <div class="col-sm-2">
                                 <input type="text" class="form-control" id="ExamenQuimicaNitrogenoUreico" disabled="disabled">
                              </div>
                              <label for="inputEmail3" class="col-sm-2 control-label">7.0 - 21.0 mg/dl</label>
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalconsultaquimico13'>Urea</label>
                              <div class="col-sm-1">
                                 <input type="text" class="form-control" id="ExamenQuimicaUrea" disabled="disabled">
                              </div>
                              <label for="inputEmail3" class="col-sm-2 control-label">15.0 - 45.0 mg/dl</label>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger"  data-dismiss="modal" id='modalconsultaquimico14'>Cerrar</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- MODAL CARGAR PROCEDIMIENTOS -->
         <div class="modal inmodal" id="modalCargarProcedimientos" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content animated fadeIn">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <i class="fa fa-h-square modal-icon"></i>
                     <h4 class="modal-title" id='modalcargaprocedimiento1'>REPORTE DE PROCEDIMIENTOS</h4>
                     <small id='modalcargaprocedimiento2'>FICHA DE PROCEDIMIENTOS</small>
                  </div>
                  <div class="modal-body">
                     <form class="form-horizontal"  id="demo-form1" data-parsley-validate="">
                        <div class="form-group hidden">
                           <div class="col-sm-7"><input type="text"  name="txtid" value="<?php echo $idpersona ?>">  </div>
                           <div class="col-sm-7"><input type="text"  name="txtProcedimiento" id="idprocedimiento">  </div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label for="inputEmail3" class="control-label" id='modalcargaprocedimiento3'>Paciente</label>
                           </div>
                           <div class="col-sm-7">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                 <input type="text" class="form-control" name="txtPaciente" id="procepacientes" disabled="disabled">
                              </div>
                           </div>
                           <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modalcargaprocedimiento4'>Enfermera</label></div>
                           <div class="col-sm-7">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                 <input type="text" class="form-control" name="txtMedico" id="procemedicos" disabled="disabled" value=" ">
                              </div>
                           </div>
                           <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modalcargaprocedimiento5'>Modulo</label></div>
                           <div class="col-sm-7">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-bookmark-o"></i></div>
                                 <input type="text" class="form-control" name="txtMedico" id="procemodulos" disabled="disabled" value=" ">
                              </div>
                           </div>
                           <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modalcargaprocedimiento6'>Fecha</label></div>
                           <div class="col-sm-7">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                 <input type="text" class="form-control" name="txtFecha" id="procefechas" disabled="disabled">
                              </div>
                           </div>
                           <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modalcargaprocedimiento7'>Observaciones</label></div>
                           <div class="col-sm-7">
                              <div class="input-group">
                                 <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                 <textarea type="text" rows="8" class="form-control" name="txtObservaciones" data-parsley-maxlength="400" disabled="disabled" id="proceobservacioness"> </textarea>
                              </div>
                           </div>
                           <div class="col-sm-1"></div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger" data-dismiss="modal" id='modalcargaprocedimiento8'>Cerrar</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- MODAL ASIGNAR EXAMENES DE LABORATORIO -->
         <div class="modal inmodal" id="modalGuardarExamenes" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-md">
               <div class="modal-content animated fadeIn">
                  <div class="modal-content">
                     <form class="form-horizontal" method="POST" action="../../views/enfermeriaprocedimiento/guardarexamen.php"  id="demo-form1" data-parsley-validate="">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                           <i class="fa fa-stethoscope modal-icon"></i>
                           <h4 class="modal-title" id='modalasignarexamen1'>ASIGNACION DE EXAMENES MEDICOS</h4>
                           <small id='modalasignarexamen2'>ASIGNACION DE EXAMENES: <?php echo $idpersona; ?></small>
                        </div>
                        <div class="modal-body ">
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalasignarexamen3'>Examenes</label>
                              <div class="col-sm-9">
                                 <div class="input-group">
                                    <div class="input-group-addon">
                                       <i class="fa fa-user"></i>
                                    </div>
                                    <select class="form-control select2" style="width: 100%;"  name="cboTipoExamen">
                                    <?php
                                       if($_SESSION['IdIdioma'] == 1){
                                             while ($row = $resultadotipoexamen->fetch_assoc()) {
                                              echo "<option value = '" . $row['IdTipoExamen'] . "'>" . $row['NombreExamen'] . "</option>";
                                          }
                                       }else{
                                         while ($row = $resultadotipoexamen->fetch_assoc()) {
                                              echo "<option value = '" . $row['IdTipoExamen'] . "'>" . $row['DescripcionExamen'] . "</option>";
                                          }
                                       }
                                       ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group" >
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalasignarexamen4'>Indicaciones</label>
                              <div class="col-sm-9">
                                 <div class="input-group">
                                    <div class="input-group-addon">
                                       <i class="fa fa-user"></i>
                                    </div>
                                    <textarea  type="text" rows="4" class="form-control"   name="txtIndicacion"></textarea>
                                 </div>
                              </div>
                              <div class="hidden">
                                 <textarea  type="text" rows="4" class="form-control"   name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                              </div>
                              <div class="hidden">
                                 <textarea  type="text" rows="4" class="form-control"   name="txtconsultaID"> <?php echo $IdEnfermeriaProcedimiento ?> </textarea>
                              </div>
                              <div class="hidden">
                                 <textarea  type="text" rows="4" class="form-control"   name="txtusuarioID"> <?php echo $idusuarioid ?> </textarea>
                              </div>
                              <div class="col-sm-9">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label"></label>
                              <div class="col-sm-9">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label"></label>
                              <div class="col-sm-9">
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <div class="col-sm-3">
                           </div>
                           <div class="col-sm-3">
                           </div>
                           <div class="col-sm-2">
                              <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal"  id='modalasignarexamen5'>Cerrar</button>
                           </div>
                           <div class="col-sm-2">
                              <button type="submit" class="btn btn-primary" name="guardarIndicador"  id='modalasignarexamen6'>Guardar Cambios</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- MODAL PARA GUARDAR DIAGNOSTICO -->
         <div class="modal inmodal" id="modalGuardarDiagnostico" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-md">
               <div class="modal-content animated fadeIn">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <i class="fa fa-stethoscope modal-icon"></i>
                     <h4 class="modal-title" id='modaltabnuevaconsultamedica13'></h4>
                     <small id='modaltabnuevaconsultamedica14'></small><small> <?php echo $idpersona; ?></small>
                  </div>
                  <form class="form-horizontal" method="POST" action="../../views/consultamedico/actualizarconsulta.php"  id="demo-form" data-parsley-validate="">
                     <div class="modal-body">
                        <div class="tabs-container">
                           <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#MDLDIAGNOSTICOMEDICO1" id='modaltabnuevaconsultamedica1'></a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="MDLDIAGNOSTICOMEDICO1" class="tab-pane active">
                                 <div class="panel-body">
                                    <div class="tabs-container">
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#MDLDIAGMED1">PANEL 1</a></li>
                                          <li class=""><a data-toggle="tab" href="#MDLDIAGMED2">PANEL 2</a></li>
                                          <li class=""><a data-toggle="tab" href="#MDLDIAGMED3">PANEL 3</a></li>
                                       </ul>
                                       <div class="tab-content">
                                          <div id="MDLDIAGMED1" class="tab-pane active">
                                             <div class="panel-body">
                                                <div class="form-group">
                                                   <div class="hidden">
                                                      <textarea  type="text" rows="4" class="form-control"   name="txtconsultaID">  </textarea>
                                                   </div>
                                                   <div class="hidden">
                                                      <textarea  type="text" rows="4" class="form-control"   name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                                                   </div>
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica2'></label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                         <textarea type="text" rows="1" class="form-control" id="enfermedads" name="txtDiagnostico" required="" >  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica3'> </label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" class="form-control" id="estadonutricions" name="txtEstadoNutriconal" required="">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica4'></label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="alergiass" class="form-control" name="txtAlergiass" required="" >  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica5'> </label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="cirugiaspreviass" class="form-control" name="txtCirugiasPrevias" required="">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="MDLDIAGMED2" class="tab-pane">
                                             <div class="panel-body">
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica6'> </label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="medicamentotomados" class="form-control"  name="txtMedicamentosTomados">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica7'> Fisica</label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="examenfisicas" class="form-control" name="txtExamenFisica" >  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica8'></label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <select class="form-control select2" style="width: 100%;"  name="cboEnfermedad">
                                                         <?php
                                                            if($_SESSION['IdIdioma'] == 1){
                                                              while ($row = $resultadotablaenfermedad->fetch_assoc()) {
                                                                 echo "<option value = '" . $row['IdEnfermedad'] . "'>" . $row['Nombre'] . "</option>";
                                                             }
                                                            
                                                            }
                                                            else{
                                                              while ($row = $resultadotablaenfermedad2->fetch_assoc()) {
                                                                 echo "<option value = '" . $row['IdEnfermedad'] . "'>" . $row['Nombre'] . "</option>";
                                                             }
                                                            
                                                            }
                                                             
                                                             ?>
                                                         </select>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica8'></label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <select class="form-control select2" style="width: 100%;"  name="cboEnfermedad">
                                                         <?php
                                                            while ($row = $resultadotablaenfermedadICD->fetch_assoc()) {
                                                               echo "<option value = '" . $row['IdCodigoICD'] . "'>" . $row['NombreCodigo'] . "</option>";
                                                            }
                                                            ?>
                                                         </select>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica9'></label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="5" class="form-control" id="comentarioss"  name="txtComentarios"" >  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="MDLDIAGMED3" class="tab-pane">
                                             <div class="panel-body">
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica10'> </label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" class="form-control" id="otross" name="txtOtros" >  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica11'></label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="plantratamientos" class="form-control" name="txtPlanTratamiento" >  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modaltabnuevaconsultamedica12'> </label></div>
                                                   <div class="col-sm-9">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFechaProxima" required="">
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
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="guardarConsulta" >Guardar Cambios</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- MODAL PARA GUARDAR CARGAR CONSULTA -->
         <div class="modal inmodal" id="modalCargarConsulta" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content animated fadeIn">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <i class="fa fa-stethoscope modal-icon"></i>
                     <h4 class="modal-title">FICHA GENERAL DE CONSULTA</h4>
                     <small>FICHA DE CONSULTA</small>
                  </div>
                  <div class="modal-body">
                     <div class="tabs-container">
                        <ul class="nav nav-tabs">
                           <li class="active"><a data-toggle="tab" href="#MDLCONSULT1" id='modaltabconsultamedica1'>FICHA</a></li>
                           <li class=""><a data-toggle="tab" href="#MDLCONSULT2" id='modaltabconsultamedica2'>GENERALES</a></li>
                           <li class=""><a data-toggle="tab" href="#MDLCONSULT3" id='modaltabconsultamedica3'>USO GINECOLOGICO</a></li>
                           <li class=""><a data-toggle="tab" href="#MDLCONSULT4" id='modaltabconsultamedica4'>USO PEDIATRICO</a></li>
                           <li class=""><a data-toggle="tab" href="#MDLCONSULT5" id='modaltabconsultamedica5'>OTROS</a></li>
                           <li class=""><a data-toggle="tab" href="#MDLCONSULT6" id='modaltabconsultamedica6'>DATOS MEDICOS</a></li>
                        </ul>
                        <form class="form-horizontal">
                           <div class="tab-content">
                              <div id="MDLCONSULT1" class="tab-pane active">
                                 <div class="panel-body">
                                    <div class="form-group hidden">
                                       <div class="col-sm-5"><input type="text"  name="txtIdConsulta" id="idconsulta"></div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>">  </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica7'>Paciente</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" id="pacientess" name="txtPaciente" disabled="disabled">
                                          </div>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica8'>Medico</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" id="medicoss" name="txtMedico" disabled="disabled">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica9'>Especialidad</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" id="moduloss" name="txtMedico" disabled="disabled">
                                          </div>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica10'>Fecha</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" id="fechass" name="txtfecha" disabled="disabled">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="MDLCONSULT2" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica11'>Peso</label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-slideshare"></i></div>
                                             <input type="text" class="form-control" value="" disabled="disabled" data-inputmask='"mask": "999.9"' data-mask name="txtPeso" id="pesoss" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" disabled="disabled" id="unidadpesos" required="">
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica12'>Altura</label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-arrows-v"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "9.99"' data-mask name="txtAltura" id="alturass" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "9.99"' data-mask name="txtAltura" id="unidadalturass" required="">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica13'>Temperatura</label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-thermometer-quarter"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "99.9"' data-mask name="txtTemperatura" id="temperaturass" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "99.9"' data-mask  id="unidadtemperaturas" required="">
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica14'>F/R</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                             <input type="text" class="form-control" disabled="disabled"  name="txtFR" id="frss" required="">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica15'>Pulso</label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "999"' data-mask name="txtPulso" id="pulsoss" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <label for="inputEmail3" class="control-label">lat/min</label>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica16'>Presion</label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-heart-o"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "999"' data-mask name="txtMax" placeholder="MAX" id="maxss" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "99"' data-mask name="txtMin" placeholder="MIN" id="minss" required="">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica17'>Glucotex</label></div>
                                       <div class="col-sm-10">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></div>
                                             <input type="text" class="form-control" disabled="disabled"  name="txtGluco"  id="glucoss" required="">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="MDLCONSULT3" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica18'>Ult. Menstrua</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUmestruacion" id="ultimamestruacionss">
                                          </div>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica19'>Ult.PAP</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUpap" id="ultimapapss">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="MDLCONSULT4" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica20'>P/C</label></div>
                                       <div class="col-sm-3">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-toggle-down"></i></div>
                                             <input type="text" class="form-control" disabled="disabled" name="txtpc" id="pcss">
                                          </div>
                                       </div>
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica21'>P/T</label></div>
                                       <div class="col-sm-3">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-toggle-up"></i></div>
                                             <input type="text" class="form-control" disabled="disabled"  name="txtpt" id="ptss">
                                          </div>
                                       </div>
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica22'>P/A</label></div>
                                       <div class="col-sm-3">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-toggle-right"></i></div>
                                             <input type="text" class="form-control" disabled="disabled"  name="txtpa" id="pass">
                                          </div>
                                       </div>
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                    </div>
                                 </div>
                              </div>
                              <div id="MDLCONSULT5" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica23'>Observaciones</label></div>
                                       <div class="col-sm-10">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                             <textarea type="text" rows="4" class="form-control" name="txtObservaciones" disabled="disabled" data-parsley-maxlength="100" id="observacionesss" data-parsley-maxlength="100"> </textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica24'>Motivo de Visita</label></div>
                                       <div class="col-sm-10">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                             <textarea type="text" rows="4" class="form-control" name="txtMotivo" data-parsley-maxlength="100" disabled="disabled" id="motivoss" data-parsley-maxlength="100" required=""> </textarea>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="MDLCONSULT6" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="tabs-container">
                                       <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#MDLCONSULTATABDM1">PANEL 1</a></li>
                                          <li class=""><a data-toggle="tab" href="#MDLCONSULTATABDM2">PANEL 2</a></li>
                                          <li class=""><a data-toggle="tab" href="#MDLCONSULTATABDM3">PANEL 3</a></li>
                                       </ul>
                                       <div class="tab-content">
                                          <div id="MDLCONSULTATABDM1" class="tab-pane active">
                                             <div class="panel-body">
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica25'>Enfermedades</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                         <textarea type="text" rows="1" class="form-control" id="enfermedadss" disabled="disabled">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica26'>Estado Nutricional</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" class="form-control" id="estadonutricionss"   disabled="disabled">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica27'>Alergias</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="alergiasss" class="form-control"  disabled="disabled">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica28'>Cirugias Previas</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="cirugiaspreviasss" class="form-control"  disabled="disabled">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="MDLCONSULTATABDM2" class="tab-pane">
                                             <div class="panel-body">
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica29'>Medicamentos tomados Actualmente</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="medicamentotomadoss" class="form-control"  disabled="disabled">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica30'>Examen Fisica</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="examenfisicass" class="form-control"  disabled="disabled">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica31'>Diagnostico</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" class="form-control" id="diagnosticoss" name="txtDiagnostico" disabled="disabled">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica32'>Comentarios</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" class="form-control" id="comentariossss" name="txtComentarios" disabled="disabled">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="MDLCONSULTATABDM3" class="tab-pane">
                                             <div class="panel-body">
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica33'>Otros</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" class="form-control" id="otross" name="txtOtros" disabled="disabled">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica34'>Plan de Tratamiento</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="plantratamientoss" class="form-control"  disabled="disabled">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica35'>Fecha de proxima Visita</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="1" id="fechaproximass" class="form-control"  disabled="disabled">  </textarea>
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
                        </form>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- MODAL PARA GUARDAR NUEVO PROCEDIMIENTO -->
         <div class="modal inmodal" id="modalConsulta" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content animated fadeIn">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <i class="fa fa-h-square modal-icon"></i>
                     <h4 class="modal-title" id='modalnuevoprocedimiento1'>Nuevo Procedimiento</h4>
                     <small id='modalnuevoprocedimiento2'>Ingrese los datos requeridos.</small>
                  </div>
                  <div class="modal-body">
                     <form class="form-horizontal" action="../../views/enfermeriaprocedimiento/guardarprocedimiento.php" role="form" method="POST">
                        <div class="form-group">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modalnuevoprocedimiento3'>Fecha</label></div>
                           <div class="col-sm-7"><input  value="<?php echo $date ?>" class="form-control" name="txtFecha" disabled="disabled"></div>
                           <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modalnuevoprocedimiento4'>Enfermera</label></div>
                           <div class="col-sm-7">
                              <select class="form-control select2" disabled="disabled" style="width: 100%;" name="cboUsuario">
                              <?php
                                 while ($row = $resultadousuarioenfe->fetch_assoc()) {
                                   echo "<option value = '".$row['IdUsuario']."'>".$row['NombreCompletoEnf']."</option>";
                                 }
                                 ?>
                              </select>
                           </div>
                           <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modalnuevoprocedimiento5'>Paciente</label></div>
                           <div class="col-sm-7"><input type="text" value="<?php echo $nombres. " " .$apellidos ?>" class="form-control"  disabled="disabled" >
                              <input type="hidden" name="txtPaciente" value="<?php echo $idpersonaid ?>">  
                           </div>
                           <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modalnuevoprocedimiento6'>Modulo</label></div>
                           <div class="col-sm-7">
                              <select class="form-control select2" style="width: 100%;" name="cboModulo">
                              <?php
                                 if($_SESSION['IdIdioma'] == 1 ){
                                    while ($row = $resultadomodulo->fetch_assoc()) {
                                        echo "<option value = '" . $row['IdModulo'] . "'>" . $row['NombreModulo'] . "</option>";
                                    }
                                 }
                                 else{
                                     while ($row = $resultadomodulo->fetch_assoc()) {
                                        echo "<option value = '" . $row['IdModulo'] . "'>" . $row['Descripcion'] . "</option>";
                                      }
                                 }
                                    
                                    ?>
                              </select>
                           </div>
                           <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='modalnuevoprocedimiento7'>Procedimiento</label></div>
                           <div class="col-sm-7">
                              <select class="form-control select2" style="width: 100%;" name="cboMotivo">
                              <?php
                                 while ($row = $resultadoselectprocedimiento->fetch_assoc()) {
                                     echo "<option value = '" . $row['IdMotivoProcedimiento'] . "'>" . $row['Nombre'] . "</option>";
                                 }
                                 ?>
                              </select>
                           </div>
                           <div class="col-sm-1"></div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger" data-dismiss="modal" id='modalnuevoprocedimiento8'>Cerrar</button>
                           <button type="submit" class="btn btn-primary" name="guardarConsulta"  id='modalnuevoprocedimiento9'>Guardar Cambios</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
        <!-- MODAL ASIGNAR TOMAS DE RAYOS X -->
         <div class="modal inmodal" id="modalGuardarRayosX" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-md">
               <div class="modal-content animated fadeIn">
                  <div class="modal-content">
                     <form class="form-horizontal" method="POST" action="../../views/enfermeriaprocedimiento/guardarrayosx.php"  id="demo-form1" data-parsley-validate="">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                           <i class="fa fa-times modal-icon"></i>
                           <h4 class="modal-title" id='modalasignarrayosx1'>ASIGNACION DE EXAMENES MEDICOS</h4>
                           <small id='modalasignarrayosx2'>ASIGNACION DE EXAMENES: <?php echo $idpersona; ?></small>
                        </div>
                        <div class="modal-body ">
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalasignarrayosx3'>Examenes</label>
                              <div class="col-sm-9">
                                 <div class="input-group">
                                    <div class="input-group-addon">
                                       <i class="fa fa-user"></i>
                                    </div>
                                    <select class="form-control select2" style="width: 100%;"  name="cboTipoExamen">
                                    <?php
                                       if($_SESSION['IdIdioma'] == 1){
                                             while ($row = $resultadotiporayosx->fetch_assoc()) {
                                              echo "<option value = '" . $row['IdTipoRayosx'] . "'>" . $row['NombreRayosx'] . "</option>";
                                          }
                                       }else{
                                         while ($row = $resultadotiporayosx->fetch_assoc()) {
                                              echo "<option value = '" . $row['IdTipoRayosx'] . "'>" . $row['DescripcionRayosx'] . "</option>";
                                          }
                                       }
                                       ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group" >
                              <label for="inputEmail3" class="col-sm-2 control-label" id='modalasignarrayosx4'>Indicaciones</label>
                              <div class="col-sm-9">
                                 <div class="input-group">
                                    <div class="input-group-addon">
                                       <i class="fa fa-user"></i>
                                    </div>
                                    <textarea  type="text" rows="4" class="form-control"   name="txtIndicacion"></textarea>
                                 </div>
                              </div>
                              <div class="hidden">
                                 <textarea  type="text" rows="4" class="form-control"   name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                              </div>
                              <div class="hidden">
                                 <textarea  type="text" rows="4" class="form-control"   name="txtconsultaID"> <?php echo $IdEnfermeriaProcedimiento ?> </textarea>
                              </div>
                              <div class="hidden">
                                 <textarea  type="text" rows="4" class="form-control"   name="txtusuarioID"> <?php echo $idusuarioid ?> </textarea>
                              </div>
                              <div class="col-sm-9">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label"></label>
                              <div class="col-sm-9">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label"></label>
                              <div class="col-sm-9">
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <div class="col-sm-3">
                           </div>
                           <div class="col-sm-3">
                           </div>
                           <div class="col-sm-2">
                              <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal"  id='modalasignarrayosx5'>Cerrar</button>
                           </div>
                           <div class="col-sm-2">
                              <button type="submit" class="btn btn-primary" name="guardarIndicador"  id='modalasignarrayosx6'>Guardar Cambios</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
   
      $(".btn-mdles").click(function () {
           var id = $(this).attr("id").replace("btn", "");
           var myData = {"id": id};
           //alert(myData);
           $.ajax({
               url: "../../views/enfermeriaprocedimiento/cargarprocedimiento.php",
               type: "POST",
               data: myData,
               dataType: "JSON",
               beforeSend: function () {
                   $(this).html("Cargando");
               },
               success: function (data) {
                   $("#pacientes").val(data.Paciente);
                   $("#idconsulta").val(data.ID);
                   $("#medicos").val(data.Medico);
                   $("#idindicadorprocedimiento").val(data.IDIndicador);
                   $("#modulos").val(data.Especialidad);
                   $("#fechas").val(data.FechaConsulta);
   
                   $("#peso").val(data.Peso);
                   $("#enfermedads").val(data.Enfermedad);
                   $("#comentarioss").val(data.Comentarios);
                   $("#otross").val(data.Otros);
                   $("#pesos").val(data.Peso);
                   if (data.UnidadPeso == 1) {
                       $("#unidadpesos").val("Kg");
                   } else {
                       $("#unidadpesos").val("Lbs");
                   }
                   $("#altura").val(data.Altura);
                   if (data.UnidadAltura == 1) {
                       $("#unidadalturas").val("Mts");
                   } else {
                       $("#unidadalturas").val("Cms");
                   }
                   $("#temperatura").val(data.Temperatura);
                   if (data.UnidadTemperatura == 1) {
                       $("#unidadtemperaturas").val("C");
                   } else {
                       $("#unidadtemperaturas").val("F");
                   }
                   $("#FR").val(data.FR);
                   $("#pulso").val(data.Pulso);
                   $("#max").val(data.Max);
                   $("#min").val(data.Min);
                   $("#gluco").val(data.Glucotex);
                   $("#min").val(data.Min);
                   $("#observaciones").val(data.Observaciones);
                   $("#motivo").val(data.Motivo);
   
                   $("#modalSignosVitales").modal("show");
               }
           });
       });
   
     $(".btn-mdl").click(function () {
           var id = $(this).attr("id").replace("btn", "");
           var myData = {"id": id};
           //alert(myData);
           $.ajax({
               url: "../../views/enfermeriaprocedimiento/cargarconsultasignosvitales.php",
               type: "POST",
               data: myData,
               dataType: "JSON",
               beforeSend: function () {
                   $(this).html("Cargando");
               },
               success: function (data) {
                   $("#pacientess").val(data.Paciente);
                   $("#idconsultas").val(data.ID);
                   $("#medicoss").val(data.Medico);
                   $("#moduloss").val(data.Especialidad);
                   $("#fechass").val(data.FechaConsulta);
                   $("#diagnosticoss").val(data.Diagnostico);
                   $("#enfermedadss").val(data.Enfermedad);
                   $("#comentariosss").val(data.Comentarios);
                   $("#otrosss").val(data.Otros);
                   $("#pesoss").val(data.Peso);
                   if (data.UnidadPeso == 1) {
                       $("#unidadpesoss").val("Kg");
                   } else {
                       $("#unidadpesoss").val("Lbs");
                   }
                   $("#alturass").val(data.Altura);
                   if (data.UnidadAltura == 1) {
                       $("#unidadalturass").val("Mts");
                   } else {
                       $("#unidadalturass").val("Cms");
                   }
                   $("#temperaturass").val(data.Temperatura);
                   if (data.UnidadTemperatura == 1) {
                       $("#unidadtemperaturass").val("C");
                   } else {
                       $("#unidadtemperaturass").val("F");
                   }
                   $("#pulsoss").val(data.Pulso);
                   $("#maxss").val(data.Max);
                   $("#minss").val(data.Min);
                   $("#observacionesss").val(data.Observaciones);
   
                   $("#frss").val(data.FR);
                   $("#glucotexss").val(data.Glucotex);
                   $("#ultimamenstruacionss").val(data.PeriodoMeunstral);
                   $("#ultimapapss").val(data.PAP);
                   $("#pcss").val(data.PC);
                   $("#ptss").val(data.PT);
                   $("#pass").val(data.PA);
                   $("#motivoss").val(data.Motivo);
                   $("#estadonutricionss").val(data.EstadoNutricional);
                   $("#alergiasss").val(data.Alergias);
                   $("#cirugiaspreviasss").val(data.CirugiasPrevias);
                   $("#medicamentotomadoss").val(data.MedicamentosActuales);
                   $("#plantratamientoss").val(data.PlanTratamiento);
                   $("#fechaproximass").val(data.FechaProxVisita);
                   $("#examenfisicass").val(data.ExamenFisica);
   
                   $("#modalCargarConsulta").modal("show");
               }
           });
       });
   
       $(".btn-proce").click(function () {
           var id = $(this).attr("id").replace("btn", "");
   
           var myData = {"id": id};
           //alert(myData);
           $.ajax({
               url: "../../views/consultamedico/cargarprocedimientoterminado.php",
               type: "POST",
               data: myData,
               dataType: "JSON",
               beforeSend: function () {
                   $(this).html("Cargando");
               },
               success: function (data) {
                   $("#procepacientes").val(data.Paciente);
                   $("#procemedicos").val(data.Medico);
                   $("#procemodulos").val(data.Especialidad);
                   $("#procefechas").val(data.FechaConsulta);
                   $("#procemotivos").val(data.Motivo);
                   $("#proceobservacioness").val(data.Observaciones);
                   $("#modalCargarProcedimientos").modal("show");
               }
           });
       });
   
       $(".btn-mdlre").click(function () {
           var id = $(this).attr("id").replace("btn", "");
           var myData = {"id": id};
           //alert(myData);
           $.ajax({
               url: "../../views/consultamedico/cargarreceta.php",
               type: "POST",
               data: myData,
               dataType: "JSON",
               beforeSend: function () {
                   $(this).html("Cargando");
               },
               success: function (data) {
                   $("#idreceta").val(data.IdReceta);
   
                   $("#modalAsignarMedicamentos").modal("show");
               }
           });
       });
   
   
       $(".btn-mdlrex").click(function () {
           var id = $(this).attr("id").replace("btn", "");
           var myData = {"id": id};
           //alert(myData);
           $.ajax({
               url: "../../views/consultamedico/cargarexamenesterminados.php",
               type: "POST",
               data: myData,
               dataType: "JSON",
               beforeSend: function () {
                   $(this).html("Cargando");
               },
               success: function (data) {
   
                   if (data.IdTipoExamen == 1) {
                       //alert('Este es un Examen Hemograma');
                       $("#ExamenHemogramaPaciente").val(data.Paciente);
                       $("#ExamenHemogramaMedico").val(data.Medico);
                       $("#ExamenHemogramaNombreExamen").val(data.NombreExamen);
                       $("#ExamenHemogramaFecha").val(data.ExamenHemogramaFecha);
                       $("#ExamenHemogramaFechas").text(data.ExamenHemogramaFecha);
                       $("#ExamenHemogramaGlobulosRojos").val(data.ExamenHemogramaGlobulosRojos);
                       $("#ExamenHemogramaHemoglobina").val(data.ExamenHemogramaHemoglobina);
                       $("#ExamenHemogramaHematocrito").val(data.ExamenHemogramaHematocrito);
                       $("#ExamenHemogramaVgm").val(data.ExamenHemogramaVgm);
                       $("#ExamenHemogramaHcm").val(data.ExamenHemogramaHcm);
                       $("#ExamenHemogramaChcm").val(data.ExamenHemogramaChcm);
                       $("#ExamenHemogramaLeucocitos").val(data.ExamenHemogramaLeucocitos);
                       $("#ExamenHemogramaNeutrofilos").val(data.ExamenHemogramaNeutrofilos);
                       $("#ExamenHemogramaLinfocitos").val(data.ExamenHemogramaLinfocitos);
                       $("#ExamenHemogramaMonocitos").val(data.ExamenHemogramaMonocitos);
                       $("#ExamenHemogramaEosinofilos").val(data.ExamenHemogramaEosinofilos);
                       $("#ExamenHemogramaBasofilos").val(data.ExamenHemogramaBasofilos);
                       $("#ExamenHemogramaPlaquetas").val(data.ExamenHemogramaPlaquetas);
                       $("#ExamenHemogramaEritrosedimentacion").val(data.ExamenHemogramaEritrosedimentacion);
                       $("#ExamenHemogramaOtros").val(data.ExamenHemogramaOtros);
                       $("#ExamenHemogramaNeutrofilosSegmentados").val(data.ExamenHemogramaNeutrofilosSegmentados);
                       $("#modalCargarExamenHemograma").modal("show");
                   } else if (data.IdTipoExamen == 2) {
                       //alert('Este es un Examen Heces');
                       $("#ExamenHecesPaciente").val(data.Paciente);
                       $("#ExamenHecesMedico").val(data.Medico);
                       $("#ExamenHecesNombreExamen").val(data.NombreExamen);
                       $("#ExamenHecesFecha").val(data.ExamenHecesFecha);
                       $("#ExamenHecesFechas").text(data.ExamenHecesFecha);
                       $("#ExamenHecesColor").val(data.ExamenHecesColor);
                       $("#ExamenHecesConsistencia").val(data.ExamenHecesConsistencia);
                       $("#ExamenHecesMucus").val(data.ExamenHecesMucus);
                       $("#ExamenHecesHematies").val(data.ExamenHecesHematies);
                       $("#ExamenHecesLeucocitos").val(data.ExamenHecesLeucocitos);
                       $("#ExamenHecesRestosAlimenticios").val(data.ExamenHecesRestosAlimenticios);
                       $("#ExamenHecesMacrocopios").val(data.ExamenHecesMacrocopios);
                       $("#ExamenHecesMicroscopicos").val(data.ExamenHecesMicroscopicos);
                       $("#ExamenHecesFlora").val(data.ExamenHecesFlora);
                       $("#ExamenHecesOtros").val(data.ExamenHecesOtros);
                       $("#ExamenHecesPActivos").val(data.ExamenHecesPActivos);
                       $("#ExamenHecesPQuistes").val(data.ExamenHecesPQuistes);
                       $("#modalCargarExamenHeces").modal("show");
                   } else if (data.IdTipoExamen == 5) {
                       $("#ExamenesVariosPaciente").val(data.Paciente);
                       $("#ExamenesVariosMedico").val(data.Medico);
                       $("#ExamenesVariosNombreExamen").val(data.NombreExamen);
                       $("#ExamenesVariosFecha").val(data.ExamenesVariosFecha);
                       $("#ExamenesVariosResultado").val(data.ExamenesVariosResultado);
                       $("#modalCargarExamenVarios").modal("show");
                   } else if (data.IdTipoExamen == 3) {
                       $("#ExamenOrinaPaciente").val(data.Paciente);
                       $("#ExamenOrinaMedico").val(data.Medico);
                       $("#ExamenOrinaNombreExamen").val(data.NombreExamen);
                       $("#ExamenOrinaFecha").val(data.ExamenOrinaFecha);
                       $("#ExamenOrinaFechas").text(data.ExamenOrinaFecha);
                       $("#ExamenOrinaColor").val(data.ExamenOrinaColor);
                       $("#ExamenOrinaOlor").val(data.ExamenOrinaOlor);
                       $("#ExamenOrinaAspecto").val(data.ExamenOrinaAspecto);
                       $("#ExamenOrinaDendisdad").val(data.ExamenOrinaDendisdad);
                       $("#ExamenOrinaPh").val(data.ExamenOrinaPh);
                       $("#ExamenOrinaProteinas").val(data.ExamenOrinaProteinas);
                       $("#ExamenOrinaGlucosa").val(data.ExamenOrinaGlucosa);
                       $("#ExamenOrinaSangreOculta").val(data.ExamenOrinaSangreOculta);
                       $("#ExamenOrinaCuerposCetomicos").val(data.ExamenOrinaCuerposCetomicos);
                       $("#ExamenOrinaUrobilinogeno").val(data.ExamenOrinaUrobilinogeno);
                       $("#ExamenOrinaBilirrubina").val(data.ExamenOrinaBilirrubina);
                       $("#ExamenOrinaEsterasaLeucocitaria").val(data.ExamenOrinaEsterasaLeucocitaria);
                       $("#ExamenOrinaCilindros").val(data.ExamenOrinaCilindros);
                       $("#ExamenOrinaHematies").val(data.ExamenOrinaHematies);
                       $("#ExamenOrinaLeucocitos").val(data.ExamenOrinaLeucocitos);
                       $("#ExamenOrinaCelulasEpiteliales").val(data.ExamenOrinaCelulasEpiteliales);
                       $("#ExamenOrinaElementosMinerales").val(data.ExamenOrinaElementosMinerales);
                       $("#ExamenOrinaParasitos").val(data.ExamenOrinaParasitos);
                       $("#ExamenOrinaObservaciones").val(data.ExamenOrinaObservaciones);
                       $("#modalCargarExamenOrina").modal("show");
                   } else if (data.IdTipoExamen == 4) {
                       $("#ExamenQuimicaPaciente").val(data.Paciente);
                       $("#ExamenQuimicaMedico").val(data.Medico);
                       $("#ExamenQuimicaNombreExamen").val(data.NombreExamen);
                       $("#ExamenQuimicaFecha").val(data.ExamenQuimicaFecha);
                       $("#ExamenQuimicaGlucosa").val(data.ExamenQuimicaGlucosa);
                       $("#ExamenQuimicaGlucosaPost").val(data.ExamenQuimicaGlucosaPost);
                       $("#ExamenQuimicaColesterolTotal").val(data.ExamenQuimicaColesterolTotal);
                       $("#ExamenQuimicaTriglicerido").val(data.ExamenQuimicaTriglicerido);
                       $("#ExamenQuimicaAcidoUrico").val(data.ExamenQuimicaAcidoUrico);
                       $("#ExamenQuimicaCreatinina").val(data.ExamenQuimicaCreatinina);
                       $("#ExamenQuimicaNitrogenoUreico").val(data.ExamenQuimicaNitrogenoUreico);
                       $("#ExamenQuimicaUrea").val(data.ExamenQuimicaUrea);
                       $("#modalCargarExamenQuimica").modal("show");
                   } else {
                       alert('Este modal no esta diseñado aun :) ');
                   }
   
               }
           });
       });
   
       $('#demo-form').parsley().on('field:validated', function () {
           var ok = $('.parsley-error').length === 0;
           $('.bs-callout-info').toggleClass('hidden', !ok);
           $('.bs-callout-warning').toggleClass('hidden', ok);
   
       })
               .on('form:submit', function () {
                   return true;
               });
   
   
      <?php if ($_SESSION['IdIdioma'] == 1){ ?>
   
       $.post( "../../views/consultamedico/historicoesp.php", { IdFactor: "2", IdPersona: "<?php echo $idpersonaid; ?>" })
         .done(function( data ) {
           $("#historialclinico").html(data);
   
       });
       $.post( "../../views/consultamedico/historicoesp.php", { IdFactor: "3", IdPersona: "<?php echo $idpersonaid; ?>" })
         .done(function( data ) {
           $("#vacunacion").html(data);
   
       });
   
        // ENCABEZADO, PRIMER TAB Y BOTON DE FINALIZAR CONSULTA
       $("#encabezadoform1").text('INGRESO DE CONSULTA');
       $("#encabezadoform2").text('INGRESE LOS DATOS REQUERIDOS');
       $("#tabgeneral1").text('CONSULTA');
       $("#tabgeneral2").text('EXPEDIENTE');
       $("#tabgeneral3").text('HISTORIAL');
       $("#btnfinalizarconsulta").text('FINALIZAR CONSULTA');
   
      // TAB DE INGRESO DE CONSULTA - FICHA DE CONSULTA
       $("#mdlsignosvitalesencabezado1").text('SIGNOS VITALES');
       $("#mdlsignosvitalesencabezado2").text('INGRESE LOS DATOS REQUERIDOS');
       $("#tab1signosvitales1").text('FICHA DE CONSULTA');
       $("#tab1signosvitales2").text('DATOS GENERALES');
       $("#tab1signosvitales3").text('USO GINECOLOGICO');
       $("#tab1signosvitales4").text('USO PEDIATRICO');
       $("#tab1signosvitales5").text('OTROS');
       $("#tab1signosvitales6").text('DATOS MEDICOS');
       $("#tab1tab1paciente").text('Paciente');
       $("#tab1tab1medico").text('Medico');
       $("#tab1tab1especialidad").text('Especialidad');
       $("#tab1tab1fecha").text('Fecha');
       $("#tab1tab2peso").text('Peso');
       $("#tab1tab2altura").text('Altura');
       $("#tab1tab2temperatura").text('Temperatura');
       $("#tab1tab2fr").text('F/R');
       $("#tab1tab2pulso").text('Pulso');
       $("#tab1tab2presion").text('Presion');
       $("#tab1tab2glucotex").text('Glucotex');
       $("#tab1tab3menstruacion").text('Ult. Menstruacion');
       $("#tab1tab3pap").text('Ult. PAP');
       $("#tab1tab3ofc").text('P/C');
       $("#tab1tab3hl").text('P/T');
       $("#tab1tab3w").text('P/A');
       $("#tab1tab5observaciones").text('Observaciones');
       $("#tab1tab5motivo").text('Motivo de Visita');
      $("#btnmodalsignoscerrar").text('Cerrar');
       $("#btnmodalsignosguardar").text('Guardar Cambios');
   
       $("#tab1consultamedica1").text('Enfermedades');
       $("#tab1consultamedica2").text('Estado Nutricional');
       $("#tab1consultamedica3").text('Alergias');
       $("#tab1consultamedica4").text('Cirugias Previas');
       $("#tab1consultamedica5").text('Medicamentos tomados Actualmente');
       $("#tab1consultamedica6").text('Examen Fisica');
       $("#tab1consultamedica7").text('Diagnostico');
       $("#tab1consultamedica8").text('Comentarios');
       $("#tab1consultamedica9").text('Otros');
       $("#tab1consultamedica10").text('Plan de Tratamiento');
       $("#tab1consultamedica11").text('Fecha de Proxima Visita');
   
   
   
       $("#tblexamenasignado").text('EXAMENES DE LABORATORIO ASIGNADOS');
       $("#tblexamenasignadoexamen").text('Tipo de Examen o Imagen');
       $("#tblexamenasignadomedico").text('Doctor');
       $("#tblexamenasignadoindicacion").text('Instricciones');
       $("#tblexamenasignadoaccion").text('Accion');
   
   
       // TAB EXPEDIENTE DATO GENERAL
       $("#tabexpediente19").text('DATO GENERAL');
       $("#tabexpediente20").text('RESPONSABLE');
       $("#tabexpediente21").text('DATO MEDICO');
       $("#tabexpediente22").text('HISTORIAL CLINICO');
       $("#tabexpediente23").text('VACUNACION');
       $("#tabexpediente1").text('Nombres');
       $("#tabexpediente2").text('Apellidos');
       $("#tabexpediente3").text('F. Nacimiento');
       $("#tabexpediente4").text('Genero');
       $("#tabexpediente5").text('Estado Civil');
       $("#tabexpediente6").text('Dui');
       $("#tabexpediente7").text('Direccion');
       $("#tabexpediente8").text('Telefono');
       $("#tabexpediente9").text('Celular');
       $("#tabexpediente10").text('Correo');
   
   
        // TAB EXPEDIENTE RESPONSABLE
       $("#tabexpediente11").text('Nombres');
       $("#tabexpediente12").text('Apellidos');
       $("#tabexpediente13").text('Parentesco');
       $("#tabexpediente14").text('Dui Responsable');
       $("#tabexpediente15").text('Telefono');
   
   
         // TAB EXPEDIENTE DATO MEDICO
       $("#tabexpediente16").text('Enfermedades');
       $("#tabexpediente17").text('Alergias');
       $("#tabexpediente18").text('Medicamntos');
   
        // TAB HISTORIAL CONSULTAS
       $("#tab2historial1").text('CONSULTAS');
       $("#tab2historial2").text('EXAMENES');
       $("#tab2historial3").text('PROCEDIMIENTOS');
   
        // TABLA HISTORIAL CONSULTAS
       $("#tab2historialconsultabla6").text('CONSULTAS PREVIAS');
       $("#tab2historialconsultabla1").text('Fecha');
       $("#tab2historialconsultabla2").text("Nombre de Paciente");
       $("#tab2historialconsultabla3").text('Nombre de Medico');
       $("#tab2historialconsultabla4").text('Especialidad');
       $("#tab2historialconsultabla5").text('Accion');
   
       // TABLA HISTORIAL EXAMENES
       $("#tab2historialexamabla1").text('EXAMENES PREVIOS');
       $("#tab2historialexamabla2").text('Fecha');
       $("#tab2historialexamabla3").text("Nombre de Paciente");
       $("#tab2historialexamabla4").text('Nombre de Medico');
       $("#tab2historialexamabla5").text('Examen');
       $("#tab2historialexamabla6").text('Accion');
       
   
   
       
       // MODAL HISTORICO DE CONSULTA
       $("#modaltabconsultamedica1").text('FICHA DE CONSULTA');
       $("#modaltabconsultamedica2").text('DATOS GENERALES');
       $("#modaltabconsultamedica3").text('USO GINECOLOGICO');
       $("#modaltabconsultamedica4").text('USO PEDIATRICO');
       $("#modaltabconsultamedica5").text('OTROS');
       $("#modaltabconsultamedica6").text('DATOS MEDICOS');
       $("#modaltabconsultamedica7").text('Paciente');
       $("#modaltabconsultamedica8").text('Medico');
       $("#modaltabconsultamedica9").text('Especialidad');
       $("#modaltabconsultamedica10").text('Fecha');
       $("#modaltabconsultamedica11").text('Peso');
       $("#modaltabconsultamedica12").text('Altura');
       $("#modaltabconsultamedica13").text('Temperatura');
       $("#modaltabconsultamedica14").text('F/R');
       $("#modaltabconsultamedica15").text('Pulso');
       $("#modaltabconsultamedica16").text('Presion');
       $("#modaltabconsultamedica17").text('Glucotex');
       $("#modaltabconsultamedica18").text('Ult. Menstruacion');
       $("#modaltabconsultamedica19").text('Ult. PAP');
       $("#modaltabconsultamedica20").text('P/C');
       $("#modaltabconsultamedica21").text('P/T');
       $("#modaltabconsultamedica22").text('P/A');
       $("#modaltabconsultamedica23").text('Observaciones');
       $("#modaltabconsultamedica24").text('Motivo de Visita');
       $("#modaltabconsultamedica25").text('Enfermedades');
       $("#modaltabconsultamedica26").text('Estado Nutricional');
       $("#modaltabconsultamedica27").text('Alergias');
       $("#modaltabconsultamedica28").text('Cirugias Previas');
       $("#modaltabconsultamedica29").text('Medicamentos tomados Actualmente');
       $("#modaltabconsultamedica30").text('Examen Fisica');
       $("#modaltabconsultamedica31").text('Diagnostico');
       $("#modaltabconsultamedica32").text('Comentarios');
       $("#modaltabconsultamedica33").text('Otros');
       $("#modaltabconsultamedica34").text('Plan de Tratamiento');
       $("#modaltabconsultamedica35").text('Fecha de Proxima Visita');
   
   
   
      // MODAL PARA AGREGAR LA CONSULTA MEDICA DEL DIA
       $("#modaltabnuevaconsultamedica1").text('DATOS MEDICOS');
       $("#modaltabnuevaconsultamedica2").text('Enfermedades');
       $("#modaltabnuevaconsultamedica3").text('Estado Nutricional');
       $("#modaltabnuevaconsultamedica4").text('Alergias');
       $("#modaltabnuevaconsultamedica5").text('Cirugias Previas');
       $("#modaltabnuevaconsultamedica6").text('Medicamentos tomados Actualmente');
       $("#modaltabnuevaconsultamedica7").text('Examen Fisica');
       $("#modaltabnuevaconsultamedica8").text('Diagnostico');
       $("#modaltabnuevaconsultamedica9").text('Comentarios');
       $("#modaltabnuevaconsultamedica10").text('Otros');
       $("#modaltabnuevaconsultamedica11").text('Plan de Tratamiento');
       $("#modaltabnuevaconsultamedica12").text('Fecha de Proxima Visita');
       $("#modaltabnuevaconsultamedica13").text("FICHA GENERAL DE CONSULTA");
       $("#modaltabnuevaconsultamedica14").text('FICHA DE CONSULTA:');
       $("#modaltabnuevaconsultamedica15").text("Cerrar");
       $("#modaltabnuevaconsultamedica16").text('Guardar Cambios');
   
   
   
       // MODAL PARA AGREGAR LA EXAMENES A LA CONSULTA MEDICA DEL DIA
       $("#modaltabnuevoexameneslab1").text('ASIGNACION DE EXAMENES DE LABORATORIO');
       $("#modaltabnuevoexameneslab2").text('ASIGNACION DE EXAMENES:');
       $("#modaltabnuevoexameneslab3").text("Examenes");
       $("#modaltabnuevoexameneslab4").text('Indicaciones');
       $("#modaltabnuevoexameneslab5").text("Close");
       $("#modaltabnuevoexameneslab6").text('Save Changes');
   
   <?php }else
      { ?>
   
       $.post( "../../views/consultamedico/historicoing.php", { IdFactor: "2", IdPersona: "<?php echo $idpersonaid; ?>" })
         .done(function( data ) {
           $("#historialclinico").html(data);
   
       });
       $.post( "../../views/consultamedico/historicoing.php", { IdFactor: "3", IdPersona: "<?php echo $idpersonaid; ?>" })
         .done(function( data ) {
           $("#vacunacion").html(data);
   
       });
       // ENCABEZADO, PRIMER TAB Y BOTON DE FINALIZAR CONSULTA
       $("#encabezadoform1").text("ENTRY OF TODAY'S MEDICAL VISIT");
       $("#encabezadoform2").text('ENTER THE DATA REQUIRED');
       $("#tabgeneral1").text("TODAY'S VISIT");
       $("#tabgeneral2").text('PATIENT/FAM HISTORY');
       $("#tabgeneral3").text('PREVIOUS VISITS');
       $("#btnfinalizarconsulta").text('FINISH');
   
      // TAB DE INGRESO DE CONSULTA - FICHA DE CONSULTA
       $("#mdlsignosvitalesencabezado1").text('VITAL SINGS');
       $("#mdlsignosvitalesencabezado2").text('ENTER THE REQUIRED DATA');
       $("#tab1signosvitales1").text('DATE OF VISIT');
       $("#tab1signosvitales2").text('GENERAL INFO');
       $("#tab1signosvitales3").text('OB-GYN INFO');
       $("#tab1signosvitales4").text('PEDIATRIC INFO');
       $("#tab1signosvitales5").text('OTHER');
       $("#tab1signosvitales6").text('MEDICAL INFO');
       $("#tab1tab1paciente").text("Patient's name");
       $("#tab1tab1medico").text('Physician');
       $("#tab1tab1especialidad").text('Type of visit');
       $("#tab1tab1fecha").text('Date');
       $("#tab1tab2peso").text('Weight');
       $("#tab1tab2altura").text('Height');
       $("#tab1tab2temperatura").text('Temperature');
       $("#tab1tab2fr").text('Respiration');
       $("#tab1tab2pulso").text('Pulse');
       $("#tab1tab2presion").text('Blood Pressure');
       $("#tab1tab2glucotex").text('Glucose');
       $("#tab1tab3menstruacion").text('Last Menstrua.');
       $("#tab1tab3pap").text('Last PAP');
       $("#tab1tab3ofc").text('OFC - Occipital Frontal Circumference.');
       $("#tab1tab3hl").text('Height/length');
       $("#tab1tab3w").text('Weight');
       $("#tab1tab5observaciones").text('Observations');
       $("#tab1tab5motivo").text('Reason for Visit');
       $("#btnmodalsignoscerrar").text('Close');
       $("#btnmodalsignosguardar").text('Save Changes');
   
   
       $("#tab1consultamedica1").text('Illnesses');
       $("#tab1consultamedica2").text('Nutritional state');
       $("#tab1consultamedica3").text('Allergies');
       $("#tab1consultamedica4").text('Previous surgeries');
       $("#tab1consultamedica5").text('Current medications');
       $("#tab1consultamedica6").text('Physical exam');
       $("#tab1consultamedica7").text('Diagnosis');
       $("#tab1consultamedica8").text('Comments');
       $("#tab1consultamedica9").text('Other');
       $("#tab1consultamedica10").text('Treatment plan');
       $("#tab1consultamedica11").text('Next visit');
   
         // TAB EXAMENES ASIGNADOS
       $("#tblexamenasignado").text('ORDERS FOR LAB')
       $("#tblexamenasignadoexamen").text('Type of Exam or Image');
       $("#tblexamenasignadomedico").text('Physician');
       $("#tblexamenasignadoindicacion").text('Special instructions');
       $("#tblexamenasignadoaccion").text('Action');
   
       // TAB EXPEDIENTE DATO GENERAL
       $("#tabexpediente19").text('GENERAL INFORMATION');
       $("#tabexpediente20").text('PARENT/GUARDIAN');
       $("#tabexpediente21").text('MEDICAL INFORMATION');
       $("#tabexpediente22").text('PATIENT/FAMILY HIST');
       $("#tabexpediente23").text('VACCINATIONS');
       $("#tabexpediente1").text("Patient's given names");
       $("#tabexpediente2").text("Patient's last name(s)");
       $("#tabexpediente3").text('Date of Birth');
       $("#tabexpediente4").text('Sex');
       $("#tabexpediente5").text('Civil status');
       $("#tabexpediente6").text('DUI/Government I.D. #');
       $("#tabexpediente7").text('Address');
       $("#tabexpediente8").text('Telephone');
       $("#tabexpediente9").text('Celular');
       $("#tabexpediente10").text('E-mail');
   
      // TAB EXPEDIENTE RESPONSABLE
       $("#tabexpediente11").text('Given name(s)');
       $("#tabexpediente12").text('Last name(s)');
       $("#tabexpediente13").text('Relationship');
       $("#tabexpediente14").text('DUI/Government I.D. #');
       $("#tabexpediente15").text('Telephone');
   
         // TAB EXPEDIENTE DATO MEDICO
       $("#tabexpediente16").text('Illnesses');
       $("#tabexpediente17").text('Allergies');
       $("#tabexpediente18").text('Current medications');
   
               // TAB HISTORIAL CONSULTAS
       $("#tab2historial1").text('PREVIOUS MEDICAL VISIT');
       $("#tab2historial2").text('EXAMS');
       $("#tab2historial3").text('PROCEDURE');
   
          // TABLA HISTORIAL CONSULTAS
       $("#tab2historialconsultabla6").text('PREVIOUS VISITS');
       $("#tab2historialconsultabla1").text('Date');
       $("#tab2historialconsultabla2").text("Patient's name");
       $("#tab2historialconsultabla3").text('Treated by');
       $("#tab2historialconsultabla4").text('Department');
       $("#tab2historialconsultabla5").text('Action');
   
       // TABLA HISTORIAL EXAMENES
       $("#tab2historialexamabla1").text('PREVIOUS EXAMS');
       $("#tab2historialexamabla2").text('Date');
       $("#tab2historialexamabla3").text("Patient's name");
       $("#tab2historialexamabla4").text('Treated by');
       $("#tab2historialexamabla5").text('Exams');
       $("#tab2historialexamabla6").text('Action');
   
       
      // TABLA HISTORIAL PROCEDIMIENTOS
       $("#tab2historialprocetabla1").text('PREVIOUS PROCEDURE');
       $("#tab2historialprocetabla2").text('Date');
       $("#tab2historialprocetabla3").text("Patient's name");
       $("#tab2historialprocetabla4").text('Treated by');
       $("#tab2historialprocetabla5").text('Department');
       $("#tab2historialprocetabla6").text('Motive');
       $("#tab2historialprocetabla7").text('Action');
   
       // MODAL HISTORICO DE CONSULTA
       $("#modaltabconsultamedica1").text('DATE OF VISIT');
       $("#modaltabconsultamedica2").text('GENERAL INFO');
       $("#modaltabconsultamedica3").text('OB-GYN INFO');
       $("#modaltabconsultamedica4").text('PEDIATRIC INFO');
       $("#modaltabconsultamedica5").text('OTHER');
       $("#modaltabconsultamedica6").text('MEDICAL INFO');
       $("#modaltabconsultamedica7").text("Patient's name");
       $("#modaltabconsultamedica8").text('Physician');
       $("#modaltabconsultamedica9").text('Type of visit');
       $("#modaltabconsultamedica10").text('Date');
       $("#modaltabconsultamedica11").text('Weight');
       $("#modaltabconsultamedica12").text('Height');
       $("#modaltabconsultamedica13").text('Temperature');
       $("#modaltabconsultamedica14").text('Respiration');
       $("#modaltabconsultamedica15").text('Pulse');
       $("#modaltabconsultamedica16").text('Blood Pressure');
       $("#modaltabconsultamedica17").text('Glucose');
       $("#modaltabconsultamedica18").text('Last Menstrua.');
       $("#modaltabconsultamedica19").text('Last PAP');
       $("#modaltabconsultamedica20").text('OFC - Occipital Frontal Circumference.');
       $("#modaltabconsultamedica21").text('Height/length');
       $("#modaltabconsultamedica22").text('Weight');
       $("#modaltabconsultamedica23").text('Observations');
       $("#modaltabconsultamedica24").text('Reason for Visit');
       $("#modaltabconsultamedica25").text('Illnesses');
       $("#modaltabconsultamedica26").text('Nutritional state');
       $("#modaltabconsultamedica27").text('Allergies');
       $("#modaltabconsultamedica28").text('Previous surgeries');
       $("#modaltabconsultamedica29").text('Current medications');
       $("#modaltabconsultamedica30").text('Physical exam');
       $("#modaltabconsultamedica31").text('Diagnosis');
       $("#modaltabconsultamedica32").text('Comments');
       $("#modaltabconsultamedica33").text('Other');
       $("#modaltabconsultamedica34").text('Treatment plan');
       $("#modaltabconsultamedica35").text('Next visit');
   
   
      // MODAL PARA AGREGAR LA CONSULTA MEDICA DEL DIA
       $("#modaltabnuevaconsultamedica1").text('MEDICAL INFO');
       $("#modaltabnuevaconsultamedica2").text('Illnesses');
       $("#modaltabnuevaconsultamedica3").text('Nutritional state');
       $("#modaltabnuevaconsultamedica4").text('Allergies');
       $("#modaltabnuevaconsultamedica5").text('Previous surgeries');
       $("#modaltabnuevaconsultamedica6").text('Current medications');
       $("#modaltabnuevaconsultamedica7").text('Physical exam');
       $("#modaltabnuevaconsultamedica8").text('Diagnosis');
       $("#modaltabnuevaconsultamedica9").text('Comments');
       $("#modaltabnuevaconsultamedica10").text('Other');
       $("#modaltabnuevaconsultamedica11").text('Treatment plan');
       $("#modaltabnuevaconsultamedica12").text('Next visit');
       $("#modaltabnuevaconsultamedica13").text("TODAY'S MEDICAL VISIT");
       $("#modaltabnuevaconsultamedica14").text('MEDICAL VISIT:');
       $("#modaltabnuevaconsultamedica15").text("Close");
       $("#modaltabnuevaconsultamedica16").text('Save Changes');
   
      
      // MODAL PARA AGREGAR LA EXAMENES A LA CONSULTA MEDICA DEL DIA
       $("#modaltabnuevoexameneslab1").text('ASSIGNMENT OF LABORATORY EXAMS');
       $("#modaltabnuevoexameneslab2").text('LABORATORY EXAMS');
       $("#modaltabnuevoexameneslab3").text("Exams");
       $("#modaltabnuevoexameneslab4").text('Indication');
       $("#modaltabnuevoexameneslab5").text("Close");
       $("#modaltabnuevoexameneslab6").text('Save Changes');
   
   
      // MODAL CARGAR EXAMEN HEMOGRAMA
       $("#modalconsultahemograma1").text('CBC - Complete Blood Count Report');
       $("#modalconsultahemograma2").text('Results of Exam');
       $("#modalconsultahemograma3").text("Patient's Name");
       $("#modalconsultahemograma4").text('Physician');
       $("#modalconsultahemograma5").text('Date');
       $("#modalconsultahemograma6").text('Page 1');
       $("#modalconsultahemograma7").text('Page 2');
       $("#modalconsultahemograma8").text('Red blood cell count');
       $("#modalconsultahemograma9").text('Hemoglobin');
       $("#modalconsultahemograma10").text('Hematocrit');
       $("#modalconsultahemograma11").text('MCV');
       $("#modalconsultahemograma12").text('MCH');
       $("#modalconsultahemograma13").text("MCHC");
       $("#modalconsultahemograma14").text('Leukocytes');
       $("#modalconsultahemograma15").text("Neutrophils");
       $("#modalconsultahemograma16").text('Lymphocytes');
       $("#modalconsultahemograma17").text('Monocytes');
       $("#modalconsultahemograma18").text('Eusenophil');
       $("#modalconsultahemograma19").text('Basophil');
       $("#modalconsultahemograma20").text('Platelets');
       $("#modalconsultahemograma21").text('Eritrosedimentation');
       $("#modalconsultahemograma21").text('Other');
       $("#modalconsultahemograma22").text('Segmented Neutrophils ');
       $("#modalconsultahemograma23").text('Close');
   
   
        // MODAL CARGAR EXAMEN HECES
       $("#modalconsultaheces1").text('Stool Analysis Report');
       $("#modalconsultaheces2").text('Results of Exam');
       $("#modalconsultaheces3").text("Patient's Name");
       $("#modalconsultaheces4").text('Physician');
       $("#modalconsultaheces5").text('Date');
       $("#modalconsultaheces6").text('Page 1');
       $("#modalconsultaheces7").text('Page 2');
       $("#modalconsultaheces8").text('Color');
       $("#modalconsultaheces9").text('Consistency');
       $("#modalconsultaheces10").text('Mucous');
       $("#modalconsultaheces11").text('Hematies');
       $("#modalconsultaheces12").text('Leukocytes');
       $("#modalconsultaheces13").text("Undigested food");
       $("#modalconsultaheces14").text('Macroscopics');
       $("#modalconsultaheces15").text("Microscopics");
       $("#modalconsultaheces16").text('Bacterial Flora');
       $("#modalconsultaheces17").text('Other');
       $("#modalconsultaheces18").text('Pactives');
       $("#modalconsultaheces19").text('Ova & Parasites');
       $("#modalconsultaheces20").text('Close');
   
   
   
        // MODAL CARGAR EXAMEN QUIMICO
       $("#modalconsultaquimico1").text('Quimic Exam');
       $("#modalconsultaquimico2").text('Results of Exam');
       $("#modalconsultaquimico3").text("Patient's Name");
       $("#modalconsultaquimico4").text('Physician');
       $("#modalconsultaquimico5").text('Date');
       $("#modalconsultaquimico6").text('Glucose');
       $("#modalconsultaquimico7").text('Glucose tolerance');
       $("#modalconsultaquimico8").text('Total Cholesterol');
       $("#modalconsultaquimico9").text('Triglycerides');
       $("#modalconsultaquimico10").text('Uric Acid');
       $("#modalconsultaquimico11").text('Creatinine');
       $("#modalconsultaquimico12").text('Uric Nitrogen');
       $("#modalconsultaquimico13").text("Urea");
       $("#modalconsultaquimico14").text("Close");
   
   
   
      // MODAL CARGAR EXAMEN ORINA
       $("#modalconsultaorina1").text('Urinalys');
       $("#modalconsultaorina2").text('Results of Exam');
       $("#modalconsultaorina3").text("Patient's Name");
       $("#modalconsultaorina4").text('Physician');
       $("#modalconsultaorina5").text('Date');
       $("#modalconsultaorina6").text('Page 1');
       $("#modalconsultaorina7").text('Page 2');
       $("#modalconsultaorina8").text('Color');
       $("#modalconsultaorina9").text('Appearance');
       $("#modalconsultaorina10").text('Density');
       $("#modalconsultaorina11").text('pH');
       $("#modalconsultaorina12").text('Protein');
       $("#modalconsultaorina13").text("Glucose");
       $("#modalconsultaorina14").text('Blood');
       $("#modalconsultaorina15").text("Ketones");
       $("#modalconsultaorina16").text('Urobilinogen');
       $("#modalconsultaorina17").text('Bilirubin');
       $("#modalconsultaorina18").text('Close');
   
   
       // MODAL CARGAR EXAMEN QUIMICO
       $("#modalconsultavarios1").text('Various Exam');
       $("#modalconsultavarios2").text('Results of Exam');
       $("#modalconsultavarios3").text("Patient's Name");
       $("#modalconsultavarios4").text('Physician');
       $("#modalconsultavarios5").text('Date');
       $("#modalconsultavarios6").text('Result');
       $("#modalconsultavarios7").text("Close");
   
   
        // MODAL CARGAR PROCEDIMIENTO
       $("#modalcargaprocedimiento1").text('Report of Procedure');
       $("#modalcargaprocedimiento2").text('Procedure Sheet');
       $("#modalcargaprocedimiento3").text("Patient's Name");
       $("#modalcargaprocedimiento4").text('Physician');
       $("#modalcargaprocedimiento5").text('Type of visit');
       $("#modalcargaprocedimiento6").text('Date');
       $("#modalcargaprocedimiento7").text("Observation");
       $("#modalcargaprocedimiento8").text("Close");
   
   
        // MODAL ASIGNAR EXAMENES MEDICOS
       $("#modalasignarexamen1").text("Laboratory Exam's");
       $("#modalasignarexamen2").text('Exams');
       $("#modalasignarexamen3").text("Type of Exam");
       $("#modalasignarexamen4").text('Indication');
       $("#modalasignarexamen5").text('Close');
       $("#modalasignarexamen6").text('Save Changes');
   
   
        // MODAL NUEVO PROCEDIMIENTO
       $("#modalnuevoprocedimiento1").text("ENTRY OF TODAY'S MEDICAL VISIT");
       $("#modalnuevoprocedimiento2").text('ENTER THE DATA REQUIRED');
       $("#modalnuevoprocedimiento3").text("Date");
       $("#modalnuevoprocedimiento4").text('Physician');
       $("#modalnuevoprocedimiento5").text("Patient's Name");
       $("#modalnuevoprocedimiento6").text('Type of visit');
       $("#modalnuevoprocedimiento7").text('Motive Visit');
       $("#modalnuevoprocedimiento8").text('Close');
       $("#modalnuevoprocedimiento9").text('Save Changes');
   
   
   
   
        // TABLA PROCEDIMIENTOS DE HOY
       $("#tablaprocedimientohoy1").text("TODAY'S PROCEDURE");
       $("#tablaprocedimientohoy2").text('Date');
       $("#tablaprocedimientohoy3").text("Patient's name");
       $("#tablaprocedimientohoy4").text('Treated by');
       $("#tablaprocedimientohoy5").text('Department');
       $("#tablaprocedimientohoy6").text('Motive');
       $("#tablaprocedimientohoy7").text('Action');


       // TABLA TABLA LAB DE HOY
       $("#tblrayosxasignado").text("ORDERS FOR IMAGIN");
       $("#tblrayosasignadoexamen").text('Type of Image');
       $("#tblrayosasignadomedico").text("Physician");
       $("#tblrayosxasignadoindicacion").text('Special instructions');
       $("#tblrayosxasignadoaccion").text('Action');
   
   
    // MODAL PARA AGREGAR LA RAYOS X A LA CONSULTA MEDICA DEL DIA
       $("#modalasignarrayosx1").text('ASSIGNMENT OF X-RAYS');
       $("#modalasignarrayosx2").text('X-RAYS EXAMS');
       $("#modalasignarrayosx3").text("Image");
       $("#modalasignarrayosx4").text('Indication');
       $("#modalasignarrayosx5").text("Close");
       $("#modalasignarrayosx6").text('Save Changes');
   
      
   <?php } ?>
   
   });
</script>