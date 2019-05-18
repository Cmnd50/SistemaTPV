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

    <div class="row">
        <div class="form-group col-lg-3">
             <?= $form->field($model, 'Peso')->textInput() ?>
        </div>
        <div class="form-group col-lg-3">
            <?php echo $form->field($model, 'UnidadPeso')->dropDownList(['1' => 'KG', '2' => 'LB']); ?>
        </div>
        <div class="form-group col-lg-3">
             <?= $form->field($model, 'Altura')->textInput() ?>
        </div>
        <div class="form-group col-lg-3">
            <?php echo $form->field($model, 'UnidadAltura')->dropDownList(['1' => 'MTS', '2' => 'CMS']); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-3">
             <?= $form->field($model, 'Temperatura')->textInput() ?>
        </div>
        <div class="form-group col-lg-3">
             <?php echo $form->field($model, 'UnidadAltura')->dropDownList(['1' => 'C', '2' => 'F']); ?>
        </div>
        <div class="form-group col-lg-6">
             <?= $form->field($model, 'Pulso')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
             <?= $form->field($model, 'PresionMax')->textInput() ?>
        </div>
        <div class="form-group col-lg-6">
             <?= $form->field($model, 'PresionMin')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-12">
             <?= $form->field($model, 'Observaciones')->textarea(['rows' => 4]) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-3">
         <?= $form->field($model, 'PeriodoMeunstral')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9999-99-99',
            ]) ?>
        </div>
        <div class="form-group col-lg-3">
             <?= $form->field($model, 'Glucotex')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group col-lg-3">
             <?= $form->field($model, 'Glucotex')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group col-lg-3">
            <?= $form->field($model, 'PC')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-3">
             <?= $form->field($model, 'PT')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group col-lg-3">
             <?= $form->field($model, 'PA')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group col-lg-3">
             <?= $form->field($model, 'FR')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group col-lg-3">
            <?= $form->field($model, 'PAP')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <?= $form->field($model, 'Motivo')->textarea(['rows' => 4]) ?>


   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>
