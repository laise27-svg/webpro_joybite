<?php
header("Content-Type: application-json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

require_once "../db_connect.php";

$data_masuk = json_decode(file_get_contents("php://input"));

if(!empty($data_masuk->nama_dessert) && !empty($data_masuk->harga) && !empty($data_masuk->stok)) {

    $nama_dessert = $data_masuk->nama_dessert;
    $harga = $data_masuk->harga;
    $stok = $data_masuk->stok;

    $sql = "INSERT INTO produk_dessert (nama_dessert, harga, stok) VALUES ('$nama_dessert', '$harga', '$stok')";

    if($conn->query($sql) === TRUE) {
        echo json_encode([
            "status" => "success",
            "message" => "dessert berhasil ditambahkan"
        ]);
    } else {
        echo json_encode([
            "status" => "error", 
            "message" => "dessert gagal ditambahkan" . $conn->error 
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "data tidak lengkap"
    ]);
}

$conn->close();

?>