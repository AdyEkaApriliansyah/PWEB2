<?php
require_once 'menghitung_nilai_mahasiswa.php';

$mhs1 = new NilaiMahasiswa();
$mhs1->nama = "Farid";
$mhs1->matakuliah = "Pemrograman Web";
$mhs1->nilai_uts = 89;
$mhs1->nilai_uas = 92;
$mhs1->nilai_tugas = 85;

$mhs2 = new NilaiMahasiswa();
$mhs2->nama = "Aditya";
$mhs2->matakuliah = "Pemrograman Web";
$mhs2->nilai_uts = 90;
$mhs2->nilai_uas = 84;
$mhs2->nilai_tugas = 88;

$mhs3 = new NilaiMahasiswa();
$mhs3->nama = "Maulana";
$mhs3->matakuliah = "Pemrograman Web";
$mhs3->nilai_uts = 89;
$mhs3->nilai_uas = 91;
$mhs3->nilai_tugas = 95;

$data_mahasiswa = [$mhs1, $mhs2, $mhs3];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 20px;
        }

        h3 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
            font-weight: bold;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d1ecf1;
        }

        td {
            color: black;
        }

        /* Keterangan */
        .lulus {
            color: #007bff;
            font-weight: bold;
        }

        .tidak-lulus {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h3>Daftar Nilai Mahasiswa</h3>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Mata Kuliah</th>
                <th>Nilai UAS</th>
                <th>Nilai UTS</th>
                <th>Nilai Tugas</th>
                <th>Nilai Akhir</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $mhs->nama ?></td>
                    <td><?= $mhs->matakuliah ?></td>
                    <td><?= $mhs->nilai_uas ?></td>
                    <td><?= $mhs->nilai_uts ?></td>
                    <td><?= $mhs->nilai_tugas ?></td>
                    <td><?= $mhs->nilaiAkhir() ?></td>
                    <td class="<?= $mhs->kelulusan() == 'Lulus' ? 'lulus' : 'tidak-lulus' ?>">
                        <?= $mhs->kelulusan() ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>