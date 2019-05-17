<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Indicador */

$this->title = 'Crear Indicador';
$this->params['breadcrumbs'][] = ['label' => 'Indicadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
