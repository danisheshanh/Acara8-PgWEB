<?php
$id = $_GET['id'];

// Sesuaikan konfigurasi ini persis seperti di file index.php utama
$servername = "localhost";
$username = "root";
$password = ""; // Kosongkan passwordnya
$dbname = "acara_8_pg-web"; // Ubah nama database sesuai milik Anda

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

// Ubah nama tabel menjadi `jumlah penduduk` dan sesuaikan nama kolom id-nya
$sql = "DELETE FROM `jumlah penduduk` WHERE Id = $id";

if ($conn->query($sql) === TRUE) {
    // Berhasil dihapus, tidak perlu echo karena akan langsung di-redirect
} else {
    echo "Error: ".$sql. "<br>".$conn->error;
}

$conn->close();

// Kembali ke halaman utama setelah proses hapus selesai
header("Location: index.php");
?>