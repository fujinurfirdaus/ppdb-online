<?php
include("koneksi.php");
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: login.php");
	exit();
}

$query = "SELECT 
    tb_siswa.nisn,
    tb_siswa.nama_siswa,
    tb_siswa.tempat_lahir,
    tb_siswa.tgl_lahir,
    tb_siswa.jk,
    tb_siswa.jurusan,
    tb_siswa.foto_siswa,
    tb_berkas.status_berkas
FROM 
    tb_siswa
LEFT JOIN 
    tb_berkas ON tb_siswa.nisn = tb_berkas.nisn;
";
$result = mysqli_query($conn, $query);
$data = mysqli_num_rows($result)

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container mt-5">
		<h1>Admin Dashboard</h1>
		<p>Selamat Datang, <strong><?php echo $_SESSION['nama_admin']; ?></strong></p>

		<div class="card mt-5 border-0">
			<div class="card border-0">
				<h3>Tabel siswa baru</h3>
			</div>
			<div class="card border-0">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>NISN</th>
							<th>Nama Siswa</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>JK</th>
							<th>Jurusan</th>
							<th>Foto Siswa</th>
							<th>Status Berkas</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($result->num_rows > 0) {
							$no = 1;
							while ($data = mysqli_fetch_array($result)) {
								echo  <<<HTML
											<tr>
												<td>$no</td>
												<td>{$data['nisn']}</td>
												<td>{$data['nama_siswa']}</td>
												<td>{$data['tempat_lahir']}</td>
												<td>{$data['tgl_lahir']}</td>
												<td>{$data['jk']}</td>
												<td>{$data['jurusan']}</td>
												<td><img src='{$data['foto_siswa']}' alt='Foto Siswa' width='80' height='70'></td>
												<td id="Status-Berkas">{$data['status_berkas']}</td>
												<td>
													<button type="button" class="btn btn-primary btn-sm mt-1" href="form-edit-siswa.php">
														<img src="img/create_4.png" alt="">
													</button>
													<button type="button" class="btn btn-danger btn-sm mt-1" href="proses-hapus.php">
													<img src="img/trash_1.png" alt="">
													</button>
												</td>
											</tr>
											HTML;

								$no++;
							}
						} else {
							echo "<tr><td colspan='9' class='text-center'>Tidak ada data</td></tr>";
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="card">
				<a href="logout.php" class="btn btn-danger">Logout</a>
			</div>
		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script>
$(document).ready(function() {
    $('#Status-Berkas').each(function() {
        var status = $(this).text().trim();
        if (status === 'Belum Terpenuhi') {
            $(this).html('<img src="img/Cross Mark Button.png" alt="Belum Terpenuhi">');
        } else if (status === 'Terpenuhi') {
            $(this).html('<img src="img/Check Mark.png" alt="Terpenuhi">');
        }
    });
});
</script>
</body>

</html>