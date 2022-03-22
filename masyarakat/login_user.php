<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login User - Lelang</title>
    <script defer src="fontawesome5/svg-with-js/js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
        <style>
        body{
                background-image:url(../gambar/photo5.jpg);
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
        color:white;
        border-color:white;
        top:20px;
        
    }

    .form a {
        text-decoration : none;
    }
        </style>
</head>
<body>

<!-- Form input data user (Login) -->

    <div class=" form" style="margin-left:30%;margin-top:5% ;position:fixed;">
    <form action="proses_login_user.php"method="POST">
       
        <center><h1 style="color:#FFFFFF;font-family:sans-serif;">LOGIN</h1></center><br>
        <div>
            <label class="label-control">Username</label>
            <input class="form-control"type="text" name="username" required>
        </div>
        <div>
            <label class="label-control">Password</label>
            <input class="form-control"type="password" name="password" required>
        </div><br>
        <button type="submit" name="submit" class="btn btn-primary  btn-block">Login</button><br>
        <p><a href="register_user.php">Belum punya akun? Daftar.</a></p>
    
    </form>
    </div>




<!-- <div style="margin-top:1100px">
    Tempat taruh footer
</div> -->

        <script src="js/jquery.min.js"> </script>
        <script src="js/popper.min.js"> </script>
        <script src="js/bootstrap.js"> </script>
</body>
</html>