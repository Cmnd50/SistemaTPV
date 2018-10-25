<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Laboratorio */

$this->title = 'Actualizar Laboratorio: ' . $model->IdLaboratorio;
$this->params['breadcrumbs'][] = ['label' => 'Laboratorios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdLaboratorio, 'url' => ['view', 'id' => $model->IdLaboratorio]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
