<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PPDB Online SMK Real Madrid</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>

<body>
		<div class="container-md shadow-sm p-3 mb-5 bg-body-tertiary rounded mt-5 mb-5">
			<div class="row justify-content-center">
				<img src="img/logo.svg" alt="Deskripsi gambar" class="img-fluid mb-2" style="width: 150px;">
		</div>
		<div class="row justify-content-center">
			<h4 class="mb-4" style="text-align: center;">Formulir Pendaftaran Siswa Baru <br> SMK Santiago Bernabeu 2024/2025</h4>
		</div>
		<div id="nisn-result">
</div>
		<form action="proses-daftar-siswa.php" method="post" enctype="multipart/form-data">
				<div class="mb-2">
					<label for="NISN" class="form-label">NISN</label>
					<input id="nisn-input" type="text" name="nisn" class="form-control" placeholder="Nomor Induk Siswa Nasional" required>
				</div>
				
				<div class="mb-2">
					<label for="Nama_Siswa" class="form-label">Nama Siswa</label>
					<input type="text" name="Nama_Siswa" id="Nama_Siswa" class="form-control" placeholder="Masukkan Nama Lengkap" required>
				</div>
				<div class="row">
					<div class="col">
				<div class="mb-2">
					<label for="Tempat_Lahir" class="form-label">Tempat Lahir</label>
					<input type="text" name="Tempat_Lahir" class="form-control" placeholder="Masukan Tempat Lahir" required>
				</div>
				</div>
				<div class="col">
				<div class="mb-2">
					<label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" class="form-control" required>
				</div>
				</div>
				</div>

				<div class="mb-2">
					<label for="jk" class="form-label">Jenis Kelamin</label>
					<select name="jk" class="form-control">
						<option value="">--Jenis Kelamin--</option>
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>

				<div class="mb-2">
					<label for="alamat" class="form-label">Alamat Domisili</label>
					<textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" rows="4" required></textarea>
				</div>
				<div class="mb-2">
					<label for="notelp" class="form-label">No Telpon Aktif</label>
					<input type="number" name="notelp" class="form-control" placeholder="Masukkan Nomor Telepon" required>
				</div>
				<div class="mb-2">
					<label for="jurusan" class="form-label">Jurusan</label>
					<select name="jurusan" class="form-control">
						<option value="">--Pilih Jurusan--</option>
						<option value="TKJ">Teknik Komputer & Jaringan</option>
						<option value="DKV">Desain Komunikasi Visual</option>
						<option value="Akuntansi">Akuntansi</option>
						<option value="TKR">Teknik Kendaraan Ringan</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="formFile" class="form-label">Foto Siswa</label>
					<input type="file" name="Fotosiswa" class="form-control" accept="image/*">
				</div>
				<div class="mb-2">
					<button type="submit" class="btn btn-primary">Daftar Sekarang</button>
					<button type="button" onclick="location.href='index.php'" class="btn btn-danger">Close</button>
				</div>
			</form>
		</div>

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
			$('#nisn-input').keyup(function(event) {
            var nisn = $('#nisn-input').val();
            $.ajax({
                url: 'cek_nisn.php',
                type: 'POST',
                data: { nisn: nisn }, 
                success: function(response) {
                    if (response.status === 'success') {
											$('#nisn-result').html('<div class="alert alert-danger">' + response.message + '</div>');  
                    } else {
											$('#nisn-result').html('<div class="alert alert-danger" style="display :none;">' + response.message + '</div>'); 
                    }
                },
                error: function() {
                    $('#nisn-result').html('<div class="alert alert-danger">Terjadi kesalahan saat memeriksa NISN.</div>');
                }
            });
        });
    });

		
    </script>

	</body>

</html>