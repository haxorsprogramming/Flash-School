<?php

include 'connect.php';
$nama = $_GET["id"];

if (hapus($nama) > 0) {
  echo "<script>
  alert('Data Berhasil Dihapus');
  document.location.href = 'list_pesanan.php';
</script>";
} else {
  echo "<script>
  alert('Data gagal dihapus');
  document.location.href = 'list_pesanan.php';
</script>";
}

function hapus($nama)
{
  global $db;
  mysqli_query($db, "DELETE FROM pesanan WHERE id = $nama");
  return mysqli_affected_rows($db);
}
