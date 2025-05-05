<?php
require_once '../dbkoneksi.php';

// Tangkap data
$_tanggal = $_POST['tanggal'] ?? NULL;
$_berat = $_POST['berat'] ?? NULL;
$_tinggi = $_POST['tinggi'] ?? NULL;
$_tensi = $_POST['tensi'] ?? NULL;
$_keterangan = $_POST['keterangan'] ?? NULL;
$_pasien_id = $_POST['pasien_id'] ?? NULL;
$_dokter_id = $_POST['dokter_id'] ?? NULL;
$_proses = $_POST['proses'] ?? NULL;

if ($_proses == "Simpan") {
    $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $ar_data = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id];
} elseif ($_proses == "Update") {
    $id_edit = $_POST['id_edit'] ?? NULL;
    $sql = "UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=?
            WHERE id=?";
    $ar_data = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id, $id_edit];
} elseif (isset($_GET['hapus']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM periksa WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    header("Location: index.php");
    exit;
} else {
    die("Proses tidak diketahui.");
}

// Jalankan query
$stmt = $dbh->prepare($sql);
$stmt->execute($ar_data);

// Redirect ke index
header("Location: index.php");
?>