<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Receta */

include '../include/dbconnect.php';
$id = $model->IdReceta;

// CONSULTA PARA OBTENER EL NOMBRE DEL USUARIO
    $queryUsuarios = "SELECT concat(u.Nombres,' ',u.Apellidos ) as 'NOMBRE' FROM receta c 
      INNER JOIN usuario u on c.IdUsuario = u.IdUsuario WHERE c.IdReceta = '$id'";
    $resultadoUsuarios = $mysqli->query($queryUsuarios);
    while ($test = $resultadoUsuarios->fetch_assoc()) {
        $IdUsuario = $test['NOMBRE'];
    }

$this->title = 'Receta: '.$model->IdReceta.'   Consulta: '.$model->IdConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Recetas', 'url' => ['index']];
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
             <?= Html::a('Actualizar', ['update', 'id' => $model->IdReceta], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'IdReceta',
                        'IdConsulta',
                        [
                        'attribute' => 'IdUsuario',
                        'format' => 'raw',
                        'value' => $IdUsuario,
                        ],
                          'persona.FullName',
                          'Fecha',
                          'Activo',
                          'Comentarios',

                                  ],
                              ]) ?>
            </table>
          </div>
      </div>
    </div>
</div>
