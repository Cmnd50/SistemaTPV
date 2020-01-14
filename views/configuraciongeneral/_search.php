<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConfiguraciongeneralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configuraciongeneral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdConfiguracionGeneral') ?>

    <?= $form->field($model, 'IpServidora') ?>

    <?= $form->field($model, 'NombreCarpeta') ?>

    <?= $form->field($model, 'UnidadServer') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>