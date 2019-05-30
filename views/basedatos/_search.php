<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BasedatosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="limpiartablas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdLimpiarTabla') ?>

    <?= $form->field($model, 'Query') ?>

    <?= $form->field($model, 'Orden') ?>

    <?= $form->field($model, 'Activo') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
