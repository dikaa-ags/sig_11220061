<?php
include('koneksi.php');

$id = $_POST['nomor'];

// Hindari SQL Injection dengan prepared statement
$query = "DELETE FROM kordinat_gis WHERE nomor = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
?>
