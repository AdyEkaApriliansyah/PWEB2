<?php
// Connect koneksi ke database
require_once '../dbkoneksi.php';

// Ambil data dari form
$id = $_GET['id'] ?? '';
$nama = '';

if ($id) {
    $stmt = $dbh->prepare("SELECT * FROM kelurahan WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $nama = $row['nama_kelurahan'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $id ? 'Edit' : 'Tambah' ?> Kelurahan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4"><?= $id ? 'Edit' : 'Tambah' ?> Kelurahan</h1>
        
        <form method="post" action="kelurahan_proses.php" class="space-y-4">
            <input type="hidden" name="id" value="<?= $id ?>">
            
            <div>
                <label for="nama_kelurahan" class="block text-sm font-medium text-gray-700">Nama Kelurahan</label>
                <input type="text" name="nama_kelurahan" id="nama_kelurahan"
                    value="<?= htmlspecialchars($nama) ?>"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                >
            </div>

            <div class="flex justify-between items-center">
                <a href="index.php" class="text-sm text-blue-600 hover:underline">← Kembali</a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow-sm text-sm">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>