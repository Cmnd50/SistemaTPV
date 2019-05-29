<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecetasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdReceta') ?>

    <?= $form->field($model, 'IdUsuario') ?>

    <?= $form->field($model, 'IdPersona') ?>

    <?= $form->field($model, 'IdConsulta') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?php // echo $form->field($model, 'Activo') ?>

    <?php // echo $form->field($model, 'Comentarios') ?>

    <?php // echo $form->field($model, 'Consultaimaurl') ?>

    <?php // echo $form->field($model, 'IPServer') ?>

    <?php // echo $form->field($model, 'UnidadServer') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
