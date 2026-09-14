<?php

include "konnek.php";

$id_alat = $_POST['id_alat'];
$nama_alat = $_POST['nama_alat'];
$id_kategori = $_POST['id_kategori'];
$stok = $_POST['stok'];
$kondisi = $_POST['kondisi'];

$stmt = $koneksi->prepare(
    "INSERT INTO alat
    (id_alat, nama_alat, id_kategori, stok, kondisi)
    VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "sssis",
    $id_alat,
    $nama_alat,
    $id_kategori,
    $stok,
    $kondisi
);

if ($stmt->execute()) {

    header("Location: tampil.php");
    exit;

} else {

    echo "Data gagal ditambahkan: " . $stmt->error;

}

$stmt->close();

$koneksi->close();

?>