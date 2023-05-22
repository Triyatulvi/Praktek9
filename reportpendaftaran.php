<?php
include('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'NISN');
$sheet->setCellValue('C1', 'No Peserta Ujian');
$sheet->setCellValue('D1', 'No ijazah');
$sheet->setCellValue('E1', 'Nama Lengkap');
$sheet->setCellValue('F1', 'Jenis Kelamin');
$sheet->setCellValue('G1', 'Nomor Telepon');
$sheet->setCellValue('H1', 'Alamat');


$query = mysqli_query($koneksi,"select * from pendaftaran");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $no++);
	$sheet->setCellValue('B'.$i, $row['nisn']);
	$sheet->setCellValue('C'.$i, $row['nopesertaujian']);
	$sheet->setCellValue('D'.$i, $row['noijazah']);	
    $sheet->setCellValue('E'.$i, $row['nama_lengkap']);
    $sheet->setCellValue('F'.$i, $row['jenis_kelamin']);
    $sheet->setCellValue('G'.$i, $row['nomor_telepon']);
    $sheet->setCellValue('H'.$i, $row['alamat']);		
	$i++;
}

$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$sheet->getStyle('A1:H'.$i)->applyFromArray($styleArray);


$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Pendaftaran Siswa Baru.xlsx');
?>