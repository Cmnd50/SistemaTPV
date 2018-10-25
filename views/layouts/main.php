<?php
include '../include/dbconnect.php';
if(!isset($_SESSION))
    {
        session_start();
    }
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DashboardAsset;

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../web/template/img/uqsolutions.png" />
    <?php $this->registerCsrfMetaTags() ?>
    <title>Sistema TPV</title>
    <?php $this->head() ?>
</head>
<body class="">
<?php $this->beginBody() ?>

<div id="wrapper">
  <?php include '../include/aside.php'; ?>
  <?php include '../include/header.php'; ?>


    <div class="wrapper wrapper-content">
      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
          </br>
              <?php echo Breadcrumbs::widget([
                          'homeLink'=> ['url'=>'../site/index','label'=>'Inicio'],
                          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                      ]) ?>
          </div>
      </div>
        <?= $content ?>
          <?php include '../include/footer.php'; ?>
    </div>

</div>

<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>
<script type="text/javascript">
document.oncontextmenu = function(){return false;}
</script>
