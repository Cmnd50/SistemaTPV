<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* OBTENEMOS EL ID DEL MODELO YII2 */
$id = $model->IdConsulta;
/* CONEXION A MYSQL PARA LAS CONSULTAS*/
include '../include/dbconnect.php';
/* CONEXION A SYBASE (MTCORPORATIVO) */
include '../include/dbconnectsybase.php';
/* AGREGA TODOS LOS QUERYS DE LAS TABLAS */
include  'querystabla.php';

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->persona->fullName;
$this->params['breadcrumbs'][] = ['label' => $label, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

/* AGREGA EL STYLE DE LOS MODALES Y LOS VALIDACIONES */
include  'styles.php';
?>


<div class="wrapper wrapper-content animated fadeIn">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5 id='encabezadoform1'></h5>&nbsp;&nbsp;<small id='encabezadoform2'></small>
               <div class="ibox-tools">
               </div>
            </div>
            <div class="form-horizontal">
               <div class="tabs-container">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#tab-CONSULTA" id='tabgeneral1'></a></li>
                     <li class=""><a data-toggle="tab" href="#tab-EXPEDIENTE" id='tabgeneral2'></a></li>
                     <li class=""><a data-toggle="tab" href="#tab-HISTORIAL" id='tabgeneral3'></a></li>
                     <li class=""><a data-toggle="tab" href="#tab-MEDICAMENTO" id='tabgeneral4'></a></li>
                  </ul>
                  <div class="row">
                     </br>
                     <center>
                        <?php if ($_SESSION['IdIdioma'] == 1) { ?>
                           <button type="button" class="btn  btn-danger dim" data-toggle="modal" data-target="#modalGuardarDiagnostico">Ingresar Diagnostico<i class="fa fa-heart"></i></button>
                           <button type="button" class="btn  btn-info dim" data-toggle="modal" data-target="#modalGuardarExamenes"> Ingresa Examen <i class="fa fa-bars"></i></button>
                        <?php } else {
                        ?>
                           <button type="button" class="btn  btn-danger dim" data-toggle="modal" data-target="#modalGuardarDiagnostico">Data<i class="fa fa-heart"></i></button>
                           <button type="button" class="btn  btn-info dim" data-toggle="modal" data-target="#modalGuardarExamenes"> LAB <i class="fa fa-bars"></i></button>
                           <button type="button" class="btn  btn-warning dim" data-toggle="modal" data-target="#modalGuardarExamenes"> REF <i class="fa fa-folder-o"></i></button>
                           <button type="button" class="btn  btn-default dim" data-toggle="modal" data-target="#modalGuardarRayosX"> X-Rays <i class="fa fa-times"></i></button>
                           <button type="button" class="btn  btn-primary dim" data-toggle="modal" data-target="#modalRecetas"> Recipe <i class="fa fa-list-ol"></i></button>
                        <?php } ?>
                     </center>
                  </div>
                  <div class="tab-content">
                     <div class="tab-content">
                        <!--  TABLA DE CONSULTA AQUI ESTAN LOS PANELES DE VISITA, INFORMACION GENERAL, GINECOLOGIA PEDIATRIA, OTROS E INFO MEDICO -->
                        <div id="tab-CONSULTA" class="tab-pane active">
                           <div class="panel-body">
                              <div class="tabs-container">
                                 <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-6" id='tab1signosvitales1'>FICHA DE CONSULTA</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-7" id='tab1signosvitales2'>DATOS GENERALES</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-8" id='tab1signosvitales3'>USO GINECOLOGICO</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-9" id='tab1signosvitales4'>USO PEDIATRICO</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-10" id='tab1signosvitales5'>OTROS</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-11" id='tab1signosvitales6'>DATOS MEDICOS</a></li>
                                 </ul>
                                 <form class="form-horizontal">
                                    <div class="tab-content">
                                       <div id="tab-6" class="tab-pane active">
                                          <div class="panel-body">
                                             <div class="form-group hidden">
                                                <div class="col-sm-5"><input type="text" name="txtIdConsulta" id="idconsulta"></div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>"> </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1paciente'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" value="<?php echo $idpersona ?>" name="txtPaciente" disabled="disabled">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1medico'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $idusuario ?>" disabled="disabled" name="txtMedico" disabled="disabled">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">

                                                <?php if ($_SESSION['IdIdioma'] == 1) {
                                                ?>
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1especialidad'></label></div>
                                                   <div class="col-sm-4">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                                         <input type="text" class="form-control" value="<?php echo $idmodulo ?>" disabled="disabled" name="txtMedico" disabled="disabled">
                                                      </div>
                                                   </div>
                                                <?php } else { ?>
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1especialidad'></label></div>
                                                   <div class="col-sm-4">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                                         <input type="text" class="form-control" value="<?php echo $idmoduloing ?>" disabled="disabled" name="txtMedico" disabled="disabled">
                                                      </div>
                                                   </div>
                                                <?php } ?>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1fecha'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $fechaconsulta ?>" disabled="disabled" name="txtfecha" disabled="disabled">
                                                   </div>
                                                </div>
                                             </div>
                                             <br>
                                             <div class="box-header with-border">
                                                <h4 class="box-title" id='tblexamenasignado'></h4>
                                             </div>
                                             <!-- TABLA DE ASIGNACION DE EXAMENES -->
                                             <table id="example2" class="table table-bordered table-hover">
                                                <?php
                                                echo "<thead>";
                                                echo "<tr>";
                                                echo "<th style = 'width:150px' id='tblexamenasignadoexamen'>Tipo de Examen</th>";
                                                echo "<th id='tblexamenasignadomedico'>Medico</th>";
                                                echo "<th id='tblexamenasignadoindicacion'>Indicacion</th>";
                                                echo "<th style = 'width:150px' id='tblexamenasignadoaccion'>Accion</th>";
                                                echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                if ($_SESSION['IdIdioma'] == 1) {
                                                   while ($row = $resultadotablaexameneslabasignados->fetch_assoc()) {
                                                      $idexamenasignado = $row['IdListaExamen'];
                                                      echo "<tr>";
                                                      echo "<td>" . $row['NombreExamen'] . "</td>";
                                                      echo "<td>" . $row['Medico'] . "</td>";
                                                      echo "<td>" . $row['Indicacion'] . "</td>";
                                                      echo "<td><a style='width:140px'  class='btn  btn-danger dim' href='../../views/consultamedico/eliminarexamenasignado.php?did=" . $idexamenasignado . "'>Eliminar</a></td>";
                                                      echo "</tr>";
                                                      echo "</body>  ";
                                                   }
                                                } else {
                                                   while ($row = $resultadotablaexameneslabasignados->fetch_assoc()) {
                                                      $idexamenasignado = $row['IdListaExamen'];
                                                      echo "<tr>";
                                                      echo "<td>" . $row['NombreExamening'] . "</td>";
                                                      echo "<td>" . $row['Medico'] . "</td>";
                                                      echo "<td>" . $row['Indicacion'] . "</td>";
                                                      echo "<td><a style='width:140px'  class='btn  btn-danger dim' href='../../views/consultamedico/eliminarexamenasignado.php?did=" . $idexamenasignado . "'>Delete</a></td>";
                                                      echo "</tr>";
                                                      echo "</body>  ";
                                                   }
                                                }

                                                ?>
                                             </table>
                                          </div>
                                       </div>
                                       <div id="tab-7" class="tab-pane">
                                          <div class="panel-body">
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2peso'></label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-slideshare"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $peso ?>" disabled="disabled" data-inputmask='"mask": "999.9"' data-mask name="txtPeso" required="">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <input type="text" class="form-control" value="<?php echo $unidadpeso ?>" disabled="disabled" required="">
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2altura'></label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-arrows-v"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $altura ?>" disabled="disabled" data-inputmask='"mask": "9.99"' data-mask name="txtAltura" required="">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <input type="text" class="form-control" value="<?php echo $unidadaltura ?>" disabled="disabled" data-inputmask='"mask": "9.99"' data-mask name="txtAltura" required="">
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2temperatura'></label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-thermometer-quarter"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $temperatura ?>" disabled="disabled" data-inputmask='"mask": "99.9"' data-mask name="txtTemperatura" required="">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <input type="text" class="form-control" disabled="disabled" value="<?php echo $unidadtemperatura ?>" data-inputmask='"mask": "99.9"' data-mask required="">
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2fr'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $fr ?>" disabled="disabled" name="txtFR" required="">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2pulso'></label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $pulso ?>" disabled="disabled" data-inputmask='"mask": "999"' data-mask name="txtPulso" required="">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <label for="inputEmail3" class="control-label">lat/min</label>
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2presion'></label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-heart-o"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $max ?>" disabled="disabled" data-inputmask='"mask": "999"' data-mask name="txtMax" placeholder="MAX" id="maxs" required="">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $min ?>" disabled="disabled" data-inputmask='"mask": "99"' data-mask name="txtMin" placeholder="MIN" required="">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2glucotex'></label></div>
                                                <div class="col-sm-10">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" value="<?php echo $glucotex ?>" name="txtGluco" required="">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-8" class="tab-pane">
                                          <div class="panel-body">
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3menstruacion'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" value="<?php echo $periodomenstrual ?>" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUmestruacion">
                                                   </div>
                                                </div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3pap'></label></div>
                                                <div class="col-sm-4">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $pap ?>" disabled="disabled" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUpap">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-9" class="tab-pane">
                                          <div class="panel-body">
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3ofc'></label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-toggle-down"></i></div>
                                                      <input type="text" class="form-control" disabled="disabled" value="<?php echo $pc ?>" name="txtpc">
                                                   </div>
                                                </div>
                                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3hl'></label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-toggle-up"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $pt ?>" disabled="disabled" name="txtpt">
                                                   </div>
                                                </div>
                                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3w'></label></div>
                                                <div class="col-sm-2">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-toggle-right"></i></div>
                                                      <input type="text" class="form-control" value="<?php echo $pa ?>" disabled="disabled" name="txtpa">
                                                   </div>
                                                </div>
                                                <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-10" class="tab-pane">
                                          <div class="panel-body">
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab5observaciones'></label></div>
                                                <div class="col-sm-10">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                      <input type="text" rows="4" class="form-control" value="<?php echo $observaciones ?>" name="txtObservaciones" disabled="disabled" data-parsley-maxlength="100" data-parsley-maxlength="100">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab5motivo'></label></div>
                                                <div class="col-sm-10">
                                                   <div class="input-group">
                                                      <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                      <input type="text" rows="4" class="form-control" value="<?php echo $motivo ?>" name="txtMotivo" data-parsley-maxlength="100" disabled="disabled" data-parsley-maxlength="100" required="">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="tab-11" class="tab-pane">
                                          <div class="panel-body">
                                             <div class="tabs-container">
                                                <ul class="nav nav-tabs">
                                                   <li class="active"><a data-toggle="tab" href="#CONSULTAPRINCIPAL1">PANEL 1</a></li>
                                                   <li class=""><a data-toggle="tab" href="#CONSULTAPRINCIPAL2">PANEL 2</a></li>
                                                   <li class=""><a data-toggle="tab" href="#CONSULTAPRINCIPAL3">PANEL 3</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                   <div id="CONSULTAPRINCIPAL1" class="tab-pane active">
                                                      <div class="panel-body">
                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica1'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                                  <textarea type="text" rows="1" class="form-control" disabled="disabled"><?php echo $Enfermedad; ?>   </textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica2'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                  <textarea type="text" rows="2" class="form-control" disabled="disabled">  <?php echo $comentarios ?></textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica3'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                  <textarea type="text" rows="2" class="form-control" disabled="disabled"><?php echo $Alergias; ?>  </textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica4'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                  <textarea type="text" rows="2" class="form-control" disabled="disabled"><?php echo $CirugiasPrevias; ?>  </textarea>
                                                               </div>
                                                            </div>
                                                         </div>

                                                      </div>
                                                   </div>
                                                   <div id="CONSULTAPRINCIPAL2" class="tab-pane">
                                                      <div class="panel-body">

                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica5'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                  <textarea type="text" rows="2" class="form-control" disabled="disabled"><?php echo $MedicamentosActuales; ?>   </textarea>
                                                               </div>
                                                            </div>
                                                         </div>


                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica6'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                  <textarea type="text" rows="2" class="form-control" disabled="disabled"><?php echo $ExamenFisica; ?>  </textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica7'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                  <textarea type="text" rows="2" class="form-control" id="diagnosticos" name="txtDiagnostico" disabled="disabled"><?php echo $diagnostico ?>  </textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica8'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                  <textarea type="text" rows="2" class="form-control" id="comentarioss" name="txtComentarios" disabled="disabled"><?php echo $comentarios ?>  </textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div id="CONSULTAPRINCIPAL3" class="tab-pane">
                                                      <div class="panel-body">
                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica9'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                  <textarea type="text" rows="2" class="form-control" id="otross" name="txtOtros" disabled="disabled"><?php echo $otros ?>  </textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica10'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                  <textarea type="text" rows="2" id="plantratamientos" class="form-control" disabled="disabled"> <?php echo $PlanTratamiento; ?> </textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1consultamedica11'></label></div>
                                                            <div class="col-sm-10">
                                                               <div class="input-group">
                                                                  <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                                  <textarea type="text" rows="1" id="fechaproximas" class="form-control" disabled="disabled"><?php echo $FechaProxVisita ?>  </textarea>
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
                                                   <input type="text" class="form-control" id="txtApellidos" name="txtApellidos" disabled="disabled" required="" value="<?php echo $apellidos ?>">
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
                                                   <input type="text" class="form-control" data-mask="99999999-9" name="txtDui" id="txtDui" value="<?php echo $dui ?>" disabled="disabled">
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
                                                   <input type="text" class="form-control" data-mask="9999-9999" id="txtTelefono" name="txtTelefono" value="<?php echo $telefono ?>" disabled="disabled" />
                                                </div>
                                             </div>
                                             <label for="txtCelular" class="col-sm-2 control-label" id='tabexpediente9'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                                   <input type="text" class="form-control" data-mask="9999-9999" id="txtCelular" name="txtCelular" value="<?php echo $celular ?>" disabled="disabled" />
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtCorreo" class="col-sm-2 control-label" id='tabexpediente10'></label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                   <input type="text" value="<?php echo $correo ?>" disabled="disabled" class="form-control" id="txtCorreo" name="txtCorreo" data-parsley-trigger="change">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="EXPRESPON" class="tab-pane">
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <label for="txtNombresResponsable" class="col-sm-2 control-label" id='tabexpediente11'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="txtNombresResponsable" value="<?php echo $nombreResponsable ?>" disabled="disabled" name="txtNombresResponsable" />
                                                </div>
                                             </div>
                                             <label for="txtApellidosResponsable" class="col-sm-2 control-label" id='tabexpediente12'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="txtApellidosResponsable" value="<?php echo $apellidoResponsable ?>" disabled="disabled" name="txtApellidosResponsable" />
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="txtParentesco" class="col-sm-2 control-label" id='tabexpediente13'></label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                   <input type="text" class="form-control" id="txtApellidosResponsable" value="<?php echo $parentesco ?>" disabled="disabled" name="txtApellidosResponsable" />
                                                </div>
                                             </div>
                                             <label for="txtDuiResponsable" class="col-sm-2 control-label" id='tabexpediente14'> </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                                   <input type="text" class="form-control" id="txtApellidosResponsable" value="<?php echo $duiresponsable ?>" disabled="disabled" name="txtApellidosResponsable" />
                                                </div>
                                             </div>

                                          </div>
                                          <div class="form-group">
                                             <label for="txtTelefonoResponsable" class="col-sm-2 control-label" id='tabexpediente15'></label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                                   <input type="text" value="<?php echo $telefonoresponsable ?>" disabled="disabled" class="form-control" data-inputmask='"mask": "9999-9999"' data-mask id="txtTelefonoResponsable" name="txtTelefonoResponsable" />
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
                                                   <input type="text" value="<?php echo $enfermedad ?>" disabled="disabled" rows="3" class="form-control" id="txtEnfermedad" name="txtEnfermedad">
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
                                                   <input type="text" value="<?php echo $medicinas ?>" disabled="disabled" rows="3" class="form-control" id="txtMedicamentos" name="txtMedicamentos" data-parsley-maxlength="100">
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
                                          <div class="box-header with-border">
                                             <h3 class="box-title" id='tab2historialconsultabla6'>HISTORIAL DE CONSULTAS</h3>
                                          </div>
                                          <!-- /.box-header -->
                                          <div class="box-body">
                                             <table id="example2" class="table table-bordered table-hover">
                                                <?php
                                                echo "<thead>";
                                                echo "<tr>";
                                                echo "<th id='tab2historialconsultabla1'></th>";
                                                echo "<th id='tab2historialconsultabla2'></th>";
                                                echo "<th id='tab2historialconsultabla3'></th>";
                                                echo "<th id='tab2historialconsultabla4'></th>";
                                                echo "<th style = 'width:150px' id='tab2historialconsultabla5'></th>";
                                                echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                if ($row['Estado'] == 1) {
                                                   while ($row = $resultadotablaconsulta->fetch_assoc()) {
                                                      $idSignosVitales = $row['IdConsulta'];
                                                      echo "<tr>";
                                                      echo "<td>" . $row['FechaConsulta'] . "</td>";
                                                      echo "<td>" . $row['Paciente'] . "</td>";
                                                      echo "<td>" . $row['Medico'] . "</td>";
                                                      echo "<td>" . $row['Especialidad'] . "</td>";
                                                      if ($row['Estado'] == 1) {
                                                         if ($_SESSION['IdIdioma'] == 1) {
                                                            echo "<td>" .
                                                               "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn  btn-success btn-mdl'> Ver Consulta</span>" .
                                                               "</td>";
                                                         } else {
                                                            echo "<td>" .
                                                               "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn  btn-success btn-mdl'> See Visits </span>" .
                                                               "</td>";
                                                         }
                                                      } else {
                                                         if ($_SESSION['IdIdioma'] == 1) {
                                                            echo "<td>" .
                                                               "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn btn-warning btn-mdls'>Ver Consulta</span>" .
                                                               "</td>";
                                                         } else {
                                                            echo "<td>" .
                                                               "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn btn-warning btn-mdls'>See Visits </span>" .
                                                               "</td>";
                                                         }
                                                      }

                                                      echo "</tr>";
                                                      echo "</body>  ";
                                                   }
                                                } else {
                                                   while ($row = $resultadotablaconsulta2->fetch_assoc()) {
                                                      $idSignosVitales = $row['IdConsulta'];
                                                      echo "<tr>";
                                                      echo "<td>" . $row['FechaConsulta'] . "</td>";
                                                      echo "<td>" . $row['Paciente'] . "</td>";
                                                      echo "<td>" . $row['Medico'] . "</td>";
                                                      echo "<td>" . $row['Especialidad'] . "</td>";
                                                      if ($row['Estado'] == 1) {
                                                         if ($_SESSION['IdIdioma'] == 1) {
                                                            echo "<td>" .
                                                               "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn  btn-success btn-mdl'> + Signo Vital</span>" .
                                                               "</td>";
                                                         } else {
                                                            echo "<td>" .
                                                               "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn  btn-success btn-mdl'> + Vital Signs</span>" .
                                                               "</td>";
                                                         }
                                                      } else {
                                                         if ($_SESSION['IdIdioma'] == 1) {
                                                            echo "<td>" .
                                                               "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn btn-warning btn-mdls'>Ver Consulta </span>" .
                                                               "</td>";
                                                         } else {
                                                            echo "<td>" .
                                                               "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn btn-warning btn-mdls'> See Visits </span>" .
                                                               "</td>";
                                                         }
                                                      }

                                                      echo "</tr>";
                                                      echo "</body>  ";
                                                   }
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
                                                echo "<thead>";
                                                echo "<tr>";
                                                echo "<th id='tab2historialexamabla2'>Fecha de Examen</th>";
                                                echo "<th id='tab2historialexamabla3'>Nombre de Paciente</th>";
                                                echo "<th id='tab2historialexamabla4'>Nombre de Medico</th>";
                                                echo "<th id='tab2historialexamabla5'>Examen</th>";
                                                echo "<th style = 'width:150px' id='tab2historialexamabla6'>Accion</th>";
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
                                                   if ($_SESSION['IdIdioma'] == 1) {
                                                      echo "<td>" .
                                                         "<span id='btn" . $IdListaExamen . "' style='width:140px' class='btn btn-md btn-warning btn-mdlrex'>Ver Resultados</span>" .
                                                         "</td>";
                                                   } else {
                                                      echo "<td>" .
                                                         "<span id='btn" . $IdListaExamen . "' style='width:140px' class='btn btn-md btn-warning btn-mdlrex'>See Results</span>" .
                                                         "</td>";
                                                   }
                                                   echo "</tr>";
                                                   echo "</body>  ";
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
                                                echo "<thead>";
                                                echo "<tr>";
                                                echo "<th id='tab2historialprocetabla2'>Fecha</th>";
                                                echo "<th id='tab2historialprocetabla3'>Nombre de Paciente</th>";
                                                echo "<th id='tab2historialprocetabla4'>Nombre de Medico</th>";
                                                echo "<th id='tab2historialprocetabla5'>Nombre de Especialidad</th>";
                                                echo "<th id='tab2historialprocetabla6'>Motivo</th>";
                                                echo "<th style = 'width:150px' id='tab2historialprocetabla7'>Accion</th>";
                                                echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                if ($_SESSION['IdIdioma'] == 1) {
                                                   while ($row = $resultadotablaprocedimientos->fetch_assoc()) {
                                                      $idSignosVitales = $row['ID'];
                                                      echo "<tr>";
                                                      echo "<td>" . $row['Fecha'] . "</td>";
                                                      echo "<td>" . $row['Paciente'] . "</td>";
                                                      echo "<td>" . $row['Medico'] . "</td>";
                                                      echo "<td>" . $row['Modulo'] . "</td>";
                                                      echo "<td>" . $row['Motivo'] . "</td>";
                                                      if ($_SESSION['IdIdioma'] == 1) {
                                                         echo "<td>" .
                                                            "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn btn-md btn-warning btn-proce'>Ver Consulta</span>" .
                                                            "</td>";
                                                      } else {
                                                         echo "<td>" .
                                                            "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn btn-md btn-warning btn-proce'>See Visit</span>" .
                                                            "</td>";
                                                      }
                                                      echo "</tr>";
                                                      echo "</body>  ";
                                                   }
                                                } else {
                                                   while ($row = $resultadotablaprocedimientos->fetch_assoc()) {
                                                      $idSignosVitales = $row['ID'];
                                                      echo "<tr>";
                                                      echo "<td>" . $row['Fecha'] . "</td>";
                                                      echo "<td>" . $row['Paciente'] . "</td>";
                                                      echo "<td>" . $row['Medico'] . "</td>";
                                                      echo "<td>" . $row['Moduloing'] . "</td>";
                                                      echo "<td>" . $row['Motivo'] . "</td>";
                                                      if ($_SESSION['IdIdioma'] == 1) {
                                                         echo "<td>" .
                                                            "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn btn-md btn-warning btn-proce'>Ver Consulta</span>" .
                                                            "</td>";
                                                      } else {
                                                         echo "<td>" .
                                                            "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn btn-md btn-warning btn-proce'>See Visit</span>" .
                                                            "</td>";
                                                      }
                                                      echo "</tr>";
                                                      echo "</body>  ";
                                                   }
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
                        <div id="tab-MEDICAMENTO" class="tab-pane">
                           <div class="panel-body">
                              <br>
                              <form class="form-horizontal">
                                 <center>
                                    <h2>INGRESE LA DESCRIPCION DEL PRODUCTO</h2>
                                 </center>
                                 <div class="form-group"><label class="col-lg-2 control-label">PRESENTACION</label>
                                    <div class="col-lg-10"><input type="search" class="form-control" id="buscargrupos">
                                    </div>
                                 </div>
                                 <div class="form-group"><label class="col-lg-2 control-label">DESCRIPCION</label>
                                    <div class="col-lg-10"><input type="search" class="form-control" id="buscardescripcion">
                                    </div>
                                 </div>
                              </form>
                              <br><br>
                              <!--  TABLA DE MEDICAMENTOS EN STOCK -->
                              <div class="row">
                                 <div class="ibox-title">
                                    <h5>EXISTENCIAS DE MEDICAMENTO DONADO Y VENTA</h5>

                                 </div>
                                 <div class="ibox-content">
                                    <div class="row" id="datos">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
            </br>
            <center>
               <form class="form-horizontal" action="../../views/consultamedico/finalizarconsulta.php" method="POST">
                  <div class="hidden">
                     <textarea type="text" rows="1" class="form-control" name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                  </div>
                  <div class="hidden">
                     <textarea type="text" rows="1" class="form-control" name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                  </div>
                  <button type="submit" class="btn btn-success dim" id='btnfinalizarconsulta'></button>
               </form>
            </center>
         </div>
      </div>
   </div>
</div>

<?php
/* AGREGA TODOS LOS MODALES */
include 'modals.php';
/* AGREGA TODOS LOS SCRIPTS */
include 'scripts.php';
?>