<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Configuraciongeneral */

$this->title = 'Actualizar Configuraciongeneral: ' . $model->IdConfiguracionGeneral;
$this->params['breadcrumbs'][] = ['label' => 'Configuraciongenerals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdConfiguracionGeneral, 'url' => ['view', 'id' => $model->IdConfiguracionGeneral]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
