<?php
  use yii\helpers\Html;
  use yii\widgets\DetailView;
  
  /* @var $this yii\web\View */
  /* @var $model app\models\Persona */
     include '../include/dbconnect.php';
    $idlistaexamen = $model->IdListaExamen;
    $queryexamenesactivos = "SELECT  c.IdConsulta As 'Consulta', u.IdUsuario As 'IdMedico', CONCAT(u.Nombres,' ', u.Apellidos) As 'Medico', p.IdPersona As 'IdPaciente', CONCAT(p.Nombres,' ', p.Apellidos) As 'Paciente',
                            te.IdTipoExamen As 'Examen', le.indicacion As 'Indicacion'
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
          $indicacion = $test['Indicacion'];
  
      }
  
  $this->title = 'Examen Quimica';
  $this->params['breadcrumbs'][] = ['label' => 'Laboratorio Clinico', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;
  ?>
</br>
<?php if (Yii::$app->session->hasFlash("success")): ?>
<?php
  $session = \Yii::$app->getSession();
  $session->setFlash("success", "Se a agregado con Exito!"); ?>
<?= \odaialali\yii2toastr\ToastrFlash::widget([
  "options" => [
      "closeButton"=> true,
      "debug" =>  false,
      "progressBar" => true,
      "preventDuplicates" => true,
      "positionClass" => "toast-top-right",
      "onclick" => null,
      "showDuration" => "100",
      "hideDuration" => "1000",
      "timeOut" => "2000",
      "extendedTimeOut" => "100",
      "showEasing" => "swing",
      "hideEasing" => "linear",
      "showMethod" => "fadeIn",
      "hideMethod" => "fadeOut"
      ]
  ]);?>
<?php endif; ?> 
<?php if (Yii::$app->session->hasFlash("warning")): ?>
<?php
  $session = \Yii::$app->getSession();
  $session->setFlash("warning", "Se a actualizado con Exito!"); ?>
<?= \odaialali\yii2toastr\ToastrFlash::widget([
  "options" => [
      "closeButton"=> true,
      "debug" =>  false,
      "progressBar" => true,
      "preventDuplicates" => true,
      "positionClass" => "toast-top-right",
      "onclick" => null,
      "showDuration" => "100",
      "hideDuration" => "1000",
      "timeOut" => "2000",
      "extendedTimeOut" => "100",
      "showEasing" => "swing",
      "hideEasing" => "linear",
      "showMethod" => "fadeIn",
      "hideMethod" => "fadeOut"
      ]
  ]);?>
<?php endif; ?> 
<div class="row">
  <div class="col-md-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
      </div>
      <div class="ibox-content">
      <small>PACIENTE:</small> <?php echo $nombrepaciente; ?> </br>
      <small>INDICACION:</small> <?php echo $indicacion; ?> </br>
      </br>
        <div class="tabs-container">
          </br>
          <form class="form-horizontal" action="../../views/laboratorioclinico/guardarexamenquimica.php" role="form" method="POST">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#TABEXAMEN1">TAB 1</a></li>
            <li class=""><a data-toggle="tab" href="#TABEXAMEN2">TAB 2</a></li>
            <li class="pull-right">
               <button type="submit" class="btn  btn-info dim"> Guardar <i class="fa fa-heart"></i></button>                
            </li>
          </ul>
            <div class="tab-content">
              <div id="TABEXAMEN1" class="tab-pane active">
                <div class="panel-body">

                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Glucosa</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="glucosa" name = "glucosa" placeholder="Glucosa">
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
                  <label for="inputEmail3" class="col-sm-0 control-label">70 - 110 mg/dl</label>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Glucosapost</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="glucosapost" name="glucosapost" placeholder="Glucosapost">
                  </div>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Colesteroltotal</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="colesteroltotal" name="colesteroltotal" placeholder="Colesteroltotal">
                  </div>
                  <label for="inputEmail3" class="col-sm-0 control-label">Hasta 200 mg/dl</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Triglicerido</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="triglicerido" name="triglicerido" placeholder="Triglicerido">
                  </div>
                  <label for="inputEmail3" class="col-sm-0 control-label">Hasta 150 mg/dl</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Acidourico</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="acidourico" name="acidourico" placeholder="Acidourico">
                  </div>
                  <label for="inputEmail3" class="col-sm-0 control-label">M: 2.0 – 6.0 mg/dl, H: 3.4 – 7.0 mg/dl</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Creatinina</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="creatinina" name="creatinina" placeholder="Creatinina">
                  </div>
                  <label for="inputEmail3" class="col-sm-0 control-label">0.6 - 1.2 mg/dl</label>
                </div>

                </div>
              </div>

              <div id="TABEXAMEN2" class="tab-pane">
                <div class="panel-body">
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nitrogeno Ureico</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="nitrogenoureico" name="nitrogenoureico" placeholder="Nitrogeno Ureico">
                  </div>
                  <label for="inputEmail3" class="col-sm-0 control-label">7.0 - 21.0 mg/dl</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Urea</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="urea" name="urea" placeholder="Urea">
                  </div>
                  <label for="inputEmail3" class="col-sm-0 control-label">15.0 - 45.0 mg/dl</label>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Observaciones</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones">
                  </div>
                </div>



                </div>
              </div>
              <div id="TABEXAMEN4" class="tab-pane">
                <div class="panel-body">
                </div>
              </div>
              <div id="TABEXAMEN5" class="tab-pane">
                <div class="panel-body">
                </div>
              </div>
              <div id="TABEXAMEN6" class="tab-pane">
                <div class="panel-body">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>