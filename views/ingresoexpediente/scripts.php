
    <!-- Custom and plugin javascript -->
    <script src="../template/js/inspinia.js"></script>
    <script src="../template/js/plugins/pace/pace.min.js"></script>
    <script src="../template/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="../template/js/plugins/chosen/chosen.jquery.js"></script>

   <!-- JSKnob -->
   <script src="../template/js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="../template/js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="../template/js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="../template/js/plugins/nouslider/jquery.nouislider.min.js"></script>

   <!-- Switchery -->
   <script src="../template/js/plugins/switchery/switchery.js"></script>


    <!-- iCheck -->
    <script src="../template/js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="../template/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="../template/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="../template/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="../template/js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="../template/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="../template/js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="../template/js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="../template/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Tags Input -->
    <script src="../template/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Dual Listbox -->
    <script src="../template/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

    <script src="../template/barcode/jquery-barcode.min.js"></script>


    <?php include '../views/ingresoexpediente/modal.php'; ?>


<script type="text/javascript">
  $(function() {   
   $("#barcode").barcode(
    "<?php echo $bc ?>", // Valor del codigo de barras
  "code128" // tipo (cadena)
  );
  });
</script>

<script type="text/javascript">

   Dropzone.options.dropzoneForm = {
       paramName: "file", // The name that will be used to transfer the file
       maxFilesize: 2, // MB
       dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
   };
   
   
   $(document).ready(function () {
   
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
   
   $(".btn-mdl").click(function () {
      var id = $(this).attr("id").replace("btn", "");
      var myData = {"id": id};
      //alert(myData);
      $.ajax({
          url: "../../views/consultamedico/cargarconsultasignosvitales.php",
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
              $("#diagnosticoss").val(data.Diagnostico);
              $("#enfermedads").val(data.Enfermedad);
              $("#comentariosss").val(data.Comentarios);
              $("#otrosss").val(data.Otros);
              $("#pesos").val(data.Peso);
              if (data.UnidadPeso == 1) {
                  $("#unidadpesos").val("Kg");
              } else {
                  $("#unidadpesos").val("Lbs");
              }
              $("#alturas").val(data.Altura);
              if (data.UnidadAltura == 1) {
                  $("#unidadalturas").val("Mts");
              } else {
                  $("#unidadalturas").val("Cms");
              }
              $("#temperaturas").val(data.Temperatura);
              if (data.UnidadTemperatura == 1) {
                  $("#unidadtemperaturas").val("C");
              } else {
                  $("#unidadtemperaturas").val("F");
              }
              $("#pulsos").val(data.Pulso);
              $("#maxs").val(data.Max);
              $("#mins").val(data.Min);
              $("#observacioness").val(data.Observaciones);
   
              $("#frs").val(data.FR);
              $("#glucotexs").val(data.Glucotex);
              $("#ultimamenstruacions").val(data.PeriodoMeunstral);
              $("#ultimapaps").val(data.PAP);
              $("#pcs").val(data.PC);
              $("#pts").val(data.PT);
              $("#pas").val(data.PA);
              $("#motivos").val(data.Motivo);
              $("#estadonutricions").val(data.EstadoNutricional);
              $("#alergiass").val(data.Alergias);
              $("#cirugiaspreviass").val(data.CirugiasPrevias);
              $("#medicamentotomados").val(data.MedicamentosActuales);
              $("#plantratamientoss").val(data.PlanTratamiento);
              $("#fechaproximass").val(data.FechaProxVisita);
              $("#examenfisicas").val(data.ExamenFisica);
   
              $("#modalCargarConsulta").modal("show");
          }
      });
   });
   
   $(".btn-mdlimaconsult").click(function () {
      var id = $(this).attr("id").replace("btn", "");
      var myData = {"id": id};
      //alert(myData);
   
   
   $(".btn-proce").click(function () {
      var id = $(this).attr("id").replace("btn", "");
   
      var myData = {"id": id};
      //alert(myData);
      $.ajax({
          url: "../../views/consultamedico/cargarprocedimientoterminado.php",
          type: "POST",
          data: myData,
          dataType: "JSON",
          beforeSend: function () {
              $(this).html("Cargando");
          },
          success: function (data) {
              $("#procepacientes").val(data.Paciente);
              $("#procemedicos").val(data.Medico);
              $("#procemodulos").val(data.Especialidad);
              $("#procefechas").val(data.FechaConsulta);
              $("#procemotivos").val(data.Motivo);
              $("#proceobservacioness").val(data.Observaciones);
              $("#modalCargarProcedimientos").modal("show");
          }
      });
   });
   
   $(".btn-mdlre").click(function () {
      var id = $(this).attr("id").replace("btn", "");
      var myData = {"id": id};
      //alert(myData);
      $.ajax({
          url: "../../views/consultamedico/cargarreceta.php",
          type: "POST",
          data: myData,
          dataType: "JSON",
          beforeSend: function () {
              $(this).html("Cargando");
          },
          success: function (data) {
              $("#idreceta").val(data.IdReceta);
   
              $("#modalAsignarMedicamentos").modal("show");
          }
      });
   });
   
   
   $(".btn-mdlrex").click(function () {
      var id = $(this).attr("id").replace("btn", "");
      var myData = {"id": id};
      //alert(myData);
      $.ajax({
          url: "../../views/consultamedico/cargarexamenesterminados.php",
          type: "POST",
          data: myData,
          dataType: "JSON",
          beforeSend: function () {
              $(this).html("Cargando");
          },
          success: function (data) {
   
              if (data.IdTipoExamen == 1) {
                  //alert('Este es un Examen Hemograma');
                  $("#ExamenHemogramaPaciente").val(data.Paciente);
                  $("#ExamenHemogramaMedico").val(data.Medico);
                  $("#ExamenHemogramaNombreExamen").val(data.NombreExamen);
                  $("#ExamenHemogramaFecha").val(data.ExamenHemogramaFecha);
                  $("#ExamenHemogramaFechas").text(data.ExamenHemogramaFecha);
                  $("#ExamenHemogramaGlobulosRojos").val(data.ExamenHemogramaGlobulosRojos);
                  $("#ExamenHemogramaHemoglobina").val(data.ExamenHemogramaHemoglobina);
                  $("#ExamenHemogramaHematocrito").val(data.ExamenHemogramaHematocrito);
                  $("#ExamenHemogramaVgm").val(data.ExamenHemogramaVgm);
                  $("#ExamenHemogramaHcm").val(data.ExamenHemogramaHcm);
                  $("#ExamenHemogramaChcm").val(data.ExamenHemogramaChcm);
                  $("#ExamenHemogramaLeucocitos").val(data.ExamenHemogramaLeucocitos);
                  $("#ExamenHemogramaNeutrofilos").val(data.ExamenHemogramaNeutrofilos);
                  $("#ExamenHemogramaLinfocitos").val(data.ExamenHemogramaLinfocitos);
                  $("#ExamenHemogramaMonocitos").val(data.ExamenHemogramaMonocitos);
                  $("#ExamenHemogramaEosinofilos").val(data.ExamenHemogramaEosinofilos);
                  $("#ExamenHemogramaBasofilos").val(data.ExamenHemogramaBasofilos);
                  $("#ExamenHemogramaPlaquetas").val(data.ExamenHemogramaPlaquetas);
                  $("#ExamenHemogramaEritrosedimentacion").val(data.ExamenHemogramaEritrosedimentacion);
                  $("#ExamenHemogramaOtros").val(data.ExamenHemogramaOtros);
                  $("#ExamenHemogramaNeutrofilosSegmentados").val(data.ExamenHemogramaNeutrofilosSegmentados);
                  $("#modalCargarExamenHemograma").modal("show");
              } else if (data.IdTipoExamen == 2) {
                  //alert('Este es un Examen Heces');
                  $("#ExamenHecesPaciente").val(data.Paciente);
                  $("#ExamenHecesMedico").val(data.Medico);
                  $("#ExamenHecesNombreExamen").val(data.NombreExamen);
                  $("#ExamenHecesFecha").val(data.ExamenHecesFecha);
                  $("#ExamenHecesFechas").text(data.ExamenHecesFecha);
                  $("#ExamenHecesColor").val(data.ExamenHecesColor);
                  $("#ExamenHecesConsistencia").val(data.ExamenHecesConsistencia);
                  $("#ExamenHecesMucus").val(data.ExamenHecesMucus);
                  $("#ExamenHecesHematies").val(data.ExamenHecesHematies);
                  $("#ExamenHecesLeucocitos").val(data.ExamenHecesLeucocitos);
                  $("#ExamenHecesRestosAlimenticios").val(data.ExamenHecesRestosAlimenticios);
                  $("#ExamenHecesMacrocopios").val(data.ExamenHecesMacrocopios);
                  $("#ExamenHecesMicroscopicos").val(data.ExamenHecesMicroscopicos);
                  $("#ExamenHecesFlora").val(data.ExamenHecesFlora);
                  $("#ExamenHecesOtros").val(data.ExamenHecesOtros);
                  $("#ExamenHecesPActivos").val(data.ExamenHecesPActivos);
                  $("#ExamenHecesPQuistes").val(data.ExamenHecesPQuistes);
                  $("#modalCargarExamenHeces").modal("show");
              } else if (data.IdTipoExamen == 5) {
                  $("#ExamenesVariosPaciente").val(data.Paciente);
                  $("#ExamenesVariosMedico").val(data.Medico);
                  $("#ExamenesVariosNombreExamen").val(data.NombreExamen);
                  $("#ExamenesVariosFecha").val(data.ExamenesVariosFecha);
                  $("#ExamenesVariosResultado").val(data.ExamenesVariosResultado);
                  $("#modalCargarExamenVarios").modal("show");
              } else if (data.IdTipoExamen == 3) {
                  $("#ExamenOrinaPaciente").val(data.Paciente);
                  $("#ExamenOrinaMedico").val(data.Medico);
                  $("#ExamenOrinaNombreExamen").val(data.NombreExamen);
                  $("#ExamenOrinaFecha").val(data.ExamenOrinaFecha);
                  $("#ExamenOrinaFechas").text(data.ExamenOrinaFecha);
                  $("#ExamenOrinaColor").val(data.ExamenOrinaColor);
                  $("#ExamenOrinaOlor").val(data.ExamenOrinaOlor);
                  $("#ExamenOrinaAspecto").val(data.ExamenOrinaAspecto);
                  $("#ExamenOrinaDendisdad").val(data.ExamenOrinaDendisdad);
                  $("#ExamenOrinaPh").val(data.ExamenOrinaPh);
                  $("#ExamenOrinaProteinas").val(data.ExamenOrinaProteinas);
                  $("#ExamenOrinaGlucosa").val(data.ExamenOrinaGlucosa);
                  $("#ExamenOrinaSangreOculta").val(data.ExamenOrinaSangreOculta);
                  $("#ExamenOrinaCuerposCetomicos").val(data.ExamenOrinaCuerposCetomicos);
                  $("#ExamenOrinaUrobilinogeno").val(data.ExamenOrinaUrobilinogeno);
                  $("#ExamenOrinaBilirrubina").val(data.ExamenOrinaBilirrubina);
                  $("#ExamenOrinaEsterasaLeucocitaria").val(data.ExamenOrinaEsterasaLeucocitaria);
                  $("#ExamenOrinaCilindros").val(data.ExamenOrinaCilindros);
                  $("#ExamenOrinaHematies").val(data.ExamenOrinaHematies);
                  $("#ExamenOrinaLeucocitos").val(data.ExamenOrinaLeucocitos);
                  $("#ExamenOrinaCelulasEpiteliales").val(data.ExamenOrinaCelulasEpiteliales);
                  $("#ExamenOrinaElementosMinerales").val(data.ExamenOrinaElementosMinerales);
                  $("#ExamenOrinaParasitos").val(data.ExamenOrinaParasitos);
                  $("#ExamenOrinaObservaciones").val(data.ExamenOrinaObservaciones);
                  $("#modalCargarExamenOrina").modal("show");
              } else if (data.IdTipoExamen == 4) {
                  $("#ExamenQuimicaPaciente").val(data.Paciente);
                  $("#ExamenQuimicaMedico").val(data.Medico);
                  $("#ExamenQuimicaNombreExamen").val(data.NombreExamen);
                  $("#ExamenQuimicaFecha").val(data.ExamenQuimicaFecha);
                  $("#ExamenQuimicaGlucosa").val(data.ExamenQuimicaGlucosa);
                  $("#ExamenQuimicaGlucosaPost").val(data.ExamenQuimicaGlucosaPost);
                  $("#ExamenQuimicaColesterolTotal").val(data.ExamenQuimicaColesterolTotal);
                  $("#ExamenQuimicaTriglicerido").val(data.ExamenQuimicaTriglicerido);
                  $("#ExamenQuimicaAcidoUrico").val(data.ExamenQuimicaAcidoUrico);
                  $("#ExamenQuimicaCreatinina").val(data.ExamenQuimicaCreatinina);
                  $("#ExamenQuimicaNitrogenoUreico").val(data.ExamenQuimicaNitrogenoUreico);
                  $("#ExamenQuimicaUrea").val(data.ExamenQuimicaUrea);
                  $("#modalCargarExamenQuimica").modal("show");
              } else {
                  alert('Este modal no esta diseñado aun :) ');
              }
   
          }
      });
   });
   
   $('#demo-form').parsley().on('field:validated', function () {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
   
   })
          .on('form:submit', function () {
              return true;
          });
   
   
   <?php if ($_SESSION['IdIdioma'] == 1){ ?>
   
   $.post( "../../views/consultamedico/historicoesp.php", { IdFactor: "2", IdPersona: "<?php echo $idpersonaid; ?>" })
    .done(function( data ) {
      $("#historialclinico").html(data);
   
   });
   $.post( "../../views/consultamedico/historicoesp.php", { IdFactor: "3", IdPersona: "<?php echo $idpersonaid; ?>" })
    .done(function( data ) {
      $("#vacunacion").html(data);
   
   });
   
   // ENCABEZADO, PRIMER TAB Y BOTON DE FINALIZAR CONSULTA
   $("#encabezadoform1").text('INGRESO DE CONSULTA');
   $("#encabezadoform2").text('INGRESE LOS DATOS REQUERIDOS');
   $("#tabgeneral1").text('CONSULTA');
   $("#tabgeneral2").text('EXPEDIENTE');
   $("#tabgeneral3").text('HISTORIAL');
   $("#btnfinalizarconsulta").text('FINALIZAR CONSULTA');
   
   // TAB DE INGRESO DE CONSULTA - FICHA DE CONSULTA
   
   $("#tab1signosvitales1").text('FICHA DE CONSULTA');
   $("#tab1signosvitales2").text('DATOS GENERALES');
   $("#tab1signosvitales3").text('USO GINECOLOGICO');
   $("#tab1signosvitales4").text('USO PEDIATRICO');
   $("#tab1signosvitales5").text('OTROS');
   $("#tab1signosvitales6").text('DATOS MEDICOS');
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
   $("#tab1tab3ofc").text('P/C');
   $("#tab1tab3hl").text('P/T');
   $("#tab1tab3w").text('P/A');
   $("#tab1tab5observaciones").text('Observaciones');
   $("#tab1tab5motivo").text('Motivo de Visita');
   $("#btnmodalsignoscerrar").text('Cerrar');
   
   $("#tab1consultamedica1").text('Enfermedades');
   $("#tab1consultamedica2").text('Estado Nutricional');
   $("#tab1consultamedica3").text('Alergias');
   $("#tab1consultamedica4").text('Cirugias Previas');
   $("#tab1consultamedica5").text('Medicamentos tomados Actualmente');
   $("#tab1consultamedica6").text('Examen Fisica');
   $("#tab1consultamedica7").text('Diagnostico');
   $("#tab1consultamedica8").text('Comentarios');
   $("#tab1consultamedica9").text('Otros');
   $("#tab1consultamedica10").text('Plan de Tratamiento');
   $("#tab1consultamedica11").text('Fecha de Proxima Visita');
   
   
   
   $("#tblexamenasignado").text('EXAMENES DE LABORATORIO ASIGNADOS');
   $("#tblexamenasignadoexamen").text('Tipo de Examen o Imagen');
   $("#tblexamenasignadomedico").text('Doctor');
   $("#tblexamenasignadoindicacion").text('Instricciones');
   $("#tblexamenasignadoaccion").text('Accion');
   
   
   // TAB EXPEDIENTE DATO GENERAL
   $("#tabexpediente19").text('DATO GENERAL');
   $("#tabexpediente20").text('RESPONSABLE');
   $("#tabexpediente21").text('DATO MEDICO');
   $("#tabexpediente22").text('HISTORIAL CLINICO');
   $("#tabexpediente23").text('VACUNACION');
   $("#tabexpediente1").text('Nombres');
   $("#tabexpediente2").text('Apellidos');
   $("#tabexpediente3").text('F. Nacimiento');
   $("#tabexpediente4").text('Genero');
   $("#tabexpediente5").text('Estado Civil');
   $("#tabexpediente6").text('Dui');
   $("#tabexpediente7").text('Direccion');
   $("#tabexpediente8").text('Telefono');
   $("#tabexpediente9").text('Celular');
   $("#tabexpediente10").text('Correo');
   
   
   // TAB EXPEDIENTE RESPONSABLE
   $("#tabexpediente11").text('Nombres');
   $("#tabexpediente12").text('Apellidos');
   $("#tabexpediente13").text('Parentesco');
   $("#tabexpediente14").text('Dui Responsable');
   $("#tabexpediente15").text('Telefono');
   
   
    // TAB EXPEDIENTE DATO MEDICO
   $("#tabexpediente16").text('Enfermedades');
   $("#tabexpediente17").text('Alergias');
   $("#tabexpediente18").text('Medicamntos');
   
   // TAB HISTORIAL CONSULTAS
   $("#tab2historial1").text('CONSULTAS');
   $("#tab2historial2").text('EXAMENES');
   $("#tab2historial3").text('PROCEDIMIENTOS');
   
   // TABLA HISTORIAL CONSULTAS
   $("#tab2historialconsultabla6").text('CONSULTAS PREVIAS');
   $("#tab2historialconsultabla1").text('Fecha');
   $("#tab2historialconsultabla2").text("Nombre de Paciente");
   $("#tab2historialconsultabla3").text('Nombre de Medico');
   $("#tab2historialconsultabla4").text('Especialidad');
   $("#tab2historialconsultabla5").text('Accion');
   
   // TABLA HISTORIAL EXAMENES
   $("#tab2historialexamabla1").text('EXAMENES PREVIOS');
   $("#tab2historialexamabla2").text('Fecha');
   $("#tab2historialexamabla3").text("Nombre de Paciente");
   $("#tab2historialexamabla4").text('Nombre de Medico');
   $("#tab2historialexamabla5").text('Examen');
   $("#tab2historialexamabla6").text('Accion');
   
   
   // TABLA HISTORIAL PROCEDIMIENTOS
   $("#tab2historialexamabla1").text('PREVIOUS PROCEDURE');
   $("#tab2historialexamabla2").text('Date');
   $("#tab2historialexamabla3").text("Patient's name");
   $("#tab2historialexamabla4").text('Treated by');
   $("#tab2historialexamabla5").text('Exams');
   $("#tab2historialexamabla6").text('Action');
   
   
   
   // MODAL HISTORICO DE CONSULTA
   $("#modaltabconsultamedicatitulo1").text('FICHA GENERAL DE CONSULTA');
   $("#modaltabconsultamedicatitulo2").text('FICHA DE CONSULTA');
   $("#modaltabconsultamedica1").text('FICHA DE CONSULTA');
   $("#modaltabconsultamedica2").text('DATOS GENERALES');
   $("#modaltabconsultamedica3").text('USO GINECOLOGICO');
   $("#modaltabconsultamedica4").text('USO PEDIATRICO');
   $("#modaltabconsultamedica5").text('OTROS');
   $("#modaltabconsultamedica6").text('DATOS MEDICOS');
   $("#modaltabconsultamedica7").text('Paciente');
   $("#modaltabconsultamedica8").text('Medico');
   $("#modaltabconsultamedica9").text('Especialidad');
   $("#modaltabconsultamedica10").text('Fecha');
   $("#modaltabconsultamedica11").text('Peso');
   $("#modaltabconsultamedica12").text('Altura');
   $("#modaltabconsultamedica13").text('Temperatura');
   $("#modaltabconsultamedica14").text('F/R');
   $("#modaltabconsultamedica15").text('Pulso');
   $("#modaltabconsultamedica16").text('Presion');
   $("#modaltabconsultamedica17").text('Glucotex');
   $("#modaltabconsultamedica18").text('Ult. Menstruacion');
   $("#modaltabconsultamedica19").text('Ult. PAP');
   $("#modaltabconsultamedica20").text('P/C');
   $("#modaltabconsultamedica21").text('P/T');
   $("#modaltabconsultamedica22").text('P/A');
   $("#modaltabconsultamedica23").text('Observaciones');
   $("#modaltabconsultamedica24").text('Motivo de Visita');
   $("#modaltabconsultamedica25").text('Enfermedades');
   $("#modaltabconsultamedica26").text('Estado Nutricional');
   $("#modaltabconsultamedica27").text('Alergias');
   $("#modaltabconsultamedica28").text('Cirugias Previas');
   $("#modaltabconsultamedica29").text('Medicamentos tomados Actualmente');
   $("#modaltabconsultamedica30").text('Examen Fisica');
   $("#modaltabconsultamedica31").text('Diagnostico');
   $("#modaltabconsultamedica32").text('Comentarios');
   $("#modaltabconsultamedica33").text('Otros');
   $("#modaltabconsultamedica34").text('Plan de Tratamiento');
   $("#modaltabconsultamedica35").text('Fecha de Proxima Visita');
   
   
   
   // MODAL PARA AGREGAR LA CONSULTA MEDICA DEL DIA
   $("#modaltabnuevaconsultamedica1").text('DATOS MEDICOS');
   $("#modaltabnuevaconsultamedica2").text('Enfermedades');
   $("#modaltabnuevaconsultamedica3").text('Estado Nutricional');
   $("#modaltabnuevaconsultamedica4").text('Alergias');
   $("#modaltabnuevaconsultamedica5").text('Cirugias Previas');
   $("#modaltabnuevaconsultamedica6").text('Medicamentos tomados Actualmente');
   $("#modaltabnuevaconsultamedica7").text('Examen Fisica');
   $("#modaltabnuevaconsultamedica8").text('Diagnostico');
   $("#modaltabnuevaconsultamedica9").text('Comentarios');
   $("#modaltabnuevaconsultamedica10").text('Otros');
   $("#modaltabnuevaconsultamedica11").text('Plan de Tratamiento');
   $("#modaltabnuevaconsultamedica12").text('Fecha de Proxima Visita');
   $("#modaltabnuevaconsultamedica13").text("FICHA GENERAL DE CONSULTA");
   $("#modaltabnuevaconsultamedica14").text('FICHA DE CONSULTA:');
   $("#modaltabnuevaconsultamedica15").text("Cerrar");
   $("#modaltabnuevaconsultamedica16").text('Guardar Cambios');
   
   
   
   // MODAL PARA AGREGAR LA EXAMENES A LA CONSULTA MEDICA DEL DIA
   $("#modaltabnuevoexameneslab1").text('ASIGNACION DE EXAMENES DE LABORATORIO');
   $("#modaltabnuevoexameneslab2").text('ASIGNACION DE EXAMENES:');
   $("#modaltabnuevoexameneslab3").text("Examenes");
   $("#modaltabnuevoexameneslab4").text('Indicaciones');
   $("#modaltabnuevoexameneslab5").text("Close");
   $("#modaltabnuevoexameneslab6").text('Save Changes');
   
   <?php }else
      { ?>
   
   $.post( "../../views/consultamedico/historicoing.php", { IdFactor: "2", IdPersona: "<?php echo $idpersonaid; ?>" })
    .done(function( data ) {
      $("#historialclinico").html(data);
   
   });
   $.post( "../../views/consultamedico/historicoing.php", { IdFactor: "3", IdPersona: "<?php echo $idpersonaid; ?>" })
    .done(function( data ) {
      $("#vacunacion").html(data);
   
   });
   // ENCABEZADO, PRIMER TAB Y BOTON DE FINALIZAR CONSULTA
   $("#encabezadoform1").text("ENTRY OF TODAY'S MEDICAL VISIT");
   $("#encabezadoform2").text('ENTER THE DATA REQUIRED');
   $("#tabgeneral1").text("TODAY'S VISIT");
   $("#tabgeneral2").text('PATIENT/FAM HISTORY');
   $("#tabgeneral3").text('PREVIOUS VISITS');
   $("#btnfinalizarconsulta").text('FINISH');
   
   // TAB DE INGRESO DE CONSULTA - FICHA DE CONSULTA
   $("#tab1signosvitales1").text('DATE OF VISIT');
   $("#tab1signosvitales2").text('GENERAL INFO');
   $("#tab1signosvitales3").text('OB-GYN INFO');
   $("#tab1signosvitales4").text('PEDIATRIC INFO');
   $("#tab1signosvitales5").text('OTHER');
   $("#tab1signosvitales6").text('MEDICAL INFO');
   $("#tab1tab1paciente").text("Patient's name");
   $("#tab1tab1medico").text('Physician');
   $("#tab1tab1especialidad").text('Type of visit');
   $("#tab1tab1fecha").text('Date');
   $("#tab1tab2peso").text('Weight');
   $("#tab1tab2altura").text('Height');
   $("#tab1tab2temperatura").text('Temperature');
   $("#tab1tab2fr").text('Respiration');
   $("#tab1tab2pulso").text('Pulse');
   $("#tab1tab2presion").text('Blood Pressure');
   $("#tab1tab2glucotex").text('Glucose');
   $("#tab1tab3menstruacion").text('Last Menstrua.');
   $("#tab1tab3pap").text('Last PAP');
   $("#tab1tab3ofc").text('OFC - Occipital Frontal Circumference.');
   $("#tab1tab3hl").text('Height/length');
   $("#tab1tab3w").text('Weight');
   $("#tab1tab5observaciones").text('Observations');
   $("#tab1tab5motivo").text('Reason for Visit');
   $("#btnmodalsignoscerrar").text('Close');
   
   
   $("#tab1consultamedica1").text('Illnesses');
   $("#tab1consultamedica2").text('Nutritional state');
   $("#tab1consultamedica3").text('Allergies');
   $("#tab1consultamedica4").text('Previous surgeries');
   $("#tab1consultamedica5").text('Current medications');
   $("#tab1consultamedica6").text('Physical exam');
   $("#tab1consultamedica7").text('Diagnosis');
   $("#tab1consultamedica8").text('Comments');
   $("#tab1consultamedica9").text('Other');
   $("#tab1consultamedica10").text('Treatment plan');
   $("#tab1consultamedica11").text('Next visit');
   
   
   $("#tblexamenasignado").text('ORDERS FOR LAB / IMAGING')
   $("#tblexamenasignadoexamen").text('Type of Exam or Image');
   $("#tblexamenasignadomedico").text('Physician');
   $("#tblexamenasignadoindicacion").text('Special instructions');
   $("#tblexamenasignadoaccion").text('Action');
   
   // TAB EXPEDIENTE DATO GENERAL
   $("#tabexpediente19").text('GENERAL INFORMATION');
   $("#tabexpediente20").text('PARENT/GUARDIAN');
   $("#tabexpediente21").text('MEDICAL INFORMATION');
   $("#tabexpediente22").text('PATIENT/FAMILY HIST');
   $("#tabexpediente23").text('VACCINATIONS');
   $("#tabexpediente1").text("Patient's given names");
   $("#tabexpediente2").text("Patient's last name(s)");
   $("#tabexpediente3").text('Date of Birth');
   $("#tabexpediente4").text('Sex');
   $("#tabexpediente5").text('Civil status');
   $("#tabexpediente6").text('DUI/Government I.D. #');
   $("#tabexpediente7").text('Address');
   $("#tabexpediente8").text('Telephone');
   $("#tabexpediente9").text('Celular');
   $("#tabexpediente10").text('E-mail');
   
   // TAB EXPEDIENTE RESPONSABLE
   $("#tabexpediente11").text('Given name(s)');
   $("#tabexpediente12").text('Last name(s)');
   $("#tabexpediente13").text('Relationship');
   $("#tabexpediente14").text('DUI/Government I.D. #');
   $("#tabexpediente15").text('Telephone');
   
    // TAB EXPEDIENTE DATO MEDICO
   $("#tabexpediente16").text('Illnesses');
   $("#tabexpediente17").text('Allergies');
   $("#tabexpediente18").text('Current medications');
   
          // TAB HISTORIAL CONSULTAS
   $("#tab2historial1").text('PREVIOUS MEDICAL VISIT');
   $("#tab2historial2").text('EXAMS');
   $("#tab2historial3").text('PROCEDURE');
   
     // TABLA HISTORIAL CONSULTAS
   $("#tab2historialconsultabla6").text('PREVIOUS VISITS');
   $("#tab2historialconsultabla1").text('Date');
   $("#tab2historialconsultabla2").text("Patient's name");
   $("#tab2historialconsultabla3").text('Treated by');
   $("#tab2historialconsultabla4").text('Department');
   $("#tab2historialconsultabla5").text('Action');
   
   // TABLA HISTORIAL EXAMENES
   $("#tab2historialexamabla1").text('PREVIOUS EXAMS');
   $("#tab2historialexamabla2").text('Date');
   $("#tab2historialexamabla3").text("Patient's name");
   $("#tab2historialexamabla4").text('Treated by');
   $("#tab2historialexamabla5").text('Exams');
   $("#tab2historialexamabla6").text('Action');
   
   
   // TABLA HISTORIAL PROCEDIMIENTOS
   $("#tab2historialprocetabla1").text('PREVIOUS PROCEDURE');
   $("#tab2historialprocetabla2").text('Date');
   $("#tab2historialprocetabla3").text("Patient's name");
   $("#tab2historialprocetabla4").text('Treated by');
   $("#tab2historialprocetabla5").text('Department');
   $("#tab2historialprocetabla6").text('Motive');
   $("#tab2historialprocetabla7").text('Action');
   
   // MODAL HISTORICO DE CONSULTA
   $("#modaltabconsultamedicatitulo1").text('PREVIOUS VISITS');
   $("#modaltabconsultamedicatitulo2").text('PREVIOUS VISITS');
   $("#modaltabconsultamedica1").text('DATE OF VISIT');
   $("#modaltabconsultamedica2").text('GENERAL INFO');
   $("#modaltabconsultamedica3").text('OB-GYN INFO');
   $("#modaltabconsultamedica4").text('PEDIATRIC INFO');
   $("#modaltabconsultamedica5").text('OTHER');
   $("#modaltabconsultamedica6").text('MEDICAL INFO');
   $("#modaltabconsultamedica7").text("Patient's name");
   $("#modaltabconsultamedica8").text('Physician');
   $("#modaltabconsultamedica9").text('Type of visit');
   $("#modaltabconsultamedica10").text('Date');
   $("#modaltabconsultamedica11").text('Weight');
   $("#modaltabconsultamedica12").text('Height');
   $("#modaltabconsultamedica13").text('Temperature');
   $("#modaltabconsultamedica14").text('Respiration');
   $("#modaltabconsultamedica15").text('Pulse');
   $("#modaltabconsultamedica16").text('Blood Pressure');
   $("#modaltabconsultamedica17").text('Glucose');
   $("#modaltabconsultamedica18").text('Last Menstrua.');
   $("#modaltabconsultamedica19").text('Last PAP');
   $("#modaltabconsultamedica20").text('OFC - Occipital Frontal Circumference.');
   $("#modaltabconsultamedica21").text('Height/length');
   $("#modaltabconsultamedica22").text('Weight');
   $("#modaltabconsultamedica23").text('Observations');
   $("#modaltabconsultamedica24").text('Reason for Visit');
   $("#modaltabconsultamedica25").text('Illnesses');
   $("#modaltabconsultamedica26").text('Nutritional state');
   $("#modaltabconsultamedica27").text('Allergies');
   $("#modaltabconsultamedica28").text('Previous surgeries');
   $("#modaltabconsultamedica29").text('Current medications');
   $("#modaltabconsultamedica30").text('Physical exam');
   $("#modaltabconsultamedica31").text('Diagnosis');
   $("#modaltabconsultamedica32").text('Comments');
   $("#modaltabconsultamedica33").text('Other');
   $("#modaltabconsultamedica34").text('Treatment plan');
   $("#modaltabconsultamedica35").text('Next visit');
   
   
   // MODAL PARA AGREGAR LA CONSULTA MEDICA DEL DIA
   $("#modaltabnuevaconsultamedica1").text('MEDICAL INFO');
   $("#modaltabnuevaconsultamedica2").text('Illnesses');
   $("#modaltabnuevaconsultamedica3").text('Nutritional state');
   $("#modaltabnuevaconsultamedica4").text('Allergies');
   $("#modaltabnuevaconsultamedica5").text('Previous surgeries');
   $("#modaltabnuevaconsultamedica6").text('Current medications');
   $("#modaltabnuevaconsultamedica7").text('Physical exam');
   $("#modaltabnuevaconsultamedica8").text('Diagnosis');
   $("#modaltabnuevaconsultamedica9").text('Comments');
   $("#modaltabnuevaconsultamedica10").text('Other');
   $("#modaltabnuevaconsultamedica11").text('Treatment plan');
   $("#modaltabnuevaconsultamedica12").text('Next visit');
   $("#modaltabnuevaconsultamedica13").text("TODAY'S MEDICAL VISIT");
   $("#modaltabnuevaconsultamedica14").text('MEDICAL VISIT:');
   $("#modaltabnuevaconsultamedica15").text("Close");
   $("#modaltabnuevaconsultamedica16").text('Save Changes');
   
   
   // MODAL PARA AGREGAR LA EXAMENES A LA CONSULTA MEDICA DEL DIA
   $("#modaltabnuevoexameneslab1").text('ASSIGNMENT OF LABORATORY EXAMS');
   $("#modaltabnuevoexameneslab2").text('LABORATORY EXAMS');
   $("#modaltabnuevoexameneslab3").text("Exams");
   $("#modaltabnuevoexameneslab4").text('Indication');
   $("#modaltabnuevoexameneslab5").text("Close");
   $("#modaltabnuevoexameneslab6").text('Save Changes');
   
   
   // MODAL CARGAR EXAMEN HEMOGRAMA
   $("#modalconsultahemograma1").text('CBC - Complete Blood Count Report');
   $("#modalconsultahemograma2").text('Results of Exam');
   $("#modalconsultahemograma3").text("Patient's Name");
   $("#modalconsultahemograma4").text('Physician');
   $("#modalconsultahemograma5").text('Date');
   $("#modalconsultahemograma6").text('Page 1');
   $("#modalconsultahemograma7").text('Page 2');
   $("#modalconsultahemograma8").text('Red blood cell count');
   $("#modalconsultahemograma9").text('Hemoglobin');
   $("#modalconsultahemograma10").text('Hematocrit');
   $("#modalconsultahemograma11").text('MCV');
   $("#modalconsultahemograma12").text('MCH');
   $("#modalconsultahemograma13").text("MCHC");
   $("#modalconsultahemograma14").text('Leukocytes');
   $("#modalconsultahemograma15").text("Neutrophils");
   $("#modalconsultahemograma16").text('Lymphocytes');
   $("#modalconsultahemograma17").text('Monocytes');
   $("#modalconsultahemograma18").text('Eusenophil');
   $("#modalconsultahemograma19").text('Basophil');
   $("#modalconsultahemograma20").text('Platelets');
   $("#modalconsultahemograma21").text('Eritrosedimentation');
   $("#modalconsultahemograma21").text('Other');
   $("#modalconsultahemograma22").text('Segmented Neutrophils ');
   $("#modalconsultahemograma23").text('Close');
   
   
   // MODAL CARGAR EXAMEN HECES
   $("#modalconsultaheces1").text('Stool Analysis Report');
   $("#modalconsultaheces2").text('Results of Exam');
   $("#modalconsultaheces3").text("Patient's Name");
   $("#modalconsultaheces4").text('Physician');
   $("#modalconsultaheces5").text('Date');
   $("#modalconsultaheces6").text('Page 1');
   $("#modalconsultaheces7").text('Page 2');
   $("#modalconsultaheces8").text('Color');
   $("#modalconsultaheces9").text('Consistency');
   $("#modalconsultaheces10").text('Mucous');
   $("#modalconsultaheces11").text('Hematies');
   $("#modalconsultaheces12").text('Leukocytes');
   $("#modalconsultaheces13").text("Undigested food");
   $("#modalconsultaheces14").text('Macroscopics');
   $("#modalconsultaheces15").text("Microscopics");
   $("#modalconsultaheces16").text('Bacterial Flora');
   $("#modalconsultaheces17").text('Other');
   $("#modalconsultaheces18").text('Pactives');
   $("#modalconsultaheces19").text('Ova & Parasites');
   $("#modalconsultaheces20").text('Close');
   
   
   
   // MODAL CARGAR EXAMEN QUIMICO
   $("#modalconsultaquimico1").text('Quimic Exam');
   $("#modalconsultaquimico2").text('Results of Exam');
   $("#modalconsultaquimico3").text("Patient's Name");
   $("#modalconsultaquimico4").text('Physician');
   $("#modalconsultaquimico5").text('Date');
   $("#modalconsultaquimico6").text('Glucose');
   $("#modalconsultaquimico7").text('Glucose tolerance');
   $("#modalconsultaquimico8").text('Total Cholesterol');
   $("#modalconsultaquimico9").text('Triglycerides');
   $("#modalconsultaquimico10").text('Uric Acid');
   $("#modalconsultaquimico11").text('Creatinine');
   $("#modalconsultaquimico12").text('Uric Nitrogen');
   $("#modalconsultaquimico13").text("Urea");
   $("#modalconsultaquimico14").text("Close");
   
   
   
   // MODAL CARGAR EXAMEN ORINA
   $("#modalconsultaorina1").text('Urinalys');
   $("#modalconsultaorina2").text('Results of Exam');
   $("#modalconsultaorina3").text("Patient's Name");
   $("#modalconsultaorina4").text('Physician');
   $("#modalconsultaorina5").text('Date');
   $("#modalconsultaorina6").text('Page 1');
   $("#modalconsultaorina7").text('Page 2');
   $("#modalconsultaorina8").text('Color');
   $("#modalconsultaorina9").text('Appearance');
   $("#modalconsultaorina10").text('Density');
   $("#modalconsultaorina11").text('pH');
   $("#modalconsultaorina12").text('Protein');
   $("#modalconsultaorina13").text("Glucose");
   $("#modalconsultaorina14").text('Blood');
   $("#modalconsultaorina15").text("Ketones");
   $("#modalconsultaorina16").text('Urobilinogen');
   $("#modalconsultaorina17").text('Bilirubin');
   $("#modalconsultaorina18").text('Close');
   
   
   // MODAL CARGAR EXAMEN QUIMICO
   $("#modalconsultavarios1").text('Various Exam');
   $("#modalconsultavarios2").text('Results of Exam');
   $("#modalconsultavarios3").text("Patient's Name");
   $("#modalconsultavarios4").text('Physician');
   $("#modalconsultavarios5").text('Date');
   $("#modalconsultavarios6").text('Result');
   $("#modalconsultavarios7").text("Close");
   
   
   // MODAL CARGAR PROCEDIMIENTO
   $("#modalcargaprocedimiento1").text('Report of Procedure');
   $("#modalcargaprocedimiento2").text('Procedure Sheet');
   $("#modalcargaprocedimiento3").text("Patient's Name");
   $("#modalcargaprocedimiento4").text('Physician');
   $("#modalcargaprocedimiento5").text('Type of visit');
   $("#modalcargaprocedimiento6").text('Date');
   $("#modalcargaprocedimiento7").text("Observation");
   $("#modalcargaprocedimiento8").text("Close");
   
   
   // MODAL ASIGNAR EXAMENES MEDICOS
   $("#modalasignarexamen1").text("Laboratory Exam's");
   $("#modalasignarexamen2").text('Exams');
   $("#modalasignarexamen3").text("Type of Exam");
   $("#modalasignarexamen4").text('Indication');
   $("#modalasignarexamen5").text('Close');
   $("#modalasignarexamen6").text('Save Changes');
   
   
   <?php } ?>
   
   });
</script>