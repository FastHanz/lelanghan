<?php
// Menyertakkan file progaram koneksi.php pada register
require('../koneksi.php');

// Inisialisasi Session
session_start();

// Mengecek apakah form register di submit atau tidak
if (isset($_POST['submit']) ){

    // menghilangkan backshlases pada username 
    $username = stripslashes($_POST['username']);

    //cara sederhana mengamankan dari sql injection (dapat menggunakkan tanda " ' ")
    $username = mysqli_real_escape_string($koneksi, $username);
    $name     = stripslashes($_POST['nama_lengkap']);
    $name     = mysqli_real_escape_string($koneksi, $name);
    $password1 = stripslashes($_POST['password1']);
    $password1 = mysqli_real_escape_string($koneksi, $password1);
    $password2   = stripslashes($_POST['password2']);
    $password2   = mysqli_real_escape_string($koneksi, $password2);
    $level   = stripslashes($_POST['id_level']);
    $level   = mysqli_real_escape_string($koneksi, $level);
    

    //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
    if (!empty(trim($name)) && !empty(trim($username)) && !empty(trim($password1)) && !empty(trim($password2)) && !empty(trim($level)) ){
        
        //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
        if ($password1 == $password2){

            //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
            if (cek_nama($name,$koneksi) == 0 ){

                //hashing password sebelum disimpan didatabase
                $password  = password_hash($password2, PASSWORD_DEFAULT);

                //insert data ke database
                $query = "INSERT INTO tb_petugas (nama_petugas, username, password, id_level ) VALUES ('$name','$username','$password','$level')";
                $result   = mysqli_query($koneksi, $query);

                //jika insert data berhasil maka akan diredirect ke halaman home.php serta menyimpan data username ke session
                if ($result) {
                    $_SESSION['username'] = $username;
                    
                    header('Location: login_admin.php');
                 
                //jika gagal maka akan menampilkan pesan error
                } else {
                    $error =  'Register User Gagal !!';
                }
            }else{
                    $error =  'Username sudah terdaftar !!';
            }
        }else{
            $validate = 'Password tidak sama !!';
        }
         
    }else {
        $error =  'Data tidak boleh kosong !!';
    }
} 
//fungsi untuk mengecek username apakah sudah terdaftar atau belum
function cek_nama($username,$koneksi){
    $nama = mysqli_real_escape_string($koneksi, $username);
    $query = "SELECT * FROM tb_petugas WHERE username = '$nama'";
    if( $result = mysqli_query($koneksi, $query) ) return mysqli_num_rows($result);
}