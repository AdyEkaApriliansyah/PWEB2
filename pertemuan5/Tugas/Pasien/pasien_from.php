<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Ambil data kelurahan untuk dropdown
$kelurahan = $dbh->query("SELECT id, nama FROM kelurahan ORDER BY nama")->fetchAll(PDO::FETCH_ASSOC);

// Inisialisasi data
$data = [
    'kode' => '',
    'nama' => '',
    'tmp_lahir' => '',
    'tgl_lahir' => '',
    'gender' => '',
    'email' => '',
    'alamat' => '',
    'kelurahan_id' => null
];

// Jika edit, ambil data pasien
if (isset($_GET['id'])) {
    $stmt = $dbh->prepare("SELECT * FROM pasien WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6"><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Data Pasien</h1>
        
        <form method="POST" action="pasien_proses.php" class="space-y-4">
            <input type="hidden" name="id_edit" value="<?= $data['id'] ?? '' ?>">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Pasien</label>
                    <input type="text" name="kode" value="<?= htmlspecialchars($data['kode']) ?>" 
                           class="w-full px-3 py-2 border rounded-md" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" 
                           class="w-full px-3 py-2 border rounded-md" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                    <input type="text" name="tmp_lahir" value="<?= htmlspecialchars($data['tmp_lahir']) ?>" 
                           class="w-full px-3 py-2 border rounded-md">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" 
                           class="w-full px-3 py-2 border rounded-md">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select name="gender" class="w-full px-3 py-2 border rounded-md">
                        <option value="L" <?= ($data['gender'] ?? '') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="P" <?= ($data['gender'] ?? '') == 'P' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" 
                           class="w-full px-3 py-2 border rounded-md">
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" class="w-full px-3 py-2 border rounded-md"><?= htmlspecialchars($data['alamat']) ?></textarea>
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kelurahan</label>
                    <select name="kelurahan_id" class="w-full px-3 py-2 border rounded-md">
                        <option value="">-- Pilih Kelurahan --</option>
                        <?php foreach ($kelurahan as $kel): ?>
                            <option value="<?= $kel['id'] ?>" 
                                <?= ($kel['id'] == ($data['kelurahan_id'] ?? null)) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($kel['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4">
                <a href="index.php" class="px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-100">Batal</a>
                <button type="submit" name="proses" value="<?= isset($_GET['id']) ? 'Update' : 'Simpan' ?>" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    <?= isset($_GET['id']) ? 'Update' : 'Simpan' ?>
                </button>
            </div>
        </form>
    </div>
</body>
</html>