<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <h3 class="text-center">Form Nilai</h3>
        <form class="form-horizontal" method="post" action="proses_registrasi.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nim">NIM *</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nim" name="nim" type="text" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nama">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input class="form-control" id="nama" name="nama" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Jenis Kelamin *</label>
                <div class="col-sm-10">
                    <label class="radio-inline"><input name="jenis_kelamin" type="radio" value="Laki-Laki"> Laki-Laki</label>
                    <label class="radio-inline"><input name="jenis_kelamin" type="radio" value="Perempuan"> Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="program_studi">Program Studi</label>
                <div class="col-sm-10">
                    <select class="form-control" id="program_studi" name="prodi">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Bisnis Digital">Bisnis Digital</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Skill Web & Programming</label>
                <div class="col-sm-10">
                    <label class="checkbox-inline"><input name="skill[]" type="checkbox" value="HTML"> HTML</label>
                    <label class="checkbox-inline"><input name="skill[]" type="checkbox" value="CSS"> CSS</label>
                    <label class="checkbox-inline"><input name="skill[]" type="checkbox" value="JavaScript"> JavaScript</label>
                    <label class="checkbox-inline"><input name="skill[]" type="checkbox" value="Python"> Python</label>
                    <label class="checkbox-inline"><input name="skill[]" type="checkbox" value="Java"> Java</label>
                    <label class="checkbox-inline"><input name="skill[]" type="checkbox" value="PHP"> PHP</label>
                    <label class="checkbox-inline"><input name="skill[]" type="checkbox" value="RWD Bootstrap"> RWD Bootstrap</label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Domisili</label>
                <div class="col-sm-10">
                <select class="form-control" id="domisili" name="domisili">
                        <option value="Jakarta">Jakarta</option>
                        <option value="Bogor">Bogor</option>
                        <option value="Bandung">Depok</option>
                        <option value="Tanggerang">Tanggerang</option>
                        <option value="Bekasi">Bekasi</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email *</label>
                <div class="col-sm-10">
                    <input class="form-control" id="email" name="email" type="email" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>