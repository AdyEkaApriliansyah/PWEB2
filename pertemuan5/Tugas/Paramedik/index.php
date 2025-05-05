<?php
// Koneksi ke Database
require_once '../dbkoneksi.php';

// Definisi Query
$sql = "SELECT * FROM paramedik";
$stmt = $dbh->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Paramedik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Data Paramedik</h1>
        
        <a href="paramedik_from.php" class="bg-blue-600 text-white px-4 py-2 rounded inline-block mb-4 hover:bg-blue-700">
            + Tambah Paramedik
        </a>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border">No</th>
                        <th class="py-2 px-4 border">Nama</th>
                        <th class="py-2 px-4 border">Gender</th>
                        <th class="py-2 px-4 border">Tempat, Tgl Lahir</th>
                        <th class="py-2 px-4 border">Kategori</th>
                        <th class="py-2 px-4 border">Telpon</th>
                        <th class="py-2 px-4 border">Alamat</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $index => $row): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border text-center"><?= $index + 1 ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($row['nama'] ?? '-') ?></td>
                        <td class="py-2 px-4 border text-center"><?= htmlspecialchars($row['gender'] ?? '-') ?></td>
                        <td class="py-2 px-4 border">
                            <?= htmlspecialchars($row['tmp_lahir'] ?? '-') ?>, <?= htmlspecialchars($row['tgl_lahir'] ?? '-') ?>
                        </td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($row['kategori'] ?? '-') ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($row['telpon'] ?? '-') ?></td>
                        <td class="py-2 px-4 border"><?= htmlspecialchars($row['alamat'] ?? '-') ?></td>
                        <td class="py-2 px-4 border text-center">
                            <a href="paramedik_from.php?id=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                            <a href="paramedik_proses.php?hapus=1&id=<?= $row['id'] ?>" 
                               class="text-red-600 hover:underline"
                               onclick="return confirm('Yakin ingin menghapus?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>