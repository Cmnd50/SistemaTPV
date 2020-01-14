<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Limpiartablas */

$this->title = 'Actualizar: ' . $model->IdLimpiarTabla;
$this->params['breadcrumbs'][] = ['label' => 'Limpiartablas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdLimpiarTabla, 'url' => ['view', 'id' => $model->IdLimpiarTabla]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
</div>