<?php
    session_start();
    include "koneksi.php";

    // Fungsi Enrkripsi Password dengan algoritma has bcrypt dan cost 10
    function enkripPassword($password) {
        $pass_enkrip = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        return $pass_enkrip;
    }

    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $pass_enkrip    = enkripPassword($password);

    // input data ke database
    $query   = "INSERT INTO akun VALUES ('','$username','$pass_enkrip')";
    $sql     = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));

    if($query){
        echo "
            <script>
                alert('Pendaftaran berhasil, silakan login');
                document.location.href = 'login.php';
            </script>
        ";

        }
    else {
            echo "proses gagal";
        }
?>