<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$id = $_GET['id'] ?? '';
$data = ['kode_unit' => '', 'nama_unit' => '', 'keterangan' => ''];

if ($id) {
    $stmt = $dbh->prepare("SELECT * FROM unit_kerja WHERE id = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Formulir -->
<h3 class="text-xl font-bold mb-4">Form Unit Kerja</h3>
<form method="POST" action="unit_proses.php" class="space-y-4">
    <input type="hidden" name="id_edit" value="<?= $id ?>">
    
    <label>Kode Unit: <input type="text" name="kode_unit" value="<?= $data['kode_unit'] ?>" class="border p-1"></label><br>
    <label>Nama Unit: <input type="text" name="nama_unit" value="<?= $data['nama_unit'] ?>" class="border p-1"></label><br>
    <label>Keterangan: <input type="text" name="keterangan" value="<?= $data['keterangan'] ?>" class="border p-1 w-full"></label><br>

    <button type="submit" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>" class="bg-green-500 text-white px-4 py-2 rounded">
        <?= $id ? 'Update' : 'Simpan' ?>
    </button>
</form>