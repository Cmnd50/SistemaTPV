<section class="content">
<div class="row">
<div class="col-md-12">
<div class="nav-tabs-custom">
   <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab">Consulta</a></li>
      <li><a href="#tab_2" data-toggle="tab">Expediente</a></li>
      <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
   </ul>
   <div class="tab-content">
      <!-- PANEL GENERAL DE CONSULTA Y SIGNOS VITALES -->
      <div class="tab-pane active" id="tab_1">
         <div class="row">
            <div class="col-md-12">
               <!-- DESDE AQUI -->
               <div class="row">
                  <div class="col-md-12">
                     <!-- PANEL DE DIAGNOSTICO, LABORATORIO Y FARMACIA -->
                     <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#tab_12" data-toggle="tab">FICHA CONSULTA</a></li>
                           <li><a href="#tab_13" data-toggle="tab">FICHA SIGNOS VITALES</a></li>
                           <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane active" id="tab_12">
                              <!-- FICHA CONSULTA -->
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
                                                <input type="text" class="form-control" id="medico" name="medico" value="<?php echo $idusuario ?>" disabled="disabled">
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
                                                <input type="text" class="form-control" id="especialidad" name="especialidad" value="<?php echo $idmodulo ?>" disabled="disabled">
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
                                                <input type="text" class="form-control" id="paciente" name="paciente" value="<?php echo $idpersona ?>" disabled="disabled">
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
                                                <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $fechaconsulta ?>" disabled="disabled">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-2">
                                          </div>
                                          <div class="col-sm-3">
                                             <button type="button" class="btn btn-success" style="width: 65%"  data-toggle="modal" data-target="#modalGuardarDiagnostico"> Agregar Diagnostico </button>
                                          </div>
                                          <div class="col-sm-3">
                                             <button type="button" class="btn btn-success" style="width: 65%" data-toggle="modal" data-target="#modalGuardarExamenes"> Asignar Examenes </button>
                                          </div>
                                          <div class="col-sm-3">
                                             <?php
                                                $disabled = "";
                                                while ($row = $resultadovalidarreceta->fetch_assoc()) {
                                                    if ($row['Activo'] == 1) {
                                                        $disabled = 'disabled="disabled"';
                                                    } else {
                                                
                                                    }
                                                }
                                                ?>
                                             <button type="button" style="width: 65%" class="btn btn-success" <?php echo $disabled; ?> data-toggle="modal" data-target="#modalCrearReceta"> Crear Receta Medica </button>
                                          </div>
                                       </div>
                                       <div class="form-group" hidden="hidden">
                                          <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                                          <div class="col-sm-9">
                                             <input type="text" class="form-control" id="id" name="id" value="<?php echo $idpersonaid ?>" disabled="disabled">
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <!-- PANEL DE LABORATORIO -->
                           <div class="tab-pane" id="tab_13">
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
                                                   <input type="text" class="form-control" id="pulso" name="pulso"  value="<?php echo $pulso ?>" disabled="disabled" >
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-1 control-label">Altura</label>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <input type="text" class="form-control" id="altura" name="altura" value="<?php echo $altura ?>" disabled="disabled" >
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <select class="form-control" name="cboUnidadAltura" id="unidadpeso" value="<?php echo $unidadaltura ?>" disabled="disabled">
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
                                                   <input type="text" class="form-control" id="temperatura" name="temperatura" data-inputmask='"mask": "99.9"' data-mask value="<?php echo $temperatura ?>" disabled="disabled" >
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <select class="form-control" name="cboUnidadTemperatura" id="unidadtemperatura" value="<?php echo $unidadtemperatura ?>" disabled="disabled">
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
                                                   <input type="text" class="form-control" id="peso" name="peso" value="<?php echo $peso ?>" disabled="disabled" >
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <select class="form-control" name="cboUnidadPeso" id="unidadpeso" value="<?php echo $unidadpeso ?>" disabled="disabled">
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
                                                   <input type="text" class="form-control"  name="max" value="<?php echo $max ?>" disabled="disabled" >
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <input type="text" class="form-control"  name="min"  value="<?php echo $min ?>" disabled="disabled" >
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-1 control-label">F/R</label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <input type="text" class="form-control"  name="min"  value="<?php echo $fr; ?>" disabled="disabled" >
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
                                                   <input type="text" class="form-control"  value="<?php echo $glucotex; ?>" disabled="disabled" >
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-3 control-label">Si es Mujer, Fecha de ultima Menstruacion</label>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <input type="text" class="form-control"  name="min"  value="<?php echo $periodomenstrual; ?>" disabled="disabled" >
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
                                                   <input type="text" class="form-control"  value="<?php echo $pap; ?>" disabled="disabled" >
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-1 control-label">P/C cm.</label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <input type="text" class="form-control"  name="min"  value="<?php echo $pc; ?>" disabled="disabled" >
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
                                                   <input type="text" class="form-control"  value="<?php echo $pt; ?>" disabled="disabled" >
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-1 control-label">P/A cm.</label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <input type="text" class="form-control"  name="min"  value="<?php echo $pa; ?>" disabled="disabled" >
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
                                                   <textarea type="text" rows="3" class="form-control"  disabled="disabled"> <?php echo $motivo; ?> </textarea>
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
                                                   <textarea type="text" rows="3" class="form-control" id="observaciones" disabled="disabled"> <?php echo $observaciones ?> </textarea>
                                                </div>
                                             </div>
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
               <!-- HASTA AQUI -->
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <!-- PANEL DE DIAGNOSTICO, LABORATORIO Y FARMACIA -->
               <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                     <li class="active"><a href="#tab_4" data-toggle="tab">Diagnostico</a></li>
                     <li><a href="#tab_5" data-toggle="tab">Examenes Asignados</a></li>
                     <li><a href="#tab_6" data-toggle="tab">Recetas Asignadas</a></li>
                     <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                  </ul>
                  <div class="tab-content">
                     <!-- PANEL DE DIAGNOSTICO -->
                     <div class="tab-pane active" id="tab_4">
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
                                          <textarea type="text" rows="1" class="form-control"  disabled="disabled"> <?php echo $Enfermedad; ?> </textarea>
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
                                          <textarea type="text" rows="3" class="form-control"   disabled="disabled"> <?php echo $comentarios ?> </textarea>
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
                                          <textarea type="text" rows="3" class="form-control"  disabled="disabled"> <?php echo $Alergias; ?> </textarea>
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
                                          <textarea type="text" rows="3" class="form-control"  disabled="disabled"> <?php echo $CirugiasPrevias; ?> </textarea>
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
                                          <textarea type="text" rows="3" class="form-control"  disabled="disabled"> <?php echo $MedicamentosActuales; ?> </textarea>
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
                                          <textarea type="text" rows="3" class="form-control"  disabled="disabled"> <?php echo $ExamenFisica; ?> </textarea>
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
                                          <textarea type="text" rows="3" class="form-control" id="diagnostico" name="txtDiagnostico" disabled="disabled"> <?php echo $diagnostico ?> </textarea>
                                       </div>
                                    </div>
                                    <div class="hidden">
                                       <textarea  type="text" rows="1" class="form-control"   name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                                    </div>
                                    <div class="hidden">
                                       <textarea  type="text" rows="1" class="form-control"   name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label" >Comentarios</label>
                                    <div class="col-sm-9">
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <i class="fa fa-user"></i>
                                          </div>
                                          <textarea type="text" rows="3" class="form-control" id="comentarios" name="txtComentarios" disabled="disabled"> <?php echo $comentarios ?> </textarea>
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
                                          <textarea type="text" rows="3" class="form-control" id="otros" name="txtOtros" disabled="disabled"> <?php echo $otros ?> </textarea>
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
                                          <textarea type="text" rows="3" class="form-control"  disabled="disabled"> <?php echo $PlanTratamiento; ?> </textarea>
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
                                          <textarea type="text" rows="1" class="form-control"  disabled="disabled"> <?php echo $FechaProxVisita ?> </textarea>
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
                     <!-- PANEL DE LABORATORIO -->
                     <div class="tab-pane" id="tab_5">
                        <div class="box box-info">
                           <div class="box-header with-border">
                              <h3 class="box-title">Lista de Examenes Activos</h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                              <table id="example2" class="table table-bordered table-hover">
                                 <?php
                                    echo"<thead>";
                                    echo"<tr>";
                                    echo"<th>Medico</th>";
                                    echo"<th>Nombre Completo del Paciente</th>";
                                    echo"<th>Examen</th>";
                                    echo"<th>Indicaciones</th>";
                                    echo"</tr>";
                                    echo"</thead>";
                                    echo"<tbody>";
                                    
                                    while ($row = $resultadoexamenestabla->fetch_assoc()) {
                                        echo"<tr>";
                                        echo"<td>" . $row['Medico'] . "</td>";
                                        echo"<td>" . $row['Paciente'] . "</td>";
                                        echo"<td>" . $row['Examen'] . "</td>";
                                        echo"<td>" . $row['Indicaciones'] . "</td>";
                                        echo"</tr>";
                                        echo"</body>  ";
                                    }
                                    ?>
                              </table>
                           </div>
                        </div>
                     </div>
                     <!-- PANEL DE RECETAS -->
                     <div class="tab-pane" id="tab_6">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="box box-info ">
                                 <div class="box-header with-border">
                                    <h3 class="box-title">Receta Activa</h3>
                                 </div>
                                 <!-- /.box-header -->
                                 <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                       <?php
                                          echo"<thead>";
                                          echo"<tr>";
                                          echo"<th>Medico</th>";
                                          echo"<th>Nombre Completo del Paciente</th>";
                                          echo"<th>Fecha</th>";
                                          echo"<th>Acciones</th>";
                                          echo"</tr>";
                                          echo"</thead>";
                                          echo"<tbody>";
                                          
                                          while ($row = $resultadotablarecetas->fetch_assoc()) {
                                              $idreceta = $row['IdReceta'];
                                              echo"<tr>";
                                              echo"<td>" . $row['Medico'] . "</td>";
                                              echo"<td>" . $row['Paciente'] . "</td>";
                                              echo"<td>" . $row['Fecha'] . "</td>";
                                              echo "<td>" .
                                              "<span id='btn" . $idreceta . "' class='btn btn-xs btn-warning btn-mdlre'>Agregar Medicamentos</span>" .
                                              "</td>";
                                              echo"</tr>";
                                              echo"</body>  ";
                                          }
                                          ?>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="box box-info">
                                 <div class="box-header with-border">
                                    <h3 class="box-title">Medicamentos en Receta</h3>
                                 </div>
                                 <!-- /.box-header -->
                                 <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                       <?php
                                          echo"<thead>";
                                          echo"<tr>";
                                          echo"<th>Medicamentos</th>";
                                          echo"<th>Cantidad</th>";
                                          echo"</tr>";
                                          echo"</thead>";
                                          echo"<tbody>";
                                          
                                          while ($row = $resultadotablarecetamedicamentos->fetch_assoc()) {
                                              echo"<tr>";
                                              echo"<td>" . $row['Medicamento'] . "</td>";
                                              echo"<td>" . $row['Cantidad'] . "</td>";
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
      <!-- PANEL GENERAL DE EXPEDIENTE GENERAL DE PACIENTE -->
      <div class="tab-pane" id="tab_2">
         <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
               <li><a href="#tabs_11" data-toggle="tab"><i class="fa fa-user"></i> Datos generales</a></li>
               <li><a href="#tabs_13" data-toggle="tab"><i class="fa fa-user"></i> Historial clinico</a></li>
               <li><a href="#tabs_14" data-toggle="tab"><i class="fa fa-user"></i> Esquena de vacunación</a></li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane active" id="tabs_11">
                  <!-- PANEL DE EXPEDIENTE DE PACIENTE -->
                  <div class="row">
                     <div class="col-xs-12">
                        <div class="box">
                           <div class="box-header with-border">
                              <h3 class="box-title"> Expediente de:  <?php echo $nombres . " " . $apellidos ?> </h3>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                              <!--    FORMULARIO    -->
                              <form  method="post" id="demo-form" >
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Nombre
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <input type="text" class="form-control" name="txtNombres" disabled="disabled" required="" value="<?php echo $nombres ?>">
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Apellido
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <input type="text" class="form-control" name="txtApellidos" disabled="disabled" required="" value="<?php echo $apellidos ?>">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Dui
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-credit-card"></i>
                                                   </div>
                                                   <input type="text" class="form-control" data-inputmask='"mask": "99999999-9"' data-mask name="txtDui" disabled="disabled" value="<?php echo $dui ?>" >
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             F. Nacimiento
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-calendar"></i>
                                                   </div>
                                                   <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFNacimiento" required="" disabled="disabled" value="<?php echo $fnacimiento ?>">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Departamento
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-flag"></i>
                                                   </div>
                                                   <select class="form-control select2" style="width: 100%;" disabled="disabled" name="cboGeografia">
                                                   <?php
                                                      while ($row = $resultadodepartamentos->fetch_assoc()) {
                                                        echo "<option value = '".$row['IdGeografia']."'>".$row['Nombre']."</option>";
                                                      }
                                                      ?>
                                                   </select>
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Municipio
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-flag-o"></i>
                                                   </div>
                                                   <input type="text" class="form-control"  name="municipio" id="municipio" disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Direccion
                                             </label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-arrows"></i>
                                                   </div>
                                                   <input type="text" class="form-control" name="txtDireccion" required="" disabled="disabled" value="<?php echo $direccion ?>">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-0">
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Genero
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-genderless"></i>
                                                   </div>
                                                   <select class="form-control select2" style="width: 100%;" disabled="disabled" name="cboGenero" required="">
                                                      <option> <?php echo $genero ?> </option>
                                                   </select>
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Estado Civil
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-circle-o"></i>
                                                   </div>
                                                   <select class="form-control select2" style="width: 100%;" disabled="disabled" name="cboEstadoCivil" required="">
                                                   <?php
                                                      while ($row = $resultadoestadocivil->fetch_assoc()) {
                                                        echo "<option value = '".$row['IdEstadoCivil']."'>".$row['Nombre']."</option>";
                                                      }
                                                      ?>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Correo
                                             </label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-envelope"></i>
                                                   </div>
                                                   <input type="email" class="form-control" disabled="disabled" name="txtCorreo"  data-parsley-trigger="change" value="<?php echo $correo ?>">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-0">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-0">
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Telefono
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-phone-square"></i>
                                                   </div>
                                                   <input type="text" class="form-control"  data-inputmask='"mask": "9999-9999"' data-mask name="txtTelefono" disabled="disabled" value="<?php echo $telefono ?>" />
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Celular
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-mobile"></i>
                                                   </div>
                                                   <input type="text" class="form-control" data-inputmask='"mask": "9999-9999"' data-mask name="txtCelular" disabled="disabled" value="<?php echo $celular ?>" />
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Enfermedad
                                             </label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-check"></i>
                                                   </div>
                                                   <textarea type="text" rows="1" class="form-control" disabled="disabled"  name="txtEnfermedad" data-parsley-maxlength="100"><?php echo $enfermedad ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-0">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-0">
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Alergias
                                             </label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-check"></i>
                                                   </div>
                                                   <textarea type="text" rows="2" class="form-control" disabled="disabled"  name="txtAlergias" data-parsley-maxlength="100"> <?php echo $alergias ?> </textarea>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Medicamentos
                                             </label>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-check"></i>
                                                   </div>
                                                   <textarea type="text" rows="2" class="form-control" disabled="disabled" name="txtMedicamentos" data-parsley-maxlength="100"><?php echo $medicinas ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-0">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-0">
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Responsable
                                             </label>
                                             <div class="col-sm-5">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-user"></i>
                                                   </div>
                                                   <input type="text" class="form-control" disabled="disabled" name="txtResponsable" required="" value="<?php echo $nombreResponsable. " " .$apellidoResponsable ?>" />
                                                </div>
                                             </div>
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Parentesco
                                             </label>
                                             <div class="col-sm-3">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-users"></i>
                                                   </div>
                                                   <input type="text" class="form-control" name="txtParentesco" required="" disabled="disabled" value="<?php echo $parentesco ?>" />
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-0">
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-horizontal" role="form">
                                          <div class="form-group">
                                             <label for="inputEmail3" class="col-sm-2 control-label">
                                             Telefono
                                             </label>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon">
                                                      <i class="fa fa-phone-square"></i>
                                                   </div>
                                                   <input type="text" class="form-control" disabled="disabled"  data-inputmask='"mask": "9999-9999"' data-mask name="txtTelefonoContacto" value="<?php echo $telefonoresponsable ?>"  />
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-0">
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane " id="tabs_12">
                  <div class="box box-warning box-solid">
                     <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-credit-card"></i> Socioeconómico:</h3>
                     </div>
                     <div class="box-body">
                        <div class="col-sm-10 col-sm-offset-1">
                           <?php //include 'test.php' ?>
                           <div id="test"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane " id="tabs_13">
                  <div class="box box-warning box-solid">
                     <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-credit-card"></i> Historial Clínico:</h3>
                     </div>
                     <div class="box-body">
                        <div class="col-sm-10 col-sm-offset-1">
                           <div id="historialclinico"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane " id="tabs_14">
                  <div class="box box-info box-solid">
                     <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-eyedropper"></i> Esquema de vacunación:</h3>
                     </div>
                     <div class="box-body">
                        <div class="col-sm-10 col-sm-offset-1">
                           <div id="vacunacion"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- TABLA HISTORIAL DE CONSULTAS EN EXPEDIENTE -->
         <div class="row">
            <div class="col-xs-12">
               <div class="box">
                  <div class="nav-tabs-custom">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_7" data-toggle="tab">Historial de Consultas</a></li>
                        <li><a href="#tab_8" data-toggle="tab">Historial de Examenes</a></li>
                        <li><a href="#tab_9" data-toggle="tab">Historial de Recetas</a></li>
                        <li><a href="#tab_10" data-toggle="tab">Historial de Procedimientos</a></li>
                        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane active" id="tab_7">
                           <div class="box-header with-border">
                              <h3 class="box-title">Historial de Consultas</h3>
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
                                    while ($row = $resultadotablaconsulta->fetch_assoc()) {
                                        $idSignosVitales = $row['IdConsulta'];
                                        echo"<tr>";
                                        echo"<td>" . $row['IdConsulta'] . "</td>";
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
                        <div class="tab-pane" id="tab_8">
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
                        <div class="tab-pane" id="tab_9">
                           <div class="box-header with-border">
                              <h3 class="box-title">Historial de Medicamentos</h3>
                           </div>
                           <div class="box-body">
                              <table id="example3" class="table table-bordered table-hover">
                                 <?php
                                    echo"<thead>";
                                    echo"<tr>";
                                    echo"<th>ID Consulta</th>";
                                    echo"<th>ID Receta</th>";
                                    echo"<th>Fecha</th>";
                                    echo"<th>Nombre Completo</th>";
                                    echo"<th>Medico</th>";
                                    echo"<th>Medicamento</th>";
                                    echo"<th>Cantidad</th>";
                                    echo"<th>Dias</th>";
                                    echo"<th>Horas</th>";
                                    echo"<th>Total</th>";
                                    echo"</tr>";
                                    echo"</thead>";
                                    echo"<tbody>";
                                    while ($row = $resultadotablahistoricomedicamentos->fetch_assoc()) {
                                    
                                        echo"<tr>";
                                        echo"<td>" . $row['ID'] . "</td>";
                                        echo"<td>" . $row['IDReceta'] . "</td>";
                                        echo"<td>" . $row['Fecha'] . "</td>";
                                        echo"<td>" . $row['Nombre Completo'] . "</td>";
                                        echo"<td>" . $row['Medico'] . "</td>";
                                        echo"<td>" . $row['Medicamento'] . "</td>";
                                        echo"<td>" . $row['Cantidad'] . "</td>";
                                        echo"<td>" . $row['Dias'] . "</td>";
                                        echo"<td>" . $row['Horas'] . "</td>";
                                        echo"<td>" . $row['Total'] . "</td>";
                                        echo"</tr>";
                                        echo"</body>  ";
                                    }
                                    ?>
                              </table>
                           </div>
                        </div>
                        <div class="tab-pane" id="tab_10">
                           <div class="box-header with-border">
                              <h3 class="box-title">Historial de Procedimientos</h3>
                           </div>
                           <div class="box-body">
                              <table id="example2" class="table table-bordered table-hover">
                                 <?php
                                    echo"<thead>";
                                    echo"<tr>";
                                    echo"<th>ID</th>";
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
                                        echo"<td>" . $row['ID'] . "</td>";
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
      <!-- MODAL PARA GUARDAR DIAGNOSTICO -->
      <div class="example-modal modal fade" id="modalGuardarDiagnostico">
         <div class="modal">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <form class="form-horizontal" method="POST" action="medico_actualizar_consulta.php"  id="demo-form1" data-parsley-validate="">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">SECCION MEDICA: <?php echo $idpersona ?></h4>
                     </div>
                     <div class="modal-body ">
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Enfermedad</label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <textarea type="text" rows="3" class="form-control" id="diagnostico" name="txtDiagnostico" required=""> </textarea>
                              </div>
                              <div class="hidden">
                                 <textarea  type="text" rows="4" class="form-control"   name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                              </div>
                              <div class="hidden">
                                 <textarea  type="text" rows="4" class="form-control"   name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Estado Nutricional</label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <textarea type="text" rows="3" class="form-control" id="diagnostico" name="txtEstadoNutriconal" required=""> </textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Alergias</label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <textarea type="text" rows="3" class="form-control" id="diagnostico" name="txtAlergiass" required=""> </textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Cirugias Previas</label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <textarea type="text" rows="3" class="form-control" id="diagnostico" name="txtCirugiasPrevias" required=""> </textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Medicamentos tomados Actualmente</label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <textarea type="text" rows="3" class="form-control" id="diagnostico" name="txtMedicamentosTomados"> </textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Examen Fisica</label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <textarea type="text" rows="3" class="form-control"  name="txtExamenFisica"> </textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label" >Diagnostico </label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <select class="form-control select2" style="width: 100%;"  name="cboEnfermedad">
                                 <?php
                                    while ($row = $resultadotablaenfermedad->fetch_assoc()) {
                                        echo "<option value = '" . $row['IdEnfermedad'] . "'>" . $row['Nombre'] . "</option>";
                                    }
                                    ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label" >Comentarios</label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <textarea type="text" rows="3" class="form-control" id="comentarios" name="txtComentarios">  </textarea>
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
                                 <textarea type="text" rows="3" class="form-control" id="otros" name="txtOtros">  </textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Plan de Tratamiento</label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <textarea type="text" rows="3" class="form-control" id="otros" name="txtPlanTratamiento">  </textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Fecha proxima visita</label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFechaProxima" required="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                           <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                           <button type="submit" class="btn btn-primary" name="guardarIndicador" >Guardar Cambios</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- MODAL CREAR  RECETA -->
      <div class="example-modal modal fade" id="modalCrearReceta">
         <div class="modal">
            <div class="modal-dialog modal-md">
               <div class="modal-content">
                  <form class="form-horizontal" method="POST" action="medico_guardar_nuevareceta.php"  id="demo-form1" data-parsley-validate="">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Receta para: <?php echo $idpersona ?></h4>
                     </div>
                     <div class="modal-body ">
                        <div class="form-group">
                           <div class="hidden">
                              <textarea  type="text" rows="4" class="form-control"   name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                           </div>
                           <div class="hidden">
                              <textarea  type="text" rows="4" class="form-control"   name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                           </div>
                           <div class="hidden">
                              <textarea  type="text" rows="4" class="form-control"   name="txtusuarioID"> <?php echo $idusuarioid ?> </textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Medico</label>
                           <div class="col-sm-9">
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                 </div>
                                 <input type="text" class="form-control"  value="<?php echo $idusuario ?>" disabled="disabled">
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
                                 <input type="text" class="form-control"  value="<?php echo $idmodulo ?>" disabled="disabled">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                           <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                           <button type="submit" class="btn btn-primary" name="guardarIndicador" >Guardar</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- MODAL PARA MOSTRAR MEDICAMENTOS -->
      <div class="example-modal modal fade" id="modalAsignarMedicamentos">
         <div class="modal">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Consulta para: <?php echo $idpersona ?></h4>
                  </div>
                  <div class="modal-body ">
                     <div class="box box-info">
                        <div class="box-header with-border">
                           <h3 class="box-title">Lista de Medicamentos Activos</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table id="example2" class="table table-bordered table-hover">
                              <?php
                                 echo"<thead>";
                                 echo"<tr>";
                                 echo"<th>Medicamento</th>";
                                 echo"<th>Presentacion</th>";
                                 echo"<th>Categoria</th>";
                                 echo"<th>Laboratorio</th>";
                                 echo"<th>Existencia</th>";
                                 echo"<th>Accion</th>";
                                 echo"</tr>";
                                 echo"</thead>";
                                 echo"<tbody>";
                                 
                                 while ($row = $resultadotablamedicamentos->fetch_assoc()) {
                                     $idMedicamentos = $row['IdMedicamento'];
                                     echo"<tr>";
                                     echo"<td>" . $row['Medicamento'] . "</td>";
                                     echo"<td>" . $row['Presentacion'] . "</td>";
                                     echo"<td>" . $row['Categoria'] . "</td>";
                                     echo"<td>" . $row['Laboratorio'] . "</td>";
                                     echo"<td>" . $row['Existencia'] . "</td>";
                                     echo "<td>" .
                                     "<span id='btn" . $idMedicamentos . "' class='btn btn-xs btn-warning btn-mdlme'>Seleccionar Medicamento</span>" .
                                     "</td>";
                                     echo"</tr>";
                                     echo"</body>  ";
                                 }
                                 ?>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <div class="col-sm-2">
                     </div>
                     <div class="col-sm-2">
                     </div>
                     <div class="col-sm-4">
                     </div>
                     <div class="col-sm-3">
                        <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- MODAL ASIGNAR MEDICAMENTOS -->
      <div class="example-modal modal fade" id="modalAsignarGuardarMedicamento">
         <div class="modal">
            <div class="modal-dialog modal-md">
               <div class="modal-content">
                  <form class="form-horizontal" method="POST" action="medico_guardar_recetamedicamento.php"  id="demo-form1" data-parsley-validate="">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Consulta para: <?php echo $idpersona ?></h4>
                     </div>
                     <div class="modal-body ">
                        <div class="hidden">
                           <textarea  type="text" rows="4" class="form-control" id="idmedicamentos" name="txtIdMedicamento"></textarea>
                           <textarea  type="text" rows="4" class="form-control" id="idreceta" name="txtIdReceta"> </textarea>
                           <textarea  type="text" rows="4" class="form-control"   name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Medicamento</label>
                           <div class="col-sm-5">
                              <input type="text" class="form-control" id="medicamentos" disabled="disabled" name="txtMedicamento">
                           </div>
                           <label for="inputEmail3" class="col-sm-2 control-label">Existencia</label>
                           <div class="col-sm-2">
                              <input type="text" class="form-control" id="existencias" disabled="disabled" name="txtExistencia">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Presentacion</label>
                           <div class="col-sm-9">
                              <input type="text" class="form-control" id="presentacions" disabled="disabled" name="txtPresentacion">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Categoria</label>
                           <div class="col-sm-9">
                              <input type="text" class="form-control" id="categorias" disabled="disabled" name="txtCategorias">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label">Laboratorio</label>
                           <div class="col-sm-9">
                              <input type="text" class="form-control" id="laboratorios" disabled="disabled" name="txtLaboratorios">
                           </div>
                        </div>
                        <div class="box box-info">
                           <div class="box-header with-border">
                              <center>
                                 <h3 class="box-title">Si son medicamentos con MG, llenar unicamente los Campos</h3>
                              </center>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control"  name="txtCantidad" >
                                 </div>
                                 <label for="inputEmail3" class="col-sm-1 control-label">Horas</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control"  name="txtHoras" >
                                 </div>
                                 <label for="inputEmail3" class="col-sm-2 control-label">Dias</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control" name="txtDias" >
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="box box-info">
                           <div class="box-header with-border">
                              <center>
                                 <h3 class="box-title">Si son medicamentos con ML, llenar unicamente el Total</h3>
                              </center>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Total</label>
                                 <div class="col-sm-2">
                                    <input type="text" class="form-control"  name="txtTotal" >
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label">Indicacion</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="txtIndicacion" >
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                           <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                           <button type="submit" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- MODAL GUARDAR EXAMENES -->
      <div class="example-modal modal fade" id="modalGuardarExamenes">
         <div class="modal">
            <div class="modal-dialog modal-md">
               <div class="modal-content">
                  <form class="form-horizontal" method="POST" action="medico_guardar_examen.php"  id="demo-form1" data-parsley-validate="">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Examenes para: <?php echo $idpersona ?></h4>
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
                              <textarea  type="text" rows="4" class="form-control"   name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
                           </div>
                           <div class="hidden">
                              <textarea  type="text" rows="4" class="form-control"   name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
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
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-2">
                           <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                           <button type="submit" class="btn btn-primary" name="guardarIndicador" >Guardar Cambios</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         </div
         <!-- MODAL CARGAR CONSULTA -->
         <!-- MODAL CARGAR CONSULTA -->
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
<div class="row">
<div class="col-md-12">
   <form class="form-horizontal" action="medico_finalizar_consulta.php" method="POST" >
      <div class="hidden">
         <textarea  type="text" rows="1" class="form-control"   name="txtconsultaID"> <?php echo $idconsulta ?> </textarea>
      </div>
      <div class="hidden">
         <textarea  type="text" rows="1" class="form-control"   name="txtpersonaID"> <?php echo $idpersonaid ?> </textarea>
      </div>
      <div class="col-sm-12">
         <center> <button type="submit" class="btn btn-success"> Finalizar Consulta </button> </center>
      </div>
   </form>
</div>
</div>
</section>

<?php

    $querytablaconsulta = "SELECT c.IdConsulta, c.FechaConsulta, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                                         CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', m.NombreModulo As 'Especialidad', c.IdEstado as 'Estado'
                                         FROM consulta c
                                         INNER JOIN usuario u ON c.IdUsuario = u.IdUsuario
                                         INNER JOIN modulo m ON c.IdModulo = m.IdModulo
                                         INNER JOIN persona p ON c.IdPersona = p.IdPersona
                                         WHERE c.Activo = 0 AND c.IdPersona = $idpersonaid
                                         ORDER BY c.FechaConsulta DESC";
    $resultadotablaconsulta = $mysqli->query($querytablaconsulta);
   



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




     $querytablaexamenes = "SELECT le.IdListaExamen As 'IdListaExamen', c.IdConsulta As 'Consulta', le.FechaExamen As 'Fecha', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', te.IdTipoExamen As IdTipoExamen, te.NombreExamen As 'Examen', le.Activo
                              FROM listaexamen le
                              INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
                              INNER JOIN persona p ON le.IdPersona = p.IdPersona
                              LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
                              INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
                                        WHERE le.Activo = 0 and le.IdPersona = $idpersonaid
                                        ORDER BY le.FechaExamen DESC";
    $resultadotablaexamenes = $mysqli->query($querytablaexamenes);
   