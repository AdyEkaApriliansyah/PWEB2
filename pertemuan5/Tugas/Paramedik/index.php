<?php
// Koneksi ke Database
require_once '../dbkoneksi.php';

// Definisi Query
$sql = "SELECT * FROM paramedik";
$rs = $dbh->query($sql);
?>

<!-- Table Paramedik -->
<a href="paramedik_from.php">+ Tambah Paramedik</a>
<table border="1" cellpadding="10" width="100%">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>Tempat, Tgl Lahir</th>
        <th>Kategori</th>
        <th>Telpon</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    foreach($rs as $row){
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row->nama ?></td>
        <td><?= $row->gender ?></td>
        <td><?= $row->tmp_lahir . ', ' . $row->tgl_lahir ?></td>
        <td><?= $row->kategori ?></td>
        <td><?= $row->telpon ?></td>
        <td><?= $row->alamat ?></td>
        <td>
            <a href="paramedik_from.php?id=<?= $row->id ?>">Edit</a> |
            <a href="paramedik_proses.php?hapus=1&id=<?= $row->id ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>