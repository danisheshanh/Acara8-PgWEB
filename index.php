<?php
// Konfigurasi Database
$servername = "localhost";
$username = "root";
$password = ""; // Kosongkan jika password root bawaan XAMPP tidak pernah diubah
$dbname = "acara_8_pg-web"; // Sesuai nama database Anda

// Membuat Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data dari tabel (Perhatikan penggunaan backtick ` karena nama tabel ada spasinya)
$sql = "SELECT * FROM `jumlah penduduk`";
$result = $conn->query($sql);

echo "<h2>Data Penduduk Kecamatan Sebagian Wilayah Indonesia </h2>";
// Link menuju form input
echo "<a href='input/index.html'>+ Tambah Data Baru</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>
    <tr>
        <th>id</th>
        <th>Kecamatan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Luas</th>
        <th>Jumlah Penduduk</th>
    </tr>";
    
    // Menampilkan data baris demi baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["Id"] . "</td>
            <td>" . $row["Kecamatan"] . "</td>
            <td>" . $row["Longitude"] . "</td>
            <td>" . $row["Latitude"] . "</td>
            <td>" . $row["Luas"] . "</td>
            <td align='right'>" . $row["Jumlah_Penduduk"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>