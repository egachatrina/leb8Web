<?php

include("koneksi.php");

$id = $_GET["id"];
$query = "DELETE FROM data_barang WHERE id_barang = $id ";

mysqli_query($conn, $query);
header("location: index.php");