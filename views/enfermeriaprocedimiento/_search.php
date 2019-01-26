<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Persona;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\ConsultapacienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<?php echo $form->field($model, 'IdPersona')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Persona::find()->where([
                '=','IdEstado', 4])->all(), 'IdPersona', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => ' Selecione ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?= $form->field($model, 'Dui') ?>
<div class="form-group">
          <?php if($_SESSION['IdIdioma'] == 1) {?>
                      <?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
        <?php } else{ ?> 
                     <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>

        <?php } ?>
</div> 

    <?php ActiveForm::end(); ?>


</div>
