<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Usuario;
use app\models\Menu;
use app\models\MenuDetalle;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\models\Menuusuario */
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
    <?php
       echo $form->field($model, 'IdUsuario')->widget(Select2::classname(), [
           'data' => ArrayHelper::map(Usuario::find()->where(['Activo' => 1])->all(), 'IdUsuario', 'InicioSesion'),
           'language' => 'es',
           'options' => ['placeholder' => ' Selecione ...'],
           'pluginOptions' => [
               'allowClear' => true
           ],
       ]);
       ?>

       <?php
       $catList=ArrayHelper::map(app\models\Menu::find()->where([
                       '>','IdMenu', 0])->all(), 'IdMenu', 'DescripcionMenu' );
       echo $form->field($model, 'IdMenu')->dropDownList($catList, ['id'=>'DescripcionMenu']);

       ?>


       <?php
       echo $form->field($model, 'IdMenuDetalle')->widget(DepDrop::classname(), [
           'options'=>['id'=>'DescripcionMenuDetalle'],
           'pluginOptions'=>[
           'depends'=>['DescripcionMenu'],
            'type' => DepDrop::TYPE_SELECT2,
           'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
           'placeholder'=>'Seleccione...',
           'url'=>  \yii\helpers\Url::to(['menuusuario/subcat'])
           ]
           ]);
       ?>

       <?php
           echo $form->field($model, 'MenuUsuarioActivo')->widget(Select2::classname(), [
               'data' => $data = [
                   "0" => "No",
                   "1" => "Si",

               ],
               'language' => 'es',
               'options' => ['placeholder' => ' Selecione ...'],
               'pluginOptions' => [
                   'allowClear' => true
               ],
           ]);
           ?>

       <!-- <?php
           echo $form->field($model, 'TipoPermiso')->widget(Select2::classname(), [
               'data' => $data = [
                   "1" => "Permiso",

               ],
               'language' => 'es',
               'options' => ['placeholder' => ' Selecione ...'],
               'pluginOptions' => [
                   'allowClear' => true
               ],
           ]);
           ?> -->

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>
