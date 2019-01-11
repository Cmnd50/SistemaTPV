<?php
   use yii\helpers\Html;
   use yii\widgets\DetailView;
   
   include '../include/dbconnect.php';
   
   
   /* @var $this yii\web\View */
   /* @var $model app\models\Persona */
   
   include '../include/dbconnect.php';
  $idlistaexamen = $model->IdListaExamen;
  $queryexamenesactivos = "SELECT  c.IdConsulta As 'Consulta', u.IdUsuario As 'IdMedico', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', p.IdPersona As 'IdPaciente', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',
                          te.IdTipoExamen As 'Examen'
                        FROM listaexamen le
                        INNER JOIN usuario u ON le.IdUsuario = u.IdUsuario
                        INNER JOIN persona p ON le.IdPersona = p.IdPersona
                        LEFT JOIN consulta c ON le.IdConsulta = c.IdConsulta
                        INNER JOIN tipoexamen te ON le.IdTipoExamen = te.IdTipoExamen
                        WHERE le.IdListaExamen = '$idlistaexamen'";
  $resultadoexamenesactivos = $mysqli->query($queryexamenesactivos);
    while ($test = $resultadoexamenesactivos->fetch_assoc())
    {
        $idexamentipo = $test['Examen'];
        $idconsulta = $test['Consulta'];
        $idusuario = $test['IdMedico'];
        $idpersona = $test['IdPaciente'];
        $nombrepaciente = $test['Paciente'];
        $nombremedico = $test['Medico'];

    }
   
   $this->title = 'Examen Orina';
$this->params['breadcrumbs'][] = ['label' => 'Laboratorio Clinico', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
   ?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
      </div>
          <div class="ibox-content">
           <form class="form-horizontal">
            <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Globulos Rojos</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="globulosrojos" name = "globulosrojos" placeholder="Globulos Rojos">
                  </div>

                  <div class="col-sm-6 hidden">
                    <input type="text" class="form-control" id="idconsulta" name = "idconsulta" value="<?php echo $idconsulta ?>" placeholder="Globulos Rojos">
                  </div>
                  <div class="col-sm-6 hidden">
                    <input type="text" class="form-control" id="idpersona" name = "idpersona" value="<?php echo $idpersona ?>" placeholder="Globulos Rojos">
                  </div>
                  <div class="col-sm-6 hidden">
                    <input type="text" class="form-control" id="idlistaexamen" name = "idlistaexamen" value="<?php echo $idlistaexamen ?>" placeholder="Globulos Rojos">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">X mm3</label>
              </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Hemoglobina</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="hemoglobina" name="hemoglobina" placeholder="Hemoglobina">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">Gr/dl</label>
                </div>

                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Hematocrito</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="hematocrito" name="hematocrito" placeholder="Hematocrito">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">%</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">VGM</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="vgm" name="vgm" placeholder="VGM">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">Micras cubicas</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">HCM</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="hcm" name="hcm" placeholder="HCM">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">Micro microgramos</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">CHCM</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="chcm" name="chcm" placeholder="CHCM">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">%</label>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Leucocitos</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="leucocitos" name="leucocitos" placeholder="Leucocitos">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">Xmm3</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Neutrofilos En Banda</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="neutrofilosenbanda" name="neutrofilosenbanda" placeholder="Neutrofilos En Banda">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">%</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Linfocitos</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="linfocitos" name="linfocitos" placeholder="Linfocitos">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">%</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Neutrofilos Segmentados</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="neutrofilossegmentados" name="neutrofilossegmentados" placeholder="neutrofilos Segmentados">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">%</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Monocitos</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="monocitos" name="monocitos" placeholder="Monocitos">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">%</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Eosinofilos</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="eosinofilos" name="eosinofilos" placeholder="Eosinofilos">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">%</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Basofilos</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="basofilos" name="basofilos" placeholder="Basofilos">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">%</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Plaquetas</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="plaquetas" name="plaquetas" placeholder="Plaquetas">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">X mm3</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Eritrosedimentacion</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="eritrosedimentacion" name="eritrosedimentacion" placeholder="Eritrosedimentacion">
                  </div>
                   <label for="inputEmail3" class="col-sm-0 control-label">mm/h</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Otros</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="otros" name="otros" placeholder="Otros">
                  </div>
                   
                </div>
                </form>
          </div>
      </div>
    </div>
</div>