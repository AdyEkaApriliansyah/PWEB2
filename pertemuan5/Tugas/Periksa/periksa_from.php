<?php
require_once '../dbkoneksi.php';

$id = $_GET['id'] ?? '';
$data = [
    'tanggal' => '',
    'berat' => '',
    'tinggi' => '',
    'tensi' => '',
    'keterangan' => '',
    'pasien_id' => '',
    'dokter_id' => ''
];

if ($id) {
    $sql = "SELECT * FROM periksa WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}

$pasien = $dbh->query("SELECT id, nama FROM pasien")->fetchAll(PDO::FETCH_ASSOC);
$dokter = $dbh->query("SELECT id, nama FROM paramedik")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pemeriksaan</title>
    <style>
        form {
            width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        label {
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            margin-bottom: 15px;
            padding: 8px;
        }
        button {
            padding: 10px 20px;
            background-color: #2c7be5;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #1a5fcc;
        }
    </style>
</head>
<body>

<h3 style="text-align:center;">Form Pemeriksaan</h3>
<form method="POST" action="periksa_proses.php">
    <input type="hidden" name="id_edit" value="<?= htmlspecialchars($id) ?>">

    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" id="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>">

    <label for="berat">Berat (kg):</label>
    <input type="number" name="berat" id="berat" step="0.1" value="<?= htmlspecialchars($data['berat']) ?>">

    <label for="tinggi">Tinggi (cm):</label>
    <input type="number" name="tinggi" id="tinggi" step="0.1" value="<?= htmlspecialchars($data['tinggi']) ?>">

    <label for="tensi">Tensi:</label>
    <input type="text" name="tensi" id="tensi" value="<?= htmlspecialchars($data['tensi']) ?>">

    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan" id="keterangan"><?= htmlspecialchars($data['keterangan']) ?></textarea>

    <label for="pasien_id">Pasien:</label>
    <select name="pasien_id" id="pasien_id" required>
        <option value="">-- Pilih Pasien --</option>
        <?php foreach ($pasien as $ps): ?>
            <option value="<?= $ps['id'] ?>" <?= ($ps['id'] == $data['pasien_id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($ps['nama']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="dokter_id">Dokter:</label>
    <select name="dokter_id" id="dokter_id" required>
        <option value="">-- Pilih Dokter --</option>
        <?php foreach ($dokter as $dr): ?>
            <option value="<?= $dr['id'] ?>" <?= ($dr['id'] == $data['dokter_id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($dr['nama']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>">
        <?= $id ? 'Update' : 'Simpan' ?>
    </button>
</form>

</body>
</html>