<?php 
include('../config/db.php');
// query registrasi 
$qRegistrasi = $link -> query("SELECT * FROM tbl_registrasi_siswa;");
?>
<div id="divRegistrasi">
    <div id="divListRegistrasi">
        <div class="row" style="padding-left:20px;margin-right:10px;">
            <table id="tblListRegistrasi" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>Kd registrasi</th>
                        <th>Nama siswa</th>
                        <th>Waktu registrasi</th>
                        <th>Status pembayaran</th>
                        <th>Bukti pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; while($fRegistrasi = $qRegistrasi -> fetch_assoc()){ ?>
                <?php 
                    $username = $fRegistrasi['username'];
                    // cari nama siswa 
                    $qSiswa = $link -> query("SELECT * FROM tbl_siswa WHERE username='$username' LIMIT 0,1;");
                    $fSiswa = $qSiswa -> fetch_assoc();
                    $namaSiswa = $fSiswa['nama_lengkap'];
                    $statusPembayaran = $fRegistrasi['status_pembayaran'];
                ?>
                <tr>
                    <td><?=$fRegistrasi['kd_registrasi']; ?></td>
                    <td><?=$namaSiswa; ?></td>
                    <td><?=$fRegistrasi['waktu_registrasi']; ?></td>
                    <td><?=$fRegistrasi['status_pembayaran']; ?></td>
                    <td><a href="<?=$base_url; ?>file/bukti_pendaftaran/<?=$username; ?>.png" target="new">Lihat</a></td>
                    <td>
                    <?php if($statusPembayaran === 'pending'){ ?>
                        <a href="#!" class="btn btn-primary" @click="verifikasiAtc('<?=$username; ?>')"><i class="fas fa-check-circle"></i> Verifikasi</a>
                    <?php }else{ ?>
                    
                    <?php } ?>
                        
                    </td>
                </tr>
                <?php } $no++; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

var rToVerifikasi = "<?=$base_url; ?>admin_app/verifikasi-pembayaran-registrasi.php";

$("#tblListRegistrasi").dataTable();

var divRegistrasi = new Vue({
    el : '#divRegistrasi',
    data : {
        
    },
    methods : {
        verifikasiAtc : function(username)
        {
            Swal.fire({
                title: "Konfirmasi ... ?",
                text: "Yakin memverifikasi pembayaran untuk pendaftaran siswa ini ... ?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.value) {
                    let ds = {'username':username}
                    $.post(rToVerifikasi, ds, function(data){
                        pesanUmumApp('success', 'Sukses', 'Berhasil merubah status pembayaran registrasi siswa ... ');
                        divMain.titleApps = "Data Registrasi Siswa";
                        renderMenu('data-registrasi-siswa.php');
                    });
                }
            });
           
        }
    }
});

</script>