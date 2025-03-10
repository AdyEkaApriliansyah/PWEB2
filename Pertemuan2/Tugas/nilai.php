<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Nilai Mahasiswa</h2>
        <form method="POST" action="nilai_siswa.php" class="form-horizontal p-4 border rounded">
            <div class="mb-3">
                <label class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Mata Kuliah:</label>
                <select name="matkul" class="form-select">
                    <option value="Dasar-Dasar Pemrograman">Dasar-Dasar Pemrograman</option>
                    <option value="Basis Data I">Basis Data 1</option>
                    <option value="Pemrograman Web1">Pemrograman Web 2</option>
                    <option value="Bahasa Inggris 1">Bahasa Inggris 1</option>
                    <option value="Statistik dan Probabilitas">Statistik dan Probabilitas</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai UTS:</label>
                <input type="text" name="nilai_uts" class="form-control" placeholder="Masukkan Nilai UTS">
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai UAS:</label>
                <input type="text" name="nilai_uas" class="form-control" placeholder="Masukkan Nilai UAS">
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai Tugas/Praktikum:</label>
                <input type="text" name="nilai_tugas" class="form-control" placeholder="Masukkan Nilai Tugas">
            </div>
            <div class="text-left">
                <input type="submit" name="proses" value="Simpan" class="btn btn-primary">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>