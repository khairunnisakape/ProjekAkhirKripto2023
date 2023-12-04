<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Resep Saya | Kuliner Rahasia</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
        <?php
        
            session_start(); 
            //echo $_SESSION['username'];

            if(empty($_SESSION['username'])) {
                echo "
                    <script>
                        alert('Anda belum login. Silakan login terlebih dahulu.');
                        document.location.href = 'login.php';
                    </script>
                ";
            }
        ?>
        <section class="h-100 w-100 bg-white" style="box-sizing: border-box">
        <style scoped>
          @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

          .navbar-ku {
            background-color: #776B5D;
            transition: 0.3s;
            padding: 20px 30px; 
            font-family: Poppins, sans-serif;
          }

          .nav-atribut, .nav-atribut:hover{
            color: #FAF6F0;
            margin-right: 30px; 
          }

          .navbar-brand, .aktif, .nav-atribut:hover{
            font-weight: bold;
          }

          .navbar-brand, .navbar-brand:hover, .btn-awal, .bet-akun {
            border-radius: 20px;
            padding: 12px 20px;
            font-weight: 500;
            color: white;
          }

          .btn-coklat:hover {
            background-color: #B0A695;
            transition: 0.3s;
            color: white;
          }

          .navbar-brand, .navbar-brand:hover, .btn-coklat {
            background-color: #FAF6F0;
            transition: 0.3s;
            color: black;
          }
          .btn-coklat2{
            background-color: #776B5D;
            color: #FAF6F0; 
            padding: 5px 25px;
            font-weight: 500;
          }
          
          .btn-coklat2:hover{
            border-color: #776B5D;
            color:  #776B5D;
            background-color: #FAF6F0;}

          .konten{
            margin-top: 30px;
            margin-bottom: 30px;
            width: 100%;
          }
        </style>
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-ku" >
          <div class="container-fluid">
            <a class="navbar-brand" href="beranda.php">KULINER RAHASIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link nav-atribut" href="beranda.php">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-atribut" href="resep_saya.php">Resep Saya</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-atribut aktif" aria-current="page" href="tambah_resep.php">Tambah Resep</a>
                </li>
              </ul>
              <div class="d-flex bet-akun" >
                Halo Koki <?= $_SESSION['username'];?>!
              </div>
              <div class="d-flex">
                <a class="btn btn-awal btn-coklat" href="logout.php">Log Out</a>
              </div>
            </div>
          </div>
        </nav>
        <?php  
          include 'koneksi.php';
            $username   = $_SESSION['username'];
            $sql_id     = "SELECT * from akun where username = '$username'";
            $query_id   = mysqli_query($koneksi, $sql_id);
            $data_id    = mysqli_fetch_array($query_id);
        ?>
        <div class="konten" align="center">
            <h1>Tambah: Resep Saya</h1>
            <p>Silahkan tulis resep masakan yang ingin Anda rahasiakan.</p>
            <form action="enkrip_resep.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id_akun" name="id_akun" class="form-control" value="<?= $data_id['id_akun'] ?>">
                <div style="margin: 2px 305px">
                    <label class="form-label">Judul Resep</label>
                    <input class="form-control" type="text" id="judul" name="judul" placeholder="Masukkan Judul">
                </div>
                <div>
                    <label class="form-label">Resep</label>
                </div>
                <div>
                    <textarea name="alatbahan" id="alatbahan" rows="10" cols="50" placeholder="Masukkan Alat dan Bahan"></textarea>
                    <textarea name="carabuat" id="carabuat" rows="10" cols="50" placeholder="Masukkan Cara Membuat"></textarea>
                </div>
                <br>
                <label for="fname">Silakan tambahkan foto masakan (jpg)</label><br>
                <div style="margin: 10px 305px">
                    <input class="form-control" type="file" id="gambar" name="gambar">
                </div>
                <button type="submit" class="btn btn-coklat2">Kirim</button>
            </form>
        </div>
    </body>
</html>