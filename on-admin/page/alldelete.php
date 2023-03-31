<?php
include('../conn/koneksi.php');
mysqli_query ($konek, "TRUNCATE TABLE siswa");
header('location:../siswa.php');
?>