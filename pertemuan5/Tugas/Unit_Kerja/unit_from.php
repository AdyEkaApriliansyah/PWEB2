<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Inisialisasi data
$id = $_GET['id'] ?? '';
$data = ['nama' => ''];

// Jika ada ID, ambil data dari database
if ($id && is_numeric($id)) {
    try {
        $stmt = $dbh->prepare("SELECT * FROM unit_kerja WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Jika data tidak ditemukan
        if (!$data) {
            $data = ['nama' => ''];
            $id = ''; // Reset ID karena data tidak ada
        }
    } catch (PDOException $e) {
        die("Error mengambil data: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Unit Kerja</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-50">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold mb-4"><?= $id ? 'Edit' : 'Tambah' ?> Unit Kerja</h3>
        
        <form method="POST" action="unit_proses.php" class="space-y-4">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
            
            <div class="form-group">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Unit</label>
                <input type="text" id="nama" name="nama" 
                       value="<?= htmlspecialchars($data['nama'] ?? '') ?>" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>
            
            <div class="flex items-center space-x-3">
                <button type="submit" name="proses" value="<?= $id ? 'update' : 'simpan' ?>" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition duration-200">
                    <?= $id ? 'Update' : 'Simpan' ?>
                </button>
                
                <a href="index.php" class="text-gray-600 hover:text-gray-800">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>