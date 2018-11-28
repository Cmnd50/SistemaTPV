<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipodiagnostico */

$this->title = 'Actualizar Tipo Diagnostico: ' . $model->NombreDiagnostico;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NombreDiagnostico, 'url' => ['view', 'id' => $model->IdTipoDiagnostico]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
