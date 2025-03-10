<?php
// Array push
$komponen = ["Mobo", "Processor", "Ram", "SSD", "GPU"];

// menambahkan element di akhir array
array_push($komponen, "PSU", "Cassing");

echo "Setelah Push <br>";
foreach ($komponen as $k) {
    echo $k. "<br>";
}
?>