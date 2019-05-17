<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indicadorprocedimiento */

$this->title = 'Actualizar Indicadorprocedimiento: ' . $model->IdIndicadorProcedimiento;
$this->params['breadcrumbs'][] = ['label' => 'Indicadorprocedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdIndicadorProcedimiento, 'url' => ['view', 'id' => $model->IdIndicadorProcedimiento]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
