<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Admin - Buka Lelang</title>

<!-- Import JS dan Bootstrap -->
    <script defer src="fontawesome5/svg-with-js/js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">

    <!-- CSS internal -->
        <style>
        body{
                background-image:url(../gambar/photo3.jpg);
                background-size:cover;
                background-attachment:fixed;
                position:;
                
            }
.form{  
        padding:20px;
        margin-right:150px;
        border:0px solid black; 
        width:400px;
        height:580px;
        position:relative;
        left:70px;
        opacity:1;
        color:black;
        border-color:white;
        top:20px;
        
    }

    .form a {
        text-decoration : none ;

    }
    
        </style>
</head>
<body>

<!-- Form input data user. -->

    <div class="form" style="margin-left:30%;margin-top:5%; position:fixed;">
    <form action="proses_register_admin.php" method="POST">
       
        <center><h1 style="color: #FFFFFF;font-family: sans-serif;">REGISTER</h1></center><br>
        <div>
            <label class="label-control">Nama Petugas</label>
            <input class="form-control"type="text"  name="nama_lengkap" required>
        </div>
        <div>
            <label class="label-control">Username</label>
            <input class="form-control"type="text" name="username" required>
        </div>
        <div>
            <label class="label-control">Password</label>
            <input class="form-control"type="password" name="password1" required>
        </div>
        <div>
            <label class="label-control">Konfirmasi Password</label>
            <input class="form-control"type="password" name="password2" required>
        </div>
        <div>
            <label class="label-control">ID Level</label>
            <input class="form-control"type="number" name="id_level" required>
        </div><br>
        <button type="submit" name="submit" class="btn btn-primary  btn-block">Regist</button>
        <p><a href="index.php">Anda Seorang Admin/Petugas? Login.</a></p>
    
    </form>
    </div>




 <!-- <div style="margin-top:1100px"> -->
<!-- Tempat menaruh footer -->



        <script src="js/jquery.min.js"> </script>
        <script src="js/popper.min.js"> </script>
        <script src="js/bootstrap.js"> </script>
</body>
</html>