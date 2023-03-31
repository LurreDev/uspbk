<?php
include "../conn/koneksi.php";
mysqli_query ($konek, "TRUNCATE TABLE chat");
header('location:../reset.php?sukses=1');
?>