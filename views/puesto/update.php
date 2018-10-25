<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Puesto */

$this->title = 'Actualizar Puesto: ' . $model->idPuesto;
$this->params['breadcrumbs'][] = ['label' => 'Puestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPuesto, 'url' => ['view', 'id' => $model->idPuesto]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
