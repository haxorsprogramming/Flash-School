<?php
include("config/db.php");
include("header.php");
if(isset($_SESSION['user_login'])){
  $statusLogin = TRUE;
}else{
  $statusLogin = FALSE;
}
?>
<!--/ Modal box-->
<!--Banner-->
<div class="banner">
  <div class="bg-color">
    <div class="container">
      <div class="row">
        <div class="banner-text text-center">

          <div class="intro-para text-center quote" style="padding-top:180px;">
            <p class="big-text">FLASH SCHOOL</p>
            <p class="small-text">Pesan Tentor Kursus Dengan Mudah dan Cepat</p>
            <?php if($statusLogin == TRUE){ ?>
              <?php if($_SESSION['user_login'] == 'guru'){ ?> <?php } ?>
              
              <a href="cari-tentor.php" class="btn btn-primary btn-lg">Cari tentor</a>
            <?php }else{ ?>
              <a href="login.php" class="btn btn-primary btn-lg">Silahkan login untuk mencari tentor</a>
            <?php } ?>
          </div>
          <br>
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
            <p>Bimbingan Akademik</p>
            <p>Matematika</p>
            <p>Fisika</p>
            <p>Kimia</p>
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
            <p>Bahasa Mandarin</p>

          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-box text-center">
          <div class="icon-text">
            <h4 class="ser-text">Seni</h4><br>
          </div>
          <div class="text-left">
            <p>Menggambar</p>
            <p>Menjahit</p>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="work-shop" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <img src="<?=$base_url; ?>img/workingspace.png" alt="Workingspace" class="img-fluid">
      </div>
      <div class="col-md-6 col-sm-6">
        <h3 class="text-center">FASILITAS</h3><br>
        <h4 class="fasilitas">- Bebas Pilih Jadwal hari dan Jam Belajar</h4>
        <h4 class="fasilitas">- Bebas Pilih Tempat Belajar</h4>
        <h4 class="fasilitas">- Pengajar Profesional</h4>
        <h4 class="fasilitas">- Metode Belajar Flash Trick</h4>
        <h4 class="fasilitas">- Free konsultan</h4>
        <h4 class="fasilitas">- Biaya Terjangkau</h4> <br>
        <h2 class="fasilitas">Biaya Pendaftaran</h2>
        <?php 
          $qSetting = $link -> query("SELECT * FROM tbl_setting_bimbel WHERE kd_setting='BIAYA_REGISTRASI' LIMIT 0,1;");
          $fSetting = $qSetting -> fetch_assoc();
          $biaya = $fSetting['nilai'];
        ?>
        <h2 class="fasilitas harga">Rp. <?=number_format($biaya); ?></h2>

      </div>

    </div>

  </div>
  </div>
</section>
<!--Contact-->

<div class="container">
  <section id="faculity-member" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Pilihan Paket</h2>
          <hr class="bottom-line">
        </div>
        <div class="text-center">
        <table class="table">
        <tr>
              <th>Nama Paket</th> <th>Ketarangan</th> <th>Jenjang</th> <th>Harga</th> <th>Pertemuan</th>
        </tr>
        <?php 
            $qPaket = $link -> query("SELECT * FROM tbl_paket;");
            while($fPaket = $qPaket -> fetch_assoc()){ ?>
              <tr>
              <td><?=$fPaket['nama_paket']; ?></td>
              <td><?=$fPaket['keterangan']; ?></td>
              <td><?=$fPaket['jenjang']; ?></td>
              <td>Rp. <?=number_format($fPaket['harga']); ?></td>
              <td><?=$fPaket['pertemuan']; ?></td>
              </tr>
            <?php }?>
        </table>
         
        </div>
      </div>
    </div>
</div>


<?php
include("footer.php");
?>