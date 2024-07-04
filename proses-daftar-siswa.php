<?php
include("koneksi.php");

$NISN = $_POST['nisn'];
$Nama_Siswa = $_POST['Nama_Siswa'];
$Tempat_Lahir = $_POST['Tempat_Lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$Alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
$jurusan = $_POST['jurusan'];
$Fotosiswa = upload_foto();

$response = ['status' => '', 'message' => ''];

if ($Fotosiswa === false) {
	$response['status'] = 'error';
	$response['message'] = 'There was an error uploading the file.';
	echo json_encode($response);
	exit();
}

try {
	$stmt = $conn->prepare("INSERT INTO tb_siswa (nisn, nama_siswa, tempat_lahir, tgl_lahir, jk, alamat, telp, jurusan, foto_siswa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $NISN, $Nama_Siswa, $Tempat_Lahir, $tgl_lahir, $jk, $Alamat, $notelp, $jurusan, $Fotosiswa);
	$hasil = $stmt->execute();

	if ($hasil) {
		header("Location: halaman-konfirmasi.php?nisn=" . urlencode($NISN) . "&nama=" . urlencode($Nama_Siswa) . "&tanggallahir=" . urlencode($tgl_lahir) . "&tempatlahir=" . urlencode($Tempat_Lahir) . "&jk=" . urlencode($jk) . "&alamat=" . urlencode($Alamat) . "&notelp=" . urlencode($notelp) . "&jurusan=" . urlencode($jurusan) . "&foto=" . urlencode($Fotosiswa));
	} else {
		$response['status'] = 'error';
		$response['message'] = 'Data gagal disimpan.';
	}
} catch (mysqli_sql_exception $e) {
	$response['status'] = 'error';
	$response['message'] = $e->getMessage();
}

echo json_encode($response);
exit();

function upload_foto()
{
	$namaFile = $_FILES['Fotosiswa']['name'];
	$ukuranFile = $_FILES['Fotosiswa']['size'];
	$error = $_FILES['Fotosiswa']['error'];
	$tmpName = $_FILES['Fotosiswa']['tmp_name'];

	if ($error !== 0) {
		return false;
	}

	if ($ukuranFile > 5000000) {
		return false;
	}

	$imageFileType = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
	$allowedTypes = ['jpg', 'jpeg', 'png'];

	if (!in_array($imageFileType, $allowedTypes)) {
		return false;
	}

	$uniqueName = uniqid() . '.' . $imageFileType;
	$targetDir = "img/";
	$targetFile = $targetDir . $uniqueName;

	if (move_uploaded_file($tmpName, $targetFile)) {
		return $targetFile;
	} else {
		return false;
	}
}
