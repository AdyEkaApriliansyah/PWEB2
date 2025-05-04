<?php
// Menghubungkan ke database
require_once '../dbkoneksi.php';

// Mengambil data dari table kelurahan
$sql = "SELECT * FROM kelurahan";
$rs = $dbh->query($sql);
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kelurahan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Kelurahan</h1>
            <a href="kelurahan_form.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                + Tambah Kelurahan
            </a>
        </div>

        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left font-medium text-gray-600">No</th>
                    <th class="px-4 py-2 text-left font-medium text-gray-600">Nama Kelurahan</th>
                    <th class="px-4 py-2 text-left font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $no = 1; while ($row = $rs->fetch(PDO::FETCH_ASSOC)): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2"><?= $no++ ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($row['nama_kelurahan']) ?></td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="kelurahan_form.php?id=<?= $row['id'] ?>" class="text-yellow-600 hover:underline">Edit</a>
                        <a href="kelurahan_proses.php?hapus=1&id=<?= $row['id'] ?>"
                           class="text-red-600 hover:underline"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="mt-6">
            <a href="../Dashboard/adimin.php" class="text-blue-500 hover:underline text-sm">← Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>