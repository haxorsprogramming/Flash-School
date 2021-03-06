<?php
session_start();
include "config/db.php";
$usernameLogin = $_SESSION['user_login'];
$qPesanan = $link->query("SELECT * FROM tbl_pemesanan WHERE kd_siswa='$usernameLogin';");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flash School - Pesanan Saya</title>
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
            Daftar pesanan saya
            <hr />
            <table class="table" id="tblDaftarPesanan">
                <thead>
                    <tr>
                        <th>Kd Pemesanan</th>
                        <th>Tentor</th>
                        <th>Kursus</th>
                        <th>Paket</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fPesanan = $qPesanan->fetch_assoc()) { ?>
                        <?php
                        $kdTentor = $fPesanan['kd_tentor'];
                        $kdPesanan = $fPesanan['kd_pemesanan'];
                        // cari username dari data tentor 
                        $qTentor = $link->query("SELECT * FROM tbl_tentor WHERE kd_tentor='$kdTentor' LIMIT 0,1;");
                        $fTentor = $qTentor->fetch_assoc();
                        $usernameTentor = $fTentor['username'];
                        $kdKursus = $fTentor['kd_kursus'];
                        // cari nama tentor dari username
                        $qGuru = $link->query("SELECT * FROM tbl_guru WHERE username='$usernameTentor' LIMIT 0,1;");
                        $fGuru = $qGuru->fetch_assoc();
                        $namaTentor = $fGuru['nama_lengkap'];
                        // cari nama kursus dari kd kursus
                        $qKursus = $link->query("SELECT * FROM tbl_kursus WHERE kd_kursus='$kdKursus';");
                        $fKursus = $qKursus->fetch_assoc();
                        $namaKursus = $fKursus['nama_kursus'];
                        // cari harga dari paket 
                        $kdPaket = $fPesanan['kd_paket'];
                        $qPaket = $link -> query("SELECT * FROM tbl_paket WHERE kd_paket='$kdPaket' LIMIT 0,1;");
                        $fPaket = $qPaket -> fetch_assoc();
                        $hargaPaket = $fPaket['harga'];
                        $namaPaket = $fPaket['nama_paket'];
                        //status pemesanan 
                        $statusMentoring = $fPesanan['status_mentoring'];
                        if($statusMentoring == 'pending'){
                            $capStatus = "Menunggu konfirmasi tentor";
                        }elseif($statusMentoring == 'waiting_payment'){
                            $capStatus = "Menunggu pembayaran & verifikasi admin";
                        }elseif($statusMentoring == 'active'){
                            $capStatus = "Aktif";
                        }else{
                            $capStatus = "Selesai";
                        }
                        ?>
                        <tr>
                            <td><?=$fPesanan['kd_pemesanan']; ?><br/><?= $fPesanan['waktu_pemesanan']; ?></td>
                            <td><?=$namaTentor; ?></td>
                            <td><?=$namaKursus; ?></td>
                            <td><?=$namaPaket; ?></td>
                            <td>Rp. <?=number_format($hargaPaket); ?></td>
                            <td><?=$capStatus; ?></td>
                            <td>
                                <?php if($statusMentoring == 'pending'){ ?>
                                
                                <?php }elseif($statusMentoring == 'active'){ ?>
                                    
                                <?php }else{ ?>
                                    <a href="detail-pesanan.php?kd_pesanan=<?=$kdPesanan; ?>" class="btn btn-primary">Detail</a>
                                <?php } ?>
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
    
    $('#tblDaftarPesanan').dataTable();

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