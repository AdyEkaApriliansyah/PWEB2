<?php
require_once '../dbkoneksi.php';

// Ambil data periksa + join ke pasien & paramedik
$sql = "SELECT p.*, ps.nama AS nama_pasien, pm.nama AS nama_dokter
        FROM periksa p
        LEFT JOIN pasien ps ON ps.id = p.pasien_id
        LEFT JOIN paramedik pm ON pm.id = p.dokter_id";
$rs = $dbh->query($sql);
?>

<h3>Data Pemeriksaan</h3>
<a href="periksa_from.php">Tambah Pemeriksaan</a>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Berat</th>
            <th>Tinggi</th>
            <th>Tensi</th>
            <th>Keterangan</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        foreach($rs as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->tanggal ?></td>
            <td><?= $row->berat ?></td>
            <td><?= $row->tinggi ?></td>
            <td><?= $row->tensi ?></td>
            <td><?= $row->keterangan ?></td>
            <td><?= $row->nama_pasien ?></td>
            <td><?= $row->nama_dokter ?></td>
            <td>
                <a href="periksa_from.php?id=<?= $row->id ?>">Edit</a>
                <a href="periksa_proses.php?hapus=1&id=<?= $row->id ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>