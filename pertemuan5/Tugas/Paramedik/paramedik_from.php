<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$id = $_GET['id'] ?? null;
$nama = $gender = $tmp_lahir = $tgl_lahir = $kategori = $telpon = $alamat = '';
$proses = "Simpan";

if ($id) {
    $sql = "SELECT * FROM paramedik WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    if ($row) {
        $nama = $row->nama;
        $gender = $row->gender;
        $tmp_lahir = $row->tmp_lahir;
        $tgl_lahir = $row->tgl_lahir;
        $kategori = $row->kategori;
        $telpon = $row->telpon;
        $alamat = $row->alamat;
        $proses = "Update";
    }
}
?>

<form method="POST" action="paramedik_proses.php">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $nama ?>"><br>

    <label>Gender:</label><br>
    <select name="gender">
        <option value="L" <?= ($gender == 'L') ? 'selected' : '' ?>>Laki-laki</option>
        <option value="P" <?= ($gender == 'P') ? 'selected' : '' ?>>Perempuan</option>
    </select><br>

    <label>Tempat Lahir:</label><br>
    <input type="text" name="tmp_lahir" value="<?= $tmp_lahir ?>"><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tgl_lahir" value="<?= $tgl_lahir ?>"><br>

    <label>Kategori:</label><br>
    <input type="text" name="kategori" value="<?= $kategori ?>"><br>

    <label>Telpon:</label><br>
    <input type="text" name="telpon" value="<?= $telpon ?>"><br>

    <label>Alamat:</label><br>
    <textarea name="alamat"><?= $alamat ?></textarea><br>

    <?php if($id): ?>
        <input type="hidden" name="id_edit" value="<?= $id ?>">
    <?php endif; ?>

    <input type="submit" name="proses" value="<?= $proses ?>">
</form>