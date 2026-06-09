<?php
header("Content-Type: application/json; charset=UTF-8");

require_once '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM produk_dessert WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Dessert berhasil dihapus!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal menghapus: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "ID tidak ditemukan"]);
}

$conn->close();
?>