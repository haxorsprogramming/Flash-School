<?php
session_start();
include "config/db.php";
$daerah = $_GET['daerah'];
$kdKursus = $_GET['kursus'];
$qDaerah = $link->query("SELECT * FROM tbl_tentor WHERE daerah_layanan LIKE '%$daerah%' AND kd_kursus='$kdKursus';");
$totalTentor = mysqli_num_rows($qDaerah);

$qKursusData = $link -> query("SELECT * FROM tbl_kursus WHERE kd_kursus='$kdKursus' LIMIT 0,1;");
$fKursus = $qKursusData -> fetch_assoc();
$namaKursus = $fKursus['nama_kursus'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flash School - Hasil cari tentor</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">
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
                <a href="index.php" class="navbar-brand"><img src="img/logo.png" height="80px"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#feature">Tentang Kami</a></li>
                    <li><a href="#work-shop">Layanan Kami</a></li>
                    <?php if (isset($_SESSION['user_login'])) { ?>
                        <?php
                        if ($_SESSION["role"] == 'guru') {
                            $pr = 'main_app/guru/main.php';
                        } else {
                            $pr = 'main_app/siswa/main.php';
                            echo "<li><a href='pesanan-saya.php'>Pesanan Saya</a></li>";
                        }
                        ?>
                        <li class="btn-trial"><a href="<?= $pr; ?>">Halo <?= $_SESSION['user_login']; ?></a></li>
                    <?php } else { ?>
                        <li class="btn-trial"><a href="login.php">Sign in</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <div style="margin-top:40px;text-align:left;">
            <h3>Hasil pencarian tentor </h3>
            <h4>Daerah : <?= $daerah; ?></h4>
            <h4>Kursus : <?=$namaKursus; ?></h4>
            <h5>Ditemukan total <?=$totalTentor; ?> tentor</h5>
            <hr/>
            <?php while ($fDaerah = $qDaerah->fetch_assoc()) { ?>
            <?php
                $username = $fDaerah['username'];
                $kdTentor = $fDaerah['kd_tentor'];
                $qDataGuru = $link -> query("SELECT * FROM tbl_guru WHERE username='$username' LIMIT 0,1;");
                $fGuru = $qDataGuru -> fetch_assoc();
                $namaGuru = $fGuru['nama_lengkap'];
            ?>
                <div class="col-md-4 col-sm-6">
                    <div class="service-box text-center">
                        <div class="icon-text">
                            <img src="file/img_guru/<?=$fDaerah['username']; ?>.png" style="width: 200px;border-radius:50%;">
                            <h4 class="ser-text"><?=$namaGuru; ?></h4><br>
                        </div>
                        <div class="text-left">
                            <?php if($fDaerah['tempat'] == 'rumah'){?>
                                <p>Tempat kursus : Rumah</p>
                            <?php }else{ ?>
                                <p>Tempat kursus : Tempat Kursus</p>
                            <?php } ?>
                            
                            <p>Bio : <?=$fDaerah['latar_belakang']; ?></p>
                            <p><a href="pesan-tentor.php?kd_tentor=<?=$kdTentor; ?>" class="btn btn-primary"><i class="fas fa-check-circle"></i> Pesan</a></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    </section>
    </div>
    <footer id="footer" class="footer" style="margin-top:30px;">
        <div class="container text-center">
            ©2021 Iis Rokhmatul Khasanah
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
        function pesanUmumApp(icon, title, text) {
            Swal.fire({
                icon: icon,
                title: title,
                text: text
            });
        }
    </script>
</body>

</html>