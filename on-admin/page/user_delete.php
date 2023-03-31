<?php

include "../conn/koneksi.php";

$id	= $_GET["id"];

if($delete = mysqli_query ($konek, "DELETE FROM users WHERE id='$id'")){
	header("Location:../super.php");
	exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>