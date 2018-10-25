<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Enfermedad */

$this->title = 'Crear Enfermedad';
$this->params['breadcrumbs'][] = ['label' => 'Enfermedads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
