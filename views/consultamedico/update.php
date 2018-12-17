<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consulta */

$this->title = 'Actualizar Consulta: ' . $model->IdConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdConsulta, 'url' => ['view', 'id' => $model->IdConsulta]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
