<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Menudetalle */

$this->title = 'Crear Menudetalle';
$this->params['breadcrumbs'][] = ['label' => 'Menudetalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
