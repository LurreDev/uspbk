<?php
include "../conn/koneksi.php";


$kodesoal		= $_POST['kodesoal'];
$acak			= $_POST['acak'];
$opsi		 	= $_POST['opsi'];
$kelas		 	= $_POST['kelas'];
$waktu		 	= $_POST['waktu'];


	if ($edit = mysqli_query($konek, "UPDATE ujian SET acak='$acak', kelas='$kelas', opsi='$opsi', waktu='$waktu' WHERE kodesoal='$kodesoal'")){
			header("Location:../soal.php");
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
?>