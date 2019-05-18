<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indicadorprocedimiento */

$this->title = 'Actualizar Signos Vitales de Procedimiento: ' . $model->IdConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Signos Vitales de Procedimiento', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Signos Vitales de Procedimiento '.$model->IdConsulta, 'url' => ['view', 'id' => $model->IdIndicadorProcedimiento]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
