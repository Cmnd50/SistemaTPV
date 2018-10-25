<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnfermedadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enfermedad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<!--
    <?= $form->field($model, 'IdEnfermedad') ?>

    <?= $form->field($model, 'Codigo') ?>

    <?= $form->field($model, 'Numero') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'IdTipoDiagnostico') ?> -->
<!--
    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

</div>
