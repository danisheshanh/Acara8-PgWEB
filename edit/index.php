<!DOCTYPE html>
<html>
<body>
<h2>Form Edit</h2>
<?php
// Sesuaikan dengan setting MySQL Anda
$servername = "localhost";
$username = "root";
$password = ""; // Kosongkan password
$dbname = "acara_8_pg-web"; // Ubah ke database Anda

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

$id = $_GET['id'];
// Sesuaikan nama tabel dan nama kolom Id (huruf besar I)
$sql = "SELECT * FROM `jumlah penduduk` WHERE Id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>";
    while($row = $result->fetch_assoc()) {
        // Sesuaikan key array dengan nama kolom di database Anda (huruf besar/kecilnya)
        echo "<input type='hidden' name='id' value='".$row['Id']."'><br>";
        
        echo "<label for='kecamatan'>Kecamatan: </label><br>";
        echo "<input type='text' id='kec' name='kecamatan' value='".$row['Kecamatan']."'><br>";
        
        echo "<label for='longitude'>Longitude: </label><br>";
        echo "<input type='text' id='long' name='longitude' value='".$row['Longitude']."'><br>";
        
        echo "<label for='latitude'>Latitude: </label><br>";
        echo "<input type='text' id='lat' name='latitude' value='".$row['Latitude']."'><br>";
        
        echo "<label for='luas'>Luas: </label><br>";
        echo "<input type='text' id='luas' name='luas' value='".$row['Luas']."'><br>";
        
        echo "<label for='jumlah_penduduk'>Jumlah Penduduk: </label><br>";
        echo "<input type='text' id='jml_pddk' name='jumlah_penduduk' value='".$row['Jumlah_Penduduk']."'><br><br>";
        
        echo "<input type='submit' value='Submit'>";
    }
    echo "</form>";
} else {
    echo "Data tidak ditemukan.";
}
$conn->close();
?>
<p id="informasi"></p>
<script>
function validateForm() {
    let luas = document.getElementById("luas").value;
    let text="";
    if (isNaN(luas) || luas < 1) {
        text = "Data luas harus angka dan tidak boleh bernilai negatif";
        // stop the form submission
        event.preventDefault();
    }
    document.getElementById("informasi").innerHTML = text;
}
</script>
</body>
</html>