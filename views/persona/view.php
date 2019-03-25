<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
   include '../include/dbconnect.php';

   
    $IdGeografia = $model->IdGeografia;
     $IdPais = $model->IdPais;
     $idpersonaid = $model->IdPersona;
     $idpersona = $model->IdPersona;
      
      $queryobtenermunicipiodepa = "SELECT GEO1.Nombre as 'Municipio', (SELECT Nombre FROM geografia GEO2 where GEO2.IdGeografia = GEO1.IdPadre) as 'Departamento'
       FROM geografia GEO1 where GEO1.IdGeografia = '$IdGeografia'";
       //echo  $queryfichaconsulta;
       $resultadoobtenermunicipiodepa = $mysqli->query($queryobtenermunicipiodepa);
       while ($test = $resultadoobtenermunicipiodepa->fetch_assoc()) {
           $Municipio = $test['Municipio'];
           $Departamento = $test['Departamento'];
       }
   
      $queryobtenerpais = "SELECT NombrePais FROM pais where IdPais = '$IdPais'";
       //echo  $queryfichaconsulta;
       $resultadoobtenerpais = $mysqli->query($queryobtenerpais);
       while ($test = $resultadoobtenerpais->fetch_assoc()) {
           $Pais = $test['NombrePais'];
       }

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>

<?php if (Yii::$app->session->hasFlash("success")): ?>
<?php
    $session = \Yii::$app->getSession();
    $session->setFlash("success", "Se a agregado con Exito!"); ?>
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
<?php if (Yii::$app->session->hasFlash("warning")): ?>
<?php
    $session = \Yii::$app->getSession();
    $session->setFlash("warning", "Se a actualizado con Exito!"); ?>
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
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
             <?= Html::a('Actualizar', ['update', 'id' => $model->IdPersona], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
          <div class="ibox-content">
 <h3> DATOS GENERALES </h3>
              <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'Nombres',
                        'Apellidos',
                        'FechaNacimiento',
                        'Direccion',
                        'Dui',
                        'Correo',
                        [
                            'attribute' => 'Pais',
                            'format' => 'raw',
                            'value' => $Pais,
                        ],
                        [
                            'attribute' => 'Municipio',
                            'format' => 'raw',
                            'value' => $Municipio,
                        ],
                        [
                            'attribute' => 'Departamento',
                            'format' => 'raw',
                            'value' => $Departamento,
                        ],
                        'Genero',
                        'estadoCivil.Nombre',
                        'Telefono',
                        'Celular',
                    ],
                ]) ?>
            </table>
            <h3>    DATOS MEDICOS </h3>
              <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'Alergias',
                        'Medicamentos',
                        'Enfermedad',
                    ],
                ]) ?>
            </table>

               <h3> DATOS RESPONSABLE</h3>
            <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'TelefonoResponsable',
                        'Categoria',
                        'NombresResponsable',
                        'ApellidosResponsable',
                        'Parentesco',
                        'DuiResponsable',
                    ],
                ]) ?>
            </table>
          </div>
      </div>
    </div>
</div>
