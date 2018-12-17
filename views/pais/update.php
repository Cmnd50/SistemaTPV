<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pais */

$this->title = 'Actualizar Pais: ' . $model->IdPais;
$this->params['breadcrumbs'][] = ['label' => 'Pais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdPais, 'url' => ['view', 'id' => $model->IdPais]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
