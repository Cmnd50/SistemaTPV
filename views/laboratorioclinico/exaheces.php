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
  
  $this->title = 'Examen de Heces';
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Color</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="color" name = "color" placeholder="Color">
                  </div>
                  <div class="col-sm-10 hidden">
                    <input type="text" class="form-control" id="idconsulta" name = "idconsulta" value="<?php echo $idconsulta ?>" placeholder="Globulos Rojos">
                  </div>
                  <div class="col-sm-10 hidden">
                    <input type="text" class="form-control" id="idpersona" name = "idpersona" value="<?php echo $idpersona ?>" placeholder="Globulos Rojos">
                  </div>
                  <div class="col-sm-10 hidden">
                    <input type="text" class="form-control" id="idlistaexamen" name = "idlistaexamen" value="<?php echo $idlistaexamen ?>" placeholder="Globulos Rojos">
                  </div>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Consistencia</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="consistencia" name="consistencia" placeholder="Consistencia">
                  </div>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Mucus</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="mucus" name="mucus" placeholder="mucus">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Hematies</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="hematies" name="hematies" placeholder="Hematies">
                  </div>
                </div>

                </div>
              </div>

              <div id="TABEXAMEN2" class="tab-pane">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Leucocitos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="leucocitos" name="leucocitos" placeholder="Leucocitos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Restosalimenticios</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="restosalimenticios" name="restosalimenticios" placeholder="Restosalimenticios">
                  </div>
                </div>
                     <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Macroscopicos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="macroscopicos" name="macroscopicos" placeholder="macroscopicos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Microscopicos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="microscopicos" name="microscopicos" placeholder="Microscopicos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Flora Bacteriana</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="florabacteriana" name="florabacteriana" placeholder="Florabacteriana">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Otros</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="otros" name="otros" placeholder="Otros">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">pactivos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pactivos" name="pactivos" placeholder="Pactivos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pquistes</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pquistes" name="pquistes" placeholder="Pquistes">
                  </div>
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