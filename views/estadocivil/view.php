<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estadocivil */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Estado Civil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
  <?php if (Yii::$app->session->hasFlash('success')): ?>
  <?php
      $session = \Yii::$app->getSession();
      $session->setFlash('success', "Se a guardado con Exito!"); ?>
      <?= \odaialali\yii2toastr\ToastrFlash::widget([
    'options' => [
        "closeButton"=> true,
        "debug" =>  false,
        "progressBar" => true,
        "preventDuplicates" => true,
        "positionClass" => 'toast-top-right',
        "onclick" => null,
        "showDuration" => '100',
        "hideDuration" => '1000',
        "timeOut" => '2000',
        "extendedTimeOut" => '100',
        "showEasing" => 'swing',
        "hideEasing" => 'linear',
        "showMethod" => 'fadeIn',
        "hideMethod" => 'fadeOut'
        ]
    ]);?>
  <?php endif; ?>
  <?php if (Yii::$app->session->hasFlash('warning')): ?>
  <?php
      $session = \Yii::$app->getSession();
      $session->setFlash('warning', "Se a actualizado con Exito!"); ?>
      <?= \odaialali\yii2toastr\ToastrFlash::widget([
    'options' => [
        "closeButton"=> true,
        "debug" =>  false,
        "progressBar" => true,
        "preventDuplicates" => true,
        "positionClass" => 'toast-top-right',
        "onclick" => null,
        "showDuration" => '100',
        "hideDuration" => '1000',
        "timeOut" => '2000',
        "extendedTimeOut" => '100',
        "showEasing" => 'swing',
        "hideEasing" => 'linear',
        "showMethod" => 'fadeIn',
        "hideMethod" => 'fadeOut'
        ]
    ]);?>
  <?php endif; ?>

    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
             <?= Html::a('Actualizar', ['update', 'id' => $model->IdEstadoCivil], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'IdEstadoCivil',
            'Nombre',
                    ],
                ]) ?>
            </table>
          </div>
      </div>
    </div>
</div>
