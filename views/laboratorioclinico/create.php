<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Listaexamen */

$this->title = 'Crear Listaexamen';
$this->params['breadcrumbs'][] = ['label' => 'Listaexamens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
