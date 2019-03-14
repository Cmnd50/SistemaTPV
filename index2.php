<script src="web/template/js/jquery-3.1.1.min.js"></script>
<script src="web/template/js/bootstrap.min.js"></script>
<script src="web/template/js/plugins/toastr/toastr.min.js"></script>
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
WHERE InicioSesion='$InicioSesion' and Clave = md5('$Clave') and Activo = 1";
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

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SistemaTPV | Login</title>
    <link href="web/template/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="web/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="web/template/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="web/template/img/uqsolutions.png" />
    <link href="web/template/css/animate.css" rel="stylesheet">
    <link href="web/template/css/style.css" rel="stylesheet">


</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">TPV</h1>
            </div>
            <h3>Bienvenido a SistemaTPV</h3>

            <p>Inicio de Sesion</p>
            <form class="m-t" role="form" method="POST">
                <div class="form-group">
                    <input type="text" id="InicioSesion" name="InicioSesion" class="form-control" placeholder="Usuario" required="">
                </div>
                <div class="form-group">
                    <input type="password" id="Clave" name="Clave" class="form-control" placeholder="Contrasena" required="">
                </div>
                <button type="submit" name="btn-login" id="success" class="btn btn-primary block full-width m-b">Inicio</button>
            </form>
            <p class="m-t"> <script>
                document.write(new Date().getFullYear())
            </script>
            <a href="">  </a>, STPV </p>
        </div>
    </div>



</body>
</html>


<script>setTimeout ("window.location='index'", 20000); </script>