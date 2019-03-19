<?php
   use yii\helpers\Html;
   use yii\widgets\DetailView;
   
   include '../include/dbconnect.php';
   /* @var $this yii\web\View */
   /* @var $model app\models\persona */
   
     $IdGeografia = $model->IdGeografia;
     $IdPais = $model->IdPais;
     $idpersonaid = $model->IdPersona;
      
      $queryobtenermunicipiodepa = "SELECT GEO1.Nombre as 'Municipio', (SELECT Nombre FROM geografia GEO2 where GEO2.IdGeografia = GEO1.IdPadre) as 'Departamento'
       FROM geografia GEO1 where GEO1.IdGeografia = '$IdGeografia'";
       //echo  $queryfichaconsulta;
       $resultadoobtenermunicipiodepa = $mysqli->query($queryobtenermunicipiodepa);
       while ($test = $resultadoobtenermunicipiodepa->fetch_assoc()) {
           $Municipio = $test['Municipio'];
           $Departamento = $test['Departamento'];
       }
   
      $queryobtenerpais = "SELECT NombrePais FROM pais where IdPais = '$IdPais'";
       //echo  $queryfichaconsulta;
       $resultadoobtenerpais = $mysqli->query($queryobtenerpais);
       while ($test = $resultadoobtenerpais->fetch_assoc()) {
           $Pais = $test['NombrePais'];
       }
   
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
   
   $this->title = $model->fullname;
   $this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
   $this->params['breadcrumbs'][] = $this->title;
   ?>
</br>
<?php if (Yii::$app->session->hasFlash("success")): ?>
<?php
   $session = \Yii::$app->getSession();
   $session->setFlash("success", "Se a agregado con Exito!"); ?>
<?= \odaialali\yii2toastr\ToastrFlash::widget([
   "options" => [
       "closeButton"=> true,
       "debug" =>  false,
       "progressBar" => true,
       "preventDuplicates" => true,
       "positionClass" => "toast-top-right",
       "onclick" => null,
       "showDuration" => "100",
       "hideDuration" => "1000",
       "timeOut" => "2000",
       "extendedTimeOut" => "100",
       "showEasing" => "swing",
       "hideEasing" => "linear",
       "showMethod" => "fadeIn",
       "hideMethod" => "fadeOut"
       ]
   ]);?>
<?php endif; ?> 
<?php if (Yii::$app->session->hasFlash("warning")): ?>
<?php
   $session = \Yii::$app->getSession();
   $session->setFlash("warning", "Se a actualizado con Exito!"); ?>
<?= \odaialali\yii2toastr\ToastrFlash::widget([
   "options" => [
       "closeButton"=> true,
       "debug" =>  false,
       "progressBar" => true,
       "preventDuplicates" => true,
       "positionClass" => "toast-top-right",
       "onclick" => null,
       "showDuration" => "100",
       "hideDuration" => "1000",
       "timeOut" => "2000",
       "extendedTimeOut" => "100",
       "showEasing" => "swing",
       "hideEasing" => "linear",
       "showMethod" => "fadeIn",
       "hideMethod" => "fadeOut"
       ]
   ]);?>
<?php endif; ?>
<style>
   table.detail-view th {
   width: 25%;
   }
   table.detail-view td {
   width: 75%;
   }
</style>
<div class="row">
   <div class="col-md-12">
      <div class="ibox float-e-margins">
         <div class="ibox-title">
            <h3><?= Html::encode($this->title) ?></h3>
         </div>
         <div class="ibox-content">
            <div class="tabs-container">
               <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#tab-1">DATOS GENERALES</a></li>
                  <li class=""><a data-toggle="tab" href="#tab-2">CONSULTAS</a></li>
                  <li class=""><a data-toggle="tab" href="#tab-3">EXAMENES</a></li>
                  <li class=""><a data-toggle="tab" href="#tab-4">PROCEDIMIENTOS</a></li>
                  <li class="pull-right">
                     <button type="button" class="btn  btn-danger dim"   data-toggle="modal" data-target="#modalGuardarDiagnostico"> Enter Data<i class="fa fa-heart"></i></button>   
                     <button type="button" class="btn  btn-info dim"  data-toggle="modal" data-target="#modalGuardarExamenes"> LAB <i class="fa fa-bars"></i></button>
                  </li>
               </ul>
               <div class="tab-content">
                  <div id="tab-1" class="tab-pane active">
                     <div class="panel-body">
                        <h3> DATOS GENERALES </h3>
                        <table class="table table-hover">
                           <?= DetailView::widget([
                              'model' => $model,
                              'attributes' => [
                                  'Nombres',
                                  'Apellidos',
                                  'FechaNacimiento',
                                  'Direccion',
                                  'Dui',
                                  'Correo',
                                  [
                                      'attribute' => 'Pais',
                                      'format' => 'raw',
                                      'value' => $Pais,
                                  ],
                                  [
                                      'attribute' => 'Municipio',
                                      'format' => 'raw',
                                      'value' => $Municipio,
                                  ],
                                  [
                                      'attribute' => 'Departamento',
                                      'format' => 'raw',
                                      'value' => $Departamento,
                                  ],
                                  'Genero',
                                  'estadoCivil.Nombre',
                                  'Telefono',
                                  'Celular',
                              ],
                              ]) ?>
                        </table>
                        <h3>    DATOS MEDICOS </h3>
                        <table class="table table-hover">
                           <?= DetailView::widget([
                              'model' => $model,
                              'attributes' => [
                                  'Alergias',
                                  'Medicamentos',
                                  'Enfermedad',
                              ],
                              ]) ?>
                        </table>
                        <h3> DATOS RESPONSABLE</h3>
                        <table class="table table-hover">
                           <?= DetailView::widget([
                              'model' => $model,
                              'attributes' => [
                                  'TelefonoResponsable',
                                  'Categoria',
                                  'NombresResponsable',
                                  'ApellidosResponsable',
                                  'Parentesco',
                                  'DuiResponsable',
                              ],
                              ]) ?>
                        </table>
                        <p align="center">
                           <?= Html::a('Actualizar Informacion General', ['update', 'id' => $model->IdPersona], ['class' => 'btn btn-warning']) ?>
                        </p>
                     </div>
                  </div>
                  <div id="tab-2" class="tab-pane">
                     <div class="panel-body">
                        <div class="box-header with-border" >
                           <h3 class="box-title" id='tab2historialconsultabla6'>HISTORIAL DE CONSULTAS</h3>
                        </div>
                        <div class="box-body">
                           <table id="example2" class="table table-bordered table-hover">
                              <?php
                                 echo"<thead>";
                                 echo"<tr>";
                                 echo"<th id='tab2historialconsultabla1'>FECHA</th>";
                                 echo"<th id='tab2historialconsultabla2'>PACIENTE</th>";
                                 echo"<th id='tab2historialconsultabla3'>MEDICO</th>";
                                 echo"<th id='tab2historialconsultabla4'>ESPECIALIDAD</th>";
                                 echo"<th style = 'width:150px' id='tab2historialconsultabla5'>ACCION</th>";
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
                                         echo "<td>".
                                                "<span id='btn".$idSignosVitales."' style='width:140px' class='btn  btn-success btn-mdl'> Ver Consulta</span>".
                                                "</td>";
                                       }
                                       echo"</tr>";
                                       echo"</body>  ";
                                 
                                 ?>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div id="tab-3" class="tab-pane">
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
                                 echo"<th id='tab2historialexamabla2'>FECHA</th>";
                                 echo"<th id='tab2historialexamabla3'>PACIENTE</th>";
                                 echo"<th id='tab2historialexamabla4'>MEDICOS</th>";
                                 echo"<th id='tab2historialexamabla5'>EXAMEN</th>";
                                 echo"<th style = 'width:150px' id='tab2historialexamabla6'>ACCION</th>";
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
                                     "<span id='btn" . $IdListaExamen . "' style='width:140px' class='btn btn-md btn-success btn-mdlrex'>Ver Resultados</span>" .
                                     "</td>";
                                     echo"</tr>";
                                     echo"</body>  ";
                                 }
                                 ?>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div id="tab-4" class="tab-pane">
                     <div class="panel-body">
                        <div class="box-header with-border">
                           <h3 class="box-title" id='tab2historialexamabla1'>HISTORIAL DE PROCEDIMIENTOS</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table id="example2" class="table table-bordered table-hover">
                              <?php
                                 echo"<thead>";
                                 echo"<tr>";
                                 echo"<th id='tab2historialexamabla2'>FECHA</th>";
                                 echo"<th id='tab2historialexamabla3'>PACIENTE</th>";
                                 echo"<th id='tab2historialexamabla4'>MEDICOS</th>";
                                 echo"<th id='tab2historialexamabla5'>EXAMEN</th>";
                                 echo"<th style = 'width:150px' id='tab2historialexamabla6'>ACCION</th>";
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
                                     "<span id='btn" . $IdListaExamen . "' style='width:140px' class='btn btn-md btn-success btn-mdlrex'>Ver Resultados</span>" .
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