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

<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header with-border">
      <div class="box-body">
				<p align="right">
		          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConsulta"> Nueva consulta </button>
       				 </p>                
        <div class="example-modal modal fade" id="modalConsulta">
          <div class="modal">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
              <form class="form-horizontal" action="../../views/enfermeriaconsulta/guardarconsulta.php" role="form" method="POST">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Nueva Consulta</h4>
                    </div>
                    <div class="modal-body">

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
                                            <input type="hidden" name="txtPaciente" value="<?php echo $idpersona ?>">  </div>
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
                                </select></div>
                      <div class="col-sm-1"></div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="guardarConsulta" >Guardar Cambios</button>
                    </div>
                </form>
              </div>
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
</div><!-- /.box-header -->
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
                      "<span id='btn".$idSignosVitales."' class='btn btn-xs btn-success btn-mdl'>Agregar Signos Vitales</span>".
                      "</td>";
               }
               else{
               echo "<td>".
                      "<span id='btn". $idSignosVitales  ."' class='btn btn-xs btn-warning btn-mdls'>Ver Signos Vitales</span>".
                      "</td>";
               }

               echo"</tr>";
               echo"</body>  ";
            }
      ?>
  </table>
</div>
</div>


<!--    MODAL Signos    -->

<div class="example-modal modal fade" id="modalSignosVitales">
<div class="modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form class="form-horizontal" action="enfermeria_guardar_indicador.php"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3><i class="fa fa-globe"></i> Centro Medico Familiar Shalom</h3>
            <h4 class="modal-title">REPORTE DE SIGNOS VITALES</h4>
          </div>
          <div class="modal-body ">
  

  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">FICHA DE CONSULTA</h3>
  </div>
          <div class="form-group hidden">
            <div class="col-sm-5"><input type="text"  name="txtIdConsulta" id="idconsulta"></div>
          </div>
          <div class="form-group">
            <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>">  </div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Paciente</label></div>
            <div class="col-sm-5"><input type="text" class="form-control" name="txtPaciente" id="paciente" disabled="disabled"></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Medico</label></div>
            <div class="col-sm-5"> <input type="text" class="form-control" name="txtMedico" id="medico" disabled="disabled" value=" "></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Especialidad</label></div>
            <div class="col-sm-5"> <input type="text" class="form-control" name="txtMedico" id="modulo" disabled="disabled" value=" "></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
            <div class="col-sm-5"> <input type="text" class="form-control" name="txtFecha" id="fecha" disabled="disabled"></div>
          </div>
  </div>
  </div>
  </div>

  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">DATOS GENERALES</h3>
  </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Peso</label></div>
            <div class="col-sm-2"><input type="text" class="form-control" data-inputmask='"mask": "999.9"' data-mask name="txtPeso" id="peso" required=""> </div>
            <div class="col-sm-2">
             <select class="form-control select2" name="cboUnidadPeso" id="unidadpeso">
                <option value="1">lbs</option>
                <option Value="2">kg</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Altura</label></div>
            <div class="col-sm-2"> <input type="text" class="form-control" data-inputmask='"mask": "9.99"' data-mask name="txtAltura" id="altura" required=""> </div>
            <div class="col-sm-2">
             <select class="form-control select2" name="cboUnidadAltura" id="unidadaltura">
                <option value="1">Mts</option>
                <option Value="2">Cms</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Temperatura</label></div>
            <div class="col-sm-2"> <input type="text" class="form-control" data-inputmask='"mask": "99.9"' data-mask name="txtTemperatura" id="temperatura" required=""> </div>
            <div class="col-sm-2">
             <select class="form-control select2" name="cboUnidadTemperatura" id="unidadtemperatura">
                <option value="1">C</option>
                <option Value="2">F</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">F/R</label></div>
            <div class="col-sm-2"> <input type="text" class="form-control"  name="txtFR" id="FR" required=""> </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Pulso</label></div>
            <div class="col-sm-2"> <input type="text" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtPulso" id="pulso" required=""> </div>
            <div class="col-sm-2"> <label for="inputEmail3" class="control-label">lat/min</label></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Presion</label></div>
            <div class="col-sm-2"> <input type="text" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtMax" placeholder="MAX" id="max" required=""> </div>
            <div class="col-sm-2"> <input type="text" class="form-control" data-inputmask='"mask": "99"' data-mask name="txtMin" placeholder="MIN" id="min" required=""> </div>
            <div class="col-sm-1"><label for="inputEmail3" class="control-label">mmHg</label></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Glucotex</label></div>
            <div class="col-sm-2"> <input type="text" class="form-control"  name="txtGluco"  id="gluco" required=""> </div>
          </div>

  </div>
  </div>
  </div>

  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">USO GINECOLOGICO</h3>
  </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Ult. Menstruacion</label></div>
            <div class="col-sm-4"> <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUmestruacion" id="ultimamestruacion"> </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Ult.PAP</label></div>
            <div class="col-sm-4"> <input type="text" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUpap" id="ultimapap"> </div>
          </div>

  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">USO PEDIATRICO</h3>
  </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">P/C</label></div>
            <div class="col-sm-3"> <input type="text" class="form-control" name="txtpc" id="pc"></div>
            <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">P/T</label></div>
            <div class="col-sm-3"> <input type="text" class="form-control"  name="txtpt" id="pt"></div>
            <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">P/A</label></div>
            <div class="col-sm-3"> <input type="text" class="form-control"  name="txtpa" id="pa"></div>
            <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>  
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
            <div class="col-sm-7"> <textarea type="text" rows="4" class="form-control" name="txtObservaciones" data-parsley-maxlength="100" id="observaciones" data-parsley-maxlength="100"> </textarea> </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Motivo de Visita</label></div>
            <div class="col-sm-7"> <textarea type="text" rows="4" class="form-control" name="txtMotivo" data-parsley-maxlength="100" id="motivo" data-parsley-maxlength="100" required=""> </textarea> </div>
          </div>
  </div>
  </div>
  </div>      


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" id="btn-cerrarmodal" data-dismiss="modal" >Cerrar</button>
            <button type="submit" class="btn btn-primary" name="guardarIndicador" >Guardar Cambios</button>
          </div>
      </form>
    </div>
  </div>
  </div>
</div>

<!-- MODAL PARA CARGAR LOS SIGNOS VITALES CON LA SEGUN LA CONSULTA -->
<div class="example-modal modal fade" id="modalCargarSignosVitales">
<div class="modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form class="form-horizontal"  role="form" method="POST" id="demo-form1" data-parsley-validate="">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h3><i class="fa fa-globe"></i> Centro Medico Familiar Shalom</h3>
            <h4 class="modal-title">Reporte de Signos Vitales</h4>
          </div>
          <div class="modal-body ">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">Datos Personales</h3>
  </div>
          <div class="form-group">
            <div class="col-sm-5"><input type="text" hidden="hidden" name="txtid" value="<?php echo $idpersona ?>">  </div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Paciente</label></div>
            <div class="col-sm-5"><input type="text" class="form-control" name="txtPaciente" id="pacientes" disabled="disabled"></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Medico</label></div>
            <div class="col-sm-5"> <input type="text" class="form-control" name="txtMedico" id="medicos" disabled="disabled" value=" "></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Especialidad</label></div>
            <div class="col-sm-5"> <input type="text" class="form-control" name="txtMedico" id="modulos" disabled="disabled" value=" "></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Fecha</label></div>
            <div class="col-sm-5"> <input type="text" class="form-control" name="txtFecha" id="fechas" disabled="disabled"></div>
          </div>
  </div>
  </div>
  </div>

  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">Datos Generales</h3>
  </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Peso</label></div>
            <div class="col-sm-2"><input type="text" disabled="disabled" class="form-control" data-inputmask='"mask": "999.9"' data-mask name="txtPeso" id="pesos" required=""> </div>
            <div class="col-sm-2">
             <select class="form-control select2" disabled="disabled" name="cboUnidadPeso" id="unidadpesos">
                <option value="1">lbs</option>
                <option Value="2">kg</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Altura</label></div>
            <div class="col-sm-2"> <input type="text" disabled="disabled" class="form-control" data-inputmask='"mask": "9.99"' data-mask name="txtAltura" id="alturas" required=""> </div>
            <div class="col-sm-2">
             <select class="form-control select2" disabled="disabled" name="cboUnidadAltura" id="unidadalturas">
                <option value="1">mts</option>
                <option Value="2">Cms</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Temperatura</label></div>
            <div class="col-sm-2"> <input type="text" disabled="disabled" class="form-control" data-inputmask='"mask": "99.9"' data-mask name="txtTemperatura" id="temperaturas" required=""> </div>
            <div class="col-sm-2">
             <select class="form-control select2" disabled="disabled" name="cboUnidadTemperatura" id="unidadtemperatura">
                <option value="1">C</option>
                <option Value="2">F</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">F/R</label></div>
            <div class="col-sm-2"> <input type="text" disabled="disabled" class="form-control"  name="txtFR" id="frs" required=""> </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Pulso</label></div>
            <div class="col-sm-2"> <input type="text" disabled="disabled" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtPulso" id="pulsos" required=""> </div>
            <div class="col-sm-2"> <label for="inputEmail3" class="control-label">lat/min</label></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Presion</label></div>
            <div class="col-sm-2"> <input type="text" disabled="disabled" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtMax" placeholder="MAX" id="maxs" required=""> </div>
            <div class="col-sm-2"> <input type="text" disabled="disabled" class="form-control" data-inputmask='"mask": "999"' data-mask name="txtMin" placeholder="MIN" id="mins" required=""> </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Glucotex</label></div>
            <div class="col-sm-2"> <input type="text" disabled="disabled" class="form-control"  name="txtGluco"  id="glucos" required=""> </div>
          </div>

  </div>
  </div>
  </div>

  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">Uso Ginecológico</h3>
  </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Ult. Menstruacion</label></div>
            <div class="col-sm-4"> <input type="text" disabled="disabled" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUmestruacion" id="ultimamestruacions"> </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Ult.PAP</label></div>
            <div class="col-sm-4"> <input type="text" disabled="disabled" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="txtUpap" id="ultimapaps"> </div>
          </div>

  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">Uso Pediátrico</h3>
  </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">P/C</label></div>
            <div class="col-sm-3"> <input type="text" disabled="disabled" class="form-control" name="txtpc" id="pcs"></div>
            <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">P/T</label></div>
            <div class="col-sm-3"> <input type="text" disabled="disabled" class="form-control"  name="txtpt" id="pts"></div>
            <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">P/A</label></div>
            <div class="col-sm-3"> <input type="text" disabled="disabled" class="form-control"  name="txtpa" id="pas"></div>
            <div class="col-sm-1"><label for="inputEmail3" class="control-label">cm.</label></div>  
          </div>

  </div>
  </div>
  </div>

  <div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">Otros</h3>
  </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Observaciones</label></div>
            <div class="col-sm-7"> <textarea type="text" rows="4" disabled="disabled" class="form-control" name="txtObservaciones" data-parsley-maxlength="100" id="observacioness" data-parsley-maxlength="100"> </textarea> </div>
          </div>
          <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-3"><label for="inputEmail3" class="control-label">Motivo de Visita</label></div>
            <div class="col-sm-7"> <textarea type="text" rows="4" disabled="disabled" class="form-control" name="txtMotivo" data-parsley-maxlength="100" id="motivos" data-parsley-maxlength="100"> </textarea> </div>
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
</section>

<script type="text/javascript">
$(document).ready(function(){
$(".btn-mdl").click(function(){
    var id = $(this).attr("id").replace("btn","");

    var myData  = {"id":id};
    $.ajax({
        url   : "enfermeria_cargar_consulta.php",
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
        url   : "enfermeria_cargar_consultasignosvitales.php",
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
});
</script>