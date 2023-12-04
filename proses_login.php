<?php
    session_start();
    include "koneksi.php";

    // Fungsi untuk memverifikasi password dengan hash yang tersimpan di database
    function verifPassword($password, $pass_enkrip) {
        return password_verify($password, $pass_enkrip);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query  = "SELECT * FROM akun WHERE username='$username'";
    $sql    = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));

    $cek = mysqli_num_rows($sql);

    if($cek>0)
    {
        $_SESSION['id_akun'] = $id_akun;
        $_SESSION['username'] = $username;

        $row         = mysqli_fetch_assoc($sql);
        $pass_enkrip = $row['password'];

            if (verifPassword($password, $pass_enkrip)) {
                header("location:beranda.php");
                        
            }
            else{
                echo "
                    <script>
                        alert('Login gagal! Username atau password Anda salah.');
                        document.location.href = 'login.php';
                    </script>
                ";
            }        
        
    }
    else{
        echo "
            <script>
                alert('Login gagal! Username tidak ditemukan.');
                document.location.href = 'login.php';
            </script>
        ";
    }
?>