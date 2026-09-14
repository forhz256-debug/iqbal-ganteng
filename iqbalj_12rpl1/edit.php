<?php

include "konnek.php";

$id_alat = $_GET['id_alat'];

$stmt = $koneksi->prepare(
    "SELECT * FROM alat WHERE id_alat = ?"
);

$stmt->bind_param(
    "s",
    $id_alat
);

$stmt->execute();

$result = $stmt->get_result();

$data = $result->fetch_assoc();

?>

<!DOCTYPE html>

<html>

<head>
    <title>Edit Data</title>
  <link rel="stylesheet" href="skin2.css">
</head>

<body>

<h2>EDIT DATA ALAT</h2>

<form action="update.php" method="POST">

    <input
        type="hidden"
        name="id_alat"
        value="<?php echo $data['id_alat']; ?>"
    >

    <p>

        Nama Alat

        <br>

        <input
            type="text"
            name="nama_alat"
            value="<?php echo $data['nama_alat']; ?>"
            required
        >

    </p>

    <p>

        ID Kategori

        <br>

        <input
            type="text"
            name="id_kategori"
            value="<?php echo $data['id_kategori']; ?>"
            required
        >

    </p>

    <p>

        Stok

        <br>

        <input
            type="number"
            name="stok"
            value="<?php echo $data['stok']; ?>"
            required
        >

    </p>

    <p>

        Kondisi

        <br>

        <select name="kondisi">

            <option value="Baik">
                Baik
            </option>

            <option value="Cukup">
                Cukup
            </option>

            <option value="Rusak">
                Rusak
            </option>

        </select>

    </p>

    <button type="submit">
        Update Data
    </button>
  <a href="tampil.php">kembali</a>

</form>

</body>

</html>