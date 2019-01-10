<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Listaexamen */

$this->title = 'Actualizar Listaexamen: ' . $model->IdListaExamen;
$this->params['breadcrumbs'][] = ['label' => 'Listaexamens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdListaExamen, 'url' => ['view', 'id' => $model->IdListaExamen]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
