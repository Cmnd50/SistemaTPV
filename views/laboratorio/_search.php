<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratorioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laboratorio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'IdLaboratorio') ?>

    <?= $form->field($model, 'NombreLaboratorio') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

</div>
