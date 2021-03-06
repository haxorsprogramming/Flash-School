<?php
session_start();
include "../../config/db.php";

$kdPemesanan = $_GET['kd_pesanan'];
// query pemesanan 
$qPemesanan = $link->query("SELECT * FROM tbl_pemesanan WHERE kd_pemesanan='$kdPemesanan';");
$fPesan = $qPemesanan->fetch_assoc();
$kdTentor = $fPesan['kd_tentor'];
$statusPemesanan = $fPesan['status_pembayaran'];
$statusMentoring = $fPesan['status_mentoring'];
// query tentor 
$qTentor = $link->query("SELECT * FROM tbl_tentor WHERE kd_tentor='$kdTentor' LIMIT 0,1;");
$fTentor = $qTentor->fetch_assoc();
$usernameTentor = $fTentor['username'];
$kdKursus = $fTentor['kd_kursus'];
// query guru 
$qGuru = $link->query("SELECT * FROM tbl_guru WHERE username='$usernameTentor' LIMIT 0,1;");
$fGuru = $qGuru->fetch_assoc();
$namaGuru = $fGuru['nama_lengkap'];
// query kursus 
$qKursus = $link->query("SELECT * FROM tbl_kursus WHERE kd_kursus='$kdKursus';");
$fKursus = $qKursus->fetch_assoc();
$namaKursus = $fKursus['nama_kursus'];

// total jam 

?>
<div class="container" id="divDetailPemesanan">
    <div style="margin-top:40px;text-align:left;">
        Detail pesanan
        <hr />
        <table class="table">
            <tr>
                <td>Kd Pemesanan</td>
                <td><?= $kdPemesanan; ?></td>
            </tr>
            <tr>
                <td>Tentor</td>
                <td><?= $namaGuru; ?></td>
            </tr>
            <tr>
                <td>Kursus</td>
                <td><?= $namaKursus; ?></td>
            </tr>
            <tr>
                <td>Detail waktu mentoring</td>
                <td>
                    <?php
                    $kdAwal = 1;
                    $hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat');
                    for ($x = 0; $x < 5; $x++) { ?>
            <tr>
                <td><?= $hari[$x]; ?></td>
                <td>
                    <?php
                        $jam = array("08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00",);
                        for ($j = 0; $j < 9; $j++) { ?>
                        <?php
                            $qPemesanan = $link->query("SELECT * FROM tbl_item_pesanan WHERE kd_pemesanan='$kdPemesanan' AND kd_jadwal='$kdAwal';");
                            $tPemesanan = mysqli_num_rows($qPemesanan);
                            if ($tPemesanan < 1) { ?>

                        <?php } else { ?>
                            <a href="#!" class="btn btn-info" id="<?= $kdAwal; ?>"><?= $jam[$j]; ?></a>
                        <?php } ?>

                    <?php $kdAwal++;
                        } ?>
                </td>
            </tr>
        <?php } ?>
        </td>
        </tr>
        <tr>
            <td>Status</td>
            <?php if($statusMentoring === 'pending'){?>
               <td>Menunggu anda terima</td>
            <?php }elseif($statusMentoring === 'waiting_payment'){ ?>
                <td>Menunggu pembayaran siswa</td>
            <?php }elseif($statusMentoring === 'active'){?>
                <td>Aktif</td>
            <?php }else{ ?>
                <td>Selesai</td>
            <?php } ?>
        </tr>
        </table>
        <h5>Aksi</h5><br/>
        <?php if($statusMentoring === 'pending'){?>
            <a href="#!" class="btn btn-primary" @click="terimaPesananTentorAtc('<?=$kdPemesanan; ?>')">Terima pesanan</a>
        <?php }elseif($statusMentoring === 'waiting_payment'){ ?>
                
        <?php }elseif($statusMentoring === 'active'){?>
            <a href="#!" class="btn btn-primary" @click="selesaiAtc('<?=$kdPemesanan; ?>')">Set selesai</a>
        <?php }else{ ?> 
        
        <?php } ?>

    </div>
</div>

<script>

var rToTerimaPesanan = "<?=$base_url;?>main_app/guru/terima-pesanan-awal.php";

var divDetailPemesanan = new Vue({
    el : '#divDetailPemesanan',
    data : {
        
    },
    methods : {
        selesaiAtc : function()
        {
            let kdPemesanan = "<?=$kdPemesanan; ?>";
            let ds = {'kdPemesanan':kdPemesanan}

            Swal.fire({
            title: "Proses ke selesai ?",
            text: "Selesaikan proses mentoring ke siswa ... ?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.value) {
                    $.post('verifikasi-selesai.php', ds, function(data){
                        pesanUmumApp('success', 'Sukses', 'Berhasil menyelesaikan pemesanan mentoring');
                        divMain.titleApps = "Data pemesanan";
                        renderMenu('data-pemesanan.php');
                    });
                }
            });

        },
        terimaPesananAtc : function()
        {
            let kdPemesanan = "<?=$kdPemesanan; ?>";
            let ds = {'kdPemesanan':kdPemesanan}

            Swal.fire({
            title: "Terima pesanan ... ?",
            text: "Terima pesanan mentoring dari siswa ... ?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.value) {
                    $.post('terima-pesanan.php', ds, function(data){
                        pesanUmumApp('success', 'Sukses', 'Berhasil menerima pemesanan mentoring');
                        divMain.titleApps = "Data pemesanan";
                        renderMenu('data-pemesanan.php');
                    });
                }
            });

        },
        terimaPesananTentorAtc : function(kdPemesanan)
        {
            let ds = {'kdPesanan':kdPemesanan}
            let konfirmasi = window.confirm("Terima pesanan ini? ... ");
            if(konfirmasi === true){
                $.post(rToTerimaPesanan, ds, function(data){
                    pesanUmumApp('success', 'Sukses', 'Berhasil menerima pesanan, silahkan tunggu pembayaran dari siswa ...');
                    divMain.titleApps = "Data pemesanan";
                    renderMenu('data-pemesanan.php');
                });
            }else{

            }
            
        }
    }
});

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}
  

</script>