<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Marca */

$this->title = 'Crear Marca';
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
