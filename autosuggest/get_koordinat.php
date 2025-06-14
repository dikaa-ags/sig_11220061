<?php
$db = new mysqli('localhost', 'root', '', 'sig_11220061');

if (isset($_POST['nama'])) {
    $nama = $db->real_escape_string($_POST['nama']);
    $result = $db->query("SELECT x, y FROM kordinat_gis WHERE nama_tempat = '$nama' AND status = 1 LIMIT 1");

    if ($result && $row = $result->fetch_assoc()) {
        echo json_encode([
            'status' => 'ok',
            'x' => floatval($row['x']),
            'y' => floatval($row['y'])
        ]);
    } else {
        echo json_encode(['status' => 'not_found']);
    }
} else {
    echo json_encode(['status' => 'invalid']);
}
?>
