<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = 'Crear Menu';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
