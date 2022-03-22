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
    $telepon   = stripslashes($_POST['telp']);
    $telepon  = mysqli_real_escape_string($koneksi, $telepon);
    

    //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
    if (!empty(trim($name)) && !empty(trim($username)) && !empty(trim($password1)) && !empty(trim($password2)) && !empty(trim($telepon)) ){
        
        //mengecek apakah password yang diinputkan sama dengan konfirmasi-password yang diinputkan kembali
        if ($password1 == $password2){

            //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
            if (cek_nama($name,$koneksi) == 0 ){

                //hashing password sebelum disimpan didatabase
                $password  = password_hash($password2, PASSWORD_DEFAULT);

                // Jika sudah di hashing insert data ke database
                $query = "INSERT INTO tb_masyarakat (nama_lengkap, username, password, telp ) VALUES ('$name','$username','$password','$telepon')";
                $result   = mysqli_query($koneksi, $query);

                //jika insert data berhasil maka akan diredirect ke halaman login.php serta menyimpan data username ke session.
                if ($result) {
                    $_SESSION['username'] = $username;
                    
                    header('Location: login_user.php');
                 
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
    $query = "SELECT * FROM tb_masyarakat WHERE username = '$nama'";
    if( $result = mysqli_query($koneksi, $query) ) return mysqli_num_rows($result);
}