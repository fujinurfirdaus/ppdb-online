<?php
session_start();
include("koneksi.php");

$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa username dan password
$sql = "SELECT * FROM tb_login WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$_SESSION['admin'] = $username;
	$_SESSION['nama_admin'] = $row['nama_admin']; // Simpan nama_admin di sesi
	header("Location: dashboard.php");
} else {
    echo "<script>alert('Username atau Password salah!');window.location='login.php';</script>";
}

$stmt->close();
$conn->close();
?>
