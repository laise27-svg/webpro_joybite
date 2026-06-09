<?php
header("Content-Type: application/json");
include 'koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari format raw JSON di Postman
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $username = isset($data['username']) ? $data['username'] : '';
    $password = isset($data['password']) ? $data['password'] : '';

    if (empty($username) || empty($password)) {
        echo json_encode([
            "status" => "error",
            "message" => "Username dan Password tidak boleh kosong"
        ]);
        exit;
    }

    // Penyesuaian: Menggunakan '$password' untuk kolom 'passwors' di database
    $query = "SELECT * FROM pembeli WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        echo json_encode([
            "status" => "success",
            "message" => "Login Berhasil",
            "data" => [
                "id_user" => $user['id_user'],
                "username" => $user['username']
            ]
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Username atau Password salah"
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Metode tidak diizinkan"
    ]);
}
?>