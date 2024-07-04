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
    tb_berkas ON tb_siswa.nisn = tb_berkas.nisn";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
	</style>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>

<body>
	<div class="container mt-5">
		<h1>Admin Dashboard</h1>
		<p>Selamat Datang, <strong><?php echo $_SESSION['nama_admin']; ?></strong></p>

		<div class="card mt-5 border-0">
			<div class="card-header mb-5">
				<h3>Tabel siswa baru</h3>
			</div>
			<div class="table-responsive">
				<table id="myTable" class="display table" width="100%" >
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
						if (mysqli_num_rows($result) > 0) {
							$no = 1;
							while ($data = mysqli_fetch_array($result)) {
								$status_berkas_html = '';
								if ($data['status_berkas'] == 'Belum Terpenuhi') {
									$status_berkas_html = '<img src="img/Cross Mark Button.png" alt="Belum Terpenuhi">';
								} elseif ($data['status_berkas'] == 'Terpenuhi') {
									$status_berkas_html = '<img src="img/Check Mark.png" alt="Terpenuhi">';
								}

								echo '<tr>
                                        <td>' . $no . '</td>
                                        <td>' . $data['nisn'] . '</td>
                                        <td>' . $data['nama_siswa'] . '</td>
                                        <td>' . $data['tempat_lahir'] . '</td>
                                        <td>' . $data['tgl_lahir'] . '</td>
                                        <td>' . $data['jk'] . '</td>
                                        <td>' . $data['jurusan'] . '</td>
                                        <td><img src="' . $data['foto_siswa'] . '" alt="Foto Siswa" width="50"></td>
                                        <td class="status-berkas"  style="text-align:center">' . $status_berkas_html . '</td>
                                        <td  style="text-align:center">
																					<button type="button" class="btn btn-primary btn-sm mt-1" onclick="window.location.href=\'proses-edit-siswa.php?nisn=' . $data['nisn'] . '\'">
																							<img src="img/create_4.png" alt="Edit">
																					</button>
																					<button type="button" class="btn btn-danger btn-sm mt-1" onclick="window.location.href=\'proses-hapus-siswa.php?nisn=' . $data['nisn'] . '\'">
																							<img src="img/trash_1.png" alt="Delete">
																					</button>
                                        </td>
                                    </tr>';
								$no++;
							}
						} else {
							echo '<tr><td colspan="10" class="text-center">Tidak ada data</td></tr>';
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="card-footer mt-5">
				<a href="logout.php" class="btn btn-danger">Logout</a>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('.status-berkas').each(function() {
				var status = $(this).text().trim();
				if (status === 'Belum Terpenuhi') {
					$(this).html('<img src="img/Cross Mark Button.png" alt="Belum Terpenuhi">');
				} else if (status === 'Terpenuhi') {
					$(this).html('<img src="img/Check Mark.png" alt="Terpenuhi">');
				}
			});
		});

		$(document).ready(function() {
			$('#myTable').dataTable();
		});
	</script>
</body>

</html>