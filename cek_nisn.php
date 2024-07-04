<?php
header('Content-Type: application/json');
include ("koneksi.php");


$nisn = $_POST['nisn'];

$input = "SELECT * FROM tb_siswa WHERE nisn = ?";
$stmt = $conn->prepare($input);
$stmt->bind_param("s", $nisn);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['status' => 'success', 'message' => 'NISN sudah terdaftar']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'NISN tidak / belum terdaftar']);
}

$stmt->close();
$conn->close();
?>
