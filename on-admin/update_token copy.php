<?php
$s = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ", 6)), 0, 6);
$token = hash('sha256', $s);
// $token = hash('sha256', 'admin');
$myfile = fopen("../on-siswa/token.txt", "w") or die("Unable to open file!");
$txt = $token;
$decrypted_token = hash('sha256', substr($txt, 0, 6));
fwrite($myfile, $decrypted_token);
fclose($myfile);
header('location:index.php?token=1');

?>