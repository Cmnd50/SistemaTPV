<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Geografia */

$this->title = 'Actualizar Geografia: ' . $model->IdGeografia;
$this->params['breadcrumbs'][] = ['label' => 'Geografias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdGeografia, 'url' => ['view', 'id' => $model->IdGeografia]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
