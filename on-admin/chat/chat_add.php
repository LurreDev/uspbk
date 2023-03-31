<?php
include "../conn/koneksi.php";


$user					= $_POST['user'];
$comment			    = $_POST['comment'];

if ($add = mysqli_query($konek, "INSERT INTO chat (user, comment) VALUES 
	('$user', '$comment')")){
		header("Location:../chat.php");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>