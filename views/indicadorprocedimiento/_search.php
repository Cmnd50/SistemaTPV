<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndicadorprocedimientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicadorprocedimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>



    <?= $form->field($model, 'IdEnfermeriaProcedimiento') ?>



    <?php // echo $form->field($model, 'UnidadAltura') ?>

    <?php // echo $form->field($model, 'Temperatura') ?>

    <?php // echo $form->field($model, 'UnidadTemperatura') ?>

    <?php // echo $form->field($model, 'Pulso') ?>

    <?php // echo $form->field($model, 'PresionMax') ?>

    <?php // echo $form->field($model, 'PresionMin') ?>

    <?php // echo $form->field($model, 'Observaciones') ?>

    <?php // echo $form->field($model, 'PeriodoMeunstral') ?>

    <?php // echo $form->field($model, 'Glucotex') ?>

    <?php // echo $form->field($model, 'PC') ?>

    <?php // echo $form->field($model, 'PT') ?>

    <?php // echo $form->field($model, 'PA') ?>

    <?php // echo $form->field($model, 'FR') ?>

    <?php // echo $form->field($model, 'PAP') ?>

    <?php // echo $form->field($model, 'Motivo') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
