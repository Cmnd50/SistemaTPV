<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Receta */

$this->title = 'Crear Receta';
$this->params['breadcrumbs'][] = ['label' => 'Recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
