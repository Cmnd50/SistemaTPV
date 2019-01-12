<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><?= Html::encode($this->title) ?></h5>
      </div>
<div class="ibox-content">
  <?php $form = ActiveForm::begin(); ?>
  <form class="form-horizontal">
  <div class="form-group">
        <?= $form->field($model, 'Nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FechaNacimiento')->textInput() ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdGeografia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Genero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdEstadoCivil')->textInput() ?>

    <?= $form->field($model, 'IdParentesco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Alergias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Medicamentos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Enfermedad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Dui')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TelefonoResponsable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdEstado')->textInput() ?>

    <?= $form->field($model, 'Categoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NombresResponsable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ApellidosResponsable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Parentesco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DuiResponsable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdPais')->textInput() ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>
