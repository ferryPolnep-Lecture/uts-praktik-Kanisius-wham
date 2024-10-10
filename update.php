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

// Query untuk menampilkan data
$result = $conn->query("SELECT * FROM krs");

echo "<h2>Data KRS</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Mata Kuliah</th>
                <th>Aksi</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nama_mahasiswa']}</td>
                <td>{$row['nim']}</td>
                <td>{$row['kelas']}</td>
                <td>{$row['mata_kuliah']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Update</a> | 
                    <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Apakah Anda yakin ingin menghapus?');\">Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

// Tutup koneksi
$conn->close();
?>
