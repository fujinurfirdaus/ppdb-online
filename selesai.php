<?php
$nisn = isset($_GET["nisn"]) ? htmlspecialchars($_GET["nisn"]) : "NISN tidak ditemukan";
$nama = isset($_GET["nama"]) ? htmlspecialchars($_GET["nama"]) : "Nama tidak ditemukan";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<title><?php echo $nisn; ?></title>
</head>
<body>
	<div class="container mt-5 bg text-success">
		<div class="card">
			<div class="card-body" style="background-color: #95d5b2;">
				<h1>Selamat</h1>
				<h4>kamu sudah terdaftar sebagai siswa
				SMK SANTIAGO BERNABEU 2024/2025</h4>
			</div>
			<div class="card-footer">
				<a href="index.php" class="btn btn-danger">Close</a>
				<a href="#" class="btn btn-warning" id="printButton">Cetak Bukti Pendaftaran</a>
			</div>
		</div>
	</div>
</body>
</html>
