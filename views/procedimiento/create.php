<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Enfermeriaprocedimiento */

$this->title = 'Crear Enfermeriaprocedimiento';
$this->params['breadcrumbs'][] = ['label' => 'Enfermeriaprocedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
