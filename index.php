<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PPDB - SMK SABER</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">

</head>

<body>
	<header>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
    <div class="container-md">
        <a class="navbar-brand" href="#">SMK SANTIAGO BERNABEU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav flex-row me-3">
                <li class="nav-item">
                    <a class="nav-link me-3" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#panduan">Panduan</a>
                </li>
            </ul>
            <form class="d-flex mx-2" action="form-daftar.php" method="post">
                <button class="btn btn-outline-primary" type="submit">Daftar</button>
            </form>
            <form class="d-flex mx-2" action="login.php" method="post">
                <button class="btn btn-outline-success" type="submit">Login admin</button>
            </form>
        </div>
    </div>
</nav>
</header>

	<!-- isi -->
	<div class="container mt-5 py-5">
		<div class="row">
			<div class="col-md-6 mb-4 mt-5">
				<img src="img/saber.png" alt="Deskripsi gambar" class="img-fluid">
			</div>
			<div class="col-md-6">
				<h3>Penerimaan Peserta Didik Baru SMK Santiago Bernabeu (SABER) Tahun Ajaran 2024/2025</h3>
				<p>Selamat datang di PPDB SMK Santiago Bernabeu, tempat di mana potensi dihargai dan masa depan dibentuk dengan penuh dedikasi. Bersama kita menjalani perjalanan pendidikan yang inspiratif dan membuka pintu menuju kesuksesan.
				</p>
				<h4>Syarat Pendaftaran :</h4>
				<ul class="list">
					<li>Mengisi Formulir Online <span> <a href="form-daftar.php" style="text-decoration: none;">Disini</a></span></li>
					<li>Upload Akte Kelahiran</li>
					<li>Upload Ijazah/Surat Keterangan Kelulusan</li>
					<li>Upload Kartu Keluarga</li>
				</ul>
				<div class="search-content">
				<h4>Cek Status Pendaftaran</h4>
				<form class="search-form">
					<div class="input-group mb-4">
						<input type="text" id="nisn-input" class="form-control" placeholder="Masukan NISN disini...">
					</div>
				</form>
				<div id="nisn-result">
				</div>
			</div>
			</div>
		</div>


		</div>
	</div>

	<div class="container mt-5" id="panduan">
	<div class="card border-0">
		<div class="card-header ">
			<h4>Panduan Pendaftaran</h4>
		</div>
		<div class="card body border-0">
			<img src="img/panduan.png" alt="">
		</div>
	</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha384-7N9IH81C29L8jk5U6FtP06gZ9sLnW6n4P0Tz+K5j6oO7/JctE+qyStl/FpmmTJ4Z" crossorigin="anonymous"></script>

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
                        $('#nisn-result').html('<div class="alert alert-success">' + response.message + ' </div>');
                    } else {
                        $('#nisn-result').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function() {
                    $('#nisn-result').html('<div class="alert alert-danger">Terjadi kesalahan saat memeriksa NISN.</div>');
                }
            });
        });
    });

    $(document).ready(function() {
        $('.navbar-toggler').click(function() {
            var target = $(this).data('bs-target');
            $(target).toggleClass('collapse');
        });
    });

</script>

<footer class="footer text-center" style="background-color: #e3f2fd;">
© 2024 SMK Santiago Bernabeu. All rights reserved.
</footer>
</body>

</html>