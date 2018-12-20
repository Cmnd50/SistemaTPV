<?php
   use yii\helpers\Html;
   use yii\widgets\DetailView;
   
   
   include '../include/dbconnect.php';
   
   
   /* @var $this yii\web\View */
   /* @var $model app\models\Persona */
   
   $id = $model->IdConsulta;
   
   $queryfichaconsulta = "SELECT c.IdConsulta, p.IdPersona as 'id', u.IdUsuario as 'IdUsuario',
                  CONCAT(u.Nombres,' ',u.Apellidos) as 'Medico', CONCAT(p.Nombres,' ',p.Apellidos) as 'Paciente', c.FechaConsulta as 'Fecha',
                  m.NombreModulo as 'Especialidad', c.Activo, c.Diagnostico As 'Diagnostico', c.Comentarios As 'Comentarios', c.Otros As 'Otros',
                  c.EstadoNutricional As 'EstadoNutricional', c.CirugiasPrevias As 'CirugiasPrevias',
                  c.MedicamentosActuales As 'MedicamentosActuales', c.ExamenFisica As 'ExamenFisica',
                  c.PlanTratamiento As 'PlanTratamiento', c.FechaProxVisita As 'FechaProxVisita', c.Alergias As'Alergias', e.Nombre As 'Enfermedad'
                    FROM consulta c
                    INNER JOIN usuario u ON u.IdUsuario = c.IdUsuario
                    INNER JOIN persona p ON p.IdPersona = c.IdPersona
                    INNER JOIN modulo m ON m.IdModulo = c.IdModulo
                    LEFT JOIN enfermedad e ON e.IdEnfermedad = c.IdEnfermedad
                    where c.IdConsulta = '$id' and c.Activo = 1";
    //echo  $queryfichaconsulta;
    $resultadofichaconsulta = $mysqli->query($queryfichaconsulta);
    while ($test = $resultadofichaconsulta->fetch_assoc()) {
        $idconsulta = $test['IdConsulta'];
        $idusuario = $test['Medico'];
        $idusuarioid = $test['IdUsuario'];
        $idpersona = $test['Paciente'];
        $idpersonaid = $test['id'];
        $idmodulo = $test['Especialidad'];
        $fechaconsulta = $test['Fecha'];
        $diagnostico = $test['Diagnostico'];
        $comentarios = $test['Comentarios'];
        $otros = $test['Otros'];
        $EstadoNutricional = $test['EstadoNutricional'];
        $CirugiasPrevias = $test['CirugiasPrevias'];
        $MedicamentosActuales = $test['MedicamentosActuales'];
        $ExamenFisica = $test['ExamenFisica'];
        $PlanTratamiento = $test['PlanTratamiento'];
        $FechaProxVisita = $test['FechaProxVisita'];
        $Alergias = $test['Alergias'];
        $Enfermedad = $test['Enfermedad'];
    }
   
    // CONSULTA PARA CARGAR LOS SIGNOS VITALES
    $querysignos = "SELECT * FROM indicador where IdConsulta = '$id' ";
    $resultadosignos = $mysqli->query($querysignos);
    while ($test = $resultadosignos->fetch_assoc()) {
        $idindicador = $test['IdIndicador'];
        $idconsulta = $test['IdConsulta'];
        $peso = $test['Peso'];
        $unidadpeso = $test['UnidadPeso'];
        $altura = $test['Altura'];
        $unidadaltura = $test['UnidadAltura'];
        $temperatura = $test['Temperatura'];
        $unidadtemperatura = $test['UnidadTemperatura'];
        $pulso = $test['Pulso'];
        $max = $test['PresionMax'];
        $min = $test['PresionMin'];
        $observaciones = $test['Observaciones'];
        $periodomenstrual = $test['PeriodoMeunstral'];
        $glucotex = $test['Glucotex'];
        $pc = $test['PC'];
        $pt = $test['PT'];
        $pa = $test['PA'];
        $fr = $test['FR'];
        $pap = $test['PAP'];
        $motivo = $test['Motivo'];
    }
   
   
    // CONSULTA PARA CARGAR EL CBO DE LOS EXAMENES
    $querytipoexamen = "SELECT IdTipoExamen, NombreExamen FROM tipoexamen";
    $resultadotipoexamen = $mysqli->query($querytipoexamen);
   
   
    // CONSULTA PARA CARGAR LOS EXAMENES ASIGNADOS A LA CONSULTA
    $queryexamenestabla = "SELECT  c.IdConsulta As 'Consulta', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',
                                        te.NombreExamen As 'Examen', le.Indicacion As 'Indicaciones', le.Activo As 'Activo'
                                          FROM listaexamen le
                                          INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
                                          INNER JOIN persona p ON le.IdPersona = p.IdPersona
                                          LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
                                          INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
                                          WHERE c.IdConsulta = '$id' ";
    $resultadoexamenestabla = $mysqli->query($queryexamenestabla);
   
   
    // CONSULTA PARA CARGAR EXPEDIENTE DEL PACIENTE
    $queryexpedientes = "SELECT PER.IdPersona as 'IdPersona', PER.Nombres as 'Nombres', PER.APellidos as 'Apellidos', PER.FechaNacimiento, Direccion, PER.Dui, PER.IdGeografia, GEO.Nombre as 'NombreDepartamento', PER.Genero, EC.Nombre as 'IdEstadoCivil', Correo, IdParentesco, Telefono, Celular, Alergias, Medicamentos, Enfermedad, TelefonoResponsable, NombresResponsable, 
             ApellidosResponsable, Parentesco, DuiResponsable, PA.NombrePais as 'Pais'
      FROM persona PER
      INNER JOIN geografia GEO on PER.IdGeografia = GEO.IdGeografia
      LEFT JOIN estadocivil EC on PER.IdEstadoCivil = EC.IdEstadoCivil
      LEFT JOIN pais PA on PER.IdPais = PA.IdPais WHERE IdPersona  = '$idpersonaid'";
    $resultadoexpedientes = $mysqli->query($queryexpedientes);
    while ($test = $resultadoexpedientes->fetch_assoc()) {
      $nombres = $test['Nombres'];
      $apellidos = $test['Apellidos'];
      $dui = $test['Dui'];
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
   
   
    // CONSULTA PARA CARGAR EL ESTADO CIVIL EN EL EXPEDIENTE
    // $queryestadocivil = "SELECT * FROM estadocivil WHERE IdEstadoCivil = '$estadocivil'";
    // $resultadoestadocivil = $mysqli->query($queryestadocivil);
   
   
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
   
   
    // CONSULTA PARA CARGAR LA TABLA DE LOS MEDICAMENTOS ACTIVOS EN MODAL
    $querytablamedicamentos = "SELECT IdMedicamento , CONCAT(m.NombreMedicamento, ' - ', m.NombreComercial, ' - ', m.codigo) As 'Medicamento', concat(m.concentracion, ' - ' ,u.NombreUnidadMedida) As 'Presentacion', c.NombreCategoria As 'Categoria',
      l.NombreLaboratorio As 'Laboratorio', m.Existencia As 'Existencia'
                                          FROM medicamentos m
                                          INNER JOIN laboratorio l on m.IdLaboratorio = l.IdLaboratorio
                                          INNER JOIN categoria c on m.IdCategoria = c.IdCategoria
                                          INNER JOIN unidadmedida u on m.IdUnidadMedida = u.IdUnidadMedida
                                          WHERE m.Existencia > 0
                                          ORDER BY Medicamento ASC";
    $resultadotablamedicamentos = $mysqli->query($querytablamedicamentos);
   
    // CONSULTA PARA CARGAR LA TABLA DE LOS RECETA
    $querytablarecetas = "SELECT r.IdReceta, c.IdConsulta As 'Consulta', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                                        r.Fecha As 'Fecha', r.Activo As 'Activo'
                                        FROM receta r
                                        INNER JOIN usuario u ON r.IdUsuario = u.IdUsuario
                                        INNER JOIN persona p ON r.IdPersona = p.IdPersona
                                        INNER JOIN consulta c ON r.IdConsulta = c.IdConsulta
                                        WHERE c.IdConsulta = $id";
    $resultadotablarecetas = $mysqli->query($querytablarecetas);
   
    $queryvalidarreceta = "SELECT r.IdReceta, r.Activo As 'Activo'
                                        FROM receta r
                                        INNER JOIN consulta c ON r.IdConsulta = c.IdConsulta
                                        WHERE c.IdConsulta = $id";
    $resultadovalidarreceta = $mysqli->query($queryvalidarreceta);
   
    // CONSULTA PARA CARGAR ENFERMEDADES EN SELECT DE DIAGNOSTICO
    $querytablaenfermedad = "SELECT IdEnfermedad, Nombre
                                          FROM enfermedad";
    $resultadotablaenfermedad = $mysqli->query($querytablaenfermedad);
   
    $querytablarecetamedicamentos = "SELECT CONCAT(m.NombreComercial,' ',m.NombreMedicamento,' ',um.NombreUnidadMedida) As 'Medicamento', rm.Total As 'Cantidad'
                      FROM receta_medicamentos rm
                      INNER JOIN medicamentos m ON m.IdMedicamento = rm.IdMedicamento
                      INNER JOIN receta r ON r.IdReceta = rm.IdReceta
                      INNER JOIN consulta c ON c.IdConsulta = r.IdConsulta
                      INNER JOIN unidadmedida um ON um.IdUnidadMedida = m.IdUnidadMedida
                      WHERE r.IdConsulta =$id";
    $resultadotablarecetamedicamentos = $mysqli->query($querytablarecetamedicamentos);
   
    $queryhistoricomedicamentos = "SELECT c.IdConsulta As 'ID', r.IdReceta As 'IDReceta', r.Fecha As 'Fecha', CONCAT(p.Nombres,' ',p.Apellidos) As 'Nombre Completo', CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', CONCAT(m.NombreComercial,' ',m.NombreMedicamento,' ',um.NombreUnidadMedida) As 'Medicamento',
                          rm.Cantidad As 'Cantidad', rm.Dias As 'Dias', rm.Horas As 'Horas', rm.Total As 'Total'
                      FROM receta r
                      INNER JOIN  usuario u on u.IdUsuario = r.IdUsuario
                      INNER JOIN persona p on p.IdPersona = r.IdPersona
                      INNER JOIN receta_medicamentos rm on rm.IdReceta = r.IdReceta
                      INNER JOIN medicamentos m on m.IdMedicamento = rm.IdMedicamento
                      INNER JOIN unidadmedida um on um.IdUnidadMedida = m.IdUnidadMedida
                      INNER JOIN consulta c on c.IdConsulta = r.IdConsulta
                      WHERE  p.IdPersona =$idpersonaid
                      ORDER BY c.IdConsulta DESC";
    $resultadotablahistoricomedicamentos = $mysqli->query($queryhistoricomedicamentos);
   
    $querytablaprocedimientos = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente',
                    CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Modulo', ep.FechaProcedimiento As 'Fecha',
                      mp.Nombre As 'Motivo', ep.Observaciones As 'Observaciones', ep.Estado As 'Estado'
                      FROM enfermeriaprocedimiento ep
                      INNER JOIN persona p ON p.IdPersona = ep.IdPersona
                      INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
                      INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
                      INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
                      WHERE p.IdPersona = '$idpersonaid'
                      order by ep.IdEnfermeriaProcedimiento DESC";
   
    $resultadotablaprocedimientos = $mysqli->query($querytablaprocedimientos);
   
   
   
   $this->title = $model->persona->fullName;
   $this->params['breadcrumbs'][] = ['label' => 'Medico - Consulta', 'url' => ['index']];
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
               <h5>INGRESO DE EXPEDIENTE <small>INGRESE LOS DATOS REQUERIDOS.  </small></h5>
               <div class="ibox-tools">
               </div>
            </div>
            <div class="form-horizontal" role="form">
               <div class="tabs-container">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#tab-CONSULTA">CONSULTA</a></li>
                     <li class=""><a data-toggle="tab" href="#tab-EXPEDIENTE">EXPEDIENTE</a></li>
                     <li class=""><a data-toggle="tab" href="#tab-HISTORIAL">HISTORIAL</a></li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-content">
                        <div id="tab-CONSULTA" class="tab-pane active">
                           <div class="panel-body">
                              <div class="tabs-container">
                                 <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-6"> FICHA DE CONSULTA</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-7">DATOS GENERALES</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-8">USO GINECOLOGICO</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-9">USO PEDIATRICO</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-10">OTROS</a></li>
                                 </ul>
                                 <form class="form-horizontal">
                                    <div class="tab-content">
                                       <div id="tab-6" class="tab-pane active">
                                          <div class="panel-body">
                                             <div class="form-group hidden">
                                                <div class="col-sm-5"><input type="text"  name="txtIdConsulta" id="idconsulta"></div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>">  </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Paciente</label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" id="pacientes" value="<?php echo $idpersona ?>" name="txtPaciente" disabled="disabled">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Medico</label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $idusuario ?>" disabled="disabled" id="medicos" name="txtMedico" disabled="disabled">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Especialidad</label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $idmodulo ?>"  disabled="disabled" id="modulos" name="txtMedico" disabled="disabled">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $fechaconsulta ?>" disabled="disabled" id="fechas" name="txtfecha" disabled="disabled">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-7" class="tab-pane">
                                          <div class="panel-body">
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Peso</label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-slideshare"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "999.9"' data-mask name="txtPeso" id="pesos" required="">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <input type="text" class="form-control" disabled="disabled" id="unidadpesos" required="">
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Altura</label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-arrows-v"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "9.99"' data-mask name="txtAltura" id="alturas" required="">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "9.99"' data-mask name="txtAltura" id="unidadalturas" required="">
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Temperatura</label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-thermometer-quarter"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "99.9"' data-mask name="txtTemperatura" id="temperaturas" required="">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "99.9"' data-mask  id="unidadtemperaturas" required="">
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">F/R</label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled"  name="txtFR" id="frs" required="">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Pulso</label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "999"' data-mask name="txtPulso" id="pulsos" required="">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <label for="inputEmail3" class="control-label">lat/min</label>
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Presion</label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-heart-o"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "999"' data-mask name="txtMax" placeholder="MAX" id="maxs" required="">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "99"' data-mask name="txtMin" placeholder="MIN" id="mins" required="">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Glucotex</label></div>
                                                <div class="col-sm-10">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled"  name="txtGluco"  id="glucos" required="">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-8" class="tab-pane">
                                          <div class="panel-body">
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Ult. Menstrua</label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUmestruacion" id="ultimamestruacions">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Ult.PAP</label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUpap" id="ultimapaps">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-9" class="tab-pane">
                                          <div class="panel-body">
                                             <div class="form-group">
                                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">P/C</label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-toggle-down"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" name="txtpc" id="pcs">
                                                   </div>
                                                </div>
                                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">P/T</label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-toggle-up"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled"  name="txtpt" id="pts">
                                                   </div>
                                                </div>
                                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">P/A</label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-toggle-right"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled"  name="txtpa" id="pas">
                                                   </div>
                                                </div>
                                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-10" class="tab-pane">
                                          <div class="panel-body">
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Observaciones</label></div>
                                                <div class="col-sm-10">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                      <textarea type="text" rows="4" class="form-control" name="txtObservaciones" disabled="disabled" data-parsley-maxlength="100" id="observacioness" data-parsley-maxlength="100"> </textarea>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label">Motivo de Visita</label></div>
                                                <div class="col-sm-10">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                      <textarea type="text" rows="4" class="form-control" name="txtMotivo" data-parsley-maxlength="100" disabled="disabled" id="motivos" data-parsley-maxlength="100" required=""> </textarea>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div id="tab-EXPEDIENTE" class="tab-pane">
                           <div class="panel-body">
                              <div class="tabs-container">
                                 <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#EXPDATOGEN"> DATO GENERAL</a></li>
                                    <li class=""><a data-toggle="tab" href="#EXPRESPON">RESPONSABLE</a></li>
                                    <li class=""><a data-toggle="tab" href="#EXPMED">DATO MEDICO</a></li>
                                    <li class=""><a data-toggle="tab" href="#EXPHMED">HISTORIAL CLINICO</a></li>
                                    <li class=""><a data-toggle="tab" href="#EXPVAC">VACUNACION</a></li>
                                 </ul>
                                 <div class="tab-content">
                                    <div id="EXPDATOGEN" class="tab-pane active">
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label for="txtNombres" class="col-sm-1 control-label">Nombres</label>
                                             <div class="col-sm-5">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="txtNombres" name="txtNombres" disabled="disabled" required="" value="<?php echo $nombres ?>">
                                                </div>
                                             </div>
                                             <label for="txtApellidos" class="col-sm-1 control-label">Apellidos</label>
                                             <div class="col-sm-5">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="txtApellidos" name="txtApellidos" disabled="disabled" required="" value="<?php echo $apellidos ?>" >
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtFechaNacimiento" class="col-sm-1 control-label">Nacimiento</label>
                                             <div class="col-sm-5">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                   <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFechaNacimiento" id="txtFechaNacimiento" required="" value="<?php echo $fnacimiento ?>" disabled="disabled">
                                                </div>
                                             </div>
                                             <label for="txtGenero" class="col-sm-1 control-label">Genero</label>
                                             <div class="col-sm-5">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-genderless"></i></div>
                                                   <input type="text" class="form-control" name="txtFechaNacimiento" id="txtGenero" value="<?php echo $genero ?>" disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtIdEstadoCivil" class="col-sm-1 control-label">Estado Civil</label>
                                             <div class="col-sm-5">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                                   <input type="text" class="form-control" name="txtFechaNacimiento" id="txtFechaNacimiento" required="" value="<?php echo $estadocivil ?>" disabled="disabled">
                                                </div>
                                             </div>
                                             <label for="txtDui" class="col-sm-1 control-label">Dui</label>
                                             <div class="col-sm-5">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                                   <input type="text" class="form-control" data-mask="99999999-9" name="txtDui" id="txtDui" value="<?php echo $dui ?>" disabled="disabled" >
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtDireccion" class="col-sm-1 control-label">Dirección</label>
                                             <div class="col-sm-11">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-arrows"></i></div>
                                                   <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required="" value="<?php echo $direccion ?>" disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtTelefono" class="col-sm-1 control-label">Teléfono</label>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                                   <input type="text" class="form-control"  data-mask="9999-9999" id="txtTelefono" name="txtTelefono" value="<?php echo $telefono ?>" disabled="disabled" />
                                                </div>
                                             </div>
                                             <label for="txtCelular" class="col-sm-1 control-label">Celular</label>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                                   <input type="text" class="form-control" data-mask="9999-9999" id="txtCelular" name="txtCelular" value="<?php echo $celular ?>" disabled="disabled"/>
                                                </div>
                                             </div>
                                             <label for="txtCorreo" class="col-sm-1 control-label">Correo</label>
                                             <div class="col-sm-5">
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
                                             <label for="txtNombresResponsable"  class="col-sm-1 control-label">Nombres</label>
                                             <div class="col-sm-5">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="txtNombresResponsable" value="<?php echo $nombreResponsable ?>" disabled="disabled"  name="txtNombresResponsable"/>
                                                </div>
                                             </div>
                                             <label for="txtApellidosResponsable" class="col-sm-1 control-label">Apellidos</label>
                                             <div class="col-sm-5">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="txtApellidosResponsable" value="<?php echo $apellidoResponsable ?>" disabled="disabled"  name="txtApellidosResponsable"/>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtParentesco" class="col-sm-1 control-label">Parentesco</label>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                   <input type="text" class="form-control" id="txtApellidosResponsable" value="<?php echo $parentesco ?>" disabled="disabled"  name="txtApellidosResponsable"/>
                                                </div>
                                             </div>
                                             <label for="txtDuiResponsable" class="col-sm-1 control-label">Dui Responsable</label>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                                   <input type="text" class="form-control" id="txtApellidosResponsable" value="<?php echo $duiresponsable ?>" disabled="disabled"  name="txtApellidosResponsable"/>
                                                </div>
                                             </div>
                                             <label for="txtTelefonoResponsable" class="col-sm-1 control-label">Telefono</label>
                                             <div class="col-sm-2">
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
                                             <label for="txtEnfermedad" class="col-sm-1 control-label">Enfermedades:</label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                                   <input type="text" value="<?php echo $enfermedad ?>" disabled="disabled" rows="3" class="form-control" id="txtEnfermedad" name="txtEnfermedad" >
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtAlergias" class="col-sm-1 control-label">Alergias:</label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                                   <input type="text" value="<?php echo $alergias ?>" disabled="disabled" rows="3" class="form-control" id="txtAlergias" name="txtAlergias" data-parsley-maxlength="100">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtMedicamentos" class="col-sm-1 control-label">Medicamentos:</label>
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
                                    <li class="active"><a data-toggle="tab" href="#HISTDATOGEN">CONSULTAS</a></li>
                                    <li class=""><a data-toggle="tab" href="#HISTRESPON">EXAMENES</a></li>
                                    <li class=""><a data-toggle="tab" href="#HISTMED">PROCEDIMIENTOS</a></li>
                                 </ul>
                                 <div class="tab-content">
                                    <div id="HISTDATOGEN" class="tab-pane active">
                                       <div class="panel-body">
                                          <div class="box-header with-border">
                                             <h3 class="box-title">Historial de Consultas</h3>
                                          </div>
                                          <!-- /.box-header -->
                                          <div class="box-body">
                                             <table id="example2" class="table table-bordered table-hover">
                                                <?php
                                                   echo"<thead>";
                                                   echo"<tr>";
                                                   echo"<th>Fecha de Consulta</th>";
                                                   echo"<th>Nombre de Paciente</th>";
                                                   echo"<th>Nombre de Medico</th>";
                                                   echo"<th>Nombre de Especialidad</th>";
                                                   echo"<th>Accion</th>";
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
                                                       echo "<td>" .
                                                       "<span id='btn" . $idSignosVitales . "' class='btn btn-xs btn-warning btn-mdls'>Ver consulta</span>" .
                                                       "</td>";
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
                                             <h3 class="box-title">Historial de Examenes</h3>
                                          </div>
                                          <!-- /.box-header -->
                                          <div class="box-body">
                                             <table id="example2" class="table table-bordered table-hover">
                                                <?php
                                                   echo"<thead>";
                                                   echo"<tr>";
                                                   echo"<th>Fecha de Examen</th>";
                                                   echo"<th>Nombre de Paciente</th>";
                                                   echo"<th>Nombre de Medico</th>";
                                                   echo"<th>Examen</th>";
                                                   echo"<th>Accion</th>";
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
                                                       echo "<td>" .
                                                       "<span id='btn" . $IdListaExamen . "' class='btn btn-xs btn-warning btn-mdlrex'>Ver Resultados</span>" .
                                                       "</td>";
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
                                             <h3 class="box-title">Historial de Procedimientos</h3>
                                          </div>
                                          <div class="box-body">
                                             <table id="example2" class="table table-bordered table-hover">
                                                <?php
                                                   echo"<thead>";
                                                   echo"<tr>";
                                                   echo"<th>Fecha</th>";
                                                   echo"<th>Nombre de Paciente</th>";
                                                   echo"<th>Nombre de Medico</th>";
                                                   echo"<th>Nombre de Especialidad</th>";
                                                   echo"<th>Motivo</th>";
                                                   echo"<th>Accion</th>";
                                                   echo"</tr>";
                                                   echo"</thead>";
                                                   echo"<tbody>";
                                                   while ($row = $resultadotablaprocedimientos->fetch_assoc()) {
                                                       $idSignosVitales = $row['ID'];
                                                       echo"<tr>";
                                                       echo"<td>" . $row['Fecha'] . "</td>";
                                                       echo"<td>" . $row['Paciente'] . "</td>";
                                                       echo"<td>" . $row['Medico'] . "</td>";
                                                       echo"<td>" . $row['Modulo'] . "</td>";
                                                       echo"<td>" . $row['Motivo'] . "</td>";
                                                       echo "<td>" .
                                                       "<span id='btn" . $idSignosVitales . "' class='btn btn-xs btn-warning btn-proce'>Ver Consulta</span>" .
                                                       "</td>";
                                                       echo"</tr>";
                                                       echo"</body>  ";
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
            <div class="example-modal modal fade" id="modalCargarConsulta">
               <div class="modal">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <form class="form-horizontal"  role="form"  id="demo-form1" data-parsley-validate="">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h3><i class="fa fa-globe"></i> Centro Medico Familiar Shalom</h3>
                              <h4 class="modal-title">REPORTE DE CONSULTA MEDICA</h4>
                           </div>
                           <div class="modal-body ">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="box box-info">
                                       <div class="box-header with-border">
                                          <h3 class="box-title">FICHA DE CONSULTA</h3>
                                       </div>
                        <form class="form-horizontal">
                        <div class="box-body">
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Medico</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="medicos"  disabled="disabled">
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Especialidad</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="modulos" name="especialidad"  disabled="disabled">
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Paciente</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="pacientes" name="paciente"  disabled="disabled">
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Fecha</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="fechas" name="fecha" disabled="disabled">
                        </div>
                        </div>
                        </div>
                        <div class="form-group" hidden="hidden">
                        <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="id" name="id" disabled="disabled">
                        </div>
                        </div>
                        </div>
                        </form>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <!-- FICHA SIGNOS VITALES -->
                        <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">FICHA DE SIGNOS VITALES</h3>
                        </div>
                        <form class="form-horizontal">
                        <div class="box-body">
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Pulso</label>
                        <div class="col-sm-4">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="pulsos" name="pulso" disabled="disabled" >
                        </div>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">Altura</label>
                        <div class="col-sm-2">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="alturas" name="altura" disabled="disabled" >
                        </div>
                        </div>
                        <div class="col-sm-2">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <select class="form-control" name="cboUnidadAltura" id="unidadalturas"  disabled="disabled">
                        <?php
                           if ($unidadpeso == 1) {
                               echo "<option>Mts</option>";
                           } else {
                               echo "<option>Cms</option>";
                           }
                           ?>
                        </select>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Temperatura</label>
                        <div class="col-sm-2">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="temperaturas" name="temperatura"  disabled="disabled" >
                        </div>
                        </div>
                        <div class="col-sm-2">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <select class="form-control" name="cboUnidadTemperatura" id="unidadtemperaturas"  disabled="disabled">
                        <?php
                           if ($unidadpeso == 1) {
                               echo "<option>C</option>";
                           } else {
                               echo "<option>F</option>";
                           }
                           ?>
                        </select>
                        </div>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">Peso</label>
                        <div class="col-sm-2">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="pesos" name="pesos" disabled="disabled" >
                        </div>
                        </div>
                        <div class="col-sm-2">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <select class="form-control" name="cboUnidadPeso" id="unidadpesos"  disabled="disabled">
                        <?php
                           if ($unidadpeso == 1) {
                               echo "<option>Kg</option>";
                           } else {
                               echo "<option>Lbs</option>";
                           }
                           ?>
                        </select>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Presion Max/Min</label>
                        <div class="col-sm-2">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control"  name="max"  disabled="disabled" id="maxs" >
                        </div>
                        </div>
                        <div class="col-sm-2">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control"  name="min"  disabled="disabled" id="mins" >
                        </div>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">F/R</label>
                        <div class="col-sm-4">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control"  name="min"  disabled="disabled" id="frs" >
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Glucotex</label>
                        <div class="col-sm-4">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="glucotexs"   disabled="disabled" >
                        </div>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">Fecha de ultima Menstruacion</label>
                        <div class="col-sm-3">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="ultimamenstruacions"  name="min" disabled="disabled" >
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Ultima PAP</label>
                        <div class="col-sm-4">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="ultimapaps"  disabled="disabled" >
                        </div>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">P/C cm.</label>
                        <div class="col-sm-4">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control"  name="min" id="pcs"  disabled="disabled" >
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">P/T cm.</label>
                        <div class="col-sm-4">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" id="pts"  disabled="disabled" >
                        </div>
                        </div>
                        <label for="inputEmail3" class="col-sm-1 control-label">P/A cm.</label>
                        <div class="col-sm-4">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control"  name="min" id="pas"  disabled="disabled" >
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Motivo de Visita</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" class="form-control" id="motivos"  disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Observación</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" class="form-control" id="observacioness" disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        </div>
                        </form>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">SECCION MEDICA</h3>
                        </div>
                        <form class="form-horizontal" action="medico_finalizar_consulta.php" method="POST" >
                        <div class="box-body">
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" >Enfermedad</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="1" class="form-control" id="enfermedads" disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" >Estado Nutricional</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" class="form-control" id="estadonutricions"   disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" >Alergias</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" id="alergiass" class="form-control"  disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" >Cirugias Previas</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" id="cirugiaspreviass" class="form-control"  disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" >Medicamentos tomados Actualmente</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" id="medicamentotomados" class="form-control"  disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" >Examen Fisica</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" id="examenfisicas" class="form-control"  disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Diagnostico</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" class="form-control" id="diagnosticos" name="txtDiagnostico" disabled="disabled">  </textarea>
                        </div>
                        </div>
                        <div class="hidden">
                        <textarea  type="text" rows="1" class="form-control"   name="txtconsultaID">  </textarea>
                        </div>
                        <div class="hidden">
                        <textarea  type="text" rows="1" class="form-control"   name="txtpersonaID">  </textarea>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" >Comentarios</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" class="form-control" id="comentarioss" name="txtComentarios" disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Otros</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" class="form-control" id="otross" name="txtOtros" disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" >Plan de Tratamiento</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="3" id="plantratamientos" class="form-control"  disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" >Fecha de proxima Visita</label>
                        <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                        </div>
                        <textarea type="text" rows="1" id="fechaproximas" class="form-control"  disabled="disabled">  </textarea>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-8">
                        </div>
                        </div>
                        </div>
                        </form>
                        </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- MODAL PARA EXAMEN HEMOGRAMA -->
            <div class="example-modal modal fade" id="modalCargarExamenHemograma">
               <div class="modal">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <form class="form-horizontal"  role="form"  id="demo-form1" data-parsley-validate="">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Examen Hemograma</h4>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Paciente</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenHemogramaPaciente" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Medico</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenHemogramaMedico" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Fecha</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenHemogramaFecha" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Globulos Rojos</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaGlobulosRojos" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>X mm3</small></label>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Hemoglobina</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaHemoglobina" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>Gr/dl</small></label>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Hematocrito</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaHematocrito" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                                 <label for="inputEmail3" class="col-sm-2 control-label">VGM</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaVgm" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>Micras cubicas</small></label>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">HCM</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaHcm" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>Micro microgramos</small></label>
                                 <label for="inputEmail3" class="col-sm-2 control-label">CHCM</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaChcm" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Leucocitos</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaLeucocitos" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>X mm3</small></label>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Neutrofilos en Banda</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaNeutrofilos" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Linfocitos</label>
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
                                 <label for="inputEmail3" class="col-sm-2 control-label">Eosinofilos</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaEosinofilos" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Basofilos</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaBasofilos" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>%</small></label>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Plaquetas</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaPlaquetas" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>X mm3</small></label>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Eritro Sedimentacion</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaEritrosedimentacion" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>mm/h</small></label>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Otros</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenHemogramaOtros" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Neutrofilos Segmentados</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenHemogramaNeutrofilosSegmentados" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label"><small>X mm3</small></label>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- MODAL PARA CARGAR EXAMEN HECES -->
            <div class="example-modal modal fade" id="modalCargarExamenHeces">
               <div class="modal">
                  <div class="modal-dialog modal-lg ">
                     <div class="modal-content">
                        <form class="form-horizontal"  role="form"  id="demo-form1" data-parsley-validate="">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Examen Heces</h4>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Paciente</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenHecesPaciente" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Medico</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenHecesMedico" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Examen</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenHecesNombreExamen" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Fecha</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenHecesFecha" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Color</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenHecesColor" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Consistencia</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenHecesConsistencia" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Mucus</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenHecesMucus" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Hematies</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenHecesHematies" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Leucocitos</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenHecesLeucocitos" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Restos Alimenticios</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenHecesRestosAlimenticios" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Macroscopios</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenHecesMacrocopios" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Microscopios</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenHecesMicroscopicos" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Flora Bacteriana</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenHecesFlora" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Otros</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenHecesOtros" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">PActivos</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenHecesPActivos" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">PQuistes</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenHecesPQuistes" disabled="disabled">
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                           </div>
                        </form>
                     </div>
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
                              <h4 class="modal-title">Examen Varios</h4>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Paciente</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenesVariosPaciente" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Medico</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenesVariosMedico" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Examen</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenesVariosNombreExamen" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Fecha</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenesVariosFecha" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Resultado</label>
                                 <div class="col-sm-9">
                                    <textarea type="text" rows="3" id="ExamenesVariosResultado" class="form-control" disabled="disabled"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- MODAL PARA CARGAR EXAMEN ORINA -->
            <div class="example-modal modal fade" id="modalCargarExamenOrina">
               <div class="modal">
                  <div class="modal-dialog modal-lg ">
                     <div class="modal-content">
                        <form class="form-horizontal"  role="form"  id="demo-form1" data-parsley-validate="">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Examen Orina</h4>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Paciente</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenOrinaPaciente" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Medico</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenOrinaMedico" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Examen</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenOrinaNombreExamen" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Fecha</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenOrinaFecha" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Color</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenOrinaColor" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Aspecto</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenOrinaAspecto" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Densidad</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenOrinaDendisdad" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Ph</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenOrinaPh" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Proteinas</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenOrinaProteinas" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Glucosa</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenOrinaGlucosa" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Sangre Oculta</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenOrinaSangreOculta" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Cuerpos Cetomicos</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenOrinaCuerposCetomicos" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Uroblinogeno</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenOrinaUrobilinogeno" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Bilirrubina</label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" id="ExamenOrinaBilirrubina" disabled="disabled">
                                 </div>
                              </div>
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
                           <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                           </div>
                        </form>
                     </div>
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
                              <h4 class="modal-title">Examen Orina</h4>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Paciente</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenQuimicaPaciente" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Medico</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenQuimicaMedico" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Examen</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenQuimicaNombreExamen" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Fecha</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ExamenQuimicaFecha" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Glucosa</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenQuimicaGlucosa" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">70 - 110 mg/dl</label>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Glucosa Post</label>
                                 <div class="col-sm-3">
                                    <input type="text" class="form-control" id="ExamenQuimicaGlucosaPost" disabled="disabled">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Colesterol Total</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenQuimicaColesterolTotal" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Hasta 200 mg/dl</label>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Triglicerido</label>
                                 <div class="col-sm-1">
                                    <input type="text" class="form-control" id="ExamenQuimicaTriglicerido" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Hasta 150 mg/dl</label>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Acido Urico</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenQuimicaAcidoUrico" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">M: 2.0 – 6.0 mg/dl H: 3.4 – 7.0 mg/dl</label>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Creatinina</label>
                                 <div class="col-sm-1">
                                    <input type="text" class="form-control" id="ExamenQuimicaCreatinina" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">0.6 - 1.2 mg/dl</label>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Nitrogeno Ureico</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" id="ExamenQuimicaNitrogenoUreico" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">7.0 - 21.0 mg/dl</label>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Urea</label>
                                 <div class="col-sm-1">
                                    <input type="text" class="form-control" id="ExamenQuimicaUrea" disabled="disabled">
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">15.0 - 45.0 mg/dl</label>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- MODAL CARGAR PROCEDIMIENTOS -->
            <div class="example-modal modal fade" id="modalCargarProcedimientos">
               <div class="modal">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <form class="form-horizontal"   role="form" method="POST" id="demo-form1" data-parsley-validate="">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h3><i class="fa fa-globe"></i> Centro Medico Familiar Shalom</h3>
                              <h4 class="modal-title">REPORTE DE PROCEDIMIENTOS</h4>
                           </div>
                           <div class="modal-body ">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="box box-primary">
                                       <div class="box-header with-border">
                                          <h3 class="box-title">FICHA DE CONSULTA</h3>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-1"></div>
                                          <div class="col-sm-3"><label for="inputEmail3" class="control-label">Paciente</label></div>
                                          <div class="col-sm-7"><input type="text" class="form-control" name="txtPaciente" id="procepacientes" disabled="disabled"></div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-1"></div>
                                          <div class="col-sm-3"><label for="inputEmail3" class="control-label">Medico</label></div>
                                          <div class="col-sm-7"> <input type="text" class="form-control" name="txtMedico" id="procemedicos" disabled="disabled" value=" "></div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-1"></div>
                                          <div class="col-sm-3"><label for="inputEmail3" class="control-label">Especialidad</label></div>
                                          <div class="col-sm-7"> <input type="text" class="form-control" name="txtMedico" id="procemodulos" disabled="disabled" value=" "></div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-1"></div>
                                          <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                          <div class="col-sm-7"> <input type="text" class="form-control" name="txtFecha" id="procefechas" disabled="disabled"></div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-1"></div>
                                          <div class="col-sm-3"><label for="inputEmail3" class="control-label">Procedimiento</label></div>
                                          <div class="col-sm-7"> <input type="text" class="form-control" name="" id="procemotivos" disabled="disabled"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="box box-primary">
                                       <div class="box-header with-border">
                                          <h3 class="box-title">OTROS</h3>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-1"></div>
                                          <div class="col-sm-3"><label for="inputEmail3" class="control-label">Observaciones</label></div>
                                          <div class="col-sm-7"> <textarea disabled="disabled" type="text" rows="8" class="form-control" name="txtObservaciones" data-parsley-maxlength="400" id="proceobservacioness"> </textarea> </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
   
       $.post( "../../views/consultamedico/historico.php", { IdFactor: "2", IdPersona: "<?php echo $idpersonaid; ?>" })
         .done(function( data ) {
           $("#historialclinico").html(data);
   
       });
       $.post( "../../views/consultamedico/historico.php", { IdFactor: "3", IdPersona: "<?php echo $idpersonaid; ?>" })
         .done(function( data ) {
           $("#vacunacion").html(data);
   
       });
   
   
       $(".btn-mdls").click(function () {
           var id = $(this).attr("id").replace("btn", "");
           var myData = {"id": id};
           //alert(myData);
           $.ajax({
               url: "../../views/consultamedico/cargarconsultasignosvitales.php",
               type: "POST",
               data: myData,
               dataType: "JSON",
               beforeSend: function () {
                   $(this).html("Cargando");
               },
               success: function (data) {
                   $("#pacientes").val(data.Paciente);
                   $("#medicos").val(data.Medico);
                   $("#modulos").val(data.Especialidad);
                   $("#fechas").val(data.FechaConsulta);
                   $("#diagnosticos").val(data.Diagnostico);
                   $("#enfermedads").val(data.Enfermedad);
                   $("#comentarioss").val(data.Comentarios);
                   $("#otross").val(data.Otros);
                   $("#pesos").val(data.Peso);
                   if (data.UnidadPeso == 1) {
                       $("#unidadpesos").val("Kg");
                   } else {
                       $("#unidadpesos").val("Lbs");
                   }
                   $("#alturas").val(data.Altura);
                   if (data.UnidadAltura == 1) {
                       $("#unidadalturas").val("Mts");
                   } else {
                       $("#unidadalturas").val("Cms");
                   }
                   $("#temperaturas").val(data.Temperatura);
                   if (data.UnidadTemperatura == 1) {
                       $("#unidadtemperaturas").val("C");
                   } else {
                       $("#unidadtemperaturas").val("F");
                   }
                   $("#pulsos").val(data.Pulso);
                   $("#maxs").val(data.Max);
                   $("#mins").val(data.Min);
                   $("#observacioness").val(data.Observaciones);
   
                   $("#frs").val(data.FR);
                   $("#glucotexs").val(data.Glucotex);
                   $("#ultimamenstruacions").val(data.PeriodoMeunstral);
                   $("#ultimapaps").val(data.PAP);
                   $("#pcs").val(data.PC);
                   $("#pts").val(data.PT);
                   $("#pas").val(data.PA);
                   $("#motivos").val(data.Motivo);
                   $("#estadonutricions").val(data.EstadoNutricional);
                   $("#alergiass").val(data.Alergias);
                   $("#cirugiaspreviass").val(data.CirugiasPrevias);
                   $("#medicamentotomados").val(data.MedicamentosActuales);
                   $("#plantratamientos").val(data.PlanTratamiento);
                   $("#fechaproximas").val(data.FechaProxVisita);
                   $("#examenfisicas").val(data.ExamenFisica);
   
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
       $(".btn-mdlme").click(function () {
           var id = $(this).attr("id").replace("btn", "");
           var myData = {"id": id};
           //alert(myData);
           $.ajax({
               url: "../../views/consultamedico/cargarmedicamentomodal.php",
               type: "POST",
               data: myData,
               dataType: "JSON",
               beforeSend: function () {
                   $(this).html("Cargando");
               },
               success: function (data) {
                   $("#idmedicamentos").val(data.IdMedicamento);
                   $("#medicamentos").val(data.Medicamento);
                   $("#presentacions").val(data.Presentacion);
                   $("#categorias").val(data.Categoria);
                   $("#laboratorios").val(data.Laboratorio);
                   $("#existencias").val(data.Existencia);
                   $("#modalAsignarGuardarMedicamento").modal("show");
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
   
   });
</script>