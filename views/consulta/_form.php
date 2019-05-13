<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Consulta */
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
        <?= $form->field($model, 'IdUsuario')->textInput() ?>

    <?= $form->field($model, 'IdPersona')->textInput() ?>

    <?= $form->field($model, 'IdModulo')->textInput() ?>

    <?= $form->field($model, 'Diagnostico')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Comentarios')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Otros')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'IdEnfermedad')->textInput() ?>

    <?= $form->field($model, 'FechaConsulta')->textInput() ?>

    <?= $form->field($model, 'Activo')->textInput() ?>

    <?= $form->field($model, 'IdEstado')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'EstadoNutricional')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'CirugiasPrevias')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'MedicamentosActuales')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ExamenFisica')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'PlanTratamiento')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'FechaProxVisita')->textInput() ?>

    <?= $form->field($model, 'Alergias')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Consultaimaurl')->textInput(['maxlength' => true]) ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>
