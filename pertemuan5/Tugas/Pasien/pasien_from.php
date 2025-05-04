<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Query data pasien jika ada ID
$id = $_GET['id'] ?? '';
$data = [];
if ($id) {
    $sql = "SELECT * FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
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
<body class="bg-white text-gray-800">

<div class="container mx-auto px-6 py-10 max-w-2xl">
    <h2 class="text-3xl font-extrabold text-black mb-6"><?= $id ? 'Edit' : 'Tambah' ?> Data Pasien</h2>

    <!-- Tombol kembali -->
    <a href="index.php" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 shadow-lg transform hover:scale-105 transition duration-300 mb-6 inline-block">
         Kembali ke Daftar Pasien
    </a>

    <!-- Formulir -->
    <form method="POST" action="pasien_proses.php" class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4">
        <input type="hidden" name="id_edit" value="<?= $data['id'] ?? '' ?>">

        <!-- Kode -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Kode:</label>
            <input type="text" name="kode" value="<?= $data['kode'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Nama:</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Tempat Lahir -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Tempat Lahir:</label>
            <input type="text" name="tmp_lahir" value="<?= $data['tmp_lahir'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Gender -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Gender:</label>
            <select name="gender" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih --</option>
                <option value="L" <?= isset($data['gender']) && $data['gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= isset($data['gender']) && $data['gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Email:</label>
            <input type="email" name="email" value="<?= $data['email'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Alamat -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Alamat:</label>
            <textarea name="alamat" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><?= $data['alamat'] ?? '' ?></textarea>
        </div>

        <!-- Kelurahan ID -->
        <div class="mb-6">
            <label class="block text-gray-700 text-lg font-medium">Kelurahan ID:</label>
            <input type="number" name="kelurahan_id" value="<?= $data['kelurahan_id'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Tombol Submit dan Batal -->
        <div class="flex justify-between items-center">
            <button type="submit" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transform hover:scale-105 transition duration-300">
                <?= $id ? 'Update' : 'Simpan' ?>
            </button>
            <a href="index.php" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Batal</a>
        </div>
    </form>
</div>

</body>
</html>