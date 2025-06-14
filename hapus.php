<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "DELETE FROM kordinat_gis WHERE nomor=$id");

    if ($query) {
        header("Location: index.php"); // Kembali ke index.php setelah delete
    } else {
        echo "Gagal Menghapus Data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
