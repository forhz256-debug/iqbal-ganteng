<?php

include "konnek.php";

$id_alat = $_POST['id_alat'];
$nama_alat = $_POST['nama_alat'];
$id_kategori = $_POST['id_kategori'];
$stok = $_POST['stok'];
$kondisi = $_POST['kondisi'];

$stmt = $koneksi->prepare(
    "UPDATE alat SET
    nama_alat = ?,
    id_kategori = ?,
    stok = ?,
    kondisi = ?
    WHERE id_alat = ?"
);

$stmt->bind_param(
    "ssiss",
    $nama_alat,
    $id_kategori,
    $stok,
    $kondisi,
    $id_alat
);

if ($stmt->execute()) {

    header("Location: tampil.php");
    exit;

} else {

    echo "Data gagal diupdate: " . $stmt->error;

}

$stmt->close();

$koneksi->close();

?>