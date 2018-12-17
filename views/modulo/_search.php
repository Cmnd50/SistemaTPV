<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModuloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdModulo') ?>

    <?= $form->field($model, 'NombreModulo') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'Activo')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
