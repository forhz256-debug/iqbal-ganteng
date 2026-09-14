<?php

include "konnek.php";

if (isset($_GET['id_peminjaman'])) {

    $id_peminjaman = $_GET['id_peminjaman'];

    try {
        $koneksi->begin_transaction();

        $stmt = $koneksi->prepare(
            "DELETE FROM pengembalian WHERE id_peminjaman = ?"
        );
        $stmt->bind_param("s", $id_peminjaman);
        $stmt->execute();
        $stmt->close();

        $stmt = $koneksi->prepare(
            "DELETE FROM detail_peminjaman WHERE id_peminjaman = ?"
        );
        $stmt->bind_param("s", $id_peminjaman);
        $stmt->execute();
        $stmt->close();

        $stmt = $koneksi->prepare(
            "DELETE FROM peminjaman WHERE id_peminjaman = ?"
        );
        $stmt->bind_param("s", $id_peminjaman);
        $stmt->execute();
        $stmt->close();

        $koneksi->commit();

        header("Location: tampil.php");
        exit;

    } catch (mysqli_sql_exception $error) {
        $koneksi->rollback();
        echo "Data gagal dihapus: " . htmlspecialchars($error->getMessage());
    }

}

$koneksi->close();

?>