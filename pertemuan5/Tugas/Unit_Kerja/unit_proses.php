<?php
// Koneksi Database
require_once '../dbkoneksi.php';

if (isset($_POST['proses'])) {
    $data = [
        $_POST['kode_unit'],
        $_POST['nama_unit'],
        $_POST['keterangan']
    ];

    if ($_POST['id_edit']) {
        // Update
        $data[] = $_POST['id_edit'];
        $sql = "UPDATE unit_kerja SET kode_unit=?, nama_unit=?, keterangan=? WHERE id=?";
    } else {
        // Insert
        $sql = "INSERT INTO unit_kerja (kode_unit, nama_unit, keterangan) VALUES (?, ?, ?)";
    }

    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    header("Location: index.php");
    exit;
}

if (isset($_GET['hapus']) && isset($_GET['id'])) {
    $stmt = $dbh->prepare("DELETE FROM unit_kerja WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    header("Location: index.php");
    exit;
}