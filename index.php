

<script src="web/template2/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<link href="web/template/css/plugins/toastr/toastr.min.css" rel="stylesheet">
<script src="web/template2/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="web/template2/assets/js/material.min.js" type="text/javascript"></script>
<script src="web/template2/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="web/template2/assets/js/jquery.tagsinput.js"></script>
<script src="web/template2/assets/js/jasny-bootstrap.min.js"></script>
<script src="web/template/js/plugins/toastr/toastr.min.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="web/template2/assets/js/material-dashboard.js?v=1.2.1"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="web/template2/assets/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

<?php
session_start();
include 'include/dbconnect.php';
date_default_timezone_set('america/el_salvador');
$fechas = date('Y-m-d G:i:s');

if(isset($_POST['btn-login']))
{
$InicioSesion = $_POST['InicioSesion'];
$Clave = $_POST['Clave'];
$queryusuario = "
SELECT a.IdUsuario, a.InicioSesion, b.IdPuesto, b.Descripcion as 'NombrePuesto', concat(a.Nombres, ' ', a.Apellidos) as NombreCompleto, a.Idioma as 'Idioma', a.Estado as 'Estado'
FROM usuario as a
inner join puesto as b on b.IdPuesto = a.IdPuesto
WHERE InicioSesion='$InicioSesion' and Clave = '$Clave' and Activo = 1";
$resultado_usuario = $mysqli->query($queryusuario);
while ($row = $resultado_usuario->fetch_assoc()) {
       $_SESSION['IdUsuario'] = $row['IdUsuario'];
       $_SESSION['user'] = $row['InicioSesion'];
       $_SESSION['IdPuesto'] = $row['IdPuesto'];
       $_SESSION['IdIdioma'] = $row['Idioma'];
       $_SESSION['Estado'] = $row['Estado'];
             }

if(mysqli_num_rows($resultado_usuario)==0){
      $IdEnfermeriaProcedimiento = 0;
    }
    else{
      $IdUsuario = $_SESSION['IdUsuario'];
    }



      if(!empty($_SESSION['user']))
      {
        if(  $_SESSION['Estado'] == 'Desconectado'){
        $updateestadouser = "UPDATE usuario SET Estado = 'Conectado', HoraInicioSesion = '$fechas'  where IdUsuario = '$IdUsuario'";
        $resultadoupdate = $mysqli->query($updateestadouser);

        //echo $updateestadouser;
        header("Location: web/site/index");
        }
        else{
                 ?>
       <script>
         $(function () {
             // Display a error toast, with a title
             toastr.options = {
               "closeButton": true,
               "debug": false,
               "progressBar": true,
               "preventDuplicates": true,
               "positionClass": "toast-top-right",
               "onclick": null,
               "showDuration": "100",
               "hideDuration": "1000",
               "timeOut": "2000",
               "extendedTimeOut": "100",
               "showEasing": "swing",
               "hideEasing": "linear",
               "showMethod": "fadeIn",
               "hideMethod": "fadeOut"
             }
             toastr.error('El usuario ha iniciado sesion en otro equipo!')
         });
     </script>
                 <?php
        }
         
      }
      else
      {
       ?>
       <script>
         $(function () {
             // Display a error toast, with a title
             toastr.options = {
               "closeButton": true,
               "debug": false,
               "progressBar": true,
               "preventDuplicates": true,
               "positionClass": "toast-top-right",
               "onclick": null,
               "showDuration": "100",
               "hideDuration": "1000",
               "timeOut": "2000",
               "extendedTimeOut": "100",
               "showEasing": "swing",
               "hideEasing": "linear",
               "showMethod": "fadeIn",
               "hideMethod": "fadeOut"
             }
             toastr.error('Usuario y contraseña incorrectos!')
         });
     </script>
                 <?php
      }
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="web/template2/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="web/template/img/uqsolutions.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SistemaTPV | Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="web/template2/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="web/template2/assets/css/material-dashboard.css?v=1.2.1" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="web/template2/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="off-canvas-sidebar">
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=" ../dashboard.html ">Bienvenido a SistemaTPV</a>
            </div>

        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="web/template2/assets/img/login3.jpg">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="POST" action="#">
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="blue">
                                        <h4 class="card-title">Inicio de Sesion</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Usuario</label>
                                                <input type="text" id="InicioSesion" name="InicioSesion" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Contraseña</label>
                                                <input type="password" id="Clave" name="Clave" class="form-control"  required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" name="btn-login" class="btn btn-info btn-wd ">Inicio</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>

                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href=""> SistemaTPV </a>, Centro Medico Familiar Shalom
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>


<script>setTimeout ("window.location='index'", 2000000); </script>