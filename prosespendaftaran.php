<?php 
include 'koneksi.php';
//koneksi
$conn = mysqli_connect("localhost","root","","db_siswa");

if (isset($_POST['submit'])) {
    $jenispendaftaran = $_POST['jenispendaftaran'];
    $nisn = $_POST['nisn'];
    $nopesertaujian = $_POST['nopesertaujian'];
    $noijazah = $_POST['noijazah'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $alamat = $_POST['alamat'];

    // Menyimpan ke database
    $sql = mysqli_query($conn, "INSERT INTO pendaftaran (jenispendaftaran, nisn, nopesertaujian,noijazah,nama_lengkap,jenis_kelamin,nomor_telepon,alamat) VALUES ('$jenispendaftaran', '$nisn', '$nopesertaujian','$noijazah',  '$nama_lengkap', '$jenis_kelamin', '$nomor_telepon', '$alamat')");
    if ($sql) {
        // pesan jika data tersimpan
        echo "<script>alert('Form Data Diri Berhasil Ditambahkan!'); window.location.href='home_siswa.php'</script>"; 
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Data Registrasi Gagal Ditambahkan!!');</script>";
    }
}
?>