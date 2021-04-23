<?php
session_start();
include('../../config/db.php');
$userLogin = $_SESSION["user_login"];
// cek login 
$qUser = $link -> query("SELECT * FROM tbl_siswa WHERE username='$userLogin' LIMIT 0,1;");
$fUser = $qUser -> fetch_assoc();
$nama = $fUser['nama_lengkap'];
// cari jumlah pesanan 
$qPesanan = $link -> query("SELECT * FROM tbl_pemesanan WHERE kd_siswa='$userLogin';");
$jlhPesanan = mysqli_num_rows($qPesanan);
// cari jadwal belajar 
$totalJadwal = 0;
while($fPesanan = $qPesanan -> fetch_object()){
    $kdPemesanan = $fPesanan -> kd_pemesanan;
    // query total jam di tabel item pesanan 
    $qTotalPesanan = $link -> query("SELECT id FROM tbl_item_pesanan WHERE kd_pemesanan='$kdPemesanan';");
    $totalJam = mysqli_num_rows($qTotalPesanan);
    $totalJadwal = $totalJadwal + $totalJam;
}
// cari jumlah tentor 
$qTentor = $link -> query("SELECT id FROM tbl_tentor;");
$jlhTentor = mysqli_num_rows($qTentor);
// cari total siswa 
$qSiswa = $link -> query("SELECT id FROM tbl_siswa;");
$jlhSiswa = mysqli_num_rows($qSiswa);
?>

<?php 
if($nama == "-"){ ?>
    <div class="alert alert-info">Terima kasih telah melakukan pendaftaran, harap lengkapi profil kamu agar dapat menggunakan aplikasi, terima kasih. </div>
<?php }else{ ?> 

<?php } ?>
<div class="container" style="margin-bottom:20px;">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <img src="../../ladun/dasbor/img/cover.jpg" style="width:100%;" >
    </div>
  </div>
</div>
<hr/>
<div class="container">
  <!-- Statistik Bar -->
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-nadha-primary">
          <i class="fas fa-water"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h3><?=$totalJadwal; ?></h3>
            <h4>Jadwal Belajar</h4>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-nadha-primary">
          <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h3><?=$jlhPesanan; ?></h3>
            <h4>Pemesanan</h4>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-nadha-primary">
          <i class="fas fa-chart-line"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h3><?=$jlhTentor; ?></h3>
            <h4>Tentor</h4>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-nadha-primary">
          <i class="fas fa-donate"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h3><?=$jlhSiswa; ?></h3>
            <h4>Siswa</h4>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
    </div>
  </div>
</div>