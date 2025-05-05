<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Inisialisasi variabel
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$data = [
    'nama' => '',
    'gender' => 'L',
    'tmp_lahir' => '',
    'tgl_lahir' => '',
    'kategori' => '',
    'telpon' => '',
    'alamat' => ''
];
$proses = "Simpan";

// Jika mode edit, ambil data dari database
if ($id) {
    $sql = "SELECT * FROM paramedik WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        $data = $result;
        $proses = "Update";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Paramedik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6"><?= $id ? 'Edit' : 'Tambah' ?> Data Paramedik</h1>
        
        <form method="POST" action="paramedik_proses.php" class="space-y-4">
            <?php if($id): ?>
                <input type="hidden" name="id_edit" value="<?= $id ?>">
            <?php endif; ?>
            
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" 
                           class="w-full px-3 py-2 border rounded-md" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select name="gender" class="w-full px-3 py-2 border rounded-md">
                        <option value="L" <?= $data['gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="P" <?= $data['gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                        <input type="text" name="tmp_lahir" value="<?= htmlspecialchars($data['tmp_lahir']) ?>" 
                               class="w-full px-3 py-2 border rounded-md">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" value="<?= htmlspecialchars($data['tgl_lahir']) ?>" 
                               class="w-full px-3 py-2 border rounded-md">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <input type="text" name="kategori" value="<?= htmlspecialchars($data['kategori']) ?>" 
                           class="w-full px-3 py-2 border rounded-md">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                    <input type="tel" name="telpon" value="<?= htmlspecialchars($data['telpon']) ?>" 
                           class="w-full px-3 py-2 border rounded-md">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" class="w-full px-3 py-2 border rounded-md"><?= htmlspecialchars($data['alamat']) ?></textarea>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
                <a href="index.php" class="px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-100">Batal</a>
                <button type="submit" name="proses" value="<?= $proses ?>" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    <?= $proses ?>
                </button>
            </div>
        </form>
    </div>
</body>
</html>