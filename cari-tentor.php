<?php 
session_start();
include "config/db.php";
$qKursus = $link -> query("SELECT * FROM tbl_kursus;");
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
            <input id="pac-input" class="form-control" type="text" placeholder="Masukkan Kota / Kabupaten"/>
            <h6>Pilih jenis kursus</h6>
            <select class="form-control" id="txtKursus">
                <?php while($fKursus = $qKursus -> fetch_assoc()){ ?> 
                    <option value="<?=$fKursus['kd_kursus']; ?>"><?=$fKursus['nama_kursus']; ?></option>
                <?php } ?>
            </select>
            <div style="margin-top:20px;">
                <a href="#!" class="btn btn-primary" onclick="getResult()"><i class="fas fa-search"></i> Cari tentor</a><br/>
                <img src="file/find.png" style="width: 800px;">
            </div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places"></script>
    <script>
        var input = document.getElementById("pac-input");
        var searchBox = new google.maps.places.SearchBox(input);

        function getResult()
        {
            let daerah = document.querySelector("#pac-input").value;
            let kdKursus = document.querySelector("#txtKursus").value;
            let ds = {'daerah':daerah, 'kursus':kdKursus}
            $.post('proses-cari-tentor.php', ds, function(data){
                let obj = JSON.parse(data);
                let status = obj.status;
                if(status === 'no_area'){
                    pesanUmumApp('success', 'No area coverage', 'Tidak ada mentor yg cocok di daerah yang anda cari..');
                }else{
                    window.location.assign('hasil-cari-tentor.php?daerah='+status+'&kursus='+kdKursus);
                }
            });
        }

        function pesanUmumApp(icon, title, text)
        {
        Swal.fire({
            icon : icon,
            title : title,
            text : text
        });
        }

    </script>
</body>

</html>