<?php
// Koenksi Database
require_once '../dbkoneksi.php';

// Ambil data pasien
$sql = "SELECT * FROM pasien";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Data Pasien</h1>

    <!-- Tombol navigasi -->
    <div class="mb-4 flex justify-between">
        <a href="../Dashboard/adimin.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kembali ke Beranda</a>
        <a href="pasien_from.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Pasien</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Kode</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Tempat, Tgl Lahir</th>
                    <th class="py-2 px-4">Gender</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Alamat</th>
                    <th class="py-2 px-4">Kelurahan</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1; foreach($rs as $row): ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2 px-4"><?= $no++ ?></td>
                    <td class="py-2 px-4"><?= $row['kode'] ?></td>
                    <td class="py-2 px-4"><?= $row['nama'] ?></td>
                    <td class="py-2 px-4"><?= $row['tmp_lahir'] . ', ' . $row['tgl_lahir'] ?></td>
                    <td class="py-2 px-4"><?= $row['gender'] ?></td>
                    <td class="py-2 px-4"><?= $row['email'] ?></td>
                    <td class="py-2 px-4"><?= $row['alamat'] ?></td>
                    <td class="py-2 px-4"><?= $row['kelurahan_id'] ?></td>
                    <td class="py-2 px-4">
                        <a href="pasien_from.php?id=<?= $row['id'] ?>" class="text-blue-500 hover:underline">Edit</a> |
                        <a href="pasien_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>