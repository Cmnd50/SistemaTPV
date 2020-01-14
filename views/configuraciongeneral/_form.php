<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Configuraciongeneral */
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
        <?= $form->field($model, 'IpServidora')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'NombreCarpeta')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'UnidadServer')->textInput(['maxlength' => true]) ?>

      </div>
      <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
      </div>

      <?php ActiveForm::end(); ?>
    </form>
  </div>
</div>