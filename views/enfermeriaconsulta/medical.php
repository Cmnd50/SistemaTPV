<?php
   use yii\helpers\Html;
   use yii\widgets\DetailView;
   
   include '../include/dbconnect.php';

   if(!isset($_SESSION))
       {
           session_start();
       }
   
   
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
   
   
      $querymodulo = "SELECT * FROM modulo WHERE IdModulo in(3,6,7) order by NombreModulo asc";
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

   $label = '';
   if($_SESSION['IdIdioma'] == 1){
    $label = 'Enfermeria - Consultas';
   }else{
    $label = 'Nursing - Visits';
   }   
   
   $this->title = $model->fullName;
   $this->params['breadcrumbs'][] = ['label' => $label, 'url' => ['index']];
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
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConsulta" id='btnconsulta'> </button>
        </p>
      </div>
          <div class="ibox-content">
                  <h3 class="box-title" id='tablaconsultas'></h3>
            <table id="example2" class="table table-bordered table-hover">
                        <?php
                           echo"<thead>";
                               echo"<tr>";
                               echo"<th id='tabla1columna1'></th>";
                               echo"<th id='tabla1columna2'></th>";
                               echo"<th id='tabla1columna3'></th>";
                               echo"<th id='tabla1columna4'></th>";
                               echo"<th style = 'width:150px' id='tabla1columna5'></th>";
                               echo"</tr>";
                           echo"</thead>";
                           echo"<tbody>";
                           while ($row = $resultadotablaconsulta->fetch_assoc())
                           {
                           
                              $idSignosVitales = $row['IdConsulta'];
                              echo"<tr>";
                              echo"<td>".$row['FechaConsulta']."</td>";
                              echo"<td>".$row['Paciente']."</td>";
                              echo"<td>".$row['Medico']."</td>";
                              echo"<td>".$row['Especialidad']."</td>";
                              if($row['Estado'] == 1){
                                 if($_SESSION['IdIdioma'] == 1){
                                    echo "<td>".
                                           "<span id='btn".$idSignosVitales."' style='width:140px' class='btn  btn-success btn-mdl'> + Signo Vital</span>".
                                           "</td>";
                                    }
                                 else{
                                    echo "<td>".
                                           "<span id='btn".$idSignosVitales."' style='width:140px' class='btn  btn-success btn-mdl'> + Vital Signs</span>".
                                           "</td>";
                                 }
                              }
                              else{
                                  if($_SESSION['IdIdioma'] == 1){
                                    echo "<td>".
                                     "<span id='btn". $idSignosVitales."' style='width:140px' class='btn btn-warning btn-mdls'>Ver Signo Vital</span>".
                                     "</td>";
                                  }
                                  else{
                                    echo "<td>".
                                     "<span id='btn". $idSignosVitales."' style='width:140px' class='btn btn-warning btn-mdls'>See Vital Signs</span>".
                                     "</td>";
                                  }

                              }
                           
                              echo"</tr>";
                              echo"</body>  ";
                           }
                           ?>
                     </table>
          </div>
      </div>
    </div>
</div>


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


   <?php if ($_SESSION['IdIdioma'] == 1){ ?>
       $("#btnconsulta").text('Nueva consulta');
       $("#encabezadomodal1").text('Nueva Consulta');
       $("#encabezadomodal2").text('Ingrese los datos requeridos.');
       $("#FechaModal1").text('Fecha');
       $("#MedicoModal1").text('Medico');
       $("#PacienteModal1").text('Paciente');
       $("#ModuloModal1").text('Modulo');
       $("#btncerrarmodal1").text('Cerrar');
       $("#btnguardarmodal1").text('Guardar Cambios');
       $("#tablaconsultas").text('Historial de Consultas');
       $("#tabla1columna1").text('Fecha de Consulta');
       $("#tabla1columna2").text('Nombre de Paciente');
       $("#tabla1columna3").text('Nombre de Medico');
       $("#tabla1columna4").text('Nombre de Especialidad');
       $("#tabla1columna5").text('Accion');


       $("#mdlsignosvitalesencabezado1").text('SIGNOS VITALES');
       $("#mdlsignosvitalesencabezado2").text('INGRESE LOS DATOS REQUERIDOS');
       $("#tab1signosvitales1").text('FICHA DE CONSULTA');
       $("#tab1signosvitales2").text('DATOS GENERALES');
       $("#tab1signosvitales3").text('USO GINECOLOGICO');
       $("#tab1signosvitales4").text('USO PEDIATRICO');
       $("#tab1signosvitales5").text('OTROS');
       $("#tab1tab1paciente").text('Paciente');
       $("#tab1tab1medico").text('Medico');
       $("#tab1tab1especialidad").text('Especialidad');
       $("#tab1tab1fecha").text('Fecha');
       $("#tab1tab2peso").text('Peso');
       $("#tab1tab2altura").text('Altura');
       $("#tab1tab2temperatura").text('Temperatura');
       $("#tab1tab2fr").text('F/R');
       $("#tab1tab2pulso").text('Pulso');
       $("#tab1tab2presion").text('Presion');
       $("#tab1tab2glucotex").text('Glucotex');
       $("#tab1tab3menstruacion").text('Ult. Menstruacion');
       $("#tab1tab3pap").text('Ult. PAP');
       $("#tab1tab5observaciones").text('Observaciones');
       $("#tab1tab5motivo").text('Motivo de Visita');
       $("#btnmodalsignoscerrar").text('Cerrar');
       $("#btnmodalsignosguardar").text('Guardar Cambios');

       $("#mdlsignosvitalesencabezado12").text('SIGNOS VITALES');
       $("#mdlsignosvitalesencabezado22").text('FICHA DE CONSULTA');
       $("#tab1signosvitales12").text('FICHA DE CONSULTA');
       $("#tab1signosvitales22").text('DATOS GENERALES');
       $("#tab1signosvitales32").text('USO GINECOLOGICO');
       $("#tab1signosvitales42").text('USO PEDIATRICO');
       $("#tab1signosvitales52").text('OTROS');
       $("#tab1tab1paciente2").text('Paciente');
       $("#tab1tab1medico2").text('Medico');
       $("#tab1tab1especialidad2").text('Especialidad');
       $("#tab1tab1fecha2").text('Fecha');
       $("#tab1tab2peso2").text('Peso');
       $("#tab1tab2altura2").text('Altura');
       $("#tab1tab2temperatura2").text('Temperatura');
       $("#tab1tab2fr2").text('F/R');
       $("#tab1tab2pulso2").text('Pulso');
       $("#tab1tab2presion2").text('Presion');
       $("#tab1tab2glucotex2").text('Glucotex');
       $("#tab1tab3menstruacion2").text('Ult. Menstruacion');
       $("#tab1tab3pap2").text('Ult. PAP');
       $("#tab1tab5observaciones2").text('Observaciones');
       $("#tab1tab5motivo2").text('Motivo de Visita');
       $("#btnmodalsignoscerrar2").text('Cerrar');
       $("#btnmodalsignosguardar2").text('Guardar Cambios');
<?php }else
  { ?>
       $("#btnconsulta").text('Doctor Appointment');
       $("#encabezadomodal1").text('New Doctor Appointment');
       $("#encabezadomodal2").text('ENTER THE REQUIRED DATA');
       $("#FechaModal1").text('Date');
       $("#MedicoModal1").text('Doctor');
       $("#PacienteModal1").text('Patient Name');
       $("#ModuloModal1").text('Speciality Name');
       $("#btncerrarmodal1").text('Close');
       $("#btnguardarmodal1").text('Save Changes');
       $("#tablaconsultas").text('History of Medical Consultations');
       $("#tabla1columna1").text('Date');
       $("#tabla1columna2").text('Patient Name');
       $("#tabla1columna3").text('Doctor Name');
       $("#tabla1columna4").text('Speciality Name');
       $("#tabla1columna5").text('Action');

       
       $("#mdlsignosvitalesencabezado1").text('VITAL SINGS');
       $("#mdlsignosvitalesencabezado2").text('ENTER THE REQUIRED DATA');
       $("#tab1signosvitales1").text('MEDICAL CONSULTION');
       $("#tab1signosvitales2").text('GENERAL DATA');
       $("#tab1signosvitales3").text('GYNECOLOGICAL USE');
       $("#tab1signosvitales4").text('PEDIATRIC USE');
       $("#tab1signosvitales5").text('OTHERS');
       $("#tab1tab1paciente").text('Patient Name');
       $("#tab1tab1medico").text('Doctor');
       $("#tab1tab1especialidad").text('Speciality Name');
       $("#tab1tab1fecha").text('Date');
       $("#tab1tab2peso").text('Weight');
       $("#tab1tab2altura").text('Height');
       $("#tab1tab2temperatura").text('Temperature');
       $("#tab1tab2fr").text('F/R');
       $("#tab1tab2pulso").text('Pulse');
       $("#tab1tab2presion").text('Pressure');
       $("#tab1tab2glucotex").text('Glucotex');
       $("#tab1tab3menstruacion").text('Last Menstrua.');
       $("#tab1tab3pap").text('Last PAP');
       $("#tab1tab5observaciones").text('Observations');
       $("#tab1tab5motivo").text('Reason for Visit');
       $("#btnmodalsignoscerrar").text('Close');
       $("#btnmodalsignosguardar").text('Save Changes');

       $("#mdlsignosvitalesencabezado12").text('VITAL SINGS');
       $("#mdlsignosvitalesencabezado22").text('MEDICAL FORM');
       $("#tab1signosvitales12").text('MEDICAL CONSULTION');
       $("#tab1signosvitales22").text('GENERAL DATA');
       $("#tab1signosvitales32").text('GYNECOLOGICAL USE');
       $("#tab1signosvitales42").text('PEDIATRIC USE');
       $("#tab1signosvitales52").text('OTHERS');
       $("#tab1tab1paciente2").text('Patient Name');
       $("#tab1tab1medico2").text('Doctor');
       $("#tab1tab1especialidad2").text('Speciality Name');
       $("#tab1tab1fecha2").text('Date');
       $("#tab1tab2peso2").text('Weight');
       $("#tab1tab2altura2").text('Height');
       $("#tab1tab2temperatura2").text('Temperature');
       $("#tab1tab2fr2").text('F/R');
       $("#tab1tab2pulso2").text('Pulse');
       $("#tab1tab2presion2").text('Pressure');
       $("#tab1tab2glucotex2").text('Glucotex');
       $("#tab1tab3menstruacion2").text('Last Menstrua.');
       $("#tab1tab3pap2").text('Last PAP');
       $("#tab1tab5observaciones2").text('Observations');
       $("#tab1tab5motivo2").text('Reason for Visit');
       $("#btnmodalsignoscerrar2").text('Close');
       $("#btnmodalsignosguardar2").text('Save Changes');
  <?php } ?>
 });
</script>



             <!-- MODAL PARA INGRESAR UNA NUEVA CONSULTA -->
                 <div class="modal inmodal" id="modalConsulta" tabindex="-1" role="dialog"  aria-hidden="true">
                   <div class="modal-dialog">
                      <div class="modal-content animated fadeIn">
                         <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-medkit modal-icon"></i>
                            <h4 class="modal-title" id='encabezadomodal1'></h4>
                            <small id='encabezadomodal2'></small>
                         </div>
                         <div class="modal-body">
                            <form class="form-horizontal" action="../../views/enfermeriaconsulta/guardarconsulta.php" role="form" method="POST">
                               <div class="form-group">
                                  <div class="col-sm-1"></div>
                                  <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='FechaModal1'></label></div>
                                  <div class="col-sm-7"><input  value="<?php echo $date ?>" class="form-control" name="txtFecha" disabled="disabled"></div>
                                  <div class="col-sm-1"></div>
                               </div>
                               <div class="form-group">
                                  <div class="col-sm-1"></div>
                                  <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='MedicoModal1'></label></div>
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
                                  <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='PacienteModal1'></label></div>
                                  <div class="col-sm-7"><input type="text" value="<?php echo $nombres. " " .$apellidos ?>" class="form-control"  disabled="disabled" >
                                     <input type="hidden" name="txtPaciente" value="<?php echo $idpersona ?>">  
                                  </div>
                                  <div class="col-sm-1"></div>
                               </div>
                               <div class="form-group">
                                  <div class="col-sm-1"></div>
                                  <div class="col-sm-3"><label for="inputEmail3" class="control-label" id='ModuloModal1'></label></div>
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
                                  <button type="button" class="btn btn-danger" data-dismiss="modal" id='btncerrarmodal1'></button>
                                  <button type="submit" class="btn btn-primary" name="guardarConsulta" id='btnguardarmodal1'></button>
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
               <!-- MODAL PARA INGRESAR LOS SIGNOS VITALES CON LA SEGUN LA CONSULTA -->
               <div class="modal inmodal" id="modalSignosVitales" tabindex="-1" role="dialog"  aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                           <i class="fa fa-stethoscope modal-icon"></i>
                           <h4 class="modal-title" id='mdlsignosvitalesencabezado1'>SIGNOS VITALES</h4>
                           <small id='mdlsignosvitalesencabezado2'>INGRESE LOS DATOS REQUERIDOS</small>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" action="../../views/enfermeriaconsulta/guardarindicador.php"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
                           <div class="tabs-container">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a data-toggle="tab" href="#tab-1" id='tab1signosvitales1'></a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-2" id='tab1signosvitales2'></a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-3" id='tab1signosvitales3'></a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-4" id='tab1signosvitales4'></a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-5" id='tab1signosvitales5'></a></li>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1paciente'>Paciente</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" id="paciente" name="txtPaciente" disabled="disabled">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1medico'>Medico</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                   <input type="text" class="form-control" id="medico" name="txtMedico" disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1especialidad'>Especialidad</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                                   <input type="text" class="form-control" id="modulo" name="txtMedico" disabled="disabled">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1fecha'>Fecha</label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2peso'></label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2altura'></label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2temperatura'></label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2fr'></label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                                   <input type="text" class="form-control"  name="txtFR" id="FR" required="">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2pulso'></label></div>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                                   <input type="text" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtPulso" id="pulso" required="">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <label for="inputEmail3" class="control-label">lat/min</label>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2presion'></label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2glucotex'></label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3menstruacion'>Ult. Menstrua</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                                   <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUmestruacion" id="ultimamestruacion">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3pap'>Ult.PAP</label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab5observaciones'>Observaciones</label></div>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                   <textarea type="text" rows="4" class="form-control" name="txtObservaciones" data-parsley-maxlength="100" id="observaciones" data-parsley-maxlength="100"> </textarea>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab5motivo'>Motivo de Visita</label></div>
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
                           <button type="button" class="btn btn-danger" data-dismiss="modal" id='btnmodalsignoscerrar'></button>
                           <button type="submit" class="btn btn-primary" name="guardarIndicador" id='btnmodalsignosguardar'></button>
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
                           <h4 class="modal-title" id='mdlsignosvitalesencabezado12'></h4>
                           <small id='mdlsignosvitalesencabezado22'></small>
                        </div>
                        <div class="modal-body">
                           <div class="tabs-container">
                              <ul class="nav nav-tabs">
                                 <li class="active"><a data-toggle="tab" href="#tab-6" id='tab1signosvitales12'></a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-7" id='tab1signosvitales22'></a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-8" id='tab1signosvitales32'></a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-9" id='tab1signosvitales42'></a></li>
                                 <li class=""><a data-toggle="tab" href="#tab-10" id='tab1signosvitales52'></a></li>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1paciente2'></label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" id="pacientes" name="txtPaciente" disabled="disabled">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1medico2'></label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-medkit"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" id="medicos" name="txtMedico" disabled="disabled">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1especialidad2'></label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-plus-square-o"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" id="modulos" name="txtMedico" disabled="disabled">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab1fecha2'></label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2peso2'></label></div>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-slideshare"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "999.9"' data-mask name="txtPeso" id="pesos" required="">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                             <input type="text" class="form-control" disabled="disabled" id="unidadpesos" required="">
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2altura2'></label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2temperatura2'></label></div>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-thermometer-quarter"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "99.9"' data-mask name="txtTemperatura" id="temperaturas" required="">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                             <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "99.9"' data-mask  id="unidadtemperaturas" required="">
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2fr2'></label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled"  name="txtFR" id="frs" required="">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2pulso2'></label></div>
                                             <div class="col-sm-2">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" data-inputmask='"mask": "999"' data-mask name="txtPulso" id="pulsos" required="">
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <label for="inputEmail3" class="control-label">lat/min</label>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2presion2'></label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab2glucotex2'></label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3menstruacion2'></label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUmestruacion" id="ultimamestruacions">
                                                </div>
                                             </div>
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab3pap2'></label></div>
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
                                             <div class="col-sm-1"><label for="inputEmail3" class="control-label" id=''>P/C</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-toggle-down"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled" name="txtpc" id="pcs">
                                                </div>
                                             </div>
                                             <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                             <div class="col-sm-1"><label for="inputEmail3" class="control-label" id=''>P/T</label></div>
                                             <div class="col-sm-4">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-toggle-up"></i></div>
                                                   <input type="text" class="form-control" disabled="disabled"  name="txtpt" id="pts">
                                                </div>
                                             </div>
                                             <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-1"><label for="inputEmail3" class="control-label" id=''>P/A</label></div>
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
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab5observaciones2'></label></div>
                                             <div class="col-sm-10">
                                                <div class="input-group">
                                                   <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                   <textarea type="text" rows="4" class="form-control" name="txtObservaciones" disabled="disabled" data-parsley-maxlength="100" id="observacioness" data-parsley-maxlength="100"> </textarea>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="col-sm-2"><label for="inputEmail3" class="control-label" id='tab1tab5motivo2'></label></div>
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
                           <button type="button" class="btn btn-danger" data-dismiss="modal" id='btnmodalsignoscerrar2'>Cerrar</button>
                        </div>
                     </div>
                  </div>
               </div>