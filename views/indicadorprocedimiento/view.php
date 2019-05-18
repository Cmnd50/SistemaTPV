<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Indicadorprocedimiento */

$this->title = 'Signos Vitales de Procedimiento '.$model->IdConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Signos Vitales de Procedimiento', 'url' => ['index']];
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
        <p align="right">
             <?= Html::a('Actualizar', ['update', 'id' => $model->IdIndicadorProcedimiento], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'IdIndicadorProcedimiento',
                        'IdEnfermeriaProcedimiento',
                        'Peso',
                        [
                         'attribute' => 'UnidadPeso',
                         'value' => (($model->UnidadPeso ==1) ? "KG": (($model->UnidadPeso ==2)? "LB" : "General Voucher")),
                        ],
                        'Altura',
                        [
                         'attribute' => 'UnidadAltura',
                         'value' => (($model->UnidadAltura ==1) ? "MTS": (($model->UnidadAltura ==2)? "CMS" : "General Voucher")),
                        ],
                        'Temperatura',
                        [
                         'attribute' => 'UnidadTemperatura',
                         'value' => (($model->UnidadTemperatura ==1) ? "C": (($model->UnidadTemperatura ==2)? "F" : "General Voucher")),
                        ],
                        'Pulso',
                        'PresionMax',
                        'PresionMin',
                        'Observaciones:ntext',
                        'PeriodoMeunstral',
                        'Glucotex',
                        'PC',
                        'PT',
                        'PA',
                        'FR',
                        'PAP',
                        'Motivo:ntext',
                    ],
                ]) ?>
            </table>
          </div>
      </div>
    </div>
</div>
