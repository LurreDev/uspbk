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
    'ujian.zip',
    file_get_contents( 'https://smpn38sby.sch.id/update_cbtschool/syncron/ujian.zip' )
);



$zip = new ZipArchive;
$zip->open('ujian.zip');
$zip->extractTo('./');
$zip->close();
// Name of the file
$filename = 'ujian.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';
// Database name
$mysql_database = 'smpnsby1_38school';

// Connect to MySQL server
$con = @new mysqli($mysql_host,$mysql_username,$mysql_password,$mysql_database);

// Check connection
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_errno;
    echo "<br/>Error: " . $con->connect_error;
}

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line) {
// Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

// Add this line to the current segment
    $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';') {
        // Perform the query
        $con->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $con->error() . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
}
echo "Tables imported successfully";
unlink('ujian.zip');
unlink('ujian.sql');
header("location:sync.php?pesan=sukses");
exit();
?>