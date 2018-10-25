<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pregunta */

$this->title = 'Actualizar Pregunta: ' . $model->IdPregunta;
$this->params['breadcrumbs'][] = ['label' => 'Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdPregunta, 'url' => ['view', 'id' => $model->IdPregunta]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
