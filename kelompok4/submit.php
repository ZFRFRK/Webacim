<?php
$host = "localhost";
$user = "root";
$pass = "";                  
$db   = "form_kelompok4";   

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama  = $_POST['nama'];
$kelas = $_POST['kelas'];

$stmt = $conn->prepare("INSERT INTO data_siswa (nama, kelas) VALUES (?, ?)");
$stmt->bind_param("ss", $nama, $kelas);

if ($stmt->execute()) {
    echo "Data berhasil disimpan!";
    echo "<br><a href='index.html'>Kembali</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
