<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flash School</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand"><img src="img/logo.png" height="80px"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#feature">Tentang Kami</a></li>
          <li><a href="#work-shop">Layanan Kami</a></li>
          <?php if(isset($_SESSION['user_login'])){ ?> 
          <?php 
            if($_SESSION["role"] == 'guru') {
              $pr = 'main_app/guru/main.php';
            }else{
              $pr = 'main_app/siswa/main.php';
              echo "<li><a href='pesanan-saya.php'>Pesanan Saya</a></li>";
            }
          ?>
            <li class="btn-trial"><a href="<?=$pr; ?>">Halo <?=$_SESSION['user_login']; ?></a></li>
          <?php } else { ?> 
            <li class="btn-trial"><a href="login.php">Sign in</a></li>
          <?php } ?>
          
          <!-- <li class="btn-trial"><a href="daftar.php">Sign Up</a></li> -->
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
  <!--Modal box-->
