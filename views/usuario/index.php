<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
include '../include/dbconnect.php';
  $querypuesto = "select IdPuesto, Descripcion from puesto";
      $resultadoquerypuesto = $mysqli->query($querypuesto);
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
           <button class="btn btn-success btn-raised " data-toggle="modal" data-target="#myModal">
                                         Nuevo Usuario
    </button>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                                    <?= GridView::widget([
                      'dataProvider' => $dataProvider,
'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                          // 'IdUsuario',
                          'InicioSesion',
                          'Nombres',
                          'Apellidos',
                          'Correo',
                          // 'Clave',
                          // 'Activo',
                          // 'IdPuesto',
                          // 'FechaIngreso',
                              ['class' => 'yii\grid\ActionColumn',
                               'options' => ['style' => 'width:100px;'],
                               'template' => " {view} {update} "
                              ],
                          ],
                      ]); ?>
                                  </table>
          </div>
      </div>
    </div>
</div>


                   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <form action="../../views/usuario/usuarioguardar.php" role="form" method="POST">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Nuevo Usuario</h4>

                                                        </div>
                                                        <div class="modal-body">
                                                         <div class="form-group">
                                                              <label for="title">Inicio de Sesion</label>
                                                              <input class="form-control" type="text" name="InicioSesion" id="username"/>
                                                               <center><div id="Info"></div></center>
                                                          </div>
                                                           <div class="form-group">
                                                              <label for="title">Nombres</label>
                                                              <input class="form-control" type="text" name="Nombre" id="" />
                                                          </div>
                                                           <div class="form-group">
                                                              <label for="title">Apellidos</label>
                                                              <input class="form-control" type="text" name="Apellido" id="" />
                                                          </div>
                                                           <div class="form-group">
                                                              <label for="title">Correo</label>
                                                              <input class="form-control" type="email" name="Correo" id="" />
                                                          </div>
                                                           <div class="form-group">
                                                              <label for="title">Clave</label>
                                                              <input class="form-control" type="text" name="clave" id="" />
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="title">Seleccione un Puesto:</label>
                                                            <select name="Puesto" class="form-control">
                                                              <option value="">--- Seleccione un Puesto ---</option>
                                                              <?php
                                                                  while($row = $resultadoquerypuesto->fetch_assoc()){
                                                                      echo "<option value='".$row['IdPuesto']."'>".$row['Descripcion']."</option>";
                                                                  }
                                                              ?>
                                                          </select>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="title">Activo</label>
                                                              <select name="activo" class="form-control">
                                                                <option value="0">INACTIVO</option>
                                                                    <option value="1">ACTIVO</option>
                                                              </select>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                              <button type="submit" class="btn btn-success" name="guardarHonorario" >Guardar Usuario</button>
                                                        </div>
                                                      </form>
                                                    </div>
                                                </div>
                                        </div>
<script src="../../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){

        demo.initFormExtendedDatetimepickers();

    });
</script>

<script>
  $(function() {
    $('#currency').maskMoney();
  })
</script>

<script type="text/javascript">

    $(document).ready(function() {
    $('#username').blur(function(){

        $('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

        var username = $(this).val();
        var dataString = 'username='+username;

        $.ajax({
                type: "POST",
                url: "../../views/usuario/check.php",
                 data: dataString,
                success: function

                (data) {
            $('#Info').fadeIn(1000).html(data);
            //alert(data);
                }
            });
        });
    });

</script>