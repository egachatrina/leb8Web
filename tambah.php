<?php
error_reporting(E_ALL);
include_once "koneksi.php";

if(isset($_POST["submit"])) {
    $nama = $_POST["name"];
    $kategori = $_POST["category"];
    $harga_beli = $_POST["purchase"];
    $harga_jual = $_POST["price"];
    $stock = $_POST["stock"];
    $file_gambar = $_FILES["file_image"];
    var_dump($file_gambar);
    $gambar = null;
    
    if($file_gambar["error"] == 0) {
        $file_name = str_replace(' ', '_', $file_gambar["name"]);
        $destination = dirname(__FILE__) . "/gambar/" . $file_name;

        if(move_uploaded_file($file_gambar["tmp_name"], $destination)) {
            $gambar = "gambar/" . $file_name;
        }
    }

    $query = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stock, gambar) ";
    $query .= "VALUE ('{$nama}', '{$kategori}', '{$harga_jual}', '{$harga_beli}', '{$stock}', '{$gambar}')";

    $result = mysqli_query($conn, $query);
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang</h1>
    <form action="tambah.php" method="post" enctype="multipart/form-data">

        <label for="name">Nama Barang</label>
        <input type="text" name="name">

        <br><br>

        <label for="category">Kategori</label>        
        <select name="category" id="category">
            <option value="">--SELECT--</option>
            <option value="Komputer">Komputer</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Hand Phone">Hand Phone</option>
        </select>

        <br><br>

        <label for="price">Harga Jual</label>
        <input type="number" name="price">

        <br><br>

        <label for="purchase">Harga Beli</label>
        <input type="number" name="purchase">

        <br><br>

        <label for="stock">Stock</label>
        <input type="number" name="stock">

        <br><br>

        <label for="file_image">File Gambar</label>
        <input type="file" name="file_image">

        <br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>