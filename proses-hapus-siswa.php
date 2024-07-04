<?php 
include("koneksi.php");

$nisn = $_GET['nisn'];

$tampil = "DELETE FROM tb_siswa WHERE nisn='$nisn'";

$hasil = mysqli_query($conn, $tampil);

if ($hasil){
header("Location: dashboard.php");
}
?>