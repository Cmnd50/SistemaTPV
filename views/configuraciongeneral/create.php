<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Configuraciongeneral */

$this->title = 'Crear Configuraciongeneral';
$this->params['breadcrumbs'][] = ['label' => 'Configuraciongenerals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
