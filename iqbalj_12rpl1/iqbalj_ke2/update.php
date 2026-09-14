<?php

include "konnek.php";

$requiredFields = ['id_peminjaman', 'id_user', 'tgl_pinjam', 'tgl_kembali_rencana', 'status'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        exit("Field $field wajib diisi.");
    }
}

$id_peminjaman = trim($_POST['id_peminjaman']);
$id_user = trim($_POST['id_user']);
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali_rencana = $_POST['tgl_kembali_rencana'];
$status = $_POST['status'];

$pinjamDate = DateTime::createFromFormat('Y-m-d', $tgl_pinjam);
$kembaliDate = DateTime::createFromFormat('Y-m-d', $tgl_kembali_rencana);
if (!$pinjamDate || $pinjamDate->format('Y-m-d') !== $tgl_pinjam ||
    !$kembaliDate || $kembaliDate->format('Y-m-d') !== $tgl_kembali_rencana) {
    exit('Format tanggal tidak valid. Gunakan format YYYY-MM-DD.');
}

$userCheck = $koneksi->prepare("SELECT id_user FROM `user` WHERE id_user = ?");
$userCheck->bind_param("s", $id_user);
$userCheck->execute();
$userResult = $userCheck->get_result();
if ($userResult->num_rows === 0) {
    $userCheck->close();
    $koneksi->close();
    exit("ID User tidak ditemukan. Gunakan ID user yang terdaftar, misalnya U001.");
}
$userCheck->close();

$stmt = $koneksi->prepare(
    "UPDATE peminjaman SET
    id_user = ?,
    tgl_pinjam = ?,
    tgl_kembali_rencana = ?,
    status = ?
    WHERE id_peminjaman = ?"
);

$stmt->bind_param(
    "sssss",
    $id_user,
    $tgl_pinjam,
    $tgl_kembali_rencana,
    $status,
    $id_peminjaman
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