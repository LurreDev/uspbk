<?php
include ('conn/koneksi.php');
include ('conn/fungsi.php');

$connect = mysql_connect('localhost','root','');
if (!$connect) {
die('Could not connect to MySQL: ' . mysql_error());
}
//nama database
$cid =mysql_select_db('smpnsby1_38school',$connect);

file_put_contents(
    'versi/aktif/images.zip',
    file_get_contents( 'https://smpn38sby.sch.id/update_cbtschool/syncron/images.zip' )
);



$zip = new ZipArchive;
$zip->open('versi/aktif/images.zip');
$zip->extractTo('./images/');
$zip->close();
unlink('versi/aktif/images.zip');

header("location:sync.php?pesan=sukses");
exit();
?>