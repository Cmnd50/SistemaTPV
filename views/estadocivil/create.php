<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estadocivil */

$this->title = 'Crear Estadocivil';
$this->params['breadcrumbs'][] = ['label' => 'Estadocivils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
