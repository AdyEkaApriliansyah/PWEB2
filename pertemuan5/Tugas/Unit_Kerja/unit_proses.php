<?php
// Koneksi Database
require_once '../dbkoneksi.php';

if (isset($_POST['proses'])) {
    $data = [
        $_POST['nama'],
    ];

    if ($_POST['id_edit']) {
        // Update
        $data[] = $_POST['id_edit'];
        $sql = "UPDATE unit_kerja SET nama=? WHERE id=?";
    } else {
        // Insert
        $sql = "INSERT INTO unit_kerja (nama) VALUES (?)";
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