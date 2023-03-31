<?php
include "../conn/koneksi.php";
mysqli_query ($konek, "TRUNCATE TABLE nilaihasil");
header('location:../reset.php?sukses=1');
?>