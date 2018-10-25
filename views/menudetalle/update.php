<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menudetalle */

$this->title = 'Actualizar Menudetalle: ' . $model->IdMenuDetalle;
$this->params['breadcrumbs'][] = ['label' => 'Menudetalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMenuDetalle, 'url' => ['view', 'id' => $model->IdMenuDetalle]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
