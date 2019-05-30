         <!-- MODAL CARGAR CONSULTA -->
         <div class="modal inmodal" id="modalGuardarDiagnostico" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content animated fadeIn">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <i class="fa fa-stethoscope modal-icon"></i>
                     <h4 class="modal-title" id='modaltabnuevaconsultamedica13'></h4>
                     <small id='modaltabnuevaconsultamedica14'></small><small> <?php echo $idpersona; ?></small>
                  </div>
                   <form class="form-horizontal" method="POST" action="../../views/ingresoexpediente/guardarconsulta.php"  id="demo-form" data-parsley-validate="">
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
                                       <div class="col-sm-2" hidden="hidden"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica7'>Paciente</label></div>
                                       <div class="col-sm-4" hidden="hidden">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                             <input type="text" class="form-control" hidden="hidden"  id="pacientes" name="txtPaciente" >
                                          </div>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica8'>Medico</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                             <select class="form-control select2" style="width: 100%;" name="cboUsuario">
                                                <?php
                                                   while ($row = $resultadousuario->fetch_assoc()) {
                                                     echo "<option value = '".$row['IdUsuario']."'>".$row['NombreCompleto']."</option>";
                                                     }
                                                ?>
                                       </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica9'>Especialidad</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                              <select class="form-control select2" style="width: 100%;" name="cboModulo">
                                                   <?php
                                                      while ($row = $resultadomodulo->fetch_assoc()) {
                                                        echo "<option value = '".$row['IdModulo']."'>".$row['NombreModulo']."</option>";
                                                      }
                                                      ?>
                                                   </select>
                                          </div>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica10'>Fecha</label></div>
                                       <div class="col-sm-4" id="data_3">
                                          <div class="input-group date">
                                             <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="text" class="form-control" data-mask="9999-99-99" name="txtFecha" id="txtFecha">
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
                                             <input type="text" class="form-control" value=""  data-inputmask='"mask": "999.9"' data-mask name="txtPeso" id="pesos" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <select class="form-control select2" name="cboUnidadPeso" id="unidadpeso">
                                                   <option value="1">lbs</option>
                                                   <option Value="2">kg</option>
                                                </select>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica12'>Altura</label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-arrows-v"></i></div>
                                             <input type="text" class="form-control"  data-inputmask='"mask": "9.99"' data-mask name="txtAltura" id="alturas" required="">
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
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica13'>Temperatura</label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-thermometer-quarter"></i></div>
                                             <input type="text" class="form-control"  data-inputmask='"mask": "99.9"' data-mask name="txtTemperatura" id="temperaturas" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <select class="form-control select2" name="cboUnidadTemperatura" id="unidadtemperatura">
                                          <option value="1">C</option>
                                          <option Value="2">F</option>
                                       </select>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica14'>F/R</label></div>
                                       <div class="col-sm-4">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                             <input type="text" class="form-control"   name="txtFR" id="frs" required="">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica15'>Pulso</label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                             <input type="text" class="form-control"  data-inputmask='"mask": "999"' data-mask name="txtPulso" id="pulsos" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <label for="inputEmail3" class="control-label">lat/min</label>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica16'>Presion</label></div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-heart-o"></i></div>
                                             <input type="text" class="form-control"  data-inputmask='"mask": "999"' data-mask name="txtMax" placeholder="MAX" id="maxs" required="">
                                          </div>
                                       </div>
                                       <div class="col-sm-2">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                             <input type="text" class="form-control"  data-inputmask='"mask": "99"' data-mask name="txtMin" placeholder="MIN" id="mins" required="">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica17'>Glucotex</label></div>
                                       <div class="col-sm-10">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></div>
                                             <input type="text" class="form-control"   name="txtGluco"  id="glucos" required="">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="MDLCONSULT3" class="tab-pane">
                                 <div class="panel-body">
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica18'>Ult. Menstrua</label></div>
                                       <div class="col-sm-4" id="data_3">
                                          <div class="input-group date">
                                             <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                             <input type="text" class="form-control"  data-mask="9999-99-99" name="txtUmestruacion" id="ultimamestruacions">
                                          </div>
                                       </div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica19'>Ult.PAP</label></div>
                                       <div class="col-sm-4 " id="data_3">
                                          <div class="input-group date">
                                             <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                             <input type="text" class="form-control"  data-mask="9999-99-99" name="txtUpap" id="ultimapaps">
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
                                             <input type="text" class="form-control"  name="txtpc" id="pcs">
                                          </div>
                                       </div>
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica21'>P/T</label></div>
                                       <div class="col-sm-3">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-toggle-up"></i></div>
                                             <input type="text" class="form-control"   name="txtpt" id="pts">
                                          </div>
                                       </div>
                                       <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica22'>P/A</label></div>
                                       <div class="col-sm-3">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-toggle-right"></i></div>
                                             <input type="text" class="form-control"   name="txtpa" id="pas">
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
                                             <textarea type="text" rows="4" class="form-control" name="txtObservaciones"  data-parsley-maxlength="100" id="observacioness" data-parsley-maxlength="100"> </textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica24'>Motivo de Visita</label></div>
                                       <div class="col-sm-10">
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                             <textarea type="text" rows="4" class="form-control" name="txtMotivo" data-parsley-maxlength="100"  id="motivos" data-parsley-maxlength="100" required=""> </textarea>
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
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica26'>Estado Nutricional</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" name="txtEstadoNutriconal" class="form-control" id="estadonutricions"   ></textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica27'>Alergias</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" name="txtAlergiass" rows="2" id="alergiass" class="form-control">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica28'>Cirugias Previas</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" name="txtCirugiasPrevias" id="cirugiaspreviass" class="form-control"  ></textarea>
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
                                                         <textarea type="text" name="txtMedicamentosTomados" rows="2" id="medicamentotomados" class="form-control"></textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica30'>Examen Fisica</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" name="txtExamenFisica" id="examenfisicas" class="form-control"></textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica31'>Diagnostico</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" class="form-control" id="diagnosticoss" name="txtDiagnostico"></textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica32'>Comentarios</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" class="form-control" id="comentariosss" name="txtComentarios"></textarea>
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
                                                         <textarea type="text" rows="2" class="form-control" id="otrosss" name="txtOtros"></textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica34'>Plan de Tratamiento</label></div>
                                                   <div class="col-sm-10">
                                                      <div class="input-group">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <textarea type="text" rows="2" id="plantratamientoss" class="form-control"  name="txtPlanTratamiento">  </textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica35'>Fecha de proxima Visita</label></div>
                                                   <div class="col-sm-10" id="data_3">
                                                      <div class="input-group date">
                                                         <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                         <input type="text" class="form-control"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtFechaProxima" id="fechaproximass">
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
                            <div class="col-sm-2"><label for="inputEmail3" data-mask="9999-99-99" class="control-label" id='modalconsultaheces5'>Fecha</label></div>
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
                                 <input type="text" class="form-control" data-mask="9999-99-99" id="ExamenesVariosFecha" disabled="disabled">
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
                                 <input type="text" class="form-control" name="txtFecha" data-mask="9999-99-99" id="procefechas" disabled="disabled">
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
                     <form class="form-horizontal" method="POST" action="../../views/consultamedico/guardarexamen.php"  id="demo-form1" data-parsley-validate="">
     
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
                        <form class="form-horizontal">
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
                                                         <input type="text" class="form-control" data-mask="9999-99-99" name="txtFechaProxima" required="">
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

         <!-- MODAL ASIGNAR IMAGEN DE CONSULTA -->
         <div class="modal inmodal" id="modalGuardarImagenExamen" tabindex="-1" role="dialog"  aria-hidden="true">
               <div class="modal-dialog modal-md">
                  <div class="modal-content animated fadeIn">
                     <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="../../views/ingresoexpediente/guardarconsultaimagen.php"  id="demo-form1" data-parsley-validate="" enctype="multipart/form-data">
        
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <i class="fa fa-file-pdf-o modal-icon"></i>
                              <h4 class="modal-title" id=''>CARGA DE PDF</h4>
                              <small id=''>ESCANEO DE CONSULTAS</small>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label" id=''>Fecha</label>
                                 <div class="col-sm-9"  id="data_3">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-user"></i>
                                       </div>
                                       <input type="text" class="form-control" data-mask="9999-99-99" name="txtFechaConsulta" id="" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group" >
                              <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>">  </div>
                              <label for="inputEmail3" class="col-sm-2 control-label" id=''></label>

                               <input type="file" class="form-control" id="file[]" name="file[]" multiple="" required="">
                              </div>
                           </div>
                           <div class="modal-footer">
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-2">
                              <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal"  id=''>Cerrar</button>
                              </div>
                              <div class="col-sm-2">
                                 <button type="submit" class="btn btn-primary" value="submitExamen" name="submitExamen" id=''>Guardar Cambios</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
         </div>

         <!-- MODAL ASIGNAR IMAGEN DE CONSULTA -->
         <div class="modal inmodal" id="modalCargarConsultaIma" tabindex="-1" role="dialog"  aria-hidden="true">
               <div class="modal-dialog modal-md">
                  <div class="modal-content animated fadeIn">
                     <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="../../views/ingresoexpediente/guardarconsultaimagen.php"  id="demo-form1" data-parsley-validate="" enctype="multipart/form-data">
        
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <i class="fa fa-file-pdf-o modal-icon"></i>
                              <h4 class="modal-title" id=''>CARGA DE PDF</h4>
                              <small id=''>ESCANEO DE CONSULTAS</small>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label" id=''>Fecha</label>
                                 <div class="col-sm-9"  id="data_3">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-user"></i>
                                       </div>
                                       <input type="text" class="form-control" data-mask="9999-99-99" name="txtFechaConsulta" id="" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group" >
                              <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>">  </div>
                              <label for="inputEmail3" class="col-sm-2 control-label" id=''></label>

                               <input type="file" class="form-control" id="file[]" name="file[]" multiple="" required="">
                              </div>
                           </div>
                           <div class="modal-footer">
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-2">
                              <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal"  id=''>Cerrar</button>
                              </div>
                              <div class="col-sm-2">
                                 <button type="submit" class="btn btn-primary" value="submitExamen" name="submitExamen" id=''>Guardar Cambios</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
         </div>

         <!-- MODAL ASIGNAR IMAGEN DE PROCEDIMIENTO -->
         <div class="modal inmodal" id="modalCargarProcedimientoIma" tabindex="-1" role="dialog"  aria-hidden="true">
               <div class="modal-dialog modal-md">
                  <div class="modal-content animated fadeIn">
                     <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="../../views/ingresoexpediente/guardarprocedimientoimagen.php"  id="demo-form1" data-parsley-validate="" enctype="multipart/form-data">
        
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <i class="fa fa-file-pdf-o modal-icon"></i>
                              <h4 class="modal-title" id=''>CARGA DE PDF</h4>
                              <small id=''>ESCANEO DE PROCEDIMIENTOS</small>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label" id=''>Fecha</label>
                                 <div class="col-sm-9"  id="data_3">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-user"></i>
                                       </div>
                                       <input type="text" class="form-control" data-mask="9999-99-99" name="txtFechaConsulta" id="" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group" >
                              <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>">  </div>
                              <label for="inputEmail3" class="col-sm-2 control-label" id=''></label>

                               <input type="file" class="form-control" id="file[]" name="file[]" multiple="" required="">
                              </div>
                           </div>
                           <div class="modal-footer">
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-2">
                              <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal"  id=''>Cerrar</button>
                              </div>
                              <div class="col-sm-2">
                                 <button type="submit" class="btn btn-primary" value="submitExamen" name="submitExamen" id=''>Guardar Cambios</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
         </div>

         <!-- MODAL ASIGNAR IMAGEN DE PEDIATRIA -->
         <div class="modal inmodal" id="modalCargarPediatriaIma" tabindex="-1" role="dialog"  aria-hidden="true">
               <div class="modal-dialog modal-md">
                  <div class="modal-content animated fadeIn">
                     <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="../../views/ingresoexpediente/guardarpediatriaimagen.php"  id="demo-form1" data-parsley-validate="" enctype="multipart/form-data">
        
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <i class="fa fa-file-pdf-o modal-icon"></i>
                              <h4 class="modal-title" id=''>CARGA DE PDF</h4>
                              <small id=''>ESCANEO DE PEDIATRIA</small>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label" id=''>Fecha</label>
                                 <div class="col-sm-9"  id="data_3">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-user"></i>
                                       </div>
                                       <input type="text" class="form-control" data-mask="9999-99-99" name="txtFechaConsulta" id="" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group" >
                              <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>">  </div>
                              <label for="inputEmail3" class="col-sm-2 control-label" id=''></label>

                               <input type="file" class="form-control" id="file[]" name="file[]" multiple="" required="">
                              </div>
                           </div>
                           <div class="modal-footer">
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-2">
                              <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal"  id=''>Cerrar</button>
                              </div>
                              <div class="col-sm-2">
                                 <button type="submit" class="btn btn-primary" value="submitExamen" name="submitExamen" id=''>Guardar Cambios</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
         </div>

                  <!-- MODAL ASIGNAR IMAGEN DE GINECOLOGIA -->
         <div class="modal inmodal" id="modalCargarGinecologiaIma" tabindex="-1" role="dialog"  aria-hidden="true">
               <div class="modal-dialog modal-md">
                  <div class="modal-content animated fadeIn">
                     <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="../../views/ingresoexpediente/guardarginecologiaimagen.php"  id="demo-form1" data-parsley-validate="" enctype="multipart/form-data">
        
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <i class="fa fa-file-pdf-o modal-icon"></i>
                              <h4 class="modal-title" id=''>CARGA DE PDF</h4>
                              <small id=''>ESCANEO DE GINECOLOGIA</small>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label" id=''>Fecha</label>
                                 <div class="col-sm-9"  id="data_3">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-user"></i>
                                       </div>
                                       <input type="text" data-mask="9999-99-99" class="form-control" name="txtFechaConsulta" id="" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group" >
                              <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>">  </div>
                              <label for="inputEmail3" class="col-sm-2 control-label" id=''></label>

                               <input type="file" class="form-control" id="file[]" name="file[]" multiple="" required="">
                              </div>
                           </div>
                           <div class="modal-footer">
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-2">
                              <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal"  id=''>Cerrar</button>
                              </div>
                              <div class="col-sm-2">
                                 <button type="submit" class="btn btn-primary" value="submitExamen" name="submitExamen" id=''>Guardar Cambios</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
         </div>



                  <!-- MODAL ASIGNAR IMAGEN DE RECETAS -->
         <div class="modal inmodal" id="modalCargarRecetasIma" tabindex="-1" role="dialog"  aria-hidden="true">
               <div class="modal-dialog modal-md">
                  <div class="modal-content animated fadeIn">
                     <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="../../views/ingresoexpediente/guardarrecetasimagen.php"  id="demo-form1" data-parsley-validate="" enctype="multipart/form-data">
        
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <i class="fa fa-file-pdf-o modal-icon"></i>
                              <h4 class="modal-title" id=''>CARGA DE PDF</h4>
                              <small id=''>ESCANEO DE RECETAS</small>
                           </div>
                           <div class="modal-body ">
                              <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-2 control-label" id=''>Fecha</label>
                                 <div class="col-sm-9"  id="data_3">
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-user"></i>
                                       </div>
                                       <input type="text" class="form-control" data-mask="9999-99-99" name="txtFechaConsulta" id="" required="">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group" >
                              <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>">  </div>
                              <label for="inputEmail3" class="col-sm-2 control-label" id=''></label>

                               <input type="file" class="form-control" id="file[]" name="file[]" multiple="" required="">
                              </div>
                           </div>
                           <div class="modal-footer">
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-3">
                              </div>
                              <div class="col-sm-2">
                              <button type="button" class="btn btn-danger" id="btn-cerrarmodal" data-dismiss="modal"  id=''>Cerrar</button>
                              </div>
                              <div class="col-sm-2">
                                 <button type="submit" class="btn btn-primary" value="submitExamen" name="submitExamen" id=''>Guardar Cambios</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
         </div>