<?php
$nisn = isset($_GET["nisn"]) ? htmlspecialchars($_GET["nisn"]) : "NISN tidak ditemukan";
$nama = isset($_GET["nama"]) ? htmlspecialchars($_GET["nama"]) : "Nama tidak ditemukan";
$tempatlahir = isset($_GET["tempatlahir"]) ? htmlspecialchars($_GET["tempatlahir"]) : "tempatlahir tidak ditemukan";
$tanggallahir = isset($_GET["tanggallahir"]) ? htmlspecialchars($_GET["tanggallahir"]) : "Tanggal lahir tidak ditemukan";
$jk = isset($_GET["jk"]) ? htmlspecialchars($_GET["jk"]) : "Jenis Kelamin tidak ditemukan";
$alamat = isset($_GET["alamat"]) ? htmlspecialchars($_GET["alamat"]) : "Alamat tidak ditemukan";
$notelp = isset($_GET["notelp"]) ? htmlspecialchars($_GET["notelp"]) : "No. Telepon tidak ditemukan";
$jurusan = isset($_GET["jurusan"]) ? htmlspecialchars($_GET["jurusan"]) : "Jurusan tidak ditemukan";
$foto = isset($_GET["foto"]) ? htmlspecialchars($_GET["foto"]) : "Foto tidak ditemukan";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Upload Berkas</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>

<body>
	<div class="container mt-5">
		<div class="card border-0">

			<div class="card-header bg-primary text-white">
				<h3>Biodata Siswa</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<img src="<?php echo $foto; ?>" alt="Foto Siswa" class="img-fluid rounded">
					</div>
					<div class="col-md-8">
						<table class="table">
							<tr>
								<th>NISN</th>
								<td><?php echo $nisn; ?></td>
							</tr>
							<tr>
								<th>Nama</th>
								<td><?php echo $nama; ?></td>
							</tr>
							<tr>
								<th>Tempat Lahir</th>
								<td><?php echo $tempatlahir; ?></td>
							</tr>
							<tr>
								<th>Tanggal Lahir</th>
								<td><?php echo $tanggallahir; ?></td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td><?php echo $jk; ?></td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td><?php echo $alamat; ?></td>
							</tr>
							<tr>
								<th>No. Telepon</th>
								<td><?php echo $notelp; ?></td>
							</tr>
							<tr>
								<th>Jurusan</th>
								<td><?php echo $jurusan; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card mt-2 border-0">
			<div class="card-header bg-primary text-white">
				<h3>Upload Berkas</h3>
			</div>
			<div class="card-body">
				<form action="upload_berkas.php" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<input type="hidden" name="nisn" class="form-control" placeholder="<?php echo $nisn; ?>" value="<?php echo $nisn; ?>">
					</div>
					<div class="mb-3">
						<label for="formFileSm1" class="form-label">Upload Ijazah Terakhir (pdf/jpg)</label>
						<div class="d-flex align-items-center">
							<input class="form-control form-control-sm" id="formFileSm1" type="file" name="ijazah">
						</div>
					</div>
					<div class="mb-3">
						<label for="formFileSm2" class="form-label">Upload Akte Kelahiran (pdf/jpg)</label>
						<div class="d-flex align-items-center">
							<input class="form-control form-control-sm" id="formFileSm2" type="file" name="akte">
						</div>
					</div>
					<div class="mb-3">
						<label for="formFileSm3" class="form-label">Upload Kartu Keluarga (pdf/jpg)</label>
						<div class="d-flex align-items-center">
							<input class="form-control form-control-sm" id="formFileSm3" type="file" name="kk">
						</div>
					</div>
					<div class="card-footer ">
				<div>
					<button type="submit" class="btn btn-primary mx-2 " name="proses_upload">Selesai</button>
					<button type="button" onclick="location.href='index.php'" class="btn btn-danger">Close</button>
				</div>
			</div>
				</form>
			</div>
			
		</div>
	</div>
</body>

</html>