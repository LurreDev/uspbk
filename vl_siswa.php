<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include('koneksi.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$inputtoken = $_POST['token'];

// $token = file_get_contents("on-siswa/token.txt");

$query = mysqli_query($konek, "SELECT * FROM token WHERE hasil_token ='$inputtoken'");
$data = mysqli_num_rows($query);
if ($data>0) {
    $data2 = mysqli_fetch_array($query);
    $startDateTime = $data2['waktu'];
    $addTime = 2; // waktu yang ingin ditambahkan dalam menit
    $newDateTime = date('Y-m-d H:i:s', strtotime($startDateTime) + $addTime * 60);
    $datetime = new DateTime();
    $datenow = $datetime->format('Y-m-d H:i:s');
    if ($datenow > $newDateTime) {
        # code...
        header('location:login.php?token=1');
    } else {
        # code...
        $konek = mysqli_connect("localhost", "root", "212515", "usbk");
        $username = mysqli_real_escape_string($konek, $username);
        $password = mysqli_real_escape_string($konek, $password);
        $q = mysqli_query($konek, "select nis,pass,nama,statuslogin from siswa where BINARY nis='$username' and pass='$password'");
        $row = mysqli_num_rows($q);
        if ($row == 1) {
            $data = mysqli_fetch_assoc($q);
            $_SESSION['siswa'] = $data['nis'];
            $_SESSION['nama'] = $data['nama'];
            mysqli_query($konek, "update siswa set online='1'where nis='$username'");
            header('location:on-siswa/index.php');
        } else {
            header('location:login.php?salah=1');
        }
    }
    
    
} else {
    header('location:login.php?token=1');
}
?>
