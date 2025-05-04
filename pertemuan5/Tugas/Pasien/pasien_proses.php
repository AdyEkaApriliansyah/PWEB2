<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Tambah Data dari FORM
$_id = $_POST['id_edit'] ?? NULL;
$_kode = $_POST['kode'] ?? NULL;
$_nama = $_POST['nama'] ?? NULL;
$_tmp = $_POST['tmp_lahir'] ?? NULL;
$_tgl = $_POST['tgl_lahir'] ?? NULL;
$_gender = $_POST['gender'] ?? NULL;
$_email = $_POST['email'] ?? NULL;
$_alamat = $_POST['alamat'] ?? NULL;
$_kelurahan = $_POST['kelurahan_id'] ?? NULL;
$_proses = $_POST['proses'] ?? NULL;

if ($_proses == "Simpan") {
    $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $ar_data = [$_kode, $_nama, $_tmp, $_tgl, $_gender, $_email, $_alamat, $_kelurahan];
} elseif ($_proses == "Update") {
    $sql = "UPDATE pasien SET kode=?, nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=? WHERE id=?";
    $ar_data = [$_kode, $_nama, $_tmp, $_tgl, $_gender, $_email, $_alamat, $_kelurahan, $_id];
} elseif (isset($_GET['hapus']) && isset($_GET['id'])) {
    $sql = "DELETE FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$_GET['id']]);
    header("Location: index.php");
    exit;
} else {
    die("Aksi tidak dikenali");
}

$stmt = $dbh->prepare($sql);
$stmt->execute($ar_data);
header("Location: index.php");