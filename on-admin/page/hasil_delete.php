<?php

include "../conn/koneksi.php";

$id	= $_GET["id"];

$hapus=mysqli_query($konek, "SELECT * FROM nilaihasil WHERE id='$id'");

if($delete = mysqli_query ($konek, "DELETE FROM nilaihasil WHERE id='$id'")){
	header("Location:../hasiltest.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>