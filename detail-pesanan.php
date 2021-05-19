<?php
session_start();
include "config/db.php";
$usernameLogin = $_SESSION['user_login'];
$kdPemesanan = $_GET['kd_pesanan'];
// query pemesanan 
$qPemesanan = $link -> query("SELECT * FROM tbl_pemesanan WHERE kd_pemesanan='$kdPemesanan';");
$fPesan = $qPemesanan -> fetch_assoc();
$kdTentor = $fPesan['kd_tentor'];
$statusPemesanan = $fPesan['status_pembayaran'];
$kdPaket = $fPesan['kd_paket'];
// query tentor 
$qTentor = $link -> query("SELECT * FROM tbl_tentor WHERE kd_tentor='$kdTentor' LIMIT 0,1;");
$fTentor = $qTentor -> fetch_assoc();
$usernameTentor = $fTentor['username'];
$kdKursus = $fTentor['kd_kursus'];

// query guru 
$qGuru = $link -> query("SELECT * FROM tbl_guru WHERE username='$usernameTentor' LIMIT 0,1;");
$fGuru = $qGuru -> fetch_assoc();
$namaGuru = $fGuru['nama_lengkap'];
// query kursus 
$qKursus = $link -> query("SELECT * FROM tbl_kursus WHERE kd_kursus='$kdKursus';");
$fKursus = $qKursus -> fetch_assoc();
$namaKursus = $fKursus['nama_kursus'];
// detail paket 
$qPaket = $link -> query("SELECT * FROM tbl_paket WHERE kd_paket='$kdPaket';");
$fPaket = $qPaket -> fetch_assoc();
$harga = $fPaket['harga'];
// setting bimbel 
$qSetting = $link -> query("SELECT * FROM tbl_setting_bimbel WHERE kd_setting='REKENING' LIMIT 0,1;");
$fSetting = $qSetting -> fetch_assoc();
$rekening = $fSetting['nilai'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flash School - Detail Pesanan</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
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
            Detail pesanan
            <hr/>
            <table class="table">
            <tr>
            <td>Kd Pemesanan</td><td><?=$kdPemesanan; ?></td>
            </tr>
            <tr>
            <td>Tentor</td><td><?=$namaGuru; ?></td>
            </tr>
            <tr>
            <td>Kursus</td><td><?=$namaKursus; ?></td>
            </tr>
            
            <tr>
            <td>Bukti Pembayaran</td>
            <td>
            <img src="file/bukti_pembayaran/<?=$kdPemesanan; ?>.png" id="txtFoto" style="width: 200px;">
            <br/>
            <small>Upload bukti pembayaran</small>
            <input type="file" id="txtInputFoto" onchange="getImg()">
            </td>
            </tr>
            <tr>
            <td>Detail waktu mentoring</td>
            <td>
            <?php
                $kdAwal = 1; 
                $hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat');
                for($x = 0; $x < 5; $x++){ ?>
                    <tr>
                        <td><?=$hari[$x]; ?></td>
                        <td>
                            <?php 
                                $jam = array("08:00", "09:00", "10:00", "11:00","12:00","13:00","14:00","15:00","16:00",);
                                for($j = 0; $j < 9; $j++){ ?>
                                <?php
                                    $qPemesanan = $link -> query("SELECT * FROM tbl_item_pesanan WHERE kd_pemesanan='$kdPemesanan' AND kd_jadwal='$kdAwal';");
                                    $tPemesanan = mysqli_num_rows($qPemesanan);
                                    if($tPemesanan < 1){ ?> 

                                    <?php }else{ ?>
                                        <a href="#!" class="btn btn-success disabled" id="<?=$kdAwal; ?>"><?=$jam[$j]; ?></a>
                                    <?php } ?>
                                    
                                <?php $kdAwal++; } ?>
                        </td>
                    </tr>
                <?php } ?>   
            </td>
            </tr>
            <tr>
            <td>Status pembayaran</td><td><?=$statusPemesanan; ?></td>
            </tr>
            </table>
            <a href="#!" class="btn btn-primary" onclick="simpanAtc()">Simpan</a>
            <hr/>
            <h6>Informasi pembayaran</h6>
            <p>Silahkan lakukan pembayaran sebesar <b>Rp. <?=number_format($harga); ?></b>, ke rekening <?=$rekening; ?></p>
        </div>
    </div>

    </section>
    </div>
    <footer id="footer" class="footer" style="margin-top:30px;">
        <div class="container text-center">
            &copy;<?php echo date("Y"); ?> Iis Rokhmatul Khasanah
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
    var statusGanti = false;
    function getImg()
    {
        var fileGambar = new FileReader();
        var inImg = document.querySelector('#txtInputFoto');
        var sampulImg = document.querySelector('#txtFoto');
        fileGambar.readAsDataURL(inImg.files[0]);
        fileGambar.onload = function(e){
            let hasil = e.target.result;
            sampulImg.src = hasil;
            statusGanti = true;
        }
    }

    function pesanUmumApp(icon, title, text)
    {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }

    function simpanAtc()
    {
        if(statusGanti === false){
            
        }else{
            let dataImg = document.querySelector('#txtFoto').getAttribute('src');
            let kdPemesanan = "<?=$kdPemesanan; ?>";
            let ds = {'dataImg':dataImg, 'kdPemesanan':kdPemesanan}
            $.post('proses-upload-bukti-pembayaran.php', ds, function(data){
                pesanUmumApp('success', 'Sukses', 'Berhasil mengupload bukti pembayaran');
                setTimeout(function(){
                    window.location.assign('pesanan-saya.php');
                }, 2000);
            });
        }
    }

    </script>

</body>

</html>