<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Respuesta */

$this->title = 'Actualizar Respuesta: ' . $model->IdRespuesta;
$this->params['breadcrumbs'][] = ['label' => 'Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdRespuesta, 'url' => ['view', 'id' => $model->IdRespuesta]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
