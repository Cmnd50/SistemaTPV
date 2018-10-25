<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipodiagnostico */

$this->title = 'Actualizar Tipodiagnostico: ' . $model->IdTipoDiagnostico;
$this->params['breadcrumbs'][] = ['label' => 'Tipodiagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdTipoDiagnostico, 'url' => ['view', 'id' => $model->IdTipoDiagnostico]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
