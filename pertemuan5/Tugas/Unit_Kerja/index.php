<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$sql = "SELECT * FROM unit_kerja";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<a href="unit_from.php" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Unit Kerja</a>
<table class="table-auto border mt-4 w-full" width="100%" border="1">
    <thead class="bg-gray-200">
        <tr>
            <th>No</th><th>Kode Unit</th><th>Nama Unit</th><th>Keterangan</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; foreach($rs as $row): ?>
        <tr class="border">
            <td><?= $no++ ?></td>
            <td><?= $row['kode_unit'] ?></td>
            <td><?= $row['nama_unit'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td>
                <a href="unit_from.php?id=<?= $row['id'] ?>" class="text-blue-600">Edit</a> |
                <a href="unit_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-600" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>