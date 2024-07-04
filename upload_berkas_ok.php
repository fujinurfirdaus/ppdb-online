<?php
include("koneksi.php");

$nisn = $_POST['nisn'];
$file_name_akte = akte();
$file_name_ijazah = ijazah();
$file_name_kk = kk();

if ($file_name_akte && $file_name_ijazah && $file_name_kk) {
    // Menggunakan prepared statement untuk menghindari SQL injection
    $stmt = $conn->prepare("INSERT INTO tb_berkas (siswa_id, kk, akte, ijazah) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $nisn, $file_name_kk, $file_name_akte, $file_name_ijazah);

    if ($stmt->execute()) {
        header("location : selesai.php");
    } else {
        echo "<br> Gagal mengupload: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<br> Gagal mengupload file";
}

$conn->close();

function akte() {
    $dir_akte = "berkas/akte/";
    $file_name_akte = $_FILES['akte']['name'];
    $target_file = $dir_akte . basename($file_name_akte);

    if (move_uploaded_file($_FILES['akte']['tmp_name'], $target_file)) {
        return $file_name_akte;
    } else {
        return false;
    }
}

function kk() {
    $dir_kk = "berkas/kk/";
    $file_name_kk = $_FILES['kk']['name'];
    $target_file = $dir_kk . basename($file_name_kk);

    if (move_uploaded_file($_FILES['kk']['tmp_name'], $target_file)) {
        return $file_name_kk;
    } else {
        return false;
    }
}

function ijazah() {
    $dir_ijazah = "berkas/ijazah/";
    $file_name_ijazah = $_FILES['ijazah']['name'];
    $target_file = $dir_ijazah . basename($file_name_ijazah);

    if (move_uploaded_file($_FILES['ijazah']['tmp_name'], $target_file)) {
        return $file_name_ijazah;
    } else {
        return false;
    }
}
?>
