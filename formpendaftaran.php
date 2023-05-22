<?php
    include 'koneksi.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULIR PESERTA DIDIK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    .warning {
        color: skyblue;
    }
    </style>
</head>


<body>

    <?php
    $error_tanggalpengisian = "";
    $error_jenispendaftaran = "";
    $error_nisn = "";
    $error_nopesertaujian = "";
    $error_noijazah = "";
    $error_nama_lengkap = "";
    $error_jenis_kelamin = "";
    $error_nomor_telepon = "";
    $error_alamat = "";
  

    $tanggalpengisian = "";
    $jenispendaftaran = "";
    $nisn = "";
    $nopesertaujian = "";
    $noijazah = "";
    $nama_lengkap = "";
    $jenis_kelamin = "";
    $nomor_telepon = "";
    $alamat = "";
   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["nisn"])) {
            $error_nisn = "NISN Tidak Boleh Kosong";
        } else {
            $nisn = cek_input($_POST["nisn"]);
            if (!is_numeric($nisn)) {
                $error_nisn = "NISN Hanya Boleh Angka";
            }
        }

        if (empty($_POST["nopesertaujian"])) {
            $error_nopesertaujian = "No Peserta Ujian Tidak Boleh Kosong";
        } else {
            $nopesertaujian = cek_input($_POST["nopesertaujian"]);
            if (!is_numeric($nopesertaujian)) {
                $error_nopesertaujian = "Nomor Peserta Ujian Hanya Boleh Angka";
            }
        }

        if (empty($_POST["noskhun"])) {
            $error_noskhun = "Nomor Seri SKHUN Tidak Boleh Kosong";
        } else {
            $noskhun = cek_input($_POST["noskhun"]);
            if (!is_numeric($noskhun)) {
                $error_noskhun = "Nomor Seri SKHUN Hanya Boleh Angka";
            }
        }

        if (empty($_POST["noijazah"])) {
            $error_noijazah = "No Ijazah Tidak Boleh Kosong";
        } else {
            $noijazah = cek_input($_POST["noijazah"]);
            if (!is_numeric($noijazah)) {
                $error_noijazah = "Nomor Seri Ijazah Hanya Boleh Angka";
            }
        }

    }

    function cek_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div class="row">
        <div class="col-md-13">
            <div class="card" style="background-color: rgba(199, 183, 224, 0.867);">
                <div class="card-header bg-rgba(199, 183, 224, 0.867) text-black">
                    FORMULIR PESERTA DIDIK
                </div>
                <p> Tanggal: <?php  echo $tanggalpengisian = date(" Y-m-d ") ; ?> </p>
                <div class="card-footer">
                    FORM REGISTRASI
                </div>
                <div class="card-body">
                    <form method="post" action="prosespendaftaran.php">
                        <br>
                        <div class="form-group row">
                            <label for="jenispendaftaran" class="col-sm-2 col-form-label">Jenis
                                Pendaftaran</label>
                            <div class="col-sm-10">
                                <input type="radio" name="jenispendaftaran" value="Prestasi">Siswa Prestasi</label>
                                <input type="radio" name="jenispendaftaran" value="Pindahan">Siswa Reguler</label>
                                <span class="warning"><?php echo $error_jenispendaftaran; ?></span>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                            <div class="col-sm-10">
                                <input type="text" name="nisn" id="nisn"
                                    class="form-control <?php echo ($error_nisn !="" ? "is-invalid" : ""); ?>"
                                    placeholder="Nomor Induk Siswa" value="<?php echo $nisn; ?>"> <span
                                    class="warning"><?php echo $error_nisn ?></span>
                            </div>
                        </div> <br>

                        <div class="form-group row">
                            <label for="nopesertaujian" class="col-sm-2 col-form-label">Nomor Peserta
                                Ujian</label>
                            <div class="col-sm-10">
                                <input type="text" name="nopesertaujian" id="nopesertaujian"
                                    class="form-control <?php echo ($error_nopesujian !="" ? "is-invalid" : ""); ?>"
                                    placeholder="No Peserta Ujian" value="<?php echo $nopesertaujian; ?>"> <span
                                    class="warning"><?php echo $error_nopesertaujian ?></span>
                            </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label for="noijazah" class="col-sm-2 col-form-label">No. Seri Ijazah
                                Sebelumnya</label>
                            <div class="col-sm-10">
                                <input type="text" name="noijazah" id="noijazah"
                                    class="form-control <?php echo ($error_noijazah !="" ? "is-invalid" : ""); ?>"
                                    placeholder="Seri Ijazah Sebelumnya" value="<?php echo $noijazah; ?>"> <span
                                    class="warning"><?php echo $error_noijazah ?></span>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_lengkap" id="nama_lengkap"
                                    class="form-control <?php echo ($error_nama_lengkap !="" ? "is-invalid" : ""); ?>"
                                    placeholder="Isi Nama Lengkap" value="<?php echo $nama_lengkap; ?>"> <span
                                    class="warning"><?php echo $error_nama_lengkap ?></span>
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label "> Jenis Kelamin </label>
                            <div class="col-sm-10">
                                <select class="col-sm-2 form-select" name="jenis_kelamin">
                                    <option value=""></option>
                                    <option value="Laki-Laki"> Laki-Laki </option>
                                    <option value="Perempuan"> Perempuan</option>
                                </select>
                                <span class="warning"><?php echo $error_jenis_kelamin; ?></span>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telephone</label>
                            <div class="col-sm-10">
                                <input type="text" name="nomor_telepon" id="nomor_telepon"
                                    class="form-control <?php echo ($error_nomor_telepon !="" ? "is-invalid" : ""); ?>"
                                    placeholder="Isi Nomor Telephone" value="<?php echo $nomor_telepon ?>"> <span
                                    class="warning"><?php echo $error_nomor_telepon ?></span>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" id="alamat"
                                    class="form-control <?php echo ($error_alamat !="" ? "is-invalid" : ""); ?>"
                                    placeholder="Isi Alamat" value="<?php echo $alamat ?>"> <span
                                    class="warning"><?php echo $error_alamat ?></span>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>