<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indicador */

$this->title = 'Actualizar Indicador: ' . $model->IdIndicador;
$this->params['breadcrumbs'][] = ['label' => 'Indicadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdIndicador, 'url' => ['view', 'id' => $model->IdIndicador]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
