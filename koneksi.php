<?php
 // Database
 $server     ="localhost";
 $user       ="root";
 $password   ="";
 $database   = "database_kendaraan";

 // Koneksi
 $koneksi = mysqli_connect($server, $user, $password, $database);

 if(!$koneksi){
    die("Koneksi Gagal:".mysqli_connect_error());
 }


?>