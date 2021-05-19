<?php
session_start();
include('../../config/db.php');
$userLogin = $_SESSION["user_login"];
// cek login 
$qUser = $link -> query("SELECT * FROM tbl_guru WHERE username='$userLogin' LIMIT 0,1;");
$fUser = $qUser -> fetch_assoc();
$nama = $fUser['nama_lengkap'];
?>
<?php 
if($nama == "-"){ ?>
    <div class="alert alert-info">Terima kasih telah melakukan pendaftaran, harap lengkapi profil kamu agar dapat menggunakan aplikasi, terima kasih. </div>
<?php }else{ ?> 

<?php } ?>
<div class="container" style="margin-bottom:20px;">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <img src="<?=$base_url; ?>/ladun/dasbor/img/cover.jpg" style="width:100%;" >
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
            <h3>5</h3>
            <h4>Jadwal Mengajar</h4>
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
            <h3>4</h3>
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
            <h3>5</h3>
            <h4>Pendapatan</h4>
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
            <h3>1</h3>
            <h4>Tentor</h4>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
    </div>
  </div>
</div>