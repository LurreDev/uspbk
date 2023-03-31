<?php
session_start();
include ('conn/koneksi.php');
include ('conn/fungsi.php');
 
//alogritma sha256
// 1. Inisialisasi nilai awal
// 2. Ubah data menjadi bit stream
// 3. Padding data
// 4. Bagi data menjadi blok-blok
// 5. Loop untuk setiap blok:
//    a. Inisialisasi variabel hash
//    b. Loop untuk 64 ronde:
//       i. Inisialisasi variabel konstanta
//       ii. Inisialisasi variabel jadwal pesan
//       iii. Operasi fungsi
//       iv. Update variabel hash
//    c. Update nilai hash total
// 6. Konversi nilai hash total menjadi hash SHA256
// 7. Return nilai hash SHA256



// Padding pesan menjadi kelipatan 512-bit
function padding($message) {
    $length = strlen($message) * 8;
    $message .= chr(0b10000000);
    while ((strlen($message) * 8) % 512 !== 448) {
        $message .= chr(0);
    }
    $message .= pack("N*", 0, 0, ($length >> 32) & 0xffffffff, $length & 0xffffffff);
    return $message;
}

// Iterasi pengolahan pesan per blok
function hash_sha256($message) {
    $message = padding($message);
    $blocks = str_split($message, 64);

    // Untuk setiap blok, lakukan:
    foreach ($blocks as $block) {
        // Inisialisasi variabel awal hash
        $h0 = 0x6a09e667;
        $h1 = 0xbb67ae85;
        $h2 = 0x3c6ef372;
        $h3 = 0xa54ff53a;
        $h4 = 0x510e527f;
        $h5 = 0x9b05688c;
        $h6 = 0x1f83d9ab;
        $h7 = 0x5be0cd19;
        // Inisialisasi variabel hash sementara

        $a = $h0;
        $b = $h1;
        $c = $h2;
        $d = $h3;
        $e = $h4;
        $f = $h5;
        $g = $h6;
        $h = $h7;

        // Iterasi pengolahan blok per 32-bit word
        $words = str_split($block, 4);
        foreach ($words as $j => $word) {
            // Hitung nilai sigma0, sigma1, maj
            $sigma0 = ($a >> 2 | $a << 30) ^ ($a >> 13 | $a << 19) ^ ($a >> 22 | $a << 10);
            $sigma1 = ($e >> 6 | $e << 26) ^ ($e >> 11 | $e << 21) ^ ($e >> 25 | $e << 7);
            $maj = ($a & $b) ^ ($a & $c) ^ ($b & $c);

            // Hitung nilai temp1, temp2
            $temp1 = $h + $sigma1 + $maj + unpack("N", $word)[1];
            $temp2 = $sigma0 + (($e & $f) ^ (~$e & $g));

            // Update nilai
            $h = $g;
            $g = $f;
            $f = $e;
            $e = $d + $temp1;
            $d = $c;
            $c = $b;
            $b = $a;
            $a = $temp1 + $temp2;
        }
    
        // Update nilai variabel hash awal
        $h0 += $a;
        $h1 += $b;
        $h2 += $c;
        $h3 += $d;
        $h4 += $e;
        $h5 += $f;
        $h6 += $g;
        $h7 += $h;
    }
    
    // Hasilkan hash dari nilai variabel hash awal
    $hash = pack("N*", $h0, $h1, $h2, $h3, $h4, $h5, $h6, $h7);
    return bin2hex($hash);
   }


   $datetime = new DateTime();
$datenow = $datetime->format('Y-m-d H:i:s');
$username = $nama;
$waktu = $datenow;
$kombinasikata =$username.$datenow;
$encrpt = hash_sha256($kombinasikata);
// if ($encrpt) {
//     // $random_chars = substr($encrpt, mt_rand(0, strlen($encrpt) - 6), 6);
//     $random_chars = strtoupper(substr($encrpt, mt_rand(0, strlen($encrpt) - 6), 6));
    
//     if ($add3 = mysql_query($konek, "INSERT INTO token (username, waktu, encrpt, hasil_token) VALUES ('$username', '$waktu', '$encrpt', '$random_chars')")) {
//                 header('location:index.php?token=1');
//                 exit();
//             } else {
//                 die ("Terdapat kesalahan : ". mysql_error($konek));
//             }
// }

if ($encrpt) {
    // $random_chars = substr($encrpt, mt_rand(0, strlen($encrpt) - 6), 6);
    $random_chars = strtoupper(substr($encrpt, mt_rand(0, strlen($encrpt) - 6), 6));
    
    if ($add3 = mysqli_query($konek, "INSERT INTO token (username, waktu, encrpt, hasil_token) VALUES ('$username', '$waktu', '$encrpt', '$random_chars')")) {
        header('location:index.php?token=1');
        exit();
    } else {
        die ("Terdapat kesalahan : ". mysqli_error($konek));
    }
}


?>
