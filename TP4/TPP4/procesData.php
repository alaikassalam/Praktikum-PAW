<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Processed</title>
</head>
<body>
    <h2>Hasil Data Form</h2>

    <?php
    // Memproses data menggunakan metode POST atau GET
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<h3>Data dikirim menggunakan metode POST</h3>";
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $alamat = $_POST['alamat'];
        $semester = $_POST['semester'];
        $kelamin = $_POST['kelamin'];
        $hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : 'Tidak ada hobi yang dipilih';
    } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        echo "<h3>Data dikirim menggunakan metode GET</h3>";
        $username = $_GET['username'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $alamat = $_GET['alamat'];
        $semester = $_GET['semester'];
        $kelamin = $_GET['kelamin'];
        $hobi = isset($_GET['hobi']) ? implode(", ", $_GET['hobi']) : 'Tidak ada hobi yang dipilih';
    }

    // Menampilkan data yang diterima
    echo "<p><strong>Username:</strong> $username</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Password:</strong> $password</p>";
    echo "<p><strong>Alamat:</strong> $alamat</p>";
    echo "<p><strong>Semester:</strong> $semester</p>";
    echo "<p><strong>Kelamin:</strong> $kelamin</p>";
    echo "<p><strong>Hobi:</strong> $hobi</p>";
    ?>
</body>
</html>
