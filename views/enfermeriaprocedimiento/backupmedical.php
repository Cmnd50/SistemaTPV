<?php
   use yii\helpers\Html;
   use yii\widgets\DetailView;
   
   include '../include/dbconnect.php';
   
   
   /* @var $this yii\web\View */
   /* @var $model app\models\Persona */
   
   $id = $model->IdPersona;
   $enfermeria = $_SESSION['user'];
    $queryexpedientes = "SELECT * FROM persona WHERE IdPersona  = '$id'";
    $resultadoexpedientes = $mysqli->query($queryexpedientes);
    while ($test = $resultadoexpedientes->fetch_assoc()) {
        $idpersona = $test['IdPersona'];
        $nombres = $test['Nombres'];
        $apellidos = $test['Apellidos'];
        $dui = $test['Dui'];
        $fnacimiento = $test['FechaNacimiento'];
        $geografia = $test['IdGeografia'];
        $direccion = $test['Direccion'];
        $genero = $test['Genero'];
        $estadocivil = $test['IdEstadoCivil'];
        $nombreResponsable = $test['NombresResponsable'];
        $apellidoResponsable = $test['ApellidosResponsable'];
        $parentesco = $test['IdParentesco'];
        $telefono = $test['Telefono'];
        $celular = $test['Celular'];
        $correo = $test['Correo'];
        $alergias = $test['Alergias'];
        $medicinas = $test['Medicamentos'];
        $enfermedad = $test['Enfermedad'];
        $telefonoresponsable = $test['TelefonoResponsable'];
        $date = date("Y-m-d H:i:s");
    }
   
   
    $querydepartamentos = "SELECT * from geografia where IdGeografia='$geografia'";
    $resultadodepartamentos = $mysqli->query($querydepartamentos);
   
    $queryestadocivil = "SELECT * from estadocivil where IdEstadoCivil = '$estadocivil'";
    $resultadoestadocivil = $mysqli->query($queryestadocivil);
   
    $queryusuario = "SELECT u.IdUsuario as 'IdUsuario', CONCAT(u.Nombres,  ' ', u.Apellidos) as 'NombreCompleto', p.Descripcion
                                  from usuario u
                                  inner join puesto = p on u.IdPuesto = p.IdPuesto
                                  where p.Descripcion = 'Enfermeria' and u.Activo = 1 ";
    $resultadousuario = $mysqli->query($queryusuario);
   
    $queryusuarioenfe = "SELECT u.IdUsuario as 'IdUsuario', CONCAT(u.Nombres,  ' ', u.Apellidos) as 'NombreCompletoEnf', p.Descripcion
        from usuario u
        inner join puesto = p on u.IdPuesto = p.IdPuesto
        where  u.Activo = 1 and u.InicioSesion = '$enfermeria'";
    $resultadousuarioenfe = $mysqli->query($queryusuarioenfe);
   
   
   
   
    $querymodulo = "SELECT * from modulo where NombreModulo = 'Enfermeria' order by NombreModulo asc";
    $resultadomodulo = $mysqli->query($querymodulo);
   
    $querytablaconsulta = "SELECT ep.IdEnfermeriaProcedimiento As 'ID', CONCAT(p.Nombres,' ',p.Apellidos) As 'Paciente',
          CONCAT(u.Nombres,' ',u.Apellidos) As 'Medico', m.NombreModulo As 'Modulo', ep.FechaProcedimiento As 'Fecha', 
            mp.Nombre As 'Motivo', ep.Observaciones As 'Observaciones', ep.Estado As 'Estado'   
            FROM enfermeriaprocedimiento ep
            INNER JOIN persona p ON p.IdPersona = ep.IdPersona
            INNER JOIN usuario u ON u.IdUsuario = ep.IdUsuario
            INNER JOIN modulo m ON m.IdModulo = ep.IdModulo
            INNER JOIN motivoprocedimiento mp ON mp.IdMotivoProcedimiento = ep.IdMotivoProcedimiento
            WHERE p.IdPersona = '$id' 
            order by ep.IdEnfermeriaProcedimiento DESC";
   
    $resultadotablaconsulta = $mysqli->query($querytablaconsulta);
   
    $queryselectprocedimiento = "SELECT * FROM motivoprocedimiento";
    $resultadoselectprocedimiento = $mysqli->query($queryselectprocedimiento);
    
   
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
<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <div class="box">
            <div class="box-header with-border">
               <div class="box-body">
                  <p align="right">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConsulta"> Nuevo Procedimiento </button>
                  </p>
                  <div class="modal inmodal" id="modalConsulta" tabindex="-1" role="dialog"  aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content animated fadeIn">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <i class="fa fa-h-square modal-icon"></i>
                              <h4 class="modal-title">Nuevo Procedimiento</h4>
                              <small>Ingrese los datos requeridos.</small>
                           </div>
                           <div class="modal-body">
                              <form class="form-horizontal" action="../../views/enfermeriaprocedimiento/guardarprocedimiento.php" role="form" method="POST">
                                 <div class="form-group">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                    <div class="col-sm-7"><input  value="<?php echo $date ?>" class="form-control" name="txtFecha" disabled="disabled"></div>
                                    <div class="col-sm-1"></div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Enfermera</label></div>
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
                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Paciente</label></div>
                                    <div class="col-sm-7"><input type="text" value="<?php echo $nombres. " " .$apellidos ?>" class="form-control"  disabled="disabled" >
                                       <input type="hidden" name="txtPaciente" value="<?php echo $idpersona ?>">  
                                    </div>
                                    <div class="col-sm-1"></div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Modulo</label></div>
                                    <div class="col-sm-7">
                                       <select class="form-control select2" style="width: 100%;" name="cboModulo">
                                       <?php
                                          while ($row = $resultadomodulo->fetch_assoc()) {
                                              echo "<option value = '" . $row['IdModulo'] . "'>" . $row['NombreModulo'] . "</option>";
                                          }
                                          ?>
                                       </select>
                                    </div>
                                    <div class="col-sm-1"></div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Procedimiento</label></div>
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
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" name="guardarConsulta" >Guardar Cambios</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--    TABLA Consulta    -->
               <div class="box">
                  <div class="box-header with-border">
                     <h3 class="box-title">Historial de Procedimientos</h3>
                  </div>
                  <!-- /.box-header -->
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
                           echo"<th style = 'width:150px'>Accion</th>";
                           echo"</tr>";
                           echo"</thead>";
                           echo"<tbody>";
                           while ($row = $resultadotablaconsulta->fetch_assoc()) {
                           
                               $idSignosVitales = $row['ID'];
                               echo"<tr>";
                               echo"<td>" . $row['Fecha'] . "</td>";
                               echo"<td>" . $row['Paciente'] . "</td>";
                               echo"<td>" . $row['Medico'] . "</td>";
                               echo"<td>" . $row['Modulo'] . "</td>";
                               echo"<td>" . $row['Motivo'] . "</td>";
                               if ($row['Estado'] == 1) {
                                   echo "<td>" .
                                   "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn btn-success btn-mdl'>+ Procedimiento</span>" .
                                   "</td>";
                               } else {
                                   echo "<td>" .
                                   "<span id='btn" . $idSignosVitales . "' style='width:140px' class='btn btn-warning btn-mdls'>Ver Consulta</span>" .
                                   "</td>";
                               }
                               echo"</tr>";
                               echo"</body>  ";
                           }
                           ?>
                     </table>
                  </div>
               </div>

              
              <div class="modal inmodal" id="modalConsultaProcedimiento" tabindex="-1" role="dialog"  aria-hidden="true">
                 <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                       <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <i class="fa fa-h-square modal-icon"></i>
                          <h4 class="modal-title">REPORTE DE PROCEDIMIENTOS</h4>
                          <small>FICHA DE CONSULTA</small>
                       </div>
                       <div class="modal-body">
                          <form class="form-horizontal" action="../../views/enfermeriaprocedimiento/finalizarprocedimiento.php"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
                             <div class="form-group hidden">
                               <div class="col-sm-7"><input type="text"  name="txtid" value="<?php echo $idpersona ?>">  </div>
                               <div class="col-sm-7"><input type="text"  name="txtProcedimiento" id="idprocedimiento">  </div>
                              </div>
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3">
                                  <label for="inputEmail3" class="control-label">Paciente</label>
                                  </div>
                                <div class="col-sm-7">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                  <input type="text" class="form-control" name="txtPaciente" id="paciente" disabled="disabled"></div>
                                  </div>
                                <div class="col-sm-1"></div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Enfermera</label></div>
                                <div class="col-sm-7">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                   <input type="text" class="form-control" name="txtMedico" id="medico" disabled="disabled" value=" ">
                                </div></div>
                                <div class="col-sm-1"></div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Modulo</label></div>
                                <div class="col-sm-7">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-bookmark-o"></i></div>
                                   <input type="text" class="form-control" name="txtMedico" id="modulo" disabled="disabled" value=" ">
                                </div></div>
                                <div class="col-sm-1"></div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                <div class="col-sm-7">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                   <input type="text" class="form-control" name="txtFecha" id="fecha" disabled="disabled">
                                </div></div>
                                <div class="col-sm-1"></div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Observaciones</label></div>
                                <div class="col-sm-7">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                   <textarea type="text" rows="8" class="form-control" name="txtObservaciones" data-parsley-maxlength="400" id="observaciones"> </textarea>
                                </div></div>
                                <div class="col-sm-1"></div>
                             </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" name="guardarConsulta" >Guardar Cambios</button>
                             </div>
                          </form>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="modal inmodal" id="modalCargarProcedimientos" tabindex="-1" role="dialog"  aria-hidden="true">
                 <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                       <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <i class="fa fa-h-square modal-icon"></i>
                          <h4 class="modal-title">REPORTE DE PROCEDIMIENTOS</h4>
                          <small>FICHA DE PROCEDIMIENTOS</small>
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
                                  <label for="inputEmail3" class="control-label">Paciente</label>
                                  </div>
                                <div class="col-sm-7">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                  <input type="text" class="form-control" name="txtPaciente" id="pacientes" disabled="disabled"></div>
                                  </div>
                                <div class="col-sm-1"></div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Enfermera</label></div>
                                <div class="col-sm-7">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                   <input type="text" class="form-control" name="txtMedico" id="medicos" disabled="disabled" value=" ">
                                </div></div>
                                <div class="col-sm-1"></div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Modulo</label></div>
                                <div class="col-sm-7">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-bookmark-o"></i></div>
                                   <input type="text" class="form-control" name="txtMedico" id="modulos" disabled="disabled" value=" ">
                                </div></div>
                                <div class="col-sm-1"></div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                <div class="col-sm-7">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                   <input type="text" class="form-control" name="txtFecha" id="fechas" disabled="disabled">
                                </div></div>
                                <div class="col-sm-1"></div>
                             </div>
                             <div class="form-group">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label for="inputEmail3" class="control-label">Observaciones</label></div>
                                <div class="col-sm-7">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                   <textarea type="text" rows="8" class="form-control" name="txtObservaciones" data-parsley-maxlength="400" disabled="disabled" id="observacioness"> </textarea>
                                </div></div>
                                <div class="col-sm-1"></div>
                             </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                             </div>
                          </form>
                       </div>
                    </div>
                 </div>
              </div>

               <div class="example-modal modal fade" id="">
                  <div class="modal">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <form class="form-horizontal" action="enfermeria_finalizarprocedimiento.php"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
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
                                             <div class="col-sm-7"><input type="text" class="form-control" name="txtPaciente" id="pacientes" disabled="disabled"></div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-3"><label for="inputEmail3" class="control-label">Medico</label></div>
                                             <div class="col-sm-7"> <input type="text" class="form-control" name="txtMedico" id="medicos" disabled="disabled" value=" "></div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-3"><label for="inputEmail3" class="control-label">Especialidad</label></div>
                                             <div class="col-sm-7"> <input type="text" class="form-control" name="txtMedico" id="modulos" disabled="disabled" value=" "></div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                             <div class="col-sm-7"> <input type="text" class="form-control" name="txtFecha" id="fechas" disabled="disabled"></div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-3"><label for="inputEmail3" class="control-label">Procedimiento</label></div>
                                             <div class="col-sm-7"> <input type="text" class="form-control" name="" id="motivos" disabled="disabled"></div>
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
                                             <div class="col-sm-7"> <textarea disabled="disabled" type="text" rows="8" class="form-control" name="txtObservaciones" data-parsley-maxlength="400" id="observacioness"> </textarea> </div>
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
</section>

<script type="text/javascript">
   $(document).ready(function () {
       $(".btn-mdl").click(function () {
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
                   $("#paciente").val(data.Paciente);
                   $("#medico").val(data.Medico);
                   $("#modulo").val(data.Especialidad);
                   $("#fecha").val(data.FechaConsulta);
                   $("#motivo").val(data.Motivo);
                   $("#idprocedimiento").val(data.ID);
                   $("#modalConsultaProcedimiento").modal("show");
               }
           });
       });
   
       $(".btn-mdls").click(function () {
           var id = $(this).attr("id").replace("btn", "");
   
           var myData = {"id": id};
           //alert(myData);
           $.ajax({
               url: "../../views/enfermeriaprocedimiento/cargarprocedimientoterminado.php",
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
                   $("#motivos").val(data.Motivo);
                   $("#observacioness").val(data.Observaciones);
                   $("#modalCargarProcedimientos").modal("show");
               }
           });
       });
   
   
       $('#demo-form1').parsley().on('field:validated', function () {
           var ok = $('.parsley-error').length === 0;
           $('.bs-callout-info').toggleClass('hidden', !ok);
           $('.bs-callout-warning').toggleClass('hidden', ok);
       })
               .on('form:submit', function () {
                   return true;
               });
   });
</script>