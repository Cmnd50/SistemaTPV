<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Geografia */

$this->title = 'Crear Geografia';
$this->params['breadcrumbs'][] = ['label' => 'Geografias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
