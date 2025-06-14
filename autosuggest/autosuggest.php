<?php
$db = new mysqli('localhost', 'root', '', 'sig_11220061'); 

if ($db->connect_error) {
    echo 'Could not connect to the database';
    exit;
}

if (isset($_POST['queryString'])) {
    $queryString = $db->real_escape_string($_POST['queryString']);
    
    if (strlen($queryString) > 0) {
        // Ubah sesuai nama kolom dan kondisi yang diinginkan
        $query = $db->query("SELECT nama_tempat FROM kordinat_gis WHERE status = 1 AND nama_tempat LIKE '".$queryString."%' LIMIT 10");

        if ($query) {
            echo "<ul>";
            while ($result = $query->fetch_object()) {
                echo "<li onClick=\"fill('" . addslashes($result->nama_tempat) . "');\">" . $result->nama_tempat . "</li>";
            }
            echo "</ul>";
        } else {
            echo "OOPS, terjadi masalah saat mencari data.";
        }
    }
} else {
    echo "Harap diberi queryString.";
}
?>
