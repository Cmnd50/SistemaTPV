<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pregunta */

$this->title = 'Crear Pregunta';
$this->params['breadcrumbs'][] = ['label' => 'Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
