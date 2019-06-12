<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Persona;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use kartik\money\MaskMoney;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\ConsultapacienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<div class="form-group">
  <div class="col-lg-4">
    <?php echo $form->field($model, 'IdPersona')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Persona::find()->all(), 'IdPersona', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => ' Selecione ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
 </div>
 <div class="col-lg-3">
 <?= $form->field($model, 'Dui')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99999999-9',
            ]) ?>
 </div>
  <div class="col-lg-3">
 <?= $form->field($model, 'DuiResponsable')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '99999999-9',
    ]) ?>
 </div>
   <div class="col-lg-2">
 <?= $form->field($model, 'CodigoPaciente')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9999999',
    ]) ?>
 </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
</div> 




    <?php ActiveForm::end(); ?>


</div>