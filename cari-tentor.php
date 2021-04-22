<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flash School - Cari Tentor</title>
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
    <!--Navigation bar-->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand"><img src="img/logo.png" height="80px"></a>
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
                        }
                    ?>
                        <li class="btn-trial"><a href="<?=$pr; ?>">Halo <?=$_SESSION['user_login']; ?></a></li>
                    <?php } else { ?> 
                        <li class="btn-trial"><a href="login.php">Sign in</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <div style="margin-top:40px;text-align:center;">
            <h6>Masukkan nama wilayah (Kota / Kabupaten)</h6>
            <input id="pac-input" class="form-control" type="text" placeholder="Masukkan Kota / Kabupaten" onchange="getResult()"/>
            <img src="https://s3-id-jkt-1.kilatstorage.id/haxors-bucket/find.png" style="width: 800px;">
            <div id="divHasilPencarian">

            </div>
        </div>
    </div>

    </section>
    </div>
    <footer id="footer" class="footer" style="margin-top:30px;">
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
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
            </div>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places"></script>
    <script>
        var input = document.getElementById("pac-input");
        var searchBox = new google.maps.places.SearchBox(input);

        function getResult()
        {
            let daerah = document.querySelector("#pac-input").value;
            let ds = {'daerah':daerah}
            $.post('proses-cari-tentor.php', ds, function(data){
                console.log(data);
            });
        }
    </script>
</body>

</html>