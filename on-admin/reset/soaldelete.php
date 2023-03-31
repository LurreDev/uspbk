<?php
include "../conn/koneksi.php";
mysqli_query ($konek, "TRUNCATE TABLE soal");
mysqli_query ($konek, "TRUNCATE TABLE ujian");
array_map('unlink', glob("../images/*"));
header('location:../reset.php?sukses=1');
?>