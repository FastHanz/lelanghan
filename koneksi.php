<?php
$nama_host='localhost';
$username='root';
$password ='';
$nama_db ='lelanghan';

$koneksi= mysqli_connect($nama_host,$username,$password,$nama_db) or die(mysqli_error()) ;

// if (mysqli_connect_errno()){ 
//      echo"Kesalahan pada database:".mysqli_error($koneksi);
    
//     }