<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indicador */

$this->title = 'Actualizar Signos Vitales de Consulta: ' . $model->IdConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Signos Vitales de Consulta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Signos Vitales de Consulta '.$model->IdConsulta, 'url' => ['view', 'id' => $model->IdIndicador]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
