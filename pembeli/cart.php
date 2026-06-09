<?php
require_once '../db_connect.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

$input = json_decode(file_get_contents('php://input'), true);
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':    
        $queryString = "SELECT * FROM keranjang";
        $query = mysqli_query($conn, $queryString);
        
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            // Menghitung subtotal secara dinamis agar tidak perlu kolom tambahan di DB
            $row['subtotal'] = $row['harga'] * $row['jumlah'];
            $data[] = $row;
        }

        echo json_encode($data);
        break;

    case "POST":
        // Menambah item baru ke keranjang
        $nama = $input['nama_dessert'];
        $harga = $input['harga'];
        $jumlah = $input['jumlah'];

        // Logika: Cek apakah dessert sudah ada untuk menghindari duplikasi baris
        $check = mysqli_query($conn, "SELECT * FROM keranjang WHERE nama_dessert='$nama'");
        
        if (mysqli_num_rows($check) > 0) {
            $queryString = "UPDATE keranjang SET jumlah = jumlah + $jumlah WHERE nama_dessert='$nama'";
            $msg = "Jumlah dessert berhasil ditambah";
        } else {
            $queryString = "INSERT INTO keranjang (nama_dessert, harga, jumlah) VALUES ('$nama', '$harga', '$jumlah')";
            $msg = "Dessert baru berhasil dimasukkan ke keranjang";
        }

        if (mysqli_query($conn, $queryString)) {
            echo json_encode(["message" => $msg]);
        }
        break;

    case "PUT":
        // Update jumlah berdasarkan ID
        $id = $input['id'];
        $jumlah = $input['jumlah'];

        $queryString = "UPDATE keranjang SET jumlah='$jumlah' WHERE id='$id'";

        if (mysqli_query($conn, $queryString)) {
            echo json_encode(["message" => "Jumlah berhasil diperbarui"]);
        } else {
            echo json_encode(["message" => "Update GAGAL"]);
        }
        break;

    case "DELETE":
        // Hapus item berdasarkan ID (mengambil ID dari URL: keranjang.php?id=1)
        $id = $_GET['id'];
        $queryString = "DELETE FROM keranjang WHERE id='$id'";

        if (mysqli_query($conn, $queryString)) {
            echo json_encode(["message" => "Item berhasil dihapus"]);
        } else {
            echo json_encode(["message" => "Gagal menghapus item"]);
        }
        break;
}
?>