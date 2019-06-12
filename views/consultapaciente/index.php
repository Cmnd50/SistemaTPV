
<?php if (Yii::$app->session->hasFlash("error")): ?>
<?php
    $session = \Yii::$app->getSession();
    $session->setFlash("error", "Se a eliminado con Exito!"); ?>
    <?= \odaialali\yii2toastr\ToastrFlash::widget([
  "options" => [
      "closeButton"=> true,
      "debug" =>  false,
      "progressBar" => true,
      "preventDuplicates" => true,
      "positionClass" => "toast-top-right",
      "onclick" => null,
      "showDuration" => "100",
      "hideDuration" => "1000",
      "timeOut" => "2000",
      "extendedTimeOut" => "100",
      "showEasing" => "swing",
      "hideEasing" => "linear",
      "showMethod" => "fadeIn",
      "hideMethod" => "fadeOut"
      ]
  ]);?>
<?php endif; ?> 

<?php
include '../include/dbconnect.php';
 $queryexpedientes = "SELECT p.IdPersona, CONCAT(p.Nombres,  ' ', p.Apellidos) as NombreCte, p.FechaNacimiento, p.Genero, p.Direccion , e.NombreEstado as Estado  FROM persona p
          INNER JOIN estado e on p.IdEstado = e.IdEstado 
          order by Nombres ASC";
          $resultadoexpedientes = $mysqli->query($queryexpedientes);

$queryestado = " SELECT * FROM estado limit 1,3 ";
$resultadoestado = $mysqli->query($queryestado);

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsultapacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
           <!-- <?= Html::a('Ingresar Persona', ['create'], ['class' => 'btn btn-primary']) ?> -->
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                      'dataProvider' => $dataProvider,
                      'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                          // 'IdPersona',
                          [
                            'attribute' => 'IdPersona',
                            'value' => function ($model) {
                                return $model->getFullName();
                            },
                         ],
                         'Dui',
                             [
                            'attribute' => 'Categoria',
                             'options' => ['style' => 'width:100px;'],
                            
                         ],
                         
                        [
                            'attribute' => 'Estado',
                            'format' => 'raw',
                            'options' => ['style' => 'width:80px;'],
                            'value' => function ($model) {
                                if ($model->IdEstado == 1) {
                                    return '<spam class="label label-info">'.$model->estado->NombreEstado.' <i class="fa fa-heartbeat"></i></spam>';
                                }
                                elseif ($model->IdEstado == 2) {
                                    return '<spam class="label label-primary">'.$model->estado->NombreEstado.' <i class="fa fa-heartbeat"></i></spam>';
                                } 
                                elseif ($model->IdEstado == 3) {
                                    return '<spam class="label label-success">'.$model->estado->NombreEstado.' <i class="fa fa-heartbeat"></i></spam>';
                                      }  
                                elseif ($model->IdEstado == 4) {
                                    return '<spam class="label label-warning">'.$model->estado->NombreEstado.' <i class="fa fa-heartbeat"></i></spam>';
                                    } 
                                      elseif ($model->IdEstado == 5) {
                                    return '<spam class="label label-danger">'.$model->estado->NombreEstado.' <i class="fa fa-heartbeat"></i></spam>';
                                    } 
                                                                   else {
                                    return '<spam class="label label-info">'.$model->estado->NombreEstado.' <i class="fa fa-heartbeat"></i></spam>';
                                }
                            },
                        ],
                                                  [
                            'format' => 'raw',
                              'options' => ['style' => 'width:50px;'],
                              'value' => function ($model) {
                                  if ($model->IdEstado == 1) {
                                      return  Html::a('<span class="btn-xs btn-warning"><i class="fa fa-edit"></i></span>', ['update', 'id' => $model->IdPersona]);
                                    
                                  }
                                  else {
                                      return '';
                                  }
                              },
                          ],
                          
                          ],
                      ]); ?>
                                  </table>