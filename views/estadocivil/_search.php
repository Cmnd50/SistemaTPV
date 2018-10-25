<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadocivilSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estadocivil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'IdEstadoCivil') ?>

    <?= $form->field($model, 'Nombre') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

</div>
