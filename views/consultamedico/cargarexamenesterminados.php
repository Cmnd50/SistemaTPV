<?php

require_once '../../include/dbconnect.php';
session_start();
      $idlistaexamen = $_POST["id"];

      $querytablaexamenes = "SELECT le.IdListaExamen, CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico',
                            CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente', le.IdTipoExamen As'IdTipoExamen',te.NombreExamen As 'NombreExamen',
                            ehe.Fecha As 'ExamenHemogramaFecha', ehe.GlobulosRojos As 'ExamenHemogramaGlobulosRojos', ehe.Hemoglobina As 'ExamenHemogramaHemoglobina',
                            ehe.Hematocrito As 'ExamenHemogramaHematocrito', ehe.Vgm As 'ExamenHemogramaVgm', ehe.Hcm As 'ExamenHemogramaHcm',
                            ehe.Chcm As 'ExamenHemogramaChcm', ehe.Leucocitos As 'ExamenHemogramaLeucocitos', ehe.NeutrofilosEnBanda As 'ExamenHemogramaNeutrofilos',
                            ehe.Linfocitos As 'ExamenHemogramaLinfocitos', ehe.Monocitos As 'ExamenHemogramaMonocitos', ehe.Eosinofilos As 'ExamenHemogramaEosinofilos',
                            ehe.Basofilos As 'ExamenHemogramaBasofilos', ehe.Plaquetas As 'ExamenHemogramaPlaquetas',
                            ehe.Eritrosedimentacion As 'ExamenHemogramaEritrosedimentacion', ehe.Otros As 'ExamenHemogramaOtros',
                            ehe.NeutrofilosSegmentados As 'ExamenHemogramaNeutrofilosSegmentados',
                            eh.Fecha As 'ExamenHecesFecha', eh.Color As 'ExamenHecesColor', eh.Consistencia As 'ExamenHecesConsistencia',
                            eh.Mucus As 'ExamenHecesMucus', eh.Hematies As 'ExamenHecesHematies', eh.Leucocitos As 'ExamenHecesLeucocitos',
                            eh.RestosAlimenticios As 'ExamenHecesRestosAlimenticios', eh.Macrocopicos As 'ExamenHecesMacrocopios',
                            eh.Microscopicos As 'ExamenHecesMicroscopicos', eh.FloraBacteriana As 'ExamenHecesFlora',
                            eh.Otros As 'ExamenHecesOtros', eh.PActivos As 'ExamenHecesPActivos', eh.PQuistes As 'ExamenHecesPQuistes',
                            ev.Fecha As 'ExamenesVariosFecha', ev.Resultado As 'ExamenesVariosResultado',
                            eo.Fecha As 'ExamenOrinaFecha', eo.Color As 'ExamenOrinaColor', eo.Olor As 'ExamenOrinaOlor',
                            eo.Aspecto As 'ExamenOrinaAspecto', eo.Densidad As 'ExamenOrinaDendisdad', eo.Ph As 'ExamenOrinaPh',
                            eo.Proteinas As 'ExamenOrinaProteinas', eo.Glucosa As 'ExamenOrinaGlucosa', eo.SagreOculta As 'ExamenOrinaSangreOculta',
                            eo.CuerposCetomicos As 'ExamenOrinaCuerposCetomicos', eo.Urobilinogeno As 'ExamenOrinaUrobilinogeno',
                            eo.Bilirrubina As 'ExamenOrinaBilirrubina', eo.EsterasaLeucocitaria As 'ExamenOrinaEsterasaLeucocitaria',
                            eo.Cilindros As 'ExamenOrinaCilindros', eo.Hematies As 'ExamenOrinaHematies', eo.Leucocitos As 'ExamenOrinaLeucocitos',
                            eo.CelulasEpiteliales As 'ExamenOrinaCelulasEpiteliales', eo.ElementosMinerales As 'ExamenOrinaElementosMinerales',
                            eo.Parasitos As 'ExamenOrinaParasitos', eo.Observaciones As 'ExamenOrinaObservaciones',
                            exq.Fecha As 'ExamenQuimicaFecha', exq.Glucosa As 'ExamenQuimicaGlucosa', exq.GlucosaPost As 'ExamenQuimicaGlucosaPost',
                            exq.ColesterolTotal As 'ExamenQuimicaColesterolTotal', exq.Triglicerido As 'ExamenQuimicaTriglicerido',
                            exq.AcidoUrico As'ExamenQuimicaAcidoUrico', exq.Creatinina As 'ExamenQuimicaCreatinina',
                            exq.NitrogenoUreico As 'ExamenQuimicaNitrogenoUreico', exq.Urea As 'ExamenQuimicaUrea'

                            FROM listaexamen le
                            INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
                            INNER JOIN persona p ON le.IdPersona = p.IdPersona
                            LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
                            INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
                            LEFT JOIN examenhemograma ehe ON le.IdListaExamen = ehe.IdListaExamen
                            LEFT JOIN examenheces eh ON le.IdListaExamen = eh.IdListaExamen
                            LEFT JOIN examenesvarios ev ON le.IdListaExamen = ev.IdListaExamen
                            LEFT JOIN examenorina eo ON le.IdListaExamen = eo.IdListaExamen
                            LEFT JOIN examenquimica exq ON le.IdListaExamen = exq.IdListaExamen
                            WHERE le.Activo = 0 and le.IdListaExamen = '$idlistaexamen'";

          $resultadotablaexamenes = $mysqli->query($querytablaexamenes);

          $datos = array();

                   while ($test = $resultadotablaexamenes->fetch_assoc())
                         {
                             $datos["Paciente"] = $test['Paciente'];
                             $datos["Medico"] = $test['Medico'];
                             $datos["IdTipoExamen"] = $test['IdTipoExamen'];
                             $datos["NombreExamen"] = $test['NombreExamen'];
                             $datos["ExamenHemogramaFecha"] = $test['ExamenHemogramaFecha'];
                             $datos["ExamenHemogramaGlobulosRojos"] = $test['ExamenHemogramaGlobulosRojos'];
                             $datos["ExamenHemogramaHemoglobina"] = $test['ExamenHemogramaHemoglobina'];
                             $datos["ExamenHemogramaHematocrito"] = $test['ExamenHemogramaHematocrito'];
                             $datos["ExamenHemogramaVgm"] = $test['ExamenHemogramaVgm'];
                             $datos["ExamenHemogramaHcm"] = $test['ExamenHemogramaHcm'];
                             $datos["ExamenHemogramaChcm"] = $test['ExamenHemogramaChcm'];
                             $datos["ExamenHemogramaLeucocitos"] = $test['ExamenHemogramaLeucocitos'];
                             $datos["ExamenHemogramaNeutrofilos"] = $test['ExamenHemogramaNeutrofilos'];
                             $datos["ExamenHemogramaLinfocitos"] = $test['ExamenHemogramaLinfocitos'];
                             $datos["ExamenHemogramaMonocitos"] = $test['ExamenHemogramaMonocitos'];
                             $datos["ExamenHemogramaEosinofilos"] = $test['ExamenHemogramaEosinofilos'];
                             $datos["ExamenHemogramaBasofilos"] = $test['ExamenHemogramaBasofilos'];
                             $datos["ExamenHemogramaPlaquetas"] = $test['ExamenHemogramaPlaquetas'];
                             $datos["ExamenHemogramaEritrosedimentacion"] = $test['ExamenHemogramaEritrosedimentacion'];
                             $datos["ExamenHemogramaOtros"] = $test['ExamenHemogramaOtros'];
                             $datos["ExamenHemogramaNeutrofilosSegmentados"] = $test['ExamenHemogramaNeutrofilosSegmentados'];
                             $datos["ExamenHecesFecha"] = $test['ExamenHecesFecha'];
                             $datos["ExamenHecesColor"] = $test['ExamenHecesColor'];
                             $datos["ExamenHecesConsistencia"] = $test['ExamenHecesConsistencia'];
                             $datos["ExamenHecesMucus"] = $test['ExamenHecesMucus'];
                             $datos["ExamenHecesHematies"] = $test['ExamenHecesHematies'];
                             $datos["ExamenHecesLeucocitos"] = $test['ExamenHecesLeucocitos'];
                             $datos["ExamenHecesRestosAlimenticios"] = $test['ExamenHecesRestosAlimenticios'];
                             $datos["ExamenHecesMacrocopios"] = $test['ExamenHecesMacrocopios'];
                             $datos["ExamenHecesMicroscopicos"] = $test['ExamenHecesMicroscopicos'];
                             $datos["ExamenHecesFlora"] = $test['ExamenHecesFlora'];
                             $datos["ExamenHecesOtros"] = $test['ExamenHecesOtros'];
                             $datos["ExamenHecesPActivos"] = $test['ExamenHecesPActivos'];
                             $datos["ExamenHecesPQuistes"] = $test['ExamenHecesPQuistes'];
                             $datos["ExamenesVariosFecha"] = $test['ExamenesVariosFecha'];
                             $datos["ExamenesVariosResultado"] = $test['ExamenesVariosResultado'];

                             $datos["ExamenOrinaFecha"] = $test['ExamenOrinaFecha'];
                             $datos["ExamenOrinaColor"] = $test['ExamenOrinaColor'];
                             $datos["ExamenOrinaOlor"] = $test['ExamenOrinaOlor'];
                             $datos["ExamenOrinaAspecto"] = $test['ExamenOrinaAspecto'];
                             $datos["ExamenOrinaDendisdad"] = $test['ExamenOrinaDendisdad'];
                             $datos["ExamenOrinaPh"] = $test['ExamenOrinaPh'];
                             $datos["ExamenOrinaProteinas"] = $test['ExamenOrinaProteinas'];
                             $datos["ExamenOrinaGlucosa"] = $test['ExamenOrinaGlucosa'];
                             $datos["ExamenOrinaSangreOculta"] = $test['ExamenOrinaSangreOculta'];
                             $datos["ExamenOrinaCuerposCetomicos"] = $test['ExamenOrinaCuerposCetomicos'];
                             $datos["ExamenOrinaUrobilinogeno"] = $test['ExamenOrinaUrobilinogeno'];
                             $datos["ExamenOrinaBilirrubina"] = $test['ExamenOrinaBilirrubina'];
                             $datos["ExamenOrinaEsterasaLeucocitaria"] = $test['ExamenOrinaEsterasaLeucocitaria'];
                             $datos["ExamenOrinaCilindros"] = $test['ExamenOrinaCilindros'];
                             $datos["ExamenOrinaHematies"] = $test['ExamenOrinaHematies'];
                             $datos["ExamenOrinaLeucocitos"] = $test['ExamenOrinaLeucocitos'];
                             $datos["ExamenOrinaCelulasEpiteliales"] = $test['ExamenOrinaCelulasEpiteliales'];
                             $datos["ExamenOrinaElementosMinerales"] = $test['ExamenOrinaElementosMinerales'];
                             $datos["ExamenOrinaParasitos"] = $test['ExamenOrinaParasitos'];
                             $datos["ExamenOrinaObservaciones"] = $test['ExamenOrinaObservaciones'];

                             $datos["ExamenQuimicaFecha"] = $test['ExamenQuimicaFecha'];
                             $datos["ExamenQuimicaGlucosa"] = $test['ExamenQuimicaGlucosa'];
                             $datos["ExamenQuimicaGlucosaPost"] = $test['ExamenQuimicaGlucosaPost'];
                             $datos["ExamenQuimicaColesterolTotal"] = $test['ExamenQuimicaColesterolTotal'];
                             $datos["ExamenQuimicaTriglicerido"] = $test['ExamenQuimicaTriglicerido'];
                             $datos["ExamenQuimicaAcidoUrico"] = $test['ExamenQuimicaAcidoUrico'];
                             $datos["ExamenQuimicaCreatinina"] = $test['ExamenQuimicaCreatinina'];
                             $datos["ExamenQuimicaNitrogenoUreico"] = $test['ExamenQuimicaNitrogenoUreico'];
                             $datos["ExamenQuimicaUrea"] = $test['ExamenQuimicaUrea'];

                         }

           header("Content-Type","application/json");

    print_r(json_encode($datos));

?>
