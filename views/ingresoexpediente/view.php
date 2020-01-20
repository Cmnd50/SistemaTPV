<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* LLAMAMOS LA CONEXION A LA BASE */
include '../include/dbconnect.php';
/*  LLAMAMOS LOS QUERYS PARA LAS TABLAS */
include 'querystabla.php';

/* @var $this yii\web\View */
/* @var $model app\models\persona */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>

<?php if (Yii::$app->session->hasFlash("success")) : ?>
   <?php
   $session = \Yii::$app->getSession();
   $session->setFlash("success", "Se a agregado con Exito!"); ?>
   <?= \odaialali\yii2toastr\ToastrFlash::widget([
      "options" => [
         "closeButton" => true,
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
   ]); ?>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash("warning")) : ?>
   <?php
   $session = \Yii::$app->getSession();
   $session->setFlash("warning", "Se a actualizado con Exito!"); ?>
   <?= \odaialali\yii2toastr\ToastrFlash::widget([
      "options" => [
         "closeButton" => true,
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
   ]); ?>
<?php endif; ?>
<!-- LLAMAMOS LOS CSS DEL FORMULARIO -->
<?php include 'styles.php' ?>

<div class="row">
   <div class="col-md-12">
      <div class="ibox float-e-margins">
         <div class="ibox-title">
            <h3><?= Html::encode($this->title) ?></h3> <br>
            <center>
               <button type="button" class="btn  btn-danger dim" data-toggle="modal" data-target="#modalGuardarDiagnostico">+ CONSULTA<i class="fa fa-heart"></i></button>
               <button type="button" class="btn  btn-success dim" data-toggle="modal" data-target="#modalGuardarImagenExamen">CONSULTAS <i class="fa fa-file-pdf-o"></i></button>
               <button type="button" class="btn  btn-success dim" data-toggle="modal" data-target="#modalGuardarImagenExamen">EXAMENES <i class="fa fa-file-pdf-o"></i></button>
               <button type="button" class="btn  btn-success dim" data-toggle="modal" data-target="#modalCargarProcedimientoIma">PROCEDIMIENTOS <i class="fa fa-file-pdf-o"></i></button>
               <button type="button" class="btn  btn-success dim" data-toggle="modal" data-target="#modalCargarPediatriaIma">PEDIATRIA <i class="fa fa-file-pdf-o"></i></button>
               <button type="button" class="btn  btn-success dim" data-toggle="modal" data-target="#modalCargarGinecologiaIma">GINECOLOGIA <i class="fa fa-file-pdf-o"></i></button>
               <button type="button" class="btn  btn-success dim" data-toggle="modal" data-target="#modalCargarRecetasIma">RECETAS <i class="fa fa-file-pdf-o"></i></button>
            </center>
            <br>
         </div>
         </br>
         <div class="ibox-content">
            NOTIFICACIONES:
            <?php if ($direccion == 'ACTUALIZADO') {
            ?>
               <div class="alert alert-danger alert-dismissible" hidden='hidden'>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Atencion!</strong> <?php echo $direccion; ?>
               </div>
            <?php
            } else if ($direccion == 'ACTUALIZAR DIRECCION') {
            ?>
               <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Atencion!</strong> <?php echo $direccion; ?>
               </div>
            <?php
            } ?>

            <?php if ($responsable == 'ACTUALIZADO') {
            ?>
               <div class="alert alert-danger alert-dismissible " hidden='hidden'>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Atencion!</strong> <?php echo $responsable; ?>
               </div>
            <?php
            } else if ($responsable == 'FECHA DE NACIMIENTO SIN REGISTRARSE') {
            ?>
               <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Atencion!</strong> <?php echo $responsable; ?>
               </div>
            <?php
            } else if ($responsable == 'ACTUALIZAR RESPONSABLE') {
            ?>
               <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Atencion!</strong> <?php echo $responsable; ?>
               </div>
            <?php
            } ?>

            <?php if ($genero == 'ACTUALIZADO') {
            ?>
               <div class="alert alert-danger alert-dismissible" hidden="hidden">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Atencion!</strong> <?php echo $genero; ?>
               </div>
            <?php
            } else if ($genero == 'ACTUALIZAR GENERO') {
            ?>
               <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Atencion!</strong> <?php echo $genero; ?>
               </div>
            <?php
            } ?>
            <div class="ibox-content">
               <div class="tabs-container">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#tab-1">DATOS GENERALES</a></li>
                     <li class=""><a data-toggle="tab" href="#tab-2">CONSULTAS</a></li>
                     <!-- <li class=""><a data-toggle="tab" href="#tab-3">EXAMENES</a></li>
                  <li class=""><a data-toggle="tab" href="#tab-4">PROCEDIMIENTOS</a></li> -->
                     <li class=""><a data-toggle="tab" href="#tab-5">CARGAS PDF</a></li>
                  </ul>
                  <div class="tab-content">
                     <!-- TAB DE DATOS GENERALES Y UPDATE -->
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
                                    [
                                       'attribute' => 'Edad',
                                       'format' => 'raw',
                                       'value' => $edad,
                                    ],
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
                                    'CodigoPaciente',
                                 ],
                              ]) ?>
                           </table>
                           <h3> CODIGO DE BARRAS </h3>
                           <center>
                              <div id="barcode"></div>
                           </center>
                           <h3> DATOS MEDICOS </h3>
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
                     <!-- TAB DE CONSULTAS INGRESADAS EN EL SISTEMA -->
                     <div id="tab-2" class="tab-pane">
                        <div class="tabs-container">
                           <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-52">CONSULTAS GENERAL</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-62">CONSULTA PEDIATRICA</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-72">CONSULTA GINECOLOGICA</a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="tab-52" class="tab-pane active">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>CONSULTAS GENERAL</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                       <table id="example2" class="table table-bordered table-hover">
                                          <?php
                                          echo "<thead>";
                                          echo "<tr>";
                                          echo "<th id='tab2historialconsultabla1'>FECHA</th>";
                                          echo "<th id='tab2historialconsultabla2'>PACIENTE</th>";
                                          echo "<th id='tab2historialconsultabla3'>MEDICO</th>";
                                          echo "<th id='tab2historialconsultabla4'>ESPECIALIDAD</th>";
                                          echo "<th style = 'width:150px' id='tab2historialconsultabla5'>ACCION</th>";
                                          echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while ($row = $resultadotablaconsulta->fetch_assoc()) {
                                             $idSignosVitales = $row['IdConsulta'];
                                             echo "<tr>";
                                             echo "<td>" . $row['FechaConsulta'] . "</td>";
                                             echo "<td>" . $row['Paciente'] . "</td>";
                                             echo "<td>" . $row['Medico'] . "</td>";
                                             echo "<td>" . $row['Especialidad'] . "</td>";
                                             echo "<td>" .
                                                "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn  btn-success btn-mdl'> Ver Consulta</span>" .
                                                "</td>";
                                          }
                                          echo "</tr>";
                                          echo "</body>  ";
                                          ?>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-62" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>CONSULTA PEDIATRICA</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                       <table id="example2" class="table table-bordered table-hover">
                                          <?php
                                          echo "<thead>";
                                          echo "<tr>";
                                          echo "<th id='tab2historialconsultabla1'>FECHA</th>";
                                          echo "<th id='tab2historialconsultabla2'>PACIENTE</th>";
                                          echo "<th id='tab2historialconsultabla3'>MEDICO</th>";
                                          echo "<th id='tab2historialconsultabla4'>ESPECIALIDAD</th>";
                                          echo "<th style = 'width:150px' id='tab2historialconsultabla5'>ACCION</th>";
                                          echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while ($row = $resultadotablaconsultapediatria->fetch_assoc()) {
                                             $idSignosVitales = $row['IdConsulta'];
                                             echo "<tr>";
                                             echo "<td>" . $row['FechaConsulta'] . "</td>";
                                             echo "<td>" . $row['Paciente'] . "</td>";
                                             echo "<td>" . $row['Medico'] . "</td>";
                                             echo "<td>" . $row['Especialidad'] . "</td>";
                                             echo "<td>" .
                                                "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn  btn-success btn-mdl'> Ver Consulta</span>" .
                                                "</td>";
                                          }
                                          echo "</tr>";
                                          echo "</body>  ";
                                          ?>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-72" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>CONSULTA GINECOLOGICA</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                       <table id="example2" class="table table-bordered table-hover">
                                          <?php
                                          echo "<thead>";
                                          echo "<tr>";
                                          echo "<th id='tab2historialconsultabla1'>FECHA</th>";
                                          echo "<th id='tab2historialconsultabla2'>PACIENTE</th>";
                                          echo "<th id='tab2historialconsultabla3'>MEDICO</th>";
                                          echo "<th id='tab2historialconsultabla4'>ESPECIALIDAD</th>";
                                          echo "<th style = 'width:150px' id='tab2historialconsultabla5'>ACCION</th>";
                                          echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while ($row = $resultadotablaconsultaginecologia->fetch_assoc()) {
                                             $idSignosVitales = $row['IdConsulta'];
                                             echo "<tr>";
                                             echo "<td>" . $row['FechaConsulta'] . "</td>";
                                             echo "<td>" . $row['Paciente'] . "</td>";
                                             echo "<td>" . $row['Medico'] . "</td>";
                                             echo "<td>" . $row['Especialidad'] . "</td>";
                                             echo "<td>" .
                                                "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn  btn-success btn-mdl'> Ver Consulta</span>" .
                                                "</td>";
                                          }
                                          echo "</tr>";
                                          echo "</body>  ";
                                          ?>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- TAB DE HISTORIAL DE EXAMENES (REVISAR PORQUE ESTA COMENTAREADO) -->
                     <div id="tab-3" class="tab-pane">
                        <div class="panel-body">
                           <div class="box-header with-border">
                              <h3 class="box-title" id='tab2historialexamabla1'>HISTORIAL DE EXAMENES</h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                              <table id="example2" class="table table-bordered table-hover">
                                 <?php
                                 echo "<thead>";
                                 echo "<tr>";
                                 echo "<th id='tab2historialexamabla2'>FECHA</th>";
                                 echo "<th id='tab2historialexamabla3'>PACIENTE</th>";
                                 echo "<th id='tab2historialexamabla4'>MEDICOS</th>";
                                 echo "<th id='tab2historialexamabla5'>EXAMEN</th>";
                                 echo "<th style = 'width:150px' id='tab2historialexamabla6'>ACCION</th>";
                                 echo "</tr>";
                                 echo "</thead>";
                                 echo "<tbody>";
                                 while ($row = $resultadotablaexamenes->fetch_assoc()) {
                                    $IdListaExamen = $row['IdListaExamen'];
                                    echo "<tr>";
                                    echo "<td>" . $row['Fecha'] . "</td>";
                                    echo "<td>" . $row['Paciente'] . "</td>";
                                    echo "<td>" . $row['Medico'] . "</td>";
                                    echo "<td>" . $row['Examen'] . "</td>";
                                    echo "<td>" .
                                       "<span id='btn" . $IdListaExamen . "' style='width:140px' class='btn btn-md btn-success btn-mdlrex'>Ver Resultados</span>" .
                                       "</td>";
                                    echo "</tr>";
                                    echo "</body>  ";
                                 }
                                 ?>
                              </table>
                           </div>
                        </div>
                     </div>
                      <!-- TAB DE HISTORIAL DE PROCEDIMIENTOS (REVISAR PORQUE ESTA COMENTAREADO) -->
                     <div id="tab-4" class="tab-pane">
                        <div class="panel-body">
                           <div class="box-header with-border">
                              <h3 class="box-title" id='tab2historialexamabla1'>HISTORIAL DE PROCEDIMIENTOS</h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                              <table id="example2" class="table table-bordered table-hover">
                                 <?php
                                 echo "<thead>";
                                 echo "<tr>";
                                 echo "<th id='tab2historialexamabla2'>FECHA</th>";
                                 echo "<th id='tab2historialexamabla3'>PACIENTE</th>";
                                 echo "<th id='tab2historialexamabla4'>MEDICOS</th>";
                                 echo "<th id='tab2historialexamabla5'>EXAMEN</th>";
                                 echo "<th style = 'width:150px' id='tab2historialexamabla6'>ACCION</th>";
                                 echo "</tr>";
                                 echo "</thead>";
                                 echo "<tbody>";
                                 while ($row = $resultadotablaexamenes->fetch_assoc()) {
                                    $IdListaExamen = $row['IdListaExamen'];
                                    echo "<tr>";
                                    echo "<td>" . $row['Fecha'] . "</td>";
                                    echo "<td>" . $row['Paciente'] . "</td>";
                                    echo "<td>" . $row['Medico'] . "</td>";
                                    echo "<td>" . $row['Examen'] . "</td>";
                                    echo "<td>" .
                                       "<span id='btn" . $IdListaExamen . "' style='width:140px' class='btn btn-md btn-success btn-mdlrex'>Ver Resultados</span>" .
                                       "</td>";
                                    echo "</tr>";
                                    echo "</body>  ";
                                 }
                                 ?>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!-- TAB DE CARGA EXPEDIENTE POR PDF -->
                     <div id="tab-5" class="tab-pane">
                        <div class="tabs-container">
                           <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-51">CONSULTAS PDF</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-61">PROCEDIMIENTOS PDF</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-71">PEDIATRIA PDF</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-81">GINECOLOGIA PDF</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-91">EXAMENES PDF</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-101">RECETAS PDF</a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="tab-51" class="tab-pane active">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>CONSULTAS EN PDF</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                       <table class="table table-bordered table-hover">
                                          <!-- https://chrome.google.com/webstore/detail/enable-local-file-links/nikfmfgobenbhmocjaaboihbeocackld/related?hl=en -->
                                          <?php
                                          echo "<thead>";
                                          echo "<tr>";
                                          echo "<th id=''>FECHA</th>";
                                          echo "<th id=''>URL</th>";
                                          echo "<th style = 'width:150px' id=''>ACCION</th>";
                                          echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while ($row = $resultadotablaconsultasima->fetch_assoc()) {
                                             $urlprueba = $row['Consultaimaurl'];
                                             echo "<tr>";
                                             echo "<td>" . $row['FechaConsulta'] . "</td>";
                                             echo "<td>" . $row['Consultaimaurl'] . "</td>";
                                             echo "<td>" .
                                                "<a href='file://///" . $ip . "/" . $unidad . "/" . $row['Consultaimaurl'] . "'  target='_blank'>Ver</a>" .
                                                "</td>";
                                             echo "</tr>";
                                             echo "</body>  ";
                                          }
                                          ?>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-61" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>PROCEDIMIENTOS EN PDF</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                       <table id="example2" class="table table-bordered table-hover">
                                          <?php
                                          echo "<thead>";
                                          echo "<tr>";
                                          echo "<th id=''>FECHA</th>";
                                          echo "<th id=''>URL</th>";
                                          echo "<th style = 'width:150px' id=''>ACCION</th>";
                                          echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while ($row = $resultadotablaprocedimientoima->fetch_assoc()) {
                                             $IdEnfermeriaProcedimiento = $row['IdEnfermeriaProcedimiento'];
                                             echo "<tr>";
                                             echo "<td>" . $row['FechaProcedimiento'] . "</td>";
                                             echo "<td>" . $row['Procedimientoimaurl'] . "</td>";
                                             echo "<td>" .
                                                "<a href='file://///" . $ip . "/" . $unidad . "/" . $row['Procedimientoimaurl'] . "'  target='_blank'>Ver</a>" .
                                                "</td>";
                                             echo "</tr>";
                                             echo "</body>  ";
                                          }
                                          ?>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-71" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>PEDIATRIA EN PDF</h3>

                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                       <table id="example2" class="table table-bordered table-hover">
                                          <?php
                                          echo "<thead>";
                                          echo "<tr>";
                                          echo "<th id=''>FECHA</th>";
                                          echo "<th id=''>URL</th>";
                                          echo "<th style = 'width:150px' id=''>ACCION</th>";
                                          echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while ($row = $resultadotablaconsultasimaped->fetch_assoc()) {
                                             $urlprueba = $row['Consultaimaurl'];
                                             echo "<tr>";
                                             echo "<td>" . $row['FechaConsulta'] . "</td>";
                                             echo "<td>" . $row['Consultaimaurl'] . "</td>";
                                             echo "<td>" .
                                                "<a href='file://///" . $ip . "/" . $unidad . "/" . $row['Consultaimaurl'] . "'  target='_blank'>Ver</a>" .
                                                "</td>";
                                             echo "</tr>";
                                             echo "</body>  ";
                                          }
                                          ?>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-81" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>GINECOLOGIA EN PDF</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                       <table id="example2" class="table table-bordered table-hover">
                                          <?php
                                          echo "<thead>";
                                          echo "<tr>";
                                          echo "<th id=''>FECHA</th>";
                                          echo "<th id=''>URL</th>";
                                          echo "<th style = 'width:150px' id=''>ACCION</th>";
                                          echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while ($row = $resultadotablaconsultasgineco->fetch_assoc()) {
                                             $urlprueba = $row['Consultaimaurl'];
                                             echo "<tr>";
                                             echo "<td>" . $row['FechaConsulta'] . "</td>";
                                             echo "<td>" . $row['Consultaimaurl'] . "</td>";
                                             echo "<td>" .
                                                "<a href='file://///" . $ip . "/" . $unidad . "/" . $row['Consultaimaurl'] . "'  target='_blank'>Ver</a>" .
                                                "</td>";
                                             echo "</tr>";
                                             echo "</body>  ";
                                          }
                                          ?>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-91" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>EXAMENES EN PDF</h3>

                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                       <table id="example2" class="table table-bordered table-hover">

                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div id="tab-101" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="box-header with-border">
                                       <h3 class="box-title" id='tab2historialexamabla1'>RECETAS EN PDF</h3>

                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                       <table id="example2" class="table table-bordered table-hover">
                                          <?php
                                          echo "<thead>";
                                          echo "<tr>";
                                          echo "<th id=''>FECHA</th>";
                                          echo "<th id=''>URL</th>";
                                          echo "<th style = 'width:150px' id=''>ACCION</th>";
                                          echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while ($row = $resultadotablarecetasima->fetch_assoc()) {
                                             $urlprueba = $row['Consultaimaurl'];
                                             echo "<tr>";
                                             echo "<td>" . $row['Fecha'] . "</td>";
                                             echo "<td>" . $row['Consultaimaurl'] . "</td>";
                                             echo "<td>" .
                                                "<a href='file://///" . $ip . "/" . $unidad . "/" . $row['Consultaimaurl'] . "'  target='_blank'>Ver</a>" .
                                                "</td>";
                                             echo "</tr>";
                                             echo "</body>  ";
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
   </div>
</div>
<?php include 'scripts.php' ?>