<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menuusuario */

$this->title = 'Actualizar Menuusuario: ' . $model->IdMenuUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Menuusuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMenuUsuario, 'url' => ['view', 'id' => $model->IdMenuUsuario]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
</div>