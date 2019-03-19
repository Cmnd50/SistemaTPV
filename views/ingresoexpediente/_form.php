<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\MaskedInput;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Geografia;
use app\models\Estadocivil;
use app\models\Pais;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use kartik\money\MaskMoney;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\persona */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><?= Html::encode($this->title) ?></h5>
      </div>
<div class="ibox-content">
  <?php $form = ActiveForm::begin(); ?>
  <form class="form-horizontal">
 <strong><h1> DATOS GENERALES</h1> </strong>
  </br></br>
  <div class="form-group">
  <div class="col-lg-6">
    <?= $form->field($model, 'Nombres')->textInput(['maxlength' => true]) ?>
 </div>
 <div class="col-lg-6">
 <?= $form->field($model, 'Apellidos')->textInput(['maxlength' => true]) ?>

 </div>
 </div>
 <div class="form-group">
      <div class="col-lg-6">  
       <?= $form->field($model, 'FechaNacimiento')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '9999-99-99',
        ]) ?>
     </div>
      <div class="col-lg-6"> 
        <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>
     </div>
 </div>

 <div class="form-group">
      <div class="col-lg-6">  
       <?= $form->field($model, 'Correo')->textInput(['maxlength' => true]) ?>
     </div>
      <div class="col-lg-6"> 
            <?php echo $form->field($model, 'Genero')->dropDownList(['Masculino' => 'Masculino', 'Femenino' => 'Femenino']); ?>
     </div>
 </div>

 <div class="form-group">
      <div class="col-lg-6">  
           <?php
        echo $form->field($model, 'IdEstadoCivil')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Estadocivil::find()->all(), 'IdEstadoCivil', 'Nombre'),
            'language' => 'es',
            'options' => ['placeholder' => ' Selecione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
     </div>
      <div class="col-lg-6"> 
            <?= $form->field($model, 'Telefono')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9999-9999',
    ]) ?>
     </div>
 </div>

 <div class="form-group">
      <div class="col-lg-6">  
            <?= $form->field($model, 'Celular')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9999-9999',
            ]) ?>
     </div>
      <div class="col-lg-6"> 
                <?= $form->field($model, 'Dui')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99999999-9',
            ]) ?>
     </div>
 </div>
  <div class="form-group">
      <div class="col-lg-6">  
            <?php
                echo $form->field($model, 'IdPais')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Pais::find()->all(), 'IdPais', 'NombrePais'),
                    'language' => 'es',
                    'options' => ['placeholder' => ' Selecione ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>
     </div>
      <div class="col-lg-6"> 
       <?php echo $form->field($model, 'Categoria')->dropDownList(['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D']);?> 
     </div>
 </div>

<strong><h1>DATOS MEDICOS</h1></strong>
</br></br>
 <div class="form-group">
      <div class="col-lg-6">  
        <?= $form->field($model, 'Medicamentos')->textInput(['maxlength' => true]) ?>
     </div>
      <div class="col-lg-6"> 
      <?= $form->field($model, 'Enfermedad')->textInput(['maxlength' => true]) ?>
     </div>
 </div>
     
 <div class="form-group">
      <div class="col-lg-12">  
    <?= $form->field($model, 'Alergias')->textInput(['maxlength' => true]) ?>
     </div>

 </div>


<strong><h1>DATOS DE RESPONSABLE</h1></strong>
</br></br>
 <div class="form-group">
      <div class="col-lg-6">  
        <?= $form->field($model, 'NombresResponsable')->textInput(['maxlength' => true]) ?>
     </div>
      <div class="col-lg-6"> 
      <?= $form->field($model, 'ApellidosResponsable')->textInput(['maxlength' => true]) ?>
     </div>
 </div>
     
 <div class="form-group">
      <div class="col-lg-6">  
    <?php echo $form->field($model, 'Parentesco')->dropDownList(['ESPOSO' => 'ESPOSO', 'ESPOSA' => 'ESPOSA', 'MADRE' => 'MADRE', 'PADRE' => 'PADRE', 'ABUELO' => 'ABUELO', 'ABUELA' => 'ABUELA', 'TIO' => 'TIO', 'TIA' => 'TIA', 'HERMANO' => 'HERMANO', 'HERMANA' => 'HERMANA', 'PRIMO' => 'PRIMO', 'PRIMA' => 'PRIMA', 'NINGUNO' => 'NINGUNO']);?>
     </div>
      <div class="col-lg-6"> 
           <?= $form->field($model, 'DuiResponsable')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '99999999-9',
    ]) ?>
     </div>
 </div>
  <div class="form-group">
      <div class="col-lg-12">  
    <?= $form->field($model, 'TelefonoResponsable')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9999-9999',
    ]) ?>
     </div>
 </div>

    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>
