<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Indicadorprocedimiento */
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
        <?= $form->field($model, 'IdEnfermeriaProcedimiento')->textInput() ?>

    <?= $form->field($model, 'Peso')->textInput() ?>

    <?= $form->field($model, 'UnidadPeso')->textInput() ?>

    <?= $form->field($model, 'Altura')->textInput() ?>

    <?= $form->field($model, 'UnidadAltura')->textInput() ?>

    <?= $form->field($model, 'Temperatura')->textInput() ?>

    <?= $form->field($model, 'UnidadTemperatura')->textInput() ?>

    <?= $form->field($model, 'Pulso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PresionMax')->textInput() ?>

    <?= $form->field($model, 'PresionMin')->textInput() ?>

    <?= $form->field($model, 'Observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'PeriodoMeunstral')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Glucotex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PAP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Motivo')->textarea(['rows' => 6]) ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>
