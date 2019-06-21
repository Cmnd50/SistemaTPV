
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consulta */

$this->title = 'Actualizar estado de Consulta: ' . $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullName];
$this->params['breadcrumbs'][] = 'Actualizar';

$id = $model->IdPersona;

include '../include/dbconnect.php';

  $querydepartamentos = "SELECT IdPersona, TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) AS Edad, concat(Nombres,' ',Apellidos) as 'Nombre Completo',
	CASE WHEN TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) < 15 THEN 'PEDIATRIA'
		 WHEN FechaNacimiento IS NULL THEN 'FECHA DE NACIMIENTO SIN REGISTRARSE' ELSE 'GENERAL' END AS 'CLASIFICACION',
	CASE WHEN Direccion = '' THEN 'ACTUALIZAR DIRECCION' ELSE 'ACTUALIZADO' END as 'DIRECCION',
	CASE WHEN genero = '' THEN 'ACTUALIZAR GENERO' ELSE 'ACTUALIZADO' END AS 'GENERO',
	CASE WHEN FechaNacimiento IS NULL THEN 'FECHA DE NACIMIENTO SIN REGISTRARSE'
		 WHEN TIMESTAMPDIFF(YEAR,FechaNacimiento,CURDATE()) < 15 AND NombresResponsable = '' THEN 'ACTUALIZAR RESPONSABLE' 
	ELSE 'ACTUALIZADO' END AS 'RESPONSABLE'
FROM persona WHERE IdPersona = $id";
$resultadodepartamentos = $mysqli->query($querydepartamentos);
while ($test = $resultadodepartamentos->fetch_assoc()) {
           $direccion = $test['DIRECCION'];
           $responsable = $test['RESPONSABLE'];
           $genero = $test['GENERO'];
       }

?>
</br>
<div class="ibox-content">
NOTIFICACIONES:
<?php if($direccion == 'ACTUALIZADO'){
   		?> 
		<div class="alert alert-danger alert-dismissible"  hidden='hidden'>
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Atencion!</strong> <?php echo $direccion;?>
		</div>
		<?php	
	}else if($direccion == 'ACTUALIZAR DIRECCION'){
		?> 
		<div class="alert alert-danger alert-dismissible">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Atencion!</strong> <?php echo $direccion;?>
		</div>
		<?php			
	}?>

<?php if($responsable == 'ACTUALIZADO'){
   		?> 
		<div class="alert alert-danger alert-dismissible " hidden='hidden'>
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Atencion!</strong> <?php echo $responsable;?>
		</div>
		<?php	
	}else if($responsable == 'FECHA DE NACIMIENTO SIN REGISTRARSE'){
		?> 
		<div class="alert alert-danger alert-dismissible">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Atencion!</strong> <?php echo $responsable;?>
		</div>
		<?php			
	}else if($responsable == 'ACTUALIZAR RESPONSABLE'){
		?> 
		<div class="alert alert-danger alert-dismissible">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Atencion!</strong> <?php echo $responsable;?>
		</div>
		<?php			
	}?>

	<?php if($genero == 'ACTUALIZADO'){
   		?> 
		<div class="alert alert-danger alert-dismissible" hidden="hidden">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Atencion!</strong> <?php echo $genero;?>
		</div>
		<?php	
	}else if($genero == 'ACTUALIZAR GENERO'){
		?> 
		<div class="alert alert-danger alert-dismissible">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Atencion!</strong> <?php echo $genero;?>
		</div>
		<?php			
	}?>

	
</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
