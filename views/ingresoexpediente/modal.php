<!-- MODAL CARGAR CONSULTA -->
<div class="modal inmodal" id="modalCargarConsulta" tabindex="-1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content animated fadeIn">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <i class="fa fa-stethoscope modal-icon"></i>
            <h4 class="modal-title" id='modaltabconsultamedicatitulo1'>FICHA GENERAL DE CONSULTA</h4>
            <small id='modaltabconsultamedicatitulo2'>FICHA DE CONSULTA</small>
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
                                    <input type="text" class="form-control" disabled="disabled" id="pacientes" name="txtPaciente" disabled="disabled">
                                 </div>
                              </div>
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica8'>Medico</label></div>
                              <div class="col-sm-4">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                    <input type="text" class="form-control" disabled="disabled" id="medicos" name="txtMedico" disabled="disabled">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica9'>Especialidad</label></div>
                              <div class="col-sm-4">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                    <input type="text" class="form-control" disabled="disabled" id="modulos" name="txtMedico" disabled="disabled">
                                 </div>
                              </div>
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica10'>Fecha</label></div>
                              <div class="col-sm-4">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control" disabled="disabled" id="fechas" name="txtfecha" disabled="disabled">
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
                                    <input type="text" class="form-control" value="" disabled="disabled" data-inputmask='"mask": "999.9"' data-mask name="txtPeso" id="pesos" required="">
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <input type="text" class="form-control" disabled="disabled" id="unidadpesos" required="">
                              </div>
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica12'>Altura</label></div>
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
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica13'>Temperatura</label></div>
                              <div class="col-sm-2">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-thermometer-quarter"></i></div>
                                    <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "99.9"' data-mask name="txtTemperatura" id="temperaturas" required="">
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "99.9"' data-mask  id="unidadtemperaturas" required="">
                              </div>
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica14'>F/R</label></div>
                              <div class="col-sm-4">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                    <input type="text" class="form-control" disabled="disabled"  name="txtFR" id="frs" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica15'>Pulso</label></div>
                              <div class="col-sm-2">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                    <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "999"' data-mask name="txtPulso" id="pulsos" required="">
                                 </div>
                              </div>
                              <div class="col-sm-2">
                                 <label for="inputEmail3" class="control-label">lat/min</label>
                              </div>
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica16'>Presion</label></div>
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
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica17'>Glucotex</label></div>
                              <div class="col-sm-10">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></div>
                                    <input type="text" class="form-control" disabled="disabled"  name="txtGluco"  id="glucos" required="">
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
                                    <input type="text" class="form-control" disabled="disabled" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUmestruacion" id="ultimamestruacions">
                                 </div>
                              </div>
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica19'>Ult.PAP</label></div>
                              <div class="col-sm-4">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                    <input type="text" class="form-control" disabled="disabled" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUpap" id="ultimapaps">
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
                                    <input type="text" class="form-control" disabled="disabled" name="txtpc" id="pcs">
                                 </div>
                              </div>
                              <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica21'>P/T</label></div>
                              <div class="col-sm-3">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-toggle-up"></i></div>
                                    <input type="text" class="form-control" disabled="disabled"  name="txtpt" id="pts">
                                 </div>
                              </div>
                              <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica22'>P/A</label></div>
                              <div class="col-sm-3">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-toggle-right"></i></div>
                                    <input type="text" class="form-control" disabled="disabled"  name="txtpa" id="pas">
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
                                    <textarea type="text" rows="4" class="form-control" name="txtObservaciones" disabled="disabled" data-parsley-maxlength="100" id="observacioness" data-parsley-maxlength="100"> </textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica24'>Motivo de Visita</label></div>
                              <div class="col-sm-10">
                                 <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                    <textarea type="text" rows="4" class="form-control" name="txtMotivo" data-parsley-maxlength="100" disabled="disabled" id="motivos" data-parsley-maxlength="100" required=""> </textarea>
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
                                                <textarea type="text" rows="1" class="form-control" id="enfermedads" disabled="disabled">  </textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica26'>Estado Nutricional</label></div>
                                          <div class="col-sm-10">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                <textarea type="text" rows="2" class="form-control" id="estadonutricions"   disabled="disabled">  </textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica27'>Alergias</label></div>
                                          <div class="col-sm-10">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                <textarea type="text" rows="2" id="alergiass" class="form-control"  disabled="disabled">  </textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica28'>Cirugias Previas</label></div>
                                          <div class="col-sm-10">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                <textarea type="text" rows="2" id="cirugiaspreviass" class="form-control"  disabled="disabled">  </textarea>
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
                                                <textarea type="text" rows="2" id="medicamentotomados" class="form-control"  disabled="disabled">  </textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='modaltabconsultamedica30'>Examen Fisica</label></div>
                                          <div class="col-sm-10">
                                             <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
                                                <textarea type="text" rows="2" id="examenfisicas" class="form-control"  disabled="disabled">  </textarea>
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
                                                <textarea type="text" rows="2" class="form-control" id="comentariosss" name="txtComentarios" disabled="disabled">  </textarea>
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
                                                <textarea type="text" rows="2" class="form-control" id="otrosss" name="txtOtros" disabled="disabled">  </textarea>
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
                              <