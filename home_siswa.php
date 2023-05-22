<?php
// Memanggil Koneksi pada file koneksi.php
include 'koneksi.php';
$conn = mysqli_connect("localhost","root","","db_siswa");
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROGRAM DATA PEGAWAI</title>
    <style>
    body {
        background-color: rgba(199, 183, 224, 0.867);

        .button {
            background-color: #715581;
            color: rgb(232, 232, 240);
            border: 2px solid #715581;
        }
    }


    table {
        background-color: rgba(199, 183, 224, 0.867);
    }
    </style>
</head>

<body>
    <h1>
        <center>PROGRAM DATA FORM PENDAFTARAN</center>
    </h1>
    <p>DATA PENDAFTARAN SISWA BARU :</p>
    <?php date_default_timezone_set('Asia/Jakarta');
    echo date ("d-F-Y, H:i:s:a") ?>

    <table border="1" width="100%">
        <th>No.</th>
        <th>Jenis Pendaftaran</th>
        <th>NISN</th>
        <th>No. Peserta Ujian</th>
        <th>No.Ijazah</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Nomor Telephone</th>
        <th>Alamat</th><?php $pendaftaran=mysqli_query($conn, "SELECT * from pendaftaran");
    $no=1;

    foreach ($pendaftaran as $row) {
        echo "<tr>
<th>$no</th><th>".$row['jenispendaftaran']."</th><th>".$row['nisn']."</th><th>".$row['nopesertaujian']."</th><th>".$row['noijazah']."</th><th>".$row['nama_lengkap']."</th><th>".$row['jenis_kelamin']."</th><th>".$row['nomor_telepon']."</th><th>".$row['alamat']."</th></tr>";
$no++;
    }

    ?>
    </table>
    <p>Total Pegawai : <?php echo mysqli_num_rows($pendaftaran)?></p>
    <center><a href="formpendaftaran.php"><button class="button button">TAMBAH DATA</button></a>
        <a href="reportpendaftaran.php"><button class="button button">CETAK DATA</button></a>
    </center>
</body>

</html>