<?php 
require_once 'nilai_mahasiswa.php';

$data_mhs =[];

// Data Awal
$data_mhs[] = new NilaiMahasiswa("Razan Muhammad Ihsan Rismawandi", "Pemrograman Web", 78, 89, 80);
$data_mhs[] = new NilaiMahasiswa("Muhammad Pramagusti", "Pemrograman Web", 47, 68, 85);
$data_mhs[] = new NilaiMahasiswa("Fajar Adityo Kunjtoro", "Pemrograman Web", 57, 78, 75);

?>

<?php ?>

<h3>Input Data Mahasiswa</h3>

<form action="POST">
    <label for="">Nama</label>
    <input type="text" name="nama" id=""> <br><br>
    <label for="">Mata Kuliah</label>
    <input type="text" name="matkul" id=""> <br><br>
    <label for="">Nilai UTS</label>
    <input type="number" name="uts" id=""> <br><br>
    <label for="">Nilai UAS</label>
    <input type="number" name="uas" id=""> <br><br>
    <label for="">Nilai Tugas</label>
    <input type="number" name="tugas" id=""> <br><br>
    <input type="submit" value="Simpan">
</form>

<h3>Daftar Nilai Mahasiswa</h3>

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Mata Kuliah</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Tugas</th>
            <th>Nilai Akhir</th>
            <th>Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        foreach($data_mhs as $mhs){
            echo "<tr>";
            echo "<td>".$nomor."</td>";
            echo "<td>".$mhs->nama."</td>";
            echo "<td>".$mhs->matakuliah."</td>";
            echo "<td>".$mhs->nilai_uts."</td>";
            echo "<td>".$mhs->nilai_uas."</td>";
            echo "<td>".$mhs->nilai_tugas."</td>";
            echo "<td>". number_format($mhs->getNA(), 2). "</td>";
            echo "<td>".$mhs->kelulusan(). "</td>";
            echo "</tr>";
            $nomor++;
        }

        ?>
    </tbody>
</table>