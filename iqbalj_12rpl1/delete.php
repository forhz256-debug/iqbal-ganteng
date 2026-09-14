<?php

include "konnek.php";

if (isset($_GET['id_alat'])) {

    $id_alat = $_GET['id_alat'];

    // Hapus data yang berhubungan di detail_peminjaman
    $stmt1 = $koneksi->prepare(
        "DELETE FROM detail_peminjaman WHERE id_alat = ?"
    );

    $stmt1->bind_param("s", $id_alat);
    $stmt1->execute();
    $stmt1->close();


    // Setelah itu hapus data alat
    $stmt2 = $koneksi->prepare(
        "DELETE FROM alat WHERE id_alat = ?"
    );

    $stmt2->bind_param("s", $id_alat);

    if ($stmt2->execute()) {

        header("Location: tampil.php");
        exit;

    } else {

        echo "Data gagal dihapus: " . $stmt2->error;

    }

    $stmt2->close();

}

$koneksi->close();

?>