<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Beranda | Kuliner Rahasia</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
    <?php
      
        session_start(); 

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
              <a class="nav-link aktif nav-atribut" aria-current="page" href="beranda.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-atribut" href="resep_saya.php">Resep Saya</a>
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
  </section>
  <section class="h-100 w-100" style="
				box-sizing: border-box;
				position: relative;
				background-color: #FAFCFF;
			">
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      .konten{
        margin-top: 30px;
        margin-bottom: 30px;
        width: 100%;
      }
      .blockquote{
        font-weight: bold;
        font-size: 90px;
      }
      .ket{
        padding-left: 50px;
      }
      .foto{
        width: 400px;
        border-radius: 10px;
      }
    </style>
    
    <div class="container-xxl p-0" style="font-family: 'Poppins', sans-serif">
      <div>
        <table class="konten">
          <tr>
            <td scope="col">
              <img class="foto" src="pesanbotol2.jpeg" alt="pesanbotol"/>
            </td>
            <td scope="col">
              <figure class="text-end">
                <blockquote>
                  <h1 class="blockquote">
                    Apa Itu
                    <br class="d-lg-block d-none" />
                    <span style="color: #776B5D">Kuliner Rahasia</span>?
                    <br class="d-lg-block d-none" />
                  </h1>
                </blockquote>
                <figcaption>
                  <p class="text-caption">
                    Kuliner Rahasia merupakan log-book untuk semua resep masakan 
                    <br class="d-sm-block d-none" />
                    yang ingin kamu jaga kerahasiaannya dengan memanfaatkan ilmu kriptografi.
                    <br class="d-sm-block d-none" /><br>
                    Kami berupaya untuk terus menjamin kerahasiaan dan integritas data 
                    <br class="d-sm-block d-none" />
                    dari resep-resep yang telah dipercayakan tiap pelanggan kepada kami.
                  </p>
                </figcaption>
              </figure>
            </td>
          </tr>
        </table>
        </div>
      </div>
    </div>
  </section> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
  </html>