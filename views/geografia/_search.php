<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GeografiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="geografia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdGeografia') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'IdPadre') ?>

    <?= $form->field($model, 'Nivel') ?>

    <?= $form->field($model, 'Jerarquia') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
