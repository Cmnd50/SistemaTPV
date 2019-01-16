<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConsultamedicoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consulta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdConsulta') ?>

    <?= $form->field($model, 'IdUsuario') ?>

    <?= $form->field($model, 'IdPersona') ?>

    <?= $form->field($model, 'IdModulo') ?>

    <?= $form->field($model, 'Diagnostico') ?>

    <?php // echo $form->field($model, 'Comentarios') ?>

    <?php // echo $form->field($model, 'Otros') ?>

    <?php // echo $form->field($model, 'IdEnfermedad') ?>

    <?php // echo $form->field($model, 'FechaConsulta') ?>

    <?php // echo $form->field($model, 'Activo') ?>

    <?php // echo $form->field($model, 'IdEstado') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'EstadoNutricional') ?>

    <?php // echo $form->field($model, 'CirugiasPrevias') ?>

    <?php // echo $form->field($model, 'MedicamentosActuales') ?>

    <?php // echo $form->field($model, 'ExamenFisica') ?>

    <?php // echo $form->field($model, 'PlanTratamiento') ?>

    <?php // echo $form->field($model, 'FechaProxVisita') ?>

    <?php // echo $form->field($model, 'Alergias') ?>

<div class="form-group">
          <?php if($_SESSION['IdIdioma'] == 1) {?>
                      <?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
        <?php } else{ ?> 
                     <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>

        <?php } ?>
</div> 

    <?php ActiveForm::end(); ?>

</div>
