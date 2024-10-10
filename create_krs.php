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

// Periksa apakah form telah disubmit dan data tersedia
if (isset($_POST['nama_mahasiswa'], $_POST['nim'], $_POST['kelas'], $_POST['mata_kuliah'])) {
    
    $nama_mahasiswa = $conn->real_escape_string($_POST['nama_mahasiswa']);
    $nim = $conn->real_escape_string($_POST['nim']);
    $kelas = $conn->real_escape_string($_POST['kelas']);
    
    // Pastikan 'mata_kuliah' adalah array sebelum menggunakan implode
    $mata_kuliah = is_array($_POST['mata_kuliah']) ? implode(', ', $_POST['mata_kuliah']) : '';

    // Query untuk menyimpan data ke dalam tabel
    $sql = "INSERT INTO krs (nama_mahasiswa, nim, kelas, mata_kuliah)
            VALUES ('$nama_mahasiswa', '$nim', '$kelas', '$mata_kuliah')";

    if ($conn->query($sql) === TRUE) {
        echo "Data KRS berhasil disimpan!";
        header("Location: read.php"); // Redirect ke halaman lain setelah simpan
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Menampilkan error jika ada
    }
} else {
    echo "Harap lengkapi semua data pada form!";
}

// Tutup koneksi
$conn->close();
?>
