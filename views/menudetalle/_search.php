<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MenudetalleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menudetalle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

     <!-- <?= $form->field($model, 'IdMenuDetalle') ?>

    <?= $form->field($model, 'IdMenu') ?>

    <?= $form->field($model, 'DescripcionMenuDetalle') ?>

    <?= $form->field($model, 'Url') ?>

    <?= $form->field($model, 'Icono') ?> 

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

</div>
