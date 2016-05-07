<?php
//koneksi ke database
mysql_connect("localhost","root","bloodseeker");
mysql_select_db("aset");

//mengambil data dari tabel
$sql=mysql_query("SELECT * FROM ruang ORDER BY id_ruang");
$data = array();
while ($row = mysql_fetch_assoc($sql)) {
	array_push($data, $row);
}
$a = mysql_query("SELECT nama_pegawai From tanda_tangan Where keaktivan='YA' ");
$b = array();
while ($row = mysql_fetch_assoc($a)) {
	array_push($b, $row);
}
//mengisi judul dan header tabel
$judul = "DATA RUANG";
$judul1= "Laboratorium Informatika";
$judul2= "Fakultas Komunikasi dan Informatika";
$header = array(
array("label"=>"ID", "length"=>20, "align"=>"L"),
array("label"=>"Nama Ruang", "length"=>80, "align"=>"L"),
array("label"=>"Penanggung Jawab", "length"=>80, "align"=>"L"),
//array("label"=>"Stok", "length"=>30, "align"=>"L"),
//array("label"=>"Harga", "length"=>30, "align"=>"L"),
);
$tgl = array(
	array("label"=>"Surakarta, ".date("d-m-y"), "length"=>30, "align"=>"L"),);

//memanggil fpdf
require_once ("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();

//tampilan Judul Laporan
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,8, $judul, '0', 1, 'C');
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,8, $judul1, '0', 1, 'C');
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,10, $judul2, '0', 1, 'C');

//Header Table
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(139, 69, 19); //warna dalam kolom header
$pdf->SetTextColor(255); //warna tulisan putih
$pdf->SetDrawColor(222, 184, 135); //warna border
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

//menampilkan data table
$pdf->SetFillColor(245, 222, 179); //warna dalam kolom data
$pdf->SetTextColor(0); //warna tulisan hitam
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}

//menampolkan tanda tangan
$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();
foreach ($b as $c) {
$i = 0;
foreach ($c as $d) {
$pdf->Cell($tgl[$i]['length'], 5, $d, 1, '0', $kolom['align'], $fill);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}
//output file pdf
$pdf->Output();
?>