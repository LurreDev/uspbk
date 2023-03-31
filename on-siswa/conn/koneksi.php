<?php
include('cek.php');
include ('../koneksi.php');
$query = mysqli_query ($conn, "SELECT * FROM siswa WHERE nis='$username'");
$ar = mysqli_fetch_array ($query);
?>