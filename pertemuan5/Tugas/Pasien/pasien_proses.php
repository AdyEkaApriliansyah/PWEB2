<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Tambah Data dari FORM
$_id = $_POST['id_edit'] ?? null;
$_kode = $_POST['kode'] ?? null;
$_nama = $_POST['nama'] ?? null;
$_tmp = $_POST['tmp_lahir'] ?? null;
$_tgl = $_POST['tgl_lahir'] ?? null;
$_gender = $_POST['gender'] ?? null;
$_email = $_POST['email'] ?? null;
$_alamat = $_POST['alamat'] ?? null;
$_kelurahan = !empty($_POST['kelurahan_id']) ? (int)$_POST['kelurahan_id'] : null;
$_proses = $_POST['proses'] ?? null;

try {
    if ($_proses == "Simpan") {
        // Validasi kelurahan_id jika diperlukan
        if ($_kelurahan !== null) {
            $check = $dbh->prepare("SELECT id FROM kelurahan WHERE id = ?");
            $check->execute([$_kelurahan]);
            if (!$check->fetch()) {
                throw new Exception("Kelurahan yang dipilih tidak valid");
            }
        }

        $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $ar_data = [$_kode, $_nama, $_tmp, $_tgl, $_gender, $_email, $_alamat, $_kelurahan];
        
    } elseif ($_proses == "Update") {
        // Validasi kelurahan_id jika diperlukan
        if ($_kelurahan !== null) {
            $check = $dbh->prepare("SELECT id FROM kelurahan WHERE id = ?");
            $check->execute([$_kelurahan]);
            if (!$check->fetch()) {
                throw new Exception("Kelurahan yang dipilih tidak valid");
            }
        }

        $sql = "UPDATE pasien SET kode=?, nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=? WHERE id=?";
        $ar_data = [$_kode, $_nama, $_tmp, $_tgl, $_gender, $_email, $_alamat, $_kelurahan, $_id];
        
    } elseif (isset($_GET['hapus']) && isset($_GET['id'])) {
        $sql = "DELETE FROM pasien WHERE id = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$_GET['id']]);
        header("Location: index.php");
        exit;
        
    } else {
        throw new Exception("Aksi tidak dikenali");
    }

    $stmt = $dbh->prepare($sql);
    $stmt->execute($ar_data);
    header("Location: index.php");
    exit;

} catch (PDOException $e) {
    // Tangani error foreign key constraint
    if ($e->getCode() == '23000') {
        die("Error: Kelurahan yang dipilih tidak valid. Silakan pilih kelurahan yang ada di database.");
    } else {
        die("Error Database: " . $e->getMessage());
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}