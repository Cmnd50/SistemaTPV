<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estado */

$this->title = 'Actualizar Estado: ' . $model->IdEstado;
$this->params['breadcrumbs'][] = ['label' => 'Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdEstado, 'url' => ['view', 'id' => $model->IdEstado]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
