<?php
 require_once 'logouttiempo.php';
date_default_timezone_set('america/el_salvador');
$fechas = date('Y-m-d G:i:s');
?>
<script>setTimeout('document.location.reload()',20000); </script> <!-- TIEMPO EN MILISEGUNDOS PARA QUE LA PÁG SE RECARGUE TRAS INACTIVIDAD-->
<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

    </div>
      <ul class="nav navbar-top-links navbar-right">
          <li>
          <?php if($_SESSION['IdIdioma'] == 1) {?>
              <span class="m-r-sm text-muted welcome-message">Bienvenidos Sistema TPV</span>
          <?php } else{
            ?>
              <span class="m-r-sm text-muted welcome-message">Welcome Sistema TPV <?php echo $fechas ?> </span>  
            <?php } ?>
          
          </li>
          <li>
              <a href="../../include/logout.php?logout">
                  <i class="fa fa-sign-out"></i> Log out
              </a>
          </li>
      </ul>

  </nav>

</div>
