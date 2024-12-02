<?php
require('config.php');
require('fpdf.php');

$sql = "SELECT id, nama, jenis_kelamin, agama, alamat, sekolah_asal, pegawai_pendaftar_id FROM calon_siswa";
$query = mysqli_query($db, $sql);

$pdf = new FPDF('l', 'mm', 'A4');
$pdf->AddPage();

//Header
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(277, 7, 'SMA NEGERI 1 DENPASAR', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(277, 7, 'DAFTAR CALON SISWA TAHUN 2025', 0, 1, 'C');

//Space
$pdf->Cell(10, 7, '', 0, 1);

//Row
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(230, 230, 100);
$pdf->Cell(15, 6, 'ID', 1, 0, 'C', true);
$pdf->Cell(70, 6, 'Nama Siswa', 1, 0, 'C', true);
$pdf->Cell(40, 6, 'Jenis Kelamin', 1, 0, 'C', true);
$pdf->Cell(27, 6, 'Agama', 1, 0, 'C', true);
$pdf->Cell(65, 6, 'Alamat', 1, 0, 'C', true);
$pdf->Cell(60, 6, 'Sekolah Asal', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(255, 255, 255);
while($siswa = mysqli_fetch_array($query))
{
    $pdf->Cell(15, 6, $siswa['id'], 1, 0, 'C', true);
    $pdf->Cell(70, 6, $siswa['nama'], 1, 0, 'C', true);
    $pdf->Cell(40, 6, $siswa['jenis_kelamin'], 1, 0, 'C', true);
    $pdf->Cell(27, 6, $siswa['agama'], 1, 0, 'C', true);
    $pdf->Cell(65, 6, $siswa['alamat'], 1, 0, 'C', true);
    $pdf->Cell(60, 6, $siswa['sekolah_asal'], 1, 1, 'C', true);
}

$pdf->Output();
?>