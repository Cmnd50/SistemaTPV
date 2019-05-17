<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Persona;
use app\models\Motivoprocedimiento;
use app\models\Modulo;
use app\models\Usuario;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use kartik\money\MaskMoney;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Enfermeriaprocedimiento */
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
     <?php echo $form->field($model, 'IdPersona')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Persona::find()->all(), 'IdPersona', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => ' Selecione ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

     <?= $form->field($model, 'FechaProcedimiento')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9999-99-99',
    ]) ?>

    <?= $form->field($model, 'Observaciones')->textarea(['rows' => 6]) ?>

     <?php echo $form->field($model, 'IdMotivoProcedimiento')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Motivoprocedimiento::find()->all(), 'IdMotivoProcedimiento', 'Nombre'),
        'language' => 'es',
        'options' => ['placeholder' => ' Selecione ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

     <?php echo $form->field($model, 'IdUsuario')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Usuario::find()->all(), 'IdUsuario', 'FullName'),
        'language' => 'es',
        'options' => ['placeholder' => ' Selecione ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

         <?php echo $form->field($model, 'IdModulo')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Modulo::find()->all(), 'IdModulo', 'NombreModulo'),
        'language' => 'es',
        'options' => ['placeholder' => ' Selecione ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'Procedimientoimaurl')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'Estado')->checkbox(['maxlength' => true]) ?>
   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>
