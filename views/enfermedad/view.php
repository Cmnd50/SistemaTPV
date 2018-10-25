<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Enfermedad */

$this->title = $model->IdEnfermedad;
$this->params['breadcrumbs'][] = ['label' => 'Enfermedads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
             <?= Html::a('Actualizar', ['update', 'id' => $model->IdEnfermedad], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'IdEnfermedad',
                        'Codigo',
                        'Numero',
                        'Nombre',
                        'IdTipoDiagnostico',
                    ],
                ]) ?>
            </table>
          </div>
      </div>
    </div>
</div>
