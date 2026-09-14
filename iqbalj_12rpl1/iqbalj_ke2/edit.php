<?php

include "konnek.php";

$id_peminjaman = $_GET['id_peminjaman'];

$stmt = $koneksi->prepare(
    "SELECT * FROM peminjaman WHERE id_peminjaman = ?"
);

$stmt->bind_param(
    "s",
    $id_peminjaman
);

$stmt->execute();

$result = $stmt->get_result();

$data = $result->fetch_assoc();
$userResult = $koneksi->query("SELECT id_user FROM `user` ORDER BY id_user");

?>

<!DOCTYPE html>

<html>

<head>
    <title>Edit Data</title>
  <link rel="stylesheet" href="../skin2.css">
</head>

<body>

<h2>EDIT DATA PEMINJAMAN</h2>

<form action="update.php" method="POST">

<p>

ID Peminjaman

<br>

        <input
        type="text  "
        name="id_peminjaman"
        value="<?php echo $data['id_peminjaman']; ?>"
    >
</p>


    <p>

        ID User

        <br>

        <select name="id_user" required>
            <?php while ($user = $userResult->fetch_assoc()) { ?>
                <option
                    value="<?php echo htmlspecialchars($user['id_user']); ?>"
                    <?php echo $user['id_user'] === $data['id_user'] ? 'selected' : ''; ?>
                >
                    <?php echo htmlspecialchars($user['id_user']); ?>
                </option>
            <?php } ?>
        </select>

    </p>

    <p>

        Tanggal Pinjam

        <br>

        <input
            type="date"
            name="tgl_pinjam"
            value="<?php echo $data['tgl_pinjam']; ?>"
            required
        >

    </p>

    <p>

        tanggal Kembali Rencana

        <br>

        <input
            type="date"
            name="tgl_kembali_rencana"
            value="<?php echo $data['tgl_kembali_rencana']; ?>"
            required
        >

    </p>

    <p>

        Status

        <br>

        <select name="status">

            <option value="Dipinjam">
                Dipinjam
            </option>

            <option value="Selesai">
                Selesai
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