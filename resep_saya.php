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
            background-color: #FAF6F0;
          }
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
                  <a class="nav-link nav-atribut aktif" aria-current="page" href="resep_saya.php">Resep Saya</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-atribut" href="tambah_resep.php">Tambah Resep</a>
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
        <center>
            
        </center>

        <div class="konten" align="center">
            <h1>Resep Saya</h1>
            <p>Kumpulan Resep yang Anda saja yang tau.</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Resep</th>
                        <th scope="col">Alat dan Bahan</th>
                        <th scope="col">Cara Membuat</th>       
                        <th scope="col">Gambar Masakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function dekripsi_rot13($param){
                        for($i=0; $i < strlen($param); $i++){
                            $c = ord($param[$i]);
                            
                            if($c >= ord('n') & $c <= ord('z') | $c >= ord('N') & $c <= ord('Z')){
                            $c -= 13;
                            }elseif($c >= ord('a') & $c <= ord('m') | $c >= ord('A') & $c <= ord('M')){
                            $c += 13;
                            }
                            $param[$i] = chr($c);
                        }
                        
                        return $param;
                    }
                    
                    $cipher = "AES-256-CBC";
                    $secret = "1234567890123456789012345678901512345678901234567890123456789013";
                    $option = 0;
                    $iv     = str_repeat("0", openssl_cipher_iv_length($cipher));

                    include 'koneksi.php';
                    $username   = $_SESSION['username'];
                    $sql_id     = "SELECT * from akun where username = '$username'";
                    $query_id   = mysqli_query($koneksi, $sql_id);
                    $data_id    = mysqli_fetch_array($query_id);

                    $id         = $data_id['id_akun'];
                    $sql        = "SELECT * FROM resep WHERE id_akun = $id";
                    $query      = mysqli_query($koneksi, $sql);
                    
                    $s=1;
                    while ($data=mysqli_fetch_array($query))

                    {?>
                    <tr>
                        <td scope="row"><?= $s++ ?></td>
                        <td>
                            <?= $data['judul'] ?>
                        </td>
                        <td>
                            <?php 
                                $kode_a  = $data['alatbahan'];
                                $kode_a2 = openssl_decrypt($kode_a, $cipher, $secret, $option, $iv);
                                $kode_a3 = strrev($kode_a2);
                                $asli_a  = dekripsi_rot13($kode_a3);
                                echo $asli_a;  
                            ?>
                        </td>
                        <td>
                            <?php 
                                $kode_c  = $data['carabuat'];
                                $kode_c2 = openssl_decrypt($kode_c, $cipher, $secret, $option, $iv);
                                $kode_c3 = strrev($kode_c2);
                                $asli_c  = dekripsi_rot13($kode_c3);
                                echo $asli_c 
                            ?>
                        </td>
                        <td>
                            <?php
                                $gambar = $data['gambar'];
                                echo '<img src="data:image/gif;base64,'.$gambar.' " width="300" height="200" />';
                            ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
           <a href="tambah_resep.php" class="btn btn-coklat2">Tambah Resep</a> 
        </div>
    </body>
</html>