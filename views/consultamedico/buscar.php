<?php
include '../../include/dbconnectsybase.php';
if(!empty($_POST)){
$descripcion = $_POST['descripcion'];
$grupos = $_POST['grupos'];

  $ListarUsuariosMT = "SELECT 
  CASE 
    WHEN d.Nombre = 'BOTIQUIN VENTA' THEN 'VENTA'
    WHEN d.Nombre = 'BOTIQUIN DONADO' THEN 'DONADO'
    END as 'BODEGA',  p.Descripcion as 'PRODUCTO', p.NoBasico as 'BASICO', e.existencia as 'EXISTENCIA', e.disponible as 'DISPONIBLE', 
            CASE  
              WHEN g.Nombre = 'vAMPOLLA' THEN 'AMPOLLA'
              WHEN g.Nombre = 'vFRASCO' THEN 'FRASCO' 
              WHEN g.Nombre = 'vSOBRES' THEN 'SOBRES'
              WHEN g.Nombre = 'vTABLETA' THEN 'TABLETA'
              WHEN g.Nombre = 'vCAPSULA' THEN 'CAPSULA'
              WHEN g.Nombre = 'vVIAL' THEN 'VIAL'
              WHEN g.Nombre = 'vBOLSA' THEN 'BOLSA'
              WHEN g.Nombre = 'vTUBO' THEN 'TUBO'
              WHEN g.Nombre = 'vFRACO O BOLSA' THEN 'FRASCO/BOLSA'
              WHEN g.Nombre = 'vTARRO' THEN 'TARRO'
              WHEN g.Nombre = 'dAMPOLLA' THEN 'AMPOLLA'
              WHEN g.Nombre = 'dSOBRES' THEN 'SOBRES'
              WHEN g.Nombre = 'dTABLETA' THEN 'TABLETA'
              WHEN g.Nombre = 'dCAPSULA' THEN 'CAPSULA'
              WHEN g.Nombre = 'dVIAL' THEN 'VIAL'
              WHEN g.Nombre = 'dBOLSA' THEN 'BOLSA'
              WHEN g.Nombre = 'dTUBO' THEN 'TUBO'
              WHEN g.Nombre = 'dFRASCO' THEN 'FRASCO'
              WHEN g.Nombre = 'dFRACO O BOLSA' THEN 'FRASCO/BOLSA'
              WHEN g.Nombre = 'dSUPOSITORIO' THEN 'SUPOSITORIO'
              WHEN g.Nombre = 'dTARRO' THEN 'TARRO'
              WHEN g.Nombre = 'dGRAJEA' THEN 'GRAJEA'
              WHEN g.Nombre = 'VARIOS' THEN 'ARREGLAR PRESENTACION'
            END as 'PRESENTACION'
            FROM prg.existencias e
            INNER JOIN prg.productos p on e.PLUProducto = p.PLUProducto
            INNER JOIN prg.divisiones d on e.PLUDivision = d.PLUDivision
            INNER JOIN prg.pGrupos g on p.PLUGrupo = g.GrupoId
            WHERE p.PLUEmpresa = 2 AND e.disponible > 0 AND p.Descripcion LIKE '%$descripcion%' AND g.Nombre LIKE '%$grupos%' AND g.Nombre <> 'VARIOS'
ORDER BY p.Descripcion";

    if($ResultadoUsuariosMT = odbc_exec($conn, $ListarUsuariosMT)){
        if($ResultadoUsuariosMT > 0){
?>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <?php
                                               echo"<thead>";
                                                   echo"<tr>";
                                                   echo"<th id=''>BODEGA</th>";
                                                   echo"<th id=''>PRODUCTO</th>";
                                                   echo"<th id=''>CODIGO</th>";
                                                   echo"<th id=''>DISPONIBLE</th>";
                                                   echo"<th id=''>PRESENTACION</th>";
                                                   echo"</tr>";
                                               echo"</thead>";
                                               echo"<tbody>";
                                               while ($row = odbc_fetch_array($ResultadoUsuariosMT))
                                                 {
                                                    echo"<tr>";
                                                    echo"<td>".$row['BODEGA']."</td>";
                                                    echo"<td>".iconv('Windows-1252', "UTF-8",$row['PRODUCTO'])."</td>";
                                                    echo"<td>".$row['BASICO']."</td>";
                                                    echo"<td>".$row['DISPONIBLE']."</td>";
                                                    echo"<td>".$row['PRESENTACION']."</td>";
                                                    echo"</tr>";
                                                  }
                                                echo"</tbody>";
                                               ?>
                                    </table>
                                </div>
 <?php
        }else{
            print "No se Encontraron Coincidencias.";
        }
    }else{
        print $conex->error;
    }
} 
 
?>
