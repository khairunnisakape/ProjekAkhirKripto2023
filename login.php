<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css" />

    <style>
       .btn-coklat2{
        background-color: #776B5D;
        color: #FAF6F0; 
        padding: 5px 25px;
        font-weight: 500;
        width: 350px;
      }
      .btn-coklat2:hover{
        border-color: #776B5D;
        color:  #776B5D;
        background-color: #FAF6F0;
      }
      .form-ku{
        width: 350px;
        margin-top: 10px;

      }
      .konten{
        background-color: #EBE3D5;
        padding-top: 155px;
        padding-bottom: 230px;
        width: 100%; 
      }
      .caption{
        font-size: 20px;
      }
      .link, .link:hover{
        color: #776B5D;
      }
      .link:hover{
        font-weight: bold;
      }
    </style>
</head>
<body class="konten">
    <div class="formulir container">
        <div align="center">
            <h1 class="judul text-center fw-bold">LOGIN</h1>
            <form method="POST" action="proses_login.php">
                <div class="mb-3">
                    <input type="text" class="form-control form-ku" placeholder="Masukkan Nama Pengguna" name="username">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control form-ku" id="exampleInputPassword1" placeholder="Masukkan password" name="password">
                </div>
                <button type="submit" class="btn btn-coklat2">Login</button> <br>                
            </form>
            <br>
            <p>
                Belum punya akun? <a href="daftar.php" class="link">Daftar</a>
            </p>
        </div> 
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
</body>
</html>