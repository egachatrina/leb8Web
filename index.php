<?php
include("koneksi.php");

$query = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>
    
    <div class="container">
        <h1>Data Barang</h1>
        <a href="tambah.php">Tambah Barang</a>
        <div class="main">
            <table border="1">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
                <?php if($result): ?>
                <?php while($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><img src="gambar/<?= $row["gambar"]; ?>" alt="<?= $row["nama"]; ?>"></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["kategori"]; ?></td>
                    <td><?= $row["harga_jual"]; ?></td>
                    <td><?= $row["harga_beli"]; ?></td>
                    <td><?= $row["stock"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id_barang"]; ?>">ubah</a> | <a href="hapus.php?id=<?= $row["id_barang"]; ?>">hapus</a>
                    </td>
                </tr>
                <?php endwhile; else: ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>

</body>
</html>