<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tipodiagnostico */

$this->title = 'Crear Tipo Diagnostico';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
