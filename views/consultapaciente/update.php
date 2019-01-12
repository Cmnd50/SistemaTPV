
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consulta */

$this->title = 'Actualizar estado de Consulta: ' . $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullName];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
