<?php 
include('../config/db.php');
// query data setting 
$qSetting = $link -> query("SELECT * FROM tbl_setting_bimbel;");
?>
<div id="divSetting">

    <div id="divListSetting">
        <div style="margin-bottom:15px;">
        </div>
        <div class="row" style="padding-left:20px;margin-right:10px;">
            <table id="tblListSetting" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>Kd setting</th>
                        <th>Nama setting</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($fSetting = $qSetting -> fetch_assoc()){ ?>
                <tr>
                    <td><?=$fSetting['kd_setting']; ?></td>
                    <td><?=$fSetting['nama_setting']; ?></td>
                    <td><?=$fSetting['nilai']; ?></td>
                    <td>
                        <a @click="editAtc('<?=$fSetting['kd_setting']; ?>')" href="#!" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<script>

$("#tblListSetting").dataTable();

var divSetting = new Vue({
    el : '#divSetting',
    data : {

    },
    methods : {
        editAtc : function(kdSetting)
        {
            divMain.titleApps = "Setting Bimbel";
            renderMenu('edit-setting-bimbel.php?kd_setting='+kdSetting);
        }
    }
});

</script>