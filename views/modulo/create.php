<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Modulo */

$this->title = 'Crear Modulo';
$this->params['breadcrumbs'][] = ['label' => 'Modulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
