
<?php if (Yii::$app->session->hasFlash("error")): ?>
<?php
    $session = \Yii::$app->getSession();
    $session->setFlash("error", "Se a eliminado con Exito!"); ?>
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
<?php endif; ?> <?php



use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IndicadorprocedimientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrador de Signos Vitales por Procedimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                                    <?= GridView::widget([
                      'dataProvider' => $dataProvider,
                      'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                          //'IdIndicadorProcedimiento',
                          'IdEnfermeriaProcedimiento',
                          [
                             'attribute' => 'Paciente',
                             'value' => function ($model) {
                                  include '../include/dbconnect.php';
                                  $querypaciente = "SELECT concat(p.Nombres,' ',p.Apellidos ) as 'NOMBRE' FROM enfermeriaprocedimiento c 
                                                        INNER JOIN persona p on c.IdPersona = p.IdPersona
                                                         WHERE c.IdEnfermeriaProcedimiento = '$model->IdEnfermeriaProcedimiento'";
                                  $resultadopaciente = $mysqli->query($querypaciente);
                                  while ($test = $resultadopaciente->fetch_assoc())
                                             {
                                                 $nombre = $test['NOMBRE'];
                                             }
                                    return $nombre;
                               }
                            ] ,
                          'Peso',
                           [
                               'attribute' => 'UnidadPeso',
                               'value' => function ($model) {
                                if($model->UnidadPeso = 0){
                                  return 'KG';
                                }else{
                                  return 'LB';
                                }
                               }
                            ] ,
                          'Altura',
                          [
                               'attribute' => 'UnidadAltura',
                               'value' => function ($model) {
                                if($model->UnidadAltura = 0){
                                  return 'MTS';
                                }else{
                                  return 'CMS';
                                }
                               }
                            ] ,
                          'Temperatura',
                          [
                               'attribute' => 'UnidadTemperatura',
                               'value' => function ($model) {
                                if($model->UnidadTemperatura = 0){
                                  return 'C';
                                }else{
                                  return 'F';
                                }
                               }
                            ] ,
                          // 'Pulso',
                          // 'PresionMax',
                          // 'PresionMin',
                          // 'Observaciones:ntext',
                          // 'PeriodoMeunstral',
                          // 'Glucotex',
                          // 'PC',
                          // 'PT',
                          // 'PA',
                          // 'FR',
                          // 'PAP',
                          // 'Motivo:ntext',
                              ['class' => 'yii\grid\ActionColumn',
                               'options' => ['style' => 'width:100px;'],
                               'template' => " {view} {update} {delete} "
                              ],
                          ],
                      ]); ?>
                                  </table>
          </div>
      </div>
    </div>
</div>
