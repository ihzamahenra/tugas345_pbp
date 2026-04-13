<?php
// menjalankan kode php di web server
// cara1: xampp
// file php disisipkan di folder xampp/htdocs

// cara2: wsl, apache2, php, mysql
// konfigurasi apache

$host = 'localhost';
$db   = 'pbp2026';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// ==========================
// TAMBAH DATA
// ==========================
if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];

    $sql = "INSERT INTO user (username, email, auth_key, password_hash, status, created_at, updated_at)
            VALUES (:username, :email, 'randomkey', 'hashdummy', 10, :time, :time)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':time' => time()
    ]);
}

// ==========================
// UPDATE DATA
// ==========================
if (isset($_POST['update'])) {
    $id       = $_POST['id'];
    $username = $_POST['username'];
    $email    = $_POST['email'];

    $sql = "UPDATE user 
            SET username = :username,
                email = :email,
                updated_at = :time
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':time' => time(),
        ':id' => $id
    ]);
}

// ==========================
// AMBIL DATA
// ==========================
$data = $pdo->query("SELECT * FROM user")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: white;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            margin: auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        input {
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 90%;
        }

        button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            background: #4facfe;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th {
            background: #4facfe;
            color: white;
            padding: 10px;
        }

        table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f1f1f1;
        }

        hr {
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">

<h2>Tambah User</h2>
<form method="POST">
    Username:<br>
    <input type="text" name="username" required><br>
    Email:<br>
    <input type="email" name="email" required><br><br>
    <button type="submit" name="tambah">Tambah</button>
</form>

<hr>

<h2>Data User</h2>
<table>
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Aksi</th>
</tr>

<?php foreach ($data as $row): ?>
<tr>
    <form method="POST">
        <td><?= $row['id'] ?></td>
        <td>
            <input type="text" name="username" value="<?= $row['username'] ?>">
        </td>
        <td>
            <input type="email" name="email" value="<?= $row['email'] ?>">
        </td>
        <td>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit" name="update">Update</button>
        </td>
    </form>
</tr>
<?php endforeach; ?>

</table>

</div>

</body>
</html>