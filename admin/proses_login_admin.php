<?php 

// Memulai session
session_start();

// Menyertakan file program koneksi.php ke login_admin.php
include "../koneksi.php";

// Memasukan data dari form input data admin ke dalam variable
$username = $_POST['username'];
$password = $_POST['password'];

//cek data dari database apakah username ada/tidak.
$sql = "SELECT * FROM tb_petugas WHERE username = '$username'";
$qry = mysqli_query($koneksi,$sql);
$usr = mysqli_fetch_array($qry);

// Pengondisian jika nilai username dan password (Database) sama dengan username dan password yang diinput ulang saat proses login

// if (password_verify($password, $usr['password'])) {

     
if ( $username == $usr['username'] AND password_verify($password, $usr['password'])) {

    // hash($username) == ($usr['username'])
    // AND
    // hash($password) == hash($usr['password'])) {

 $_SESSION['id_petugas']   = $usr['id_petugas'];
 $_SESSION['username'] = $usr['username'];
 $_SESSION['passoword'] = $usr['password'];
 $_SESSION['nama']     = $usr['nama'];
 $_SESSION['id_level']    = $usr['id_level'];
 $_SESSION['login']    = 1;

    //  Jika level:1 = Admin dan Level:2 = Petugas.
 $level  = $_SESSION['id_level'];
    if($level == 1) { include "home_admin.php"; }
        if($level == 2) { include "home_petugas.php"; }
        
    $nama     = $_SESSION['nama'];
    $username = $_SESSION['username'];

    // echo "Selamat Datang $nama ($username)";
    // echo "Login berhasil, selamat datang $username";
    } else {
        echo "Login gagal, username atau password anda salah!";
        }
    
?>
<!-- <script>
 alert('');
 location='login_admin.php';
</script> -->

<!-- <?php echo $pesan;?> -->