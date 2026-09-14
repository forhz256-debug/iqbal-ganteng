<?php

include "konnek.php";

$id_peminjaman = $_POST['id_peminjaman'];
$id_user = $_POST['id_user'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali_rencana = $_POST['tgl_kembali_rencana'];
$status = $_POST['status'];

$stmt = $koneksi->prepare(
    "INSERT INTO peminjaman
    (id_peminjaman, id_user, tgl_pinjam, tgl_kembali_rencana, status)
    VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "sssss",
    $id_peminjaman,
    $id_user,
    $tgl_pinjam,
    $tgl_kembali_rencana,
    $status
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