<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaboratorioclinicoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="listaexamen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdListaExamen') ?>

    <?= $form->field($model, 'IdUsuario') ?>

    <?= $form->field($model, 'IdConsulta') ?>

    <?= $form->field($model, 'IdPersona') ?>

    <?= $form->field($model, 'IdTipoExamen') ?>

    <?php // echo $form->field($model, 'Activo') ?>

    <?php // echo $form->field($model, 'FechaExamen') ?>

    <?php // echo $form->field($model, 'Indicacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
