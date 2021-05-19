<?php
include('../config/db.php');
?>

<div id='divGuru'>
    <div id='divListGuru'>
        <div style='margin-bottom:15px;'>
            <!-- <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahKursusAtc'>
            <i class="fas fa-plus-circle"></i> Tambah Kursus</a> -->
        </div>
        <div class="row" style="padding-left:20px;margin-right:10px;">
            <table id="tblListGuru" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>Nama Guru</th>
                        <th>NIP</th>
                        <th>Tempat / Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>HP</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    $qGuru = $link -> query("SELECT * FROM tbl_guru;");
                    while($fGuru = $qGuru -> fetch_assoc()){ ?> 
                        <tr>
                            <td><?=$fGuru['nama_lengkap']; ?></td>
                            <td><?=$fGuru['nip']; ?></td>
                            <td><?=$fGuru['tempat_lahir']; ?> / <?=$fGuru['tanggal_lahir']; ?></td>
                            <td><?=$fGuru['alamat']; ?></td>
                            <td><?=$fGuru['no_hp']; ?></td>
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