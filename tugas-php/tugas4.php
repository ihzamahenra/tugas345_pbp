<?php
// lihat folder database
// operasi update
// bisa menggunakan CLI saja

$host = 'localhost';
$db   = 'pbp2026';
$user = 'root';
$pass = '';

// ==========================
// KONFIGURASI DATABASE
// ==========================
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Koneksi DB gagal: " . $e->getMessage());
}

// ==========================
// INPUT DARI TERMINAL
// ==========================
echo "Masukkan ID user: ";
$id = trim(fgets(STDIN));

echo "Masukkan username baru: ";
$username = trim(fgets(STDIN));

echo "Masukkan email baru: ";
$email = trim(fgets(STDIN));

$updated_at = time();

// ==========================
// QUERY UPDATE
// ==========================
$sql = "UPDATE user 
        SET username = :username, 
            email = :email, 
            updated_at = :updated_at
        WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':username'   => $username,
    ':email'      => $email,
    ':updated_at' => $updated_at,
    ':id'         => $id
]);

echo "Data berhasil diupdate!\n";


?>