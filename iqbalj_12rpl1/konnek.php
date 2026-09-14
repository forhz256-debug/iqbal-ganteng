<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "12rpl1_iqbalj_pa";

$koneksi = new mysqli(
    $host,
    $user,
    $password,
    $database
);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

?>