<?php
@session_start();
include 'connect.php';
if (@$_SESSION['siswa']) {
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
    <!-- =======================================================
    Theme Name: Mentor
    Theme URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  </head>

  <body>
    <?php
    $siswa = mysqli_query($db, "select*from pendaftar where id ='$_SESSION[siswa]'");
    $da = mysqli_fetch_array($siswa);
    ?>
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

            <?php if (isset($_SESSION["siswa"])) : ?>

              <li><a href="chekout.php" name="keranjang">Keranjang <span class="sr-only">(current)</span></a></li>


              <li><a href="bayar.php" name="bayar">Chekout <span class="sr-only">(current)</span></a></li>
              <li class="btn-trial"><a href="index.php">Log Out</a></li>

            <?php else :  ?>
              </li>
              <li>
                <a class="btn-trial" href="login.php">Login</a>
              </li>
            <?php endif ?>

          </ul>
        </div>
      </div>
    </nav>
    <!--/ Navigation bar-->
    <!--Modal box-->
    <div class="modal fade" id="login" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">Login</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
              <p class="login-box-msg">Sign in to start your session</p>
              <div class="form-group">
                <form action="dashboard.php" method="POST" id="loginForm">
                  <div class="form-group has-feedback">
                    <!----- username -------------->
                    <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" />
                    <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                    <!---Alredy exists  ! -->
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <!----- password -------------->
                    <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" />
                    <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                    <!---Alredy exists  ! -->
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <a href="daftar.php">Doesn't have any account? Register here!<br></a>
                    </div><br>

                    <div class="col-xs-12">
                      <button type="button" class="btn btn-green btn-block btn-flat" onclick="userlogin()">Sign
                        In</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ Modal box-->
    <!--Banner-->
    <div class="banner">
      <div class="bg-color">
        <div class="container">
          <div class="row">
            <div class="banner-text text-center">
              <div class="text-border">

              </div>
              <div class="intro-para text-center quote">
                <h1 class="big-text" style="color:#5FCF80;">Welcome, <?php echo $_SESSION['siswa']; ?> </h1>
                <p class="big-text">FLASH SCHOOL</p>
                <p class="small-text">Pesan Tentor Kursus Dengan Mudah dan Cepat</p>
              </div>
              <br>
              <form>
                <a href="cari2.php"> <input class="search" type="text" placeholder="Pilih Kursus" style="width: 400px; height:30px"></a>
                <a href="cari2.php"> <input class="search" type="text" placeholder="Masukan Alamat Anda" style="width: 400px; height:30px"></a>
                <input class="button" type="button" value="Cari">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Banner-->
    <!--Feature-->
    <section id="feature" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Aplikasi Pencarian Tentor Kursus Untuk SD , SMP , dan SMA</h2>
            <p> FlashSchool merupakan sebuah aplikasi yang menyediakan layanan pencarian Tentor Kursus dari
              kalangan pengajar maupun mahasiswa yang Cepat , Terpercaya , dan Harga Terjangkau</p>
            <hr class="bottom-line">
            <br>
          </div>
          <div class="feature-info text-center">
            <h4>Apa saja sih keunggulan dari menggunakan Flash School?</h4>
            <div class="fea text-center">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>Memesan Guru Privat Cepat , Mudah , dan Terpercaya</h4>
                  <p>Donec et lectus bibendum dolor dictum auctor in ac erat. Vestibulum egestas sollicitudin metus non
                    urna in eros tincidunt convallis id id nisi in interdum.</p>
                </div>
                <div class="fea-img pull-left">
                  <i class="fa fa-css3"></i>
                </div>
              </div>
            </div>
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>Memberikan Rekomendasi Guru Privat yang terdekat dengan Lokasi Anda</h4>
                  <p>Donec et lectus bibendum dolor dictum auctor in ac erat. Vestibulum egestas sollicitudin metus non
                    urna in eros tincidunt convallis id id nisi in interdum.</p>
                </div>
                <div class="fea-img pull-left">
                  <i class="fa fa-drupal"></i>
                </div>
              </div>
            </div>
            <div class="fea">
              <div class="col-md-4">
                <div class="heading pull-right">
                  <h4>Harga Terjangkau Namun Mendapat Kualitas Pengajar yang Unggul</h4>
                  <p>Donec et lectus bibendum dolor dictum auctor in ac erat. Vestibulum egestas sollicitudin metus non
                    urna in eros tincidunt convallis id id nisi in interdum.</p>
                </div>
                <div class="fea-img pull-left">
                  <i class="fa fa-trophy"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ feature-->
    <!--Organisations-->

    <!--/ Cta-->
    <!--work-shop-->
    <section id="work-shop" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Apa yang ingin anda pelajari</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni
              dolorum aliquam.</p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="service-box text-center">
              <div class="icon-text">
                <h4 class="ser-text">Akademik</h4><br>
              </div>
              <div class="text-left">
                <p>SD</p>
                <p>SMP</p>
                <p>SMA</p>
                <p>SBPTN</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="service-box text-center">
              <div class="icon-text">
                <h4 class="ser-text">Bahasa</h4><br>
              </div>
              <div class="text-left">
                <p>Bahasa Inggris</p>
                <p>Bahasa Jepang</p>

              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="service-box text-center">
              <div class="icon-text">
                <h4 class="ser-text">Non_Akademik</h4><br>
              </div>
              <div class="text-left">
                <p>Menggambar</p>
                <p>Mewarnai</p>
                <p>Mengaji</p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!--/ Contact-->
    <!--Footer-->
    <footer id="footer" class="footer">
      <div class="container text-center">


        <!-- End newsletter-form -->
        <ul class="social-links">
          <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
          <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
          <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
          <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
          <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
        </ul>
        ©2020 Iis Rokhmatul Khasanah
        <div class="credits">
          <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mentor
        -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
        </div>
      </div>
    </footer>
    <!--/ Footer-->

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>

  </body>

  </html>
<?php
} else {
  header('location:login.php');
}
?>