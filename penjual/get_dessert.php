<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../db_connect.php";

if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "koneksi ke database gagal" . $conn->connect_error
    ]));
}

$sql = "SELECT id, nama_dessert, harga, stok FROM produk_dessert";
$result = $conn->query($sql);

$dessert_list = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($dessert_list, $row);
    }
    echo json_encode([
        "status" => "success",
        "data" => $dessert_list
    ]);
} else {
    echo json_encode([
        "status" => "empty",
        "message" => "dessert tidak ada"
    ]);
}

$conn->close();

?>