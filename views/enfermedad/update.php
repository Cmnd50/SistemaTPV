<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enfermedad */

$this->title = 'Actualizar Enfermedad: ' . $model->IdEnfermedad;
$this->params['breadcrumbs'][] = ['label' => 'Enfermedads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdEnfermedad, 'url' => ['view', 'id' => $model->IdEnfermedad]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
