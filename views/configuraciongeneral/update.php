<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Configuraciongeneral */

$this->title = 'Actualizar Configuracion General: ' . $model->IdConfiguracionGeneral;
$this->params['breadcrumbs'][] = ['label' => 'Configuracion General', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Configuracion General '. $model->IdConfiguracionGeneral, 'url' => ['view', 'id' => $model->IdConfiguracionGeneral]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
