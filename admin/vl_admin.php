<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include('../konten/base.php');
include('../koneksi.php');

session_start();
$username = $_POST['username'];
$password = $_POST['password'];
 
$q = mysqli_query($konek, "select nip,pass,nama from users where nip='$username' and pass='$password'");
$row = mysqli_num_rows($q);
if ($row == 1) {
    $data = mysqli_fetch_assoc($q);
    $_SESSION['admin'] = $data['nip'];
    $_SESSION['nama'] = $data['nama'];
    header('location:../on-admin/index.php');
} else {
    header('location:login.php?salah=1');
}
?>
