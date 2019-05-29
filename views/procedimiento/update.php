<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enfermeriaprocedimiento */

$this->title = 'Actualizar Procedimiento Codigo:' . $model->IdEnfermeriaProcedimiento;
$this->params['breadcrumbs'][] = ['label' => 'Procedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Procedimiento: ' .$model->IdEnfermeriaProcedimiento. ' de '. $model->persona->fullName, 
															   'url' => ['view', 'id' => $model->IdEnfermeriaProcedimiento]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
