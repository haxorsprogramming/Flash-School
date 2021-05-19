<?php
include('../config/db.php');
$qSiswa = $link -> query("SELECT * FROM tbl_siswa;");
?>

<div id='divGuru'>
    <div id='divListGuru'>
        <div style='margin-bottom:15px;'>
        </div>
        <div class="row" style="padding-left:20px;margin-right:10px;">
            <table id="tblListGuru" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Tanggal Lahir / Tempat Lahir</th>
                        <th>Alamat</th>
                        <th>Total Pesanan Bimbel</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($fSiswa = $qSiswa -> fetch_assoc()){ ?>
                <?php 
                    $usernameSiswa = $fSiswa['username'];
                    $qPesanan = $link -> query("SELECT id FROM tbl_pemesanan WHERE kd_siswa='$usernameSiswa';");
                    $totalPesanan = mysqli_num_rows($qPesanan);
                ?>
                    <tr>
                        <td><?=$fSiswa['nama_lengkap']; ?></td>
                        <td><?=$fSiswa['tanggal_lahir']; ?> / <?=$fSiswa['tempat_lahir']; ?></td>
                        <td><?=$fSiswa['alamat']; ?></td>
                        <td><?=$totalPesanan; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<script>

$("#tblListGuru").dataTable();

</script>