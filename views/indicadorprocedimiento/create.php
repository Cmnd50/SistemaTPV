<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Indicadorprocedimiento */

$this->title = 'Crear Indicadorprocedimiento';
$this->params['breadcrumbs'][] = ['label' => 'Indicadorprocedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
