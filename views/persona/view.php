<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
   include '../include/dbconnect.php';

     $bc = $model->CodigoPaciente;
     $IdGeografia = $model->IdGeografia;
     $IdPais = $model->IdPais;
     $idpersonaid = $model->IdPersona;
     $idpersona = $model->IdPersona;

     $queryobtenerinformaciongeneral = "SELECT 
                  p.CodigoPaciente as 'Codigo',
                  CONCAT(p.Nombres,' ',p.Apellidos) as 'NombrePaciente',
                  p.dui as 'DUI',
                  p.FechaNacimiento as 'FNacimiento',
                  p.Direccion as 'Direccion',
                  g.Nombre as 'Municipio',
                  pa.NombrePais as 'Pais',
                  (select nombre from geografia where IdGeografia = (select IdPadre from geografia where IdGeografia = p.IdGeografia)) as 'Departamento',
                  p.Telefono as 'Telefono',
                  p.Celular as 'Celular',
                  p.Genero as 'Genero',
                  ec.Nombre as 'EstadoC',
                  p.FechaNacimiento as 'FechaNac',
                  TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) AS 'Edad',
                  CONCAT(p.NombresResponsable,' ',p.ApellidosResponsable) as 'NombreResponsable',
                  p.DuiResponsable as 'DuiResp',
                  p.TelefonoResponsable as 'TelResp',
                  p.Parentesco as 'Parentezco',
                  p.Categoria as 'Categoria'
                  FROM persona p
                  INNER JOIN geografia g on p.IdGeografia = g.IdGeografia
                  INNER JOIN estadocivil ec on p.IdEstadoCivil = ec.IdEstadoCivil
                  INNER JOIN pais pa on p.IdPais = pa.IdPais
                  WHERE p.IdPersona = $idpersona";
      $resultadoobtenerinformaciongeneral = $mysqli->query($queryobtenerinformaciongeneral);
      while ($test = $resultadoobtenerinformaciongeneral->fetch_assoc()) {
           $CodPaciente = $test['Codigo'];
           $NombrePaciente = $test['NombrePaciente'];
           $DUIprint = $test['DUI'];
           $FNacimiento = $test['FNacimiento'];
           $Direccion = $test['Direccion'];
           $Municipio = $test['Municipio'];
           $Paisprint = $test['Pais'];
           $Departamentoprint = $test['Departamento'];
           $Telefono = $test['Telefono'];
           $Celular = $test['Celular'];
           $Genero = $test['Genero'];
           $EstadoC = $test['EstadoC'];
           $FechaNac = $test['FechaNac'];
           $Edad = $test['Edad'];
           $NombreResponsable = $test['NombreResponsable'];
           $DuiResp = $test['DuiResp'];
           $TelResp = $test['TelResp'];
           $Parentezco = $test['Parentezco'];
           $Categoria = $test['Categoria'];
       }

      
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
             <!-- <button class="btn btn-success btn-raised btn-exp" onclick="javascript:window.imprimirDIV('ID_DIV');">Imprimir </button> -->
             <button class="btn btn-success btn-raised btn-imprimir"> Imprimir </button>
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
            <h3>CODIGO DE BARRAS</h3>
            <center><div id="barcode"></div></center>
          </div>
      </div>
    </div>
</div>

<!-- REPORTE -->
 <div id="ID_DIV" class="hidden">
       <div class="row">
        <div class="col-sm-10">
          CENTRO MEDICO FAMILIAR SHALOM
       </div>
      </div>
      <div class="row">
        <div class="col-sm-10">
          Bo Concepción Cl José Mariano Calderón No 11, Stgo Texac
              Santiago Texacuangos - San Salvador
       </div>
      </div>
       <div class="row">
          <div class="col-sm-10">
          <br>
            

         </div>
          <div class="col-sm-2">
               
          </div>
      </div>
 </div>

  <form id="frmficha" action="../../reports/expediente/fichapaciente" method="post" target="_blank" class="hidden">
      <input type="text" id="idpersona" name="idpersona" value="<?php echo $idpersona;?>" />
  </form>

<script src="../template/barcode/jquery-barcode.min.js"></script>

<script type="text/javascript">
$(function() {   
 $("#barcode").barcode(
  "<?php echo $bc ?>", // Valor del codigo de barras
"code128" // tipo (cadena)
);
  $("#barcodereport").barcode(
  "<?php echo $bc ?>", // Valor del codigo de barras
"code128" // tipo (cadena)
);
});
</script>



 <script type="text/javascript">
        $(document).ready(function(){

            $(".btn-imprimir").click(function(){
                // var id = $(this).attr("value");
                // $("#IdIndemnizacion").val(id);
                $("#frmficha").submit();
                //alert(id);
            });
    
        });

    </script>


