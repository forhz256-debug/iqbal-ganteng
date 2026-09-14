<?php

include "konnek.php";
$sql = "SELECT * FROM peminjaman";
$query = $koneksi->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
  <link rel="stylesheet" href="../skin.css">
</head>
<body>

<h2>DATA PEMINJAMAN</h2>

<a href="add.html">
    <button>Tambah Data</button>
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID Peminjaman</th>
        <th>ID User</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali Rencana</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php while ($data = $query->fetch_assoc()) { ?>

    <tr>

        <td>
            <?php echo $data['id_peminjaman']; ?>
        </td>

        <td>
            <?php echo $data['id_user']; ?>
        </td>

        <td>
            <?php echo $data['tgl_pinjam']; ?>
        </td>

        <td>
            <?php echo $data['tgl_kembali_rencana']; ?>
        </td>

        <td>
            <?php echo $data['status']; ?>
        </td>

        <td>

            <a href="edit.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>">
                Edit
            </a>

            |

            <a href="delete.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>"
               onclick="return confirm('Yakin ingin menghapus data?')">

                Hapus

            </a>

        </td>

    </tr>

    <?php } ?>

</table>
<br></br>
    <a href="../dashboard.php">
        <button>Kembali</button>
    </a>

</body>

</html>

</body>

</html>