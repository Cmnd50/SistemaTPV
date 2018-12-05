<?php
   use yii\helpers\Html;
   use yii\widgets\DetailView;
   
   include '../include/dbconnect.php';
   
   
   /* @var $this yii\web\View */
   /* @var $model app\models\Persona */
   
   $id = $model->IdPersona;
     $queryexpedientes = "SELECT * FROM persona WHERE IdPersona  = '$id'";
     $resultadoexpedientes = $mysqli->query($queryexpedientes);
     while ($test = $resultadoexpedientes->fetch_assoc())
     {
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
         $parentesco = $test['Parentesco'];
         $telefono = $test['Telefono'];
         $celular = $test['Celular'];
         $correo = $test['Correo'];
         $alergias = $test['Alergias'];
         $medicinas = $test['Medicamentos'];
         $enfermedad = $test['Enfermedad'];
         $telefonoresponsable = $test['TelefonoResponsable'];
         $date = date("Y-m-d");
     }
   
      $querydepartamentos = "SELECT * from geografia where IdGeografia='$geografia'";
      $resultadodepartamentos = $mysqli->query($querydepartamentos);
   
      $queryestadocivil = "SELECT * from estadocivil where IdEstadoCivil = '$estadocivil'";
      $resultadoestadocivil = $mysqli->query($queryestadocivil);
   
      $queryusuario = "SELECT u.IdUsuario, CONCAT(u.Nombres,  ' ', u.Apellidos) as 'NombreCompleto'
         from usuario u
         inner join puesto = p on u.IdPuesto = p.IdPuesto
         where p.Descripcion = 'Medico' and u.Activo = 1 ";
      $resultadousuario = $mysqli->query($queryusuario);
   
   
      $querymodulo = "SELECT * from modulo order by NombreModulo asc";
      $resultadomodulo = $mysqli->query($querymodulo);
   
      $querytablaconsulta = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.NombreModulo As 'Especialidad', 
          c.IdEstado as 'Estado'
         from consulta c
         inner join usuario u on c.IdUsuario = u.IdUsuario
         inner join modulo m on c.IdModulo = m.IdModulo
         inner join persona p on c.IdPersona = p.IdPersona
         where c.IdPersona = $idpersona
         order by c.IdConsulta DESC";
   
      $resultadotablaconsulta = $mysqli->query($querytablaconsulta);
   
   $this->title = $model->fullName;
   $this->params['breadcrumbs'][] = ['label' => 'Enfermeria - Consultas', 'url' => ['index']];
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
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConsulta"> Nueva consulta </button>
                  </p>
                  <div class="modal inmodal" id="modalConsulta" tabindex="-1" role="dialog"  aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content animated fadeIn">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <i class="fa fa-medkit modal-icon"></i>
                              <h4 class="modal-title">Nueva Consulta</h4>
                              <small>Ingrese los datos requeridos.</small>
                           </div>
                           <div class="modal-body">
                              <form class="form-horizontal" action="../../views/enfermeriaconsulta/guardarconsulta.php" role="form" method="POST">
                                 <div class="form-group">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                    <div class="col-sm-7"><input  value="<?php echo $date ?>" class="form-control" name="txtFecha" disabled="disabled"></div>
                                    <div class="col-sm-1"></div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label for="inputEmail3" class="control-label">Medico</label></div>
                                    <div class="col-sm-7">
                                       <select class="form-control select2" style="width: 100%;" name="cboUsuario">
                                       <?php
                                          while ($row = $resultadousuario->fetch_assoc()) {
                                            echo "<option value = '".$row['IdUsuario']."'>".$row['NombreCompleto']."</option>";
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
                                            echo "<option value = '".$row['IdModulo']."'>".$row['NombreModulo']."</option>";
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
                     <h3 class="box-title">Historial de Consultas</h3>
                     <br>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                     <table id="example2" class="table table-bordered table-hover">
                        <?php
                           echo"<thead>";
                               echo"<tr>";
                               echo"<th>ID</th>";
                               echo"<th>Fecha de Consulta</th>";
                               echo"<th>Nombre de Paciente</th>";
                               echo"<th>Nombre de Medico</th>";
                               echo"<th>Nombre de Especialidad</th>";
                               echo"<th>Accion</th>";
                               echo"</tr>";
                           echo"</thead>";
                           echo"<tbody>";
                           while ($row = $resultadotablaconsulta->fetch_assoc())
                           {
                           
                              $idSignosVitales = $row['IdConsulta'];
                              echo"<tr>";
                              echo"<td>".$row['IdConsulta']."</td>";
                              echo"<td>".$row['FechaConsulta']."</td>";
                              echo"<td>".$row['Paciente']."</td>";
                              echo"<td>".$row['Medico']."</td>";
                              echo"<td>".$row['Especialidad']."</td>";
                              if($row['Estado'] == 1){
                              echo "<td>".
                                     "<span id='btn".$idSignosVitales."' class='btn  btn-success btn-mdl'>Agregar Signos Vitales</span>".
                                     "</td>";
                              }
                              else{
                              echo "<td>".
                                     "<span id='btn". $idSignosVitales  ."' class='btn btn-warning btn-mdls'>Ver Signos Vitales</span>".
                                     "</td>";
                              }
                           
                              echo"</tr>";
                              echo"</body>  ";
                           }
                           ?>
                     </table>
                  </div>
               </div>
               <!-- MODAL PARA INGRESAR LOS SIGNOS VITALES CON LA SEGUN LA CONSULTA -->
               <div class="modal inmodal" id="modalSignosVitales" tabindex="-1" role="dialog"  aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                           <i class="fa fa-stethoscope modal-icon"></i>
                           <h4 class="modal-title">SIGNOS VITALES</h4>
                           <small>Ingrese los datos requeridos.</small>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" action="../../views/enfermeriaconsulta/guardarindicador.php"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
                           <div class="tabs-container">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a data-toggle="tab" href="#tab-1"> FICHA DE CONSULTA</a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-2">DATOS GENERALES</a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-3">USO GINECOLOGICO</a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-4">USO PEDIATRICO</a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-5">OTROS</a></li>
                              </ul>
                              <form class="form-horizontal">
                                 <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
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
                                                   <input type="text" class="form-control" id="paciente" name="txtPaciente" disabled="disabled">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Medico</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                   <input type="text" class="form-control" id="medico" name="txtMedico" disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Especialidad</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                                   <input type="text" class="form-control" id="modulo" name="txtMedico" disabled="disabled">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                   <input type="text" class="form-control" id="fecha" name="txtfecha" disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                       <div class="panel-body">
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Peso</label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Altura</label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Temperatura</label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">F/R</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                                   <input type="text" class="form-control"  name="txtFR" id="FR" required="">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Pulso</label></div>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                                   <input type="text" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtPulso" id="pulso" required="">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <label for="inputEmail3" class="control-label">lat/min</label>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Presion</label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Glucotex</label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Ult. Menstrua</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                                   <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUmestruacion" id="ultimamestruacion">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Ult.PAP</label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Observaciones</label></div>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                   <textarea type="text" rows="4" class="form-control" name="txtObservaciones" data-parsley-maxlength="100" id="observaciones" data-parsley-maxlength="100"> </textarea>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Motivo de Visita</label></div>
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
                           <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                           <button type="submit" class="btn btn-primary" name="guardarIndicador" >Guardar Cambios</button>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
               <!-- MODAL PARA CARGAR LOS SIGNOS VITALES CON LA SEGUN LA CONSULTA -->
               <div class="modal inmodal" id="modalCargarSignosVitales" tabindex="-1" role="dialog"  aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                           <i class="fa fa-stethoscope modal-icon"></i>
                           <h4 class="modal-title">SIGNOS VITALES</h4>
                           <small>Vista previa de consulta</small>
                        </div>
                        <div class="modal-body">
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
                                                   <input type="text" class="form-control" disabled="disabled" id="pacientes" name="txtPaciente" disabled="disabled">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Medico</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" id="medicos" name="txtMedico" disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Especialidad</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" id="modulos" name="txtMedico" disabled="disabled">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label">Fecha</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" id="fechas" name="txtfecha" disabled="disabled">
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
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
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
   $(document).ready(function(){
   $(".btn-mdl").click(function(){
       var id = $(this).attr("id").replace("btn","");
   
       var myData  = {"id":id};
       $.ajax({
           url   : "../../views/enfermeriaconsulta/cargarconsulta.php",
           type  :  "POST",
           data  :   myData,
           dataType : "JSON",
           beforeSend : function(){
               $(this).html("Cargando");
           },
           success : function(data){
               $("#paciente").val(data.Paciente);
               $("#medico").val(data.Medico);
               $("#modulo").val(data.Especialidad);
               $("#fecha").val(data.FechaConsulta);
               $("#idconsulta").val(id)
               $("#modalSignosVitales").modal("show");
           }
       });
   });
   
   $(".btn-mdls").click(function(){
       var id = $(this).attr("id").replace("btn","");
       var myData  = {"id":id};
       $.ajax({
           url   : "../../views/enfermeriaconsulta/cargarsignosvitales.php",
           type  :  "POST",
           data  :   myData,
           dataType : "JSON",
           beforeSend : function(){
               $(this).html("Cargando");
           },
           success : function(data){
               $("#pacientes").val(data.Paciente);
               $("#medicos").val(data.Medico);
               $("#modulos").val(data.Especialidad);
               $("#fechas").val(data.FechaConsulta);
               $("#pesos").val(data.Peso);
               if (data.UnidadPeso ==1){
                   $("#unidadpesos").val("Kg");
               }
               else{
                 $("#unidadpesos").val("Lbs");
               }
               $("#alturas").val(data.Altura);
               if (data.UnidadAltura ==1){
                   $("#unidadalturas").val("Mts");
               }
               else{
                 $("#unidadalturas").val("Cms");
               }
               $("#temperaturas").val(data.Temperatura);
               if (data.UnidadTemperatura ==1){
                   $("#unidadtemperaturas").val("C");
               }
               else{
                 $("#unidadtemperaturas").val("F");
               }
               $("#pulsos").val(data.Pulso);
               $("#maxs").val(data.Max);
               $("#mins").val(data.Min);
               $("#observacioness").val(data.Observaciones);
               $("#frs").val(data.FR);
               $("#glucos").val(data.Glucotex);
               $("#ultimamestruacions").val(data.PeriodoMeunstral);
               $("#ultimapaps").val(data.PAP);
               $("#pcs").val(data.PC);
               $("#pts").val(data.PT);
               $("#pas").val(data.PA);
               $("#motivos").val(data.Motivo);
               $("#modalCargarSignosVitales").modal("show");
           }
       });
   });

    $('#demo-form1').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
      })
      .on('form:submit', function() {
        return true;
      });
   });
</script>