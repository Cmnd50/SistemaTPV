<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
include '../include/dbconnect.php';
$this->title = 'Permisos de Usuario para: '.$model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$InicioSesion = $model->InicioSesion;
$IdUsuario = $model->IdUsuario;


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
 <link href="../template/css/plugins/iCheck/custom.css" rel="stylesheet">
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
             
        </p>
      </div>
          <div class="ibox-content">
              <form method="post" id="update_form">
                    <div align="left">
                        <input type="submit" name="multiple_update" id="multiple_update" class="btn btn-info" value="Multiple Update" />
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th width="5%"></th>
                                <th width="20%">ID</th>
                                <th width="20%">Menu</th>
                                <th width="30%">Submenu</th>
                                <th width="15%">Activo</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </form>
          </div>
      </div>
    </div>
</div>



    <script>  
$(document).ready(function(){  
    
    function fetch_data()
    {
          var id = <?php echo $IdUsuario ?> ;
           var myData = {"id": id};
        $.ajax({
            url:"../../views/permisos/select.php",
            method:"POST",
            data: myData,
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><input type="checkbox" id="'+data[count].ID+'" data-menu="'+data[count].MENU+'" data-submenu="'+data[count].SUBMENU+'" data-activo="'+data[count].ACTIVO+'" class="check_box"  /></td>';
                    html += '<td>'+data[count].ID+'</td>';
                    html += '<td>'+data[count].MENU+'</td>';
                    html += '<td>'+data[count].SUBMENU+'</td>';
                    html += '<td>'+data[count].ACTIVO+'</td>';

                }
                $('tbody').html(html);
            }
        });
    }

    fetch_data();

    $(document).on('click', '.check_box', function(){
        var html = '';
        if(this.checked)
        {
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'"  data-menu="'+$(this).data('menu')+'" data-submenu="'+$(this).data('submenu')+'" data-activo="'+$(this).data('activo')+'" data-id="'+$(this).data('id')+'" class="check_box" checked /></td>';

            html += '<td><input type="text" name="id[]" class="form-control" value="'+$(this).attr('id')+'" /></td>';

            html += '<td><input type="text" name="menu[]" disabled="disabled" class="form-control" value="'+$(this).data("menu")+'" /></td>';

            html += '<td><input type="text" name="submenu[]" disabled="disabled" class="form-control" value="'+$(this).data("submenu")+'" /></td>';
            html += '<td><select name="activo[]" id="activo_'+$(this).attr('activo')+'" class="form-control"><option value="1">ACTIVO</option><option value="0">INACTIVO</option></select></td><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
        }
        else
        {
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-menu="'+$(this).data('menu')+'" data-submenu="'+$(this).data('submenu')+'" data-activo="'+$(this).data('activo')+'" class="check_box" /></td>';
            html += '<td>'+$(this).data('id')+'</td>';
            html += '<td>'+$(this).data('menu')+'</td>';
            html += '<td>'+$(this).data('submenu')+'</td>';
            html += '<td>'+$(this).data('activo')+'</td>';           
        }
        $(this).closest('tr').html(html);
        $('#activo_'+$(this).attr('id')+'').val($(this).data('activo'));
    });

    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"../../views/permisos/multiple_update.php",
                method:"POST",
                data:$(this).serialize(),
                success:function()
                {
                    alert('Data Updated');
                    fetch_data();
                }
            })
        }
    });

});  
</script>


