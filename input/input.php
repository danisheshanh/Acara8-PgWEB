<?php
$kecamatan = $_POST['kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$luas = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

// Konfigurasi Database
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "acara_8_pg-web";

// Membuat Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk memasukkan data ke tabel `jumlah penduduk`
$sql = "INSERT INTO `jumlah penduduk` (Kecamatan, Longitude, Latitude, Luas, Jumlah_Penduduk) 
        VALUES ('$kecamatan', '$longitude', '$latitude', '$luas', '$jumlah_penduduk')";

if ($conn->query($sql) === TRUE) {
    // Jika sukses, alihkan kembali ke halaman utama (tabel view)
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>