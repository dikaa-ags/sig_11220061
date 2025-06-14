<?php
include('koneksi.php');

$koordinat_x = $_GET['koordinat_x'];
$koordinat_y = $_GET['koordinat_y'];
$nama_tempat = $_GET['nama_tempat'];

// Hindari SQL Injection dengan prepared statement
$query = "INSERT INTO kordinat_gis (x, y, nama_tempat) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "dds", $koordinat_x, $koordinat_y, $nama_tempat);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
?>

