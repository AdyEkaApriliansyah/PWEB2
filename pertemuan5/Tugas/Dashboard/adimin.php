<?php
require_once '../dbkoneksi.php';
include 'header.php';
include 'sidebar.php';

// Ambil data statistik
$jumlah_pasien = $dbh->query("SELECT COUNT(*) FROM pasien")->fetchColumn();
$jumlah_paramedik = $dbh->query("SELECT COUNT(*) FROM paramedik")->fetchColumn();
$jumlah_periksa = $dbh->query("SELECT COUNT(*) FROM periksa")->fetchColumn();
$jumlah_kelurahan = $dbh->query("SELECT COUNT(*) FROM kelurahan")->fetchColumn();
$jumlah_unitkerja = $dbh->query("SELECT COUNT(*) FROM unit_kerja")->fetchColumn();
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <section class="content">
    <div class="row">

      <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $jumlah_pasien ?></h3>
            <p>Jumlah Pasien</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-injured"></i>
          </div>
          <a href="../Pasien/index.php" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $jumlah_paramedik ?></h3>
            <p>Jumlah Paramedik</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-md"></i>
          </div>
          <a href="../Paramedik/index.php" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $jumlah_periksa ?></h3>
            <p>Jumlah Pemeriksaan</p>
          </div>
          <div class="icon">
            <i class="fas fa-notes-medical"></i>
          </div>
          <a href="../Periksa/index.php" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-6">
  <div class="small-box bg-secondary">
    <div class="inner">
      <h3><?= $jumlah_kelurahan ?></h3>
      <p>Kelurahan</p>
    </div>
    <div class="icon">
      <i class="fas fa-map-marker-alt"></i>
    </div>
    <a href="../Kelurahan/index.php" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-4 col-6">
  <div class="small-box bg-dark">
    <div class="inner">
      <h3><?= $jumlah_unitkerja ?></h3>
      <p>Unit Kerja</p>
    </div>
    <div class="icon">
      <i class="fas fa-building"></i>
    </div>
    <a href="../Unit_Kerja/index.php" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>