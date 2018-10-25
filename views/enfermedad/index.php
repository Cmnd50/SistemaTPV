<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnfermedadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enfermedads';
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
           <?= Html::a('Ingresar Enfermedad', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                                    <?= GridView::widget([
                      'dataProvider' => $dataProvider,
                        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                          // 'IdEnfermedad',
                          'Codigo',
                          'Numero',
                          'Nombre',
                          'IdTipoDiagnostico',
                              ['class' => 'yii\grid\ActionColumn',
                               'options' => ['style' => 'width:100px;'],
                               'template' => " {view} {update} {delete} "
                              ],
                          ],
                      ]); ?>
                                  </table>
          </div>
      </div>
    </div>
</div>
