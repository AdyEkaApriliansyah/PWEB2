<!DOCTYPE html>
<html>
<head>
    <title>Webo1</title>
</head>
<body>
    <h1>Selamat Belajar PHP</h1>
    <?php
        $_nama = "Nurul Fikri Alamsyah";
        $_umur = 20;
        $_prodi = "Teknik Informatika";
        $_ipk = 3.5;
    ?>
    <p>Nama: <?php echo $_nama; ?></p>
    <p>Umur: <?=$_umur; ?></p>
    <p>Prodi : <?php echo $_prodi; ?></p>
    <p>Ipk : <?=$_ipk; ?></p>
</body>
</html>