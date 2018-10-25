<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Factor */

$this->title = 'Actualizar Factor: ' . $model->IdFactor;
$this->params['breadcrumbs'][] = ['label' => 'Factors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdFactor, 'url' => ['view', 'id' => $model->IdFactor]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
