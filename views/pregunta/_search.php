<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PreguntaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pregunta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'IdPregunta') ?>

    <?= $form->field($model, 'IdFactor') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'Ponderacion') ?>

    <?php // echo $form->field($model, 'Activo')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

</div>
