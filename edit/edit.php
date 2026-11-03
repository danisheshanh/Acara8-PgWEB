<?php
$id = $_POST['id'];
$kecamatan = $_POST['kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$luas = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

// Sesuaikan konfigurasi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acara_8_pg-web"; // Ubah ke nama database Anda

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sesuaikan kueri update dengan nama tabel `jumlah penduduk` dan kolom-kolomnya
$sql = "UPDATE `jumlah penduduk` SET Kecamatan='$kecamatan', Longitude='$longitude', Latitude='$latitude', Luas='$luas', Jumlah_Penduduk='$jumlah_penduduk' WHERE Id=$id";

if ($conn->query($sql) === TRUE) {
    // Redirect kembali ke halaman utama (naik satu folder ke H-8)
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $sql. "<br>" . $conn->error;
}

$conn->close();
?>