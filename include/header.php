<?php

date_default_timezone_set('america/el_salvador');
$fechas = date('Y-m-d G:i:s');
?>
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
<script type="text/javascript">
var timeoutInMiliseconds = 6000000;
var timeoutId; 


  
function startTimer() { 
    // window.setTimeout returns an Id that can be used to start and stop a timer
    timeoutId = window.setTimeout(doInactive, timeoutInMiliseconds)
}
  
function doInactive() {
   window.location = '../../include/logouttiempo.php';
}

function resetTimer() { 
    window.clearTimeout(timeoutId)
    startTimer();
}
 
function setupTimers () {
    document.addEventListener("mousemove", resetTimer, false);
    document.addEventListener("mousedown", resetTimer, false);
    document.addEventListener("keypress", resetTimer, false);
    document.addEventListener("touchmove", resetTimer, false);
     
    startTimer();
}

window.onload=setupTimers;
 

</script> 