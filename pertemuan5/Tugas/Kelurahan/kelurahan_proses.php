<?php
// Connect ke database
require_once '../dbkoneksi.php';

if(isset($_POST['nama_kelurahan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_kelurahan'];

    if($id) {
        $sql = "UPDATE kelurahan SET nama_kelurahan = ? WHERE id = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$nama, $id]);

    }else{
        $sql = "INSERT INTO kelurahan (nama_kelurahan) VALUES (?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$nama]);
    }
    header("Location: index.php");

} elseif(isset($_GET['hapus']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM kelurahan WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    header("Location: index.php");
}
?>