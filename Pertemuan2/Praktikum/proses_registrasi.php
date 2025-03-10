<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $program_studi = $_POST['prodi'];
    $domisili = $_POST['domisili'];
    $email = $_POST['email'];
    $skills = isset($_POST['skill']) ? $_POST['skill'] : [];
    
    // Skor untuk masing-masing skill
    $skill_scores = [
        "HTML" => 10,
        "CSS" => 10,
        "JavaScript" => 20,
        "RWD Bootstrap" => 20,
        "PHP" => 30,
        "Python" => 30,
        "Java" => 50
    ];
    
    // Menghitung total skor
    $total_score = 0;
    foreach ($skills as $skill) {
        if (isset($skill_scores[$skill])) {
            $total_score += $skill_scores[$skill];
        }
    }
    
    // Menentukan predikat berdasarkan skor
    if ($total_score == 0) {
        $predikat = "Tidak Memadai";
    } elseif ($total_score <= 40) {
        $predikat = "Kurang";
    } elseif ($total_score <= 60) {
        $predikat = "Cukup";
    } elseif ($total_score <= 100) {
        $predikat = "Baik";
    } else {
        $predikat = "Sangat Baik";
    }
    
    echo "<h2>Hasil Formulir</h2>";
    echo "<p>NIM: $nim</p>";
    echo "<p>Nama: $nama</p>";
    echo "<p>Jenis Kelamin: $jenis_kelamin</p>";
    echo "<p>Program Studi: $program_studi</p>";
    echo "<p>Domisili: $domisili</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Skill: " . (is_array($skills) ? implode(", ", $skills) : "Tidak ada skill yang dipilih") . "</p>";
    echo "<p>Total Skor: $total_score</p>";
    echo "<p>Predikat: $predikat</p>";
}
?>
</body>
</html>