<?php
ob_start();
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['Nama_Siswa'];
    $tempat_lahir = $_POST['Tempat_Lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['notelp'];
    $jurusan = $_POST['jurusan'];
    $status_berkas = $_POST['status_berkas'];

    // Handle file upload for foto_siswa
    $foto_siswa = $_FILES['Fotosiswa']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto_siswa);

    if ($foto_siswa) {
        if (move_uploaded_file($_FILES['Fotosiswa']['tmp_name'], $target_file)) {
            // Update query with foto_siswa
            $update_query = "UPDATE tb_siswa 
                             LEFT JOIN tb_berkas ON tb_siswa.nisn = tb_berkas.nisn
                             SET 
                                 tb_siswa.nama_siswa='$nama_siswa',
                                 tb_siswa.tempat_lahir='$tempat_lahir',
                                 tb_siswa.tgl_lahir='$tgl_lahir',
                                 tb_siswa.jk='$jk',
                                 tb_siswa.alamat='$alamat',
                                 tb_siswa.telp='$telp',
                                 tb_siswa.jurusan='$jurusan',
                                 tb_siswa.foto_siswa='$target_file',
                                 tb_berkas.status_berkas='$status_berkas'
                             WHERE tb_siswa.nisn='$nisn'";
        } else {
            echo "Error uploading file.";
        }
    } else {
        // Update query without foto_siswa
        $update_query = "UPDATE tb_siswa 
                         LEFT JOIN tb_berkas ON tb_siswa.nisn = tb_berkas.nisn
                         SET 
                             tb_siswa.nama_siswa='$nama_siswa',
                             tb_siswa.tempat_lahir='$tempat_lahir',
                             tb_siswa.tgl_lahir='$tgl_lahir',
                             tb_siswa.jk='$jk',
                             tb_siswa.alamat='$alamat',
                             tb_siswa.telp='$telp',
                             tb_siswa.jurusan='$jurusan',
                             tb_berkas.status_berkas='$status_berkas'
                         WHERE tb_siswa.nisn='$nisn'";
    }

    // Debugging: Display the query
    echo $update_query;

    if (mysqli_query($conn, $update_query)) {
        echo "Data berhasil diperbarui.";
        header("Location: \dashboard.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

ob_end_flush();
?>
