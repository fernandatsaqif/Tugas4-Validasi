<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'registrasi';

    $conn = mysqli_connect($host, $user, $password, $dbname);
     
    if ($conn) {
      //echo "koneksi berhasil";
    }

    mysqli_select_db($conn, $dbname);
?>