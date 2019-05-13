<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Consulta */

$this->title = 'Crear Consulta';
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
