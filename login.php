<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

// Tambahkan koneksi ke database
require_once 'db_connect.php';

$data_masuk = json_decode(file_get_contents("php://input"));

if (!empty($data_masuk->username) && !empty($data_masuk->password)) {
    
    $username = $data_masuk->username;
    $password = $data_masuk->password;

    // Gunakan prepared statement agar aman dari SQL Injection
    $stmt = $conn->prepare("SELECT id_user, username, role FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Berhasil login! Kita kirimkan juga role dan id_user-nya
        echo json_encode([
            "status" => "success", 
            "message" => "Login berhasil!",
            "data" => [
                "id_user" => $user['id_user'],
                "username" => $user['username'],
                "role" => $user['role']
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Username atau password salah!"]);
    }
    
    $stmt->close();

} else {
    echo json_encode(["status" => "error", "message" => "Username dan password harus diisi!"]);
}
?>