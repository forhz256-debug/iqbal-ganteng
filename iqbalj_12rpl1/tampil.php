<?php

include "konnek.php";
$sql = "SELECT * FROM alat";
$query = $koneksi->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Alat</title>
  <link rel="stylesheet" href="skin.css">
</head>
<body>

<h2>DATA ALAT</h2>

<a href="add.html">
    <button>Tambah Data</button>
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID Alat</th>
        <th>Nama Alat</th>
        <th>ID Kategori</th>
        <th>Stok</th>
        <th>Kondisi</th>
        <th>Aksi</th>
    </tr>

    <?php while ($data = $query->fetch_assoc()) { ?>

    <tr>

        <td>
            <?php echo $data['id_alat']; ?>
        </td>

        <td>
            <?php echo $data['nama_alat']; ?>
        </td>

        <td>
            <?php echo $data['id_kategori']; ?>
        </td>

        <td>
            <?php echo $data['stok']; ?>
        </td>

        <td>
            <?php echo $data['kondisi']; ?>
        </td>

        <td>

            <a href="edit.php?id_alat=<?php echo $data['id_alat']; ?>">
                Edit
            </a>

            |

            <a href="delete.php?id_alat=<?php echo $data['id_alat']; ?>"
               onclick="return confirm('Yakin ingin menghapus data?')">

                Hapus

            </a>

        </td>

    </tr>

    <?php } ?>

</table>
<br></br>
    <a href="dashboard.php">
        <button>Kembali</button>
    </a>

</body>

</html>

</body>

</html>