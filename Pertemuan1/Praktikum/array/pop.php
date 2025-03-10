<?php
$siswa = ["Tian", "Asep", "Ahong", "Cipe"];

// menampilkan array awal
echo "Array awal :\n";
print_r($siswa);

// menghapus elemen terakhir dari array
$orang_terakhir = array_pop($siswa);

// menampilkan array setelah penghapusan elemen terakhir
echo "<br>Elemen yang akan dihapus" .$orang_terakhhir;

// menampilkan array setelah penghapusan
echo "<br>Array setelah penghapusan : <br>";
print_r($siswa);