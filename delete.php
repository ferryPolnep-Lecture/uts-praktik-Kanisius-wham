<?php
$servername = "localhost";
$username = "root";  // Nama pengguna MySQL
$password = "";      // Kata sandi default (kosong)
$database = "uts5e"; // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk menghapus data
$sql = "DELETE FROM krs WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Data KRS berhasil dihapus!";
    header("Location: read.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
