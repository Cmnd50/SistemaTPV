<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConsultapacienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'IdPersona') ?>

    <?= $form->field($model, 'Nombres') ?>

    <?= $form->field($model, 'Apellidos') ?>

    <?= $form->field($model, 'FechaNacimiento') ?>

    <?= $form->field($model, 'Direccion') ?>

    <?php // echo $form->field($model, 'Correo') ?>

    <?php // echo $form->field($model, 'IdGeografia') ?>

    <?php // echo $form->field($model, 'Genero') ?>

    <?php // echo $form->field($model, 'IdEstadoCivil') ?>

    <?php // echo $form->field($model, 'IdParentesco') ?>

    <?php // echo $form->field($model, 'Telefono') ?>

    <?php // echo $form->field($model, 'Celular') ?>

    <?php // echo $form->field($model, 'Alergias') ?>

    <?php // echo $form->field($model, 'Medicamentos') ?>

    <?php // echo $form->field($model, 'Enfermedad') ?>

    <?php // echo $form->field($model, 'Dui') ?>

    <?php // echo $form->field($model, 'TelefonoResponsable') ?>

    <?php // echo $form->field($model, 'IdEstado') ?>

    <?php // echo $form->field($model, 'Categoria') ?>

    <?php // echo $form->field($model, 'NombresResponsable') ?>

    <?php // echo $form->field($model, 'ApellidosResponsable') ?>

    <?php // echo $form->field($model, 'Parentesco') ?>

    <?php // echo $form->field($model, 'DuiResponsable') ?>

    <?php // echo $form->field($model, 'IdPais') ?>
 -->
<!--     <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

</div>
