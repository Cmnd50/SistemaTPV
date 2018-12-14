
<script>
    $(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.success('Centro Medico Familiar Shalom', 'Bienvenido');
    });
</script>
<?php
/* @var $this yii\web\View */

include '../include/dbconnect.php';
if(!isset($_SESSION))
    {
        session_start();
    }

if (!empty($_SESSION['user']))
  {

          $queryfichaconsulta = "SELECT  count(c.FechaConsulta) as 'Listado', (SELECT count(p.Genero) FROM persona p INNER JOIN consulta c on c.IdPersona = p.IdPersona WHERE p.Genero = 'MASCULINO' and c.FechaConsulta = curdate()) as 'Hombre',
            (SELECT count(p.Genero) FROM persona p INNER JOIN consulta c on c.IdPersona = p.IdPersona WHERE p.Genero = 'FEMENINO' and c.FechaConsulta = curdate() ) as 'Mujer'
            FROM
            consulta c
            INNER JOIN persona p on c.IdPersona = p.IdPersona
            WHERE c.FechaConsulta = CURDATE() ";

            $resultadofichaconsulta = $mysqli->query($queryfichaconsulta);
            while ($test = $resultadofichaconsulta->fetch_assoc())
            {
                $listado = $test['Listado'];
                $hombres = $test['Hombre'];
                $mujeres = $test['Mujer'];
            }

            $Hresultado = $hombres * 100;

            $hombresPor = 0;

            if($listado != 0)
              $hombresPor = $Hresultado / $listado;


            $Mresultado = 0;
            $Mresultado = $mujeres * 100;

            $mujeresPor = 0;
            if($listado != 0)
              $mujeresPor = $Mresultado / $listado;


            // QUERY PARA CALCULAR EDAD
           $queryfichaconsulta2 = "SELECT
                  count(CASE
                    WHEN TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) = 0 THEN 'nino'
                    WHEN TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) <= 18 THEN 'nino'
                  END) As 'Nino',
                  count(CASE
                    WHEN TIMESTAMPDIFF(YEAR,p.FechaNacimiento,CURDATE()) > 18 THEN 'adulto'
                  END) As 'Adulto'
                FROM consulta c
                INNER JOIN persona p on c.IdPersona = p.IdPersona
                WHERE c.FechaConsulta = CURDATE()";

            $resultadofichaconsulta2 = $mysqli->query($queryfichaconsulta2);
            while ($test = $resultadofichaconsulta2->fetch_assoc())
            {
                $nino = $test['Nino'];
                $adulto = $test['Adulto'];
            }



           $queryfichaconsulta3 = "SELECT count(c.Activo) as Activo
              FROM
              consulta c
              WHERE c.FechaConsulta = CURDATE() and Activo = 1";

            $resultadofichaconsulta3 = $mysqli->query($queryfichaconsulta3);
            while ($test = $resultadofichaconsulta3->fetch_assoc())
            {
                $activo = $test['Activo'];
            }


$this->title = 'Sistema TPV';
?>

<div class="wrapper wrapper-content">
  <h1>
    Centro Medio Familiar Shalom |
    <small>Adminstración de Pacientes y Laboratorio</small>
  </h1>
    <div class="row animated fadeInDown">
        <div class="col-lg-6">
        <div class="row animated fadeInDown">
        <div class="col-lg-6">
          <div class="widget style1 blue-bg">
                  <div class="row">
                      <div class="col-xs-4 text-center">
                          <i class="fa fa-hospital-o fa-5x"></i>
                      </div>
                      <div class="col-xs-8 text-right">
                          <span> Paciente Atendido </span>
                          <h2 class="font-bold"><?php echo $listado; ?></h2>
                      </div>
                  </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="widget style1 blue-bg">
                  <div class="row">
                      <div class="col-xs-4 text-center">
                          <i class="fa fa-user fa-5x"></i>
                      </div>
                      <div class="col-xs-8 text-right">
                          <span> Adultos </span>
                          <h2 class="font-bold"><?php echo $adulto; ?></h2>
                      </div>
                  </div>
          </div>
        </div>
        </div>
        <div class="row animated fadeInDown">
        <div class="col-lg-6">
          <div class="widget style1 red-bg">
                  <div class="row">
                      <div class="col-xs-4 text-center">
                          <i class="fa fa-smile-o fa-5x"></i>
                      </div>
                      <div class="col-xs-8 text-right">
                          <span> Niños </span>
                          <h2 class="font-bold"><?php echo $nino; ?></h2>
                      </div>
                  </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="widget style1 red-bg">
                  <div class="row">
                      <div class="col-xs-4 text-center">
                          <i class="fa fa-stethoscope fa-5x"></i>
                      </div>
                      <div class="col-xs-8 text-right">
                          <span> En proceso </span>
                          <h2 class="font-bold"><?php echo $activo; ?></h2>
                      </div>
                  </div>
          </div>
        </div>
        </div>
        <div class="row animated fadeInDown">
        <div class="col-lg-6">
          <div class="widget style1 yellow-bg">
                  <div class="row">
                      <div class="col-xs-4 text-center">
                          <i class="fa fa-female fa-5x"></i>
                      </div>
                      <div class="col-xs-8 text-right">
                          <span> Mujer Atendida </span>
                          <h2 class="font-bold"> <?php echo $mujeres; ?></h2>
                      </div>
                  </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="widget style1 yellow-bg">
                  <div class="row">
                      <div class="col-xs-4 text-center">
                          <i class="fa fa-male fa-5x"></i>
                      </div>
                      <div class="col-xs-8 text-right">
                          <span> Hombre Atendido </span>
                          <h2 class="font-bold"><?php echo $hombres ?></h2>
                      </div>
                  </div>
          </div>
        </div>
        </div>
        <div class="row animated fadeInDown">
        <div class="col-lg-6">
          <div class="widget style1 navy-bg">
                  <div class="row">
                      <div class="col-xs-4 text-center">
                          <i class="fa fa-area-chart fa-5x"></i>
                      </div>
                      <div class="col-xs-8 text-right">
                          <span> Mujere Atendida </span>
                          <h2 class="font-bold"><?php echo $mujeresPor;?>%</h2>
                      </div>
                  </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="widget style1 navy-bg">
                  <div class="row">
                      <div class="col-xs-4 text-center">
                          <i class="fa fa-line-chart fa-5x"></i>
                      </div>
                      <div class="col-xs-8 text-right">
                          <span> Hombre Atendido </span>
                          <h2 class="font-bold"><?php echo $hombresPor;?>%</h2>
                      </div>
                  </div>
          </div>
        </div>
        </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Calendario </h5>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../template/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  var calendar = $('#calendar').fullCalendar({
   editable:true,
   header:{
    left:'prev,next today',
    center:'title',
    right:'month,agendaWeek,agendaDay'
   },
   events: 'load.php',
   selectable:true,
   selectHelper:true,
   select: function(start, end, allDay)
   {
    var title = prompt("Ingrese Titulo de Evento");
    if(title)
    {
     var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
     $.ajax({
      url:"insert.php",
      type:"POST",
      data:{title:title, start:start, end:end},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       bootbox.alert({
            message: "Agregado Exitosamente!",
            size: 'small',
            callback: function () {
                console.log('This was logged in the callback!');
            }
        })
      }
     })
    }
    // bootbox.prompt({
    //     title: "Ingrese Titulo de Evento",
    //     inputType: 'text',
    //     callback: function (result) {
    //        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
    //        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
    //        $.ajax({
    //         url:"insert.php",
    //         type:"POST",
    //         data:{ start:start, end:end},
    //         success:function()
    //         {
    //          calendar.fullCalendar('refetchEvents');
    //          bootbox.alert({
    //               message: "Agregado Exitosamente!",
    //               size: 'small',
    //               callback: function () {
    //                   console.log('This was logged in the callback!');
    //               }
    //           })
    //         }
    //        })
    //         console.log(result);
    //     }
    // });

   },
   editable:true,
   eventResize:function(event)
   {
    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
    var title = event.title;
    var id = event.id;
    $.ajax({
     url:"update.php",
     type:"POST",
     data:{title:title, start:start, end:end, id:id},
     success:function(){
      calendar.fullCalendar('refetchEvents');
      alert('Evento Actualizado');
     }
    })
   },

   eventClick:function(event)
   {

    bootbox.confirm({
    title: "Eliminar Evento",
    message: "Deseas eliminar este evento?",
    buttons: {
        cancel: {
            label: '<i class="fa fa-times"></i> Cancelar'
        },
        confirm: {
            label: '<i class="fa fa-check"></i> Confirmar'
        }
    },
            callback: function (result) {
               var id = event.id;
               $.ajax({
                url:"delete.php",
                type:"POST",
                data:{id:id},
                success:function()
                {
                 calendar.fullCalendar('refetchEvents');
                 // bootbox.alert("Evento Eliminado");
                 bootbox.alert({
                      message: "Eliminado Exitosamente!",
                      size: 'small',
                      callback: function () {
                          console.log('This was logged in the callback!');
                      }
                  })
                }
               })
                console.log('This was logged in the callback: ' + result);
            }
        });
   },

  });
 });
 </script>

 <?php
 }
 else{
   echo "
   <script>
     alert('No ha iniciado sesion');
     document.location='../index.php';
   </script>
   ";
 }
 ?>
