<?php
session_start();
include('koneksi.php');

$user = $_POST['user'];
$pass = sha1($_POST['pass']);

$sql = "SELECT * FROM operator WHERE username='$user' AND password='$pass'";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $user;
}

header("Location: index.php");
?>
