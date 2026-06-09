<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

require_once '../db_connect.php';
$data_masuk = json_decode(file_get_contents("php://input"));

if (!empty($data_masuk->id) && !empty($data_masuk->nama_dessert) && !empty($data_masuk->harga) && !empty($data_masuk->stok)) {
    
    $id = $data_masuk->id;
    $nama = $data_masuk->nama_dessert;
    $harga = $data_masuk->harga;
    $stok = $data_masuk->stok;

    $sql = "UPDATE produk_dessert SET nama_dessert='$nama', harga='$harga', stok='$stok' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Data dessert berhasil diperbarui!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal memperbarui: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Data tidak lengkap!"]);
}

$conn->close();
?>