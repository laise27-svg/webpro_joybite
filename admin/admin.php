<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db_connect.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Ambil semua produk
        $result = $conn->query("SELECT * FROM validasi_produk ORDER BY id_validasi DESC");
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        echo json_encode($products);
        break;

    case 'POST':
        // Tambah produk baru
        $data = json_decode(file_get_contents("php://input"), true);
        $nama = $data['nama_produk'];
        $toko = $data['nama_toko'];
        $desc = $data['deskripsi'];
        
        $status = "Menunggu Validasi";
        $dibuat_pada = date('Y-m-d');
        
        $stmt = $conn->prepare("INSERT INTO validasi_produk (nama_produk, nama_toko, status, deskripsi, dibuat_pada) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nama, $toko, $status, $desc, $dibuat_pada);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "id" => $stmt->insert_id]);
        }
        break;

    case 'DELETE':
        // Hapus produk
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $conn->prepare("DELETE FROM validasi_produk WHERE id_validasi = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            echo json_encode(["status" => "deleted"]);
        }
        break;
}

$conn->close();
?>