<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Ambil data dari FORM
$nama = $_POST['nama'] ?? null;
$gender = $_POST['gender'] ?? null;
$tmp_lahir = $_POST['tmp_lahir'] ?? null;
$tgl_lahir = $_POST['tgl_lahir'] ?? null;
$kategori = $_POST['kategori'] ?? null;
$telpon = $_POST['telpon'] ?? null;
$alamat = $_POST['alamat'] ?? null;
$proses = $_POST['proses'] ?? null;

if ($proses == "Simpan") {
    $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$nama, $gender, $tmp_lahir, $tgl_lahir, $kategori, $telpon, $alamat]);

} elseif ($proses == "Update") {
    $id = $_POST['id_edit'] ?? null;
    $sql = "UPDATE paramedik SET nama=?, gender=?, tmp_lahir=?, tgl_lahir=?, kategori=?, telpon=?, alamat=? WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$nama, $gender, $tmp_lahir, $tgl_lahir, $kategori, $telpon, $alamat, $id]);

} elseif (isset($_GET['hapus']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM paramedik WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    header("Location: index.php");
    exit;
}

header("Location: index.php");