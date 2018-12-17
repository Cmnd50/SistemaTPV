<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Modulo */

$this->title = 'Actualizar Modulo: ' . $model->IdModulo;
$this->params['breadcrumbs'][] = ['label' => 'Modulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdModulo, 'url' => ['view', 'id' => $model->IdModulo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
