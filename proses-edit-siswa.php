<?php 
include("koneksi.php");

$nisn = $_GET['nisn'];

$tampil = "SELECT 
    tb_siswa.nisn,
    tb_siswa.nama_siswa,
    tb_siswa.tempat_lahir,
    tb_siswa.tgl_lahir,
    tb_siswa.jk,
    tb_siswa.alamat,
    tb_siswa.telp,
    tb_siswa.jurusan,
    tb_siswa.foto_siswa,
    tb_berkas.status_berkas
FROM 
    tb_siswa
LEFT JOIN 
    tb_berkas ON tb_siswa.nisn = tb_berkas.nisn
WHERE 
    tb_siswa.nisn='$nisn'";

$hasil = mysqli_query($conn, $tampil);
$data = mysqli_fetch_array($hasil);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container container-md shadow-sm p-3 mb-5 bg-body-tertiary rounded mt-5 mb-5">
        <div class="card-header">
            <h3>Form Edit Siswa Baru</h3>
        </div>
        <div class="card border-0 mt-5">
            <form action="proses-update-data-siswa.php" method="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <label for="NISN" class="form-label">NISN</label>
                    <input id="nisn-input" type="text" name="nisn" class="form-control" value="<?php echo $data['nisn']; ?>" readonly>
                </div>

                <div class="mb-2">
                    <label for="Nama_Siswa" class="form-label">Nama Siswa</label>
                    <input type="text" name="Nama_Siswa" id="Nama_Siswa" class="form-control" value="<?php echo $data['nama_siswa']; ?>" required>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <label for="Tempat_Lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="Tempat_Lahir" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $data['tgl_lahir']; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option value="">--Jenis Kelamin--</option>
                        <option value="L" <?php if($data['jk'] == 'L') echo 'selected'; ?>>Laki - Laki</option>
                        <option value="P" <?php if($data['jk'] == 'P') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label for="alamat" class="form-label">Alamat Domisili</label>
                    <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" rows="4" required><?php echo $data['alamat']; ?></textarea>
                </div>
                <div class="mb-2">
                    <label for="notelp" class="form-label">No Telpon Aktif</label>
                    <input type="number" name="notelp" class="form-control" value="<?php echo $data['telp']; ?>" required>
                </div>
                <div class="mb-2">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select name="jurusan" class="form-control" required>
                        <option value="">--Pilih Jurusan--</option>
                        <option value="TKJ" <?php if($data['jurusan'] == 'TKJ') echo 'selected'; ?>>Teknik Komputer & Jaringan</option>
                        <option value="DKV" <?php if($data['jurusan'] == 'DKV') echo 'selected'; ?>>Desain Komunikasi Visual</option>
                        <option value="Akuntansi" <?php if($data['jurusan'] == 'Akuntansi') echo 'selected'; ?>>Akuntansi</option>
                        <option value="TKR" <?php if($data['jurusan'] == 'TKR') echo 'selected'; ?>>Teknik Kendaraan Ringan</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="status_berkas" class="form-label">Status Berkas</label>
                    <select name="status_berkas" class="form-control" required>
                        <option value="">--Status Berkas--</option>
                        <option value="Terpenuhi" <?php if($data['status_berkas'] == 'Terpenuhi') echo 'selected'; ?>>Terpenuhi</option>
                        <option value="Belum Terpenuhi" <?php if($data['status_berkas'] == 'Belum Terpenuhi') echo 'selected'; ?>>Belum Terpenuhi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto Siswa</label>
                    <input type="file" name="Fotosiswa" class="form-control" accept="image/*">
                </div>
                
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
										<button type="button" onclick="location.href='dashboard.php'" class="btn btn-secondary">Close</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
