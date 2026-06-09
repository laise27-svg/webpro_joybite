<?php
header('Content-Type: application/json');
require_once '../db_connect.php';

$query = mysqli_query($conn, "SELECT * FROM produk");
$data = [];

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

echo json_encode($data);
?>