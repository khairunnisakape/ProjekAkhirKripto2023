<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "log_resep";

    $koneksi = new mysqli($hostname, $username, $password, $database);

    if ($koneksi->connect_error) {
        die('Koneksi Error'.$koneksi->connect_error);
    }
?>