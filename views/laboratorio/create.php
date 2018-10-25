<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Laboratorio */

$this->title = 'Crear Laboratorio';
$this->params['breadcrumbs'][] = ['label' => 'Laboratorios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
