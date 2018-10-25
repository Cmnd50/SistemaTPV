<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estado */

$this->title = 'Crear Estado';
$this->params['breadcrumbs'][] = ['label' => 'Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
