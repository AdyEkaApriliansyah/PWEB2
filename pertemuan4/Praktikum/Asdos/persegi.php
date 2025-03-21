<?php

// Class Persegi Panjang
class PersegiPanjang{
    public $panjang;
    public $lebar;

    // Kontruktor Persegi Panjang
    function __construct($panjang, $lebar){
        $this->panjang = $panjang;
        $this ->lebar = $lebar;
    }

    // Method untuk Menghitung Luas
    function getluas(){
        $luasPP = $this->panjang * $this->lebar;
        return $luasPP;
    }

    // Method untuk Menghitung Keliling
    function getKeliling(){
        $kelilingPP = 2 * ($this->panjang + $this->lebar);
        return $kelilingPP;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="section">
        <h2>Contoh Pengguna Persegi Panjang</h2>

        <?php
        $pp = new PersegiPanjang(12,10);

        echo "Panjang = " .$pp->panjang. "<br>";
        echo "Lebar = " .$pp->lebar. "<br>";
        echo '<hr>';
        echo "Luas = " .$pp->getluas(). "<br>";
        echo "Keliling = " .$pp->getkeliling(). "<br>"
        ?>
    </div>
</body>
</html>