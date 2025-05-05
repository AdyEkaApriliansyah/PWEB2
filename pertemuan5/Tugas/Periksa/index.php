<?php
require_once '../dbkoneksi.php';

// Ambil data periksa + join ke pasien & paramedik
$sql = "SELECT p.*, ps.nama AS nama_pasien, pm.nama AS nama_dokter
        FROM periksa p
        LEFT JOIN pasien ps ON ps.id = p.pasien_id
        LEFT JOIN paramedik pm ON pm.id = p.dokter_id";
$stmt = $dbh->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pemeriksaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Data Pemeriksaan</h1>
            <a href="periksa_from.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Tambah Pemeriksaan
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-left">No</th>
                        <th class="py-3 px-4 text-left">Tanggal</th>
                        <th class="py-3 px-4 text-left">Berat (kg)</th>
                        <th class="py-3 px-4 text-left">Tinggi (cm)</th>
                        <th class="py-3 px-4 text-left">Tensi</th>
                        <th class="py-3 px-4 text-left">Keterangan</th>
                        <th class="py-3 px-4 text-left">Pasien</th>
                        <th class="py-3 px-4 text-left">Dokter</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach($rows as $index => $row): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4"><?= $index + 1 ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($row['tanggal'] ?? '-') ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($row['berat'] ?? '-') ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($row['tinggi'] ?? '-') ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($row['tensi'] ?? '-') ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($row['keterangan'] ?? '-') ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($row['nama_pasien'] ?? '-') ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($row['nama_dokter'] ?? '-') ?></td>
                        <td class="py-3 px-4 text-center space-x-2">
                            <a href="periksa_from.php?id=<?= $row['id'] ?>" 
                               class="text-blue-600 hover:underline">Edit</a>
                            <a href="periksa_proses.php?hapus=1&id=<?= $row['id'] ?>" 
                               class="text-red-600 hover:underline"
                               onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>