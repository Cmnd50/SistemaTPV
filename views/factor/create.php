<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Factor */

$this->title = 'Crear Factor';
$this->params['breadcrumbs'][] = ['label' => 'Factors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
