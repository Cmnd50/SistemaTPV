<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Limpiartablas */

$this->title = 'Crear Limpiartablas';
$this->params['breadcrumbs'][] = ['label' => 'Limpiartablas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
