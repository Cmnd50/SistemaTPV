<?php
   use yii\helpers\Html;
   use yii\widgets\DetailView;
   
   include '../include/dbconnect.php';
   
   
   /* @var $this yii\web\View */
   /* @var $model app\models\Persona */
   
   $id = $model->IdPersona;
   
   
   // CONSULTA PARA CARGAR LA TABLA DE LAS EXAMENES ASIGNADOS AL PACIENTE
    $querytablaexameneslabasignados = "SELECT LE.IdListaExamen as 'IdListaExamen',TE.NombreExamen AS 'NombreExamen', CONCAT(US.Nombres,' ', US.Apellidos) As 'Medico', LE.Indicacion as 'Indicacion'  
                                        FROM listaexamen LE
                                        INNER JOIN TipoExamen TE on LE.IdTipoExamen = TE.IdTipoExamen
                                        INNER JOIN Usuario US on LE.IdUsuario = US.IdUsuario
                                        WHERE LE.Activo = 1 and LE.IdPersona = '$id'";
    $resultadotablaexameneslabasignados = $mysqli->query($querytablaexameneslabasignados);
   
        // CONSULTA PARA CARGAR EL CBO DE LOS EXAMENES
    $querytipoexamen = "SELECT IdTipoExamen, NombreExamen FROM tipoexamen";
    $resultadotipoexamen = $mysqli->query($querytipoexamen);
   
    $querynombrepaciente = "SELECT CONCAT(p.Nombres,' ',p.Apellidos) as 'Paciente'
                    FROM persona p
                    where p.IdPersona = '$id'";
    //echo  $queryfichaconsulta;
    $resultadonombrepaciente = $mysqli->query($querynombrepaciente);
    while ($test = $resultadonombrepaciente->fetch_assoc()) {
        $paciente = $test['Paciente'];
    }
   
   $this->title = $model->fullName;
   $this->params['breadcrumbs'][] = ['label' => 'Enfermeria - Procedimientos', 'url' => ['index']];
   $this->params['breadcrumbs'][] = $this->title;
   ?>
</br>
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
<div class="row">
   <div class="col-md-12">
      <div class="ibox float-e-margins">
         <div class="ibox-title">
            <p align="right">
               <button type="button" class="btn  btn-info dim"  data-toggle="modal" data-target="#modalGuardarExamenes"><i class="fa fa-bars"></i></button>
            </p>
         </div>
         <div class="ibox-content">
            <div class="box-header with-border">
               <h3 class="box-title">Pacientes Externos - Examenes Asignados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            </br>
               <table id="example2" class="table table-bordered table-hover">
                  <?php
                     echo"<thead>";
                     echo"<tr>";
                     echo"<th style = 'width:150px'>Tipo de Examen</th>";
                     echo"<th>Encargado</th>";
                     echo"<th>Indicacion</th>";
                     echo"<th style = 'width:150px'>Accion</th>";
                     echo"</tr>";
                     echo"</thead>";
                     echo"<tbody>";
                     while ($row = $resultadotablaexameneslabasignados->fetch_assoc()) {
                         $idexamenasignado = $row['IdListaExamen'];
                         echo"<tr>";
                         echo"<td>" . $row['NombreExamen'] . "</td>";
                         echo"<td>" . $row['Medico'] . "</td>";
                         echo"<td>" . $row['Indicacion'] . "</td>";
                         echo "<td><a style='width:140px'  class='btn  btn-danger dim' href='../../views/laboratoriopaciente/eliminarexamenasignado.php?did=".$idexamenasignado."'>Eliminar </a></td>";
                         echo"</tr>";
                         echo"</body>  ";
                     }
                     ?>
               </table>
               <center>
                  <form class="form-horizontal" action="../../views/laboratoriopaciente/finalizarexterno.php" method="POST" >
                     <div class="hidden">
                     </div>
                     <div class="hidden">
                        <div class="hidden">
                           <textarea type="text" rows="4" class="form-control"  id="IdPersona" name="txtpersonaID"> <?php echo $id ?>  </textarea>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success dim">  FINALIZAR CONSULTA </button>
                  </form>
               </center>
            </div>
            <div class="modal inmodal" id="modalGuardarExamenes" tabindex="-1" role="dialog"  aria-hidden="true">
               <div class="modal-dialog modal-md">
                  <div class="modal-content animated fadeIn">
                     <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="../../views/laboratoriopaciente/guardarexamen.php"  id="demo-form1" data-parsley-validate="">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <i class="fa fa-stethoscope modal-icon"></i>
                              <h4 class="modal-title">ASIGNACION DE EXAMENES MEDICOS</h4>
                              <small>PACIENTES EXTERNOS</small></br>
                              <small>ASIGNACION DE EXAMENES: <?php echo $paciente ?></small>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Examenes</label>
                                 <div class="col-sm-9">
                                    <div class="input-group">
                                       <div class="input-group-addon">
                                          <i class="fa fa-user"></i>
                                       </div>
                                       <select class="form-control select2" style="width: 100%;"  name="cboTipoExamen">
                                       <?php
                                          while ($row = $resultadotipoexamen->fetch_assoc()) {
                                              echo "<option value = '" . $row['IdTipoExamen'] . "'>" . $row['NombreExamen'] . "</option>";
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Indicaciones</label>
                                 <div class="col-sm-9">
                                    <div class="input-group">
                                       <div class="input-group-addon">
                                          <i class="fa fa-user"></i>
                                       </div>
                                       <textarea  type="text" rows="4" class="form-control"   name="txtIndicacion"></textarea>
                                    </div>
                                 </div>
                                 <div class="hidden">
                                    <textarea type="text" rows="4" class="form-control"  id="IdPersona" name="txtpersonaID"> <?php echo $id ?>  </textarea>
                                 </div>
                                 <div class="hidden">
                                    <textarea type="text" rows="4" class="form-control"   name="txtUsuarioID"> <?php echo $_SESSION['IdUsuario'] ?>  </textarea>
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
                                 <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                              </div>
                              <div class="col-sm-2">
                                 <button type="submit" class="btn btn-primary" name="guardarIndicador" >Guardar Cambios</button>
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
</div>
</div>
</div>