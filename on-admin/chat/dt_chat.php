<?php
include ('conn/koneksi.php');
include ('conn/fungsi.php');
?>

					<?php
					    $tgl = date('Y-m-d',filemtime($ar[comment]));
						$querydosen = mysqli_query ($konek, "SELECT * FROM chat ORDER BY id DESC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
						$komentar = $ar['comment'];

// mengubah emoticons teks ke bentuk image dengan menggunakan tag <img>

$komentar = str_replace(":bingung", "<img src=\"smiley/bingung.gif\">", $komentar);
$komentar = str_replace(":capede", "<img src=\"smiley/capede.gif\">", $komentar);
$komentar = str_replace(":pentung", "<img src=\"smiley/hammer.gif\">", $komentar);
$komentar = str_replace(":hoax", "<img src=\"smiley/hoax.gif\">", $komentar);
$komentar = str_replace(":malu", "<img src=\"smiley/malu.gif\">", $komentar);
$komentar = str_replace(":marah", "<img src=\"smiley/marah.gif\">", $komentar);
$komentar = str_replace(":ngakak", "<img src=\"smiley/ngakak.gif\">", $komentar);
$komentar = str_replace(":top", "<img src=\"smiley/top.gif\">", $komentar);
$komentar = str_replace(":wkwk", "<img src=\"smiley/wkwk.gif\">", $komentar);
$komentar = str_replace(":wow", "<img src=\"smiley/wow.gif\">", $komentar);
							
							echo "
	<div class='container1'>
    <p  style='color:black;'>$komentar</p>
    <span class='time-right' style='color:red;'><h6>$ar[user] |  $ar[tanggal]</h6></span>
    </div>							
								";
						$i++;		
						}
					?>
				