<?php
session_start();
include "config/db.php";
// ambil data kd tentor melalui url (get)
$kdTentor = $_GET['kd_tentor'];
// query & fetch data tentor 
$dataTentor = $link -> query("SELECT * FROM tbl_tentor WHERE kd_tentor='$kdTentor' LIMIT 0,1;");
$fTentor = $dataTentor -> fetch_assoc();
$usernameTentor = $fTentor['username'];
$kdKursus = $fTentor['kd_kursus'];
// data guru 
$qGuru = $link -> query("SELECT * FROM tbl_guru WHERE username='$usernameTentor' LIMIT 0,1;");
$fGuru = $qGuru -> fetch_assoc();
// data kursus 
$qKursus = $link -> query("SELECT * FROM tbl_kursus WHERE kd_kursus='$kdKursus';");
$fKursus = $qKursus -> fetch_assoc();
$namaKursus = $fKursus['nama_kursus'];
// query paket
$qPaket = $link -> query("SELECT * FROM tbl_paket;");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flash School - Pesan Tentor</title>
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
              <h4>Form pemesanan</h4>
              <table class="table" style="width: 45%;">
                <tr>
                    <td>Nama Tentor</td>
                    <td style="text-align: center;"><img src="file/img_guru/<?=$fTentor['username']; ?>.png" style="width: 90px;">
                    <br/>
                    <?=$fGuru['nama_lengkap']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Kursus</td><td><?=$namaKursus ; ?></td>
                </tr>
                <tr>
                    <td>Total harga</td><td><span id="txtTotalHarga">-</span></td>
                </tr>
                <tr>
                    <td>Jenis paket</td><td><span id="txtJenisPaket">-</span></td>
                </tr>
                <tr>
                    <td>Total pertemuan</td><td><span id="txtTotalPertemuan">-</span></td>
                </tr>
              </table>
              <div>
              <h5>Pilih jenis paket</h5>
              </div> 
              <div class="form-group">
                    <label>Paket</label>
                    <select class="form-control" onchange="setPaket()" id="txtPaket">
                        <option value="none">-- Pilih paket --</option>
                        <?php while($fPaket = $qPaket -> fetch_assoc()){ ?>
                            <option value="<?=$fPaket['kd_paket']; ?>|<?=$fPaket['pertemuan']; ?>|<?=$fPaket['nama_paket']; ?>|<?=$fPaket['harga']; ?>">
                                <?=$fPaket['nama_paket']; ?> (Rp. <?=number_format($fPaket['harga']); ?>) - Total <?=$fPaket['pertemuan']; ?> Pertemuan
                            </option>
                        <?php } ?>
                    </select>
              </div>
              <hr/>
              <div>
              <h5>Pilih waktu mentoring (<span id="capPilihWaktu"></span>)</h5>
              </div> 
              <table class="table">
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
                                    $qCekTentorJadwal = $link -> query("SELECT id FROM tbl_item_pesanan WHERE kd_tentor='$kdTentor' AND kd_jadwal='$kdAwal' AND status='1';");
                                    $totalJadwal = mysqli_num_rows($qCekTentorJadwal);
                                    if($totalJadwal < 1){
                                        $sb = "btn-success";
                                        $sd = "";
                                    }else{
                                        $sb = "btn-info";
                                        $sd = "disabled"; 
                                    }
                                ?>
                                    <a href="#!" class="btn <?=$sb; ?> <?=$sd;?> btnAdd" id="<?=$kdAwal; ?>"><?=$jam[$j]; ?></a>
                                <?php $kdAwal++; } ?>
                        </td>
                    </tr>
                <?php } ?>   
              </table>
                    <?php if (isset($_SESSION['user_login'])) { ?>
                        <a href="#!" class="btn btn-primary" onclick="prosesPraPesanan()"><i class="far fa-credit-card"></i> Buat pesanan</a>
                    <?php } else { ?>
                        Harap <a href="login.php" style="color: blue;">login</a> terlebih dahulu untuk melakukan pemesanan!!&nbsp;
                    <?php } ?>
                <a href="#!" class="btn btn-info" onclick="refreshHalaman()"><i class="fas fa-history"></i> Refresh Jadwal</a>         
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
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <script>

    function refreshHalaman()
    {
        location.reload();
    }

    var rToBuatPraPesanan = "<?=$base_url; ?>buat-pra-pesanan.php";
    var rToUpdatePesanan = "<?=$base_url; ?>update-item-pesanan.php";
    var dataJam = [];
    var totalHarga = 0;
    var kdTentor = "<?=$kdTentor; ?>";
    var totalPertemuanMinggu = 0;

    $(".btnAdd").click(function(){
        let totalJamSekarang = dataJam.length;
        if(totalPertemuanMinggu < 1){
            pesanUmumApp('warning', 'Pilih paket', 'Harap pilih paket terlebih dahulu ...');
        }else{
            if(totalJamSekarang >= totalPertemuanMinggu){
            pesanUmumApp('warning', 'Over limit', 'Quota total pertemuan telah habis ...');
            }else{
                let jam = $(this).attr('id');
                dataJam.push(jam);
                let totalJam = dataJam.length;
                $(this).removeClass('btn-success');
                $(this).addClass('btn-warning');
                $(this).addClass('disabled');
            }
        }

    });

    function pesanUmumApp(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }

    function prosesPraPesanan()
    {
        let totalJam = dataJam.length;
        if(totalJam < 1){
            pesanUmumApp('warning', 'Pilih jam', 'Harap pilih jam terlebih dahulu');
        }else{
            Swal.fire({
            title: "Proses pesanan ?",
            text: "Yakin memproses pesanan tentor ... ?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.value) {
                    let dataPaket = document.querySelector("#txtPaket").value;
                    let exPaket = dataPaket.split("|");
                    let kdPaket = exPaket[0];
                    let ds = {'kdTentor':kdTentor, 'kdPaket':kdPaket}
                    $.post(rToBuatPraPesanan, ds, function(data){
                        let obj = JSON.parse(data);
                        let kdPemesanan = obj.kd_pemesanan;
                        let kdTentor = obj.kd_tentor;
                        //save to item pesanan 
                        var i;
                        for(i = 0; i < dataJam.length; i++){
                            let ds = {'kdPesanan':kdPemesanan, 'kdJadwal':dataJam[i], 'kdTentor':kdTentor}
                            $.post(rToUpdatePesanan, ds, function(data){
                                let obj = JSON.parse(data);
                                console.log(obj);
                            });
                        }
                        pesanUmumApp('success', 'Sukses', 'Sukses melakukan pemesanan tentor ... Silahkan lakukan pembayaran di halaman berikutnya');
                        setTimeout(function(){
                            window.location.assign('pesanan-saya.php');
                        }, 3000);
                    });
                }
            });
        }
        
    }

    function setPaket()
    {
        let paket = document.querySelector("#txtPaket").value;
        if(paket === 'none'){

        }else{
            let paketSplit = paket.split("|");
            let totalPertemuan = paketSplit[1];
            let namaPaket = paketSplit[2];
            let pertemuanSet = parseInt(totalPertemuan) / 4;
            let totalHarga = paketSplit[3];
            totalPertemuanMinggu = pertemuanSet;
            let teksPertemuan = totalPertemuan + " per-bulan | " + pertemuanSet + " per-minggu";
            let teksCap = "Hanya dapat memilih total " + pertemuanSet + " pertemuan per minggu";

            document.querySelector("#txtJenisPaket").innerHTML = namaPaket;
            document.querySelector("#txtTotalPertemuan").innerHTML = teksPertemuan;
            document.querySelector("#capPilihWaktu").innerHTML = teksCap;
            document.querySelector("#txtTotalHarga").innerHTML = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'IDR' }).format(totalHarga);;
        }
    }

    </script>

</body>

</html>