<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$sql = "SELECT * FROM unit_kerja";
$rs = $dbh->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Unit Kerja</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Daftar Unit Kerja</h1>
        
        <a href="unit_from.php" class="bg-blue-500 text-white px-4 py-2 rounded inline-block mb-4">
            + Tambah Unit Kerja
        </a>
        
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Unit</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1; 
                while ($row = $rs->fetch(PDO::FETCH_ASSOC)): 
                ?>
                <tr>
                    <td class="border px-4 py-2"><?= $no++ ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($row['nama'] ?? '') ?></td>
                    <td class="border px-4 py-2">
                        <a href="unit_from.php?id=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                        <a href="unit_proses.php?hapus=1&id=<?= $row['id'] ?>" 
                           class="text-red-600 hover:underline"
                           onclick="return confirm('Hapus data ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>