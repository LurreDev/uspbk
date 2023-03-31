<?php 
session_start();
include ('conn/koneksi.php');
include ('conn/cek.php');
include "bundle/script.php";
mysqli_query ($konek, "UPDATE siswa SET online='2' WHERE nis='$username'"); 
?>
<?php
session_start();
session_destroy();
header('location:../login.php');
?>