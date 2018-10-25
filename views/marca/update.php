<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Marca */

$this->title = 'Actualizar Marca: ' . $model->IdMarca;
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMarca, 'url' => ['view', 'id' => $model->IdMarca]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
