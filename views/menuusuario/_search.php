<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MenuusuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menuusuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'IdMenuUsuario') ?>

    <?= $form->field($model, 'IdMenuDetalle') ?>

    <?= $form->field($model, 'MenuUsuarioActivo') ?>

    <?= $form->field($model, 'IdUsuario') ?>

    <?= $form->field($model, 'IdMenu') ?>

    <?php // echo $form->field($model, 'TipoPermiso') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

</div>