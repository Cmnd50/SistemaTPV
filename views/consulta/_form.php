<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Persona;
use app\models\Motivoprocedimiento;
use app\models\Modulo;
use app\models\Usuario;
use app\models\Enfermedad;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use kartik\money\MaskMoney;
use kartik\file\FileInput;

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
    <div class="row">
        <div class="form-group col-lg-6">
              <?php echo $form->field($model, 'IdUsuario')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Usuario::find()->all(), 'IdUsuario', 'FullName'),
                    'language' => 'es',
                    'options' => ['placeholder' => ' Selecione ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
        </div>
        <div class="form-group col-lg-6">
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
    </div>

    <div class="row">
        <div class="form-group col-lg-6">
           <?php echo $form->field($model, 'IdModulo')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Modulo::find()->all(), 'IdModulo', 'NombreModulo'),
                'language' => 'es',
                'options' => ['placeholder' => ' Selecione ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="form-group col-lg-6">
                 <?= $form->field($model, 'FechaConsulta')->widget(\yii\widgets\MaskedInput::className(), [
                        'mask' => '9999-99-99',
                    ]) ?>
            </div>
    </div>


    <div class="row">
        <div class="form-group col-lg-6">
            <?= $form->field($model, 'Diagnostico')->textarea(['rows' => 4]) ?>
        </div>
        <div class="form-group col-lg-6">
             <?= $form->field($model, 'Comentarios')->textarea(['rows' => 4]) ?>
        </div>
    </div>

  <?php echo $form->field($model, 'IdEnfermedad')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Enfermedad::find()->all(), 'IdEnfermedad', 'FullNameEnfe'),
        'language' => 'es',
        'options' => ['placeholder' => ' Selecione ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="row">
        <div class="form-group col-lg-6">
            <?= $form->field($model, 'Otros')->textarea(['rows' => 4]) ?>
        </div>
        <div class="form-group col-lg-6">
             <?= $form->field($model, 'EstadoNutricional')->textarea(['rows' => 4]) ?>
        </div>
    </div>


    <div class="row">
        <div class="form-group col-lg-6">
             <?= $form->field($model, 'CirugiasPrevias')->textarea(['rows' => 4]) ?>
        </div>
        <div class="form-group col-lg-6">
             <?= $form->field($model, 'MedicamentosActuales')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-6">
             <?= $form->field($model, 'Alergias')->textarea(['rows' => 4]) ?>
        </div>
        <div class="form-group col-lg-6">
             <?= $form->field($model, 'ExamenFisica')->textarea(['rows' => 4]) ?>
        </div>
    </div>


    <div class="row">
        <div class="form-group col-lg-6">
             <?= $form->field($model, 'PlanTratamiento')->textarea(['rows' => 4]) ?>
        </div>
        <div class="form-group col-lg-6">
            <?= $form->field($model, 'FechaProxVisita')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '9999-99-99',
            ]) ?>
        </div>
    </div>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>
