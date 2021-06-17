<?php
require_once("../../asset/fpdf/fpdf.php");
require_once("../../koneksi.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../../asset/img/logo_cetak.png', 20, 7);
        $pdf = new FPDF('L', 'mm', 'A3');

        // Arial bold 15
        $this->SetFont('Times', 'B', 15);
        // Move to the right
        // $this->Cell(60);
        // Title
        $this->Cell(260, 8, 'Laporan Lomba Siswa', 0, 1, 'C');
        $this->Cell(260, 8, 'SDN UTAN 01', 0, 1, 'C');
        $this->SetFont('Times', 'B', 12);
        $this->Cell(260, 8, 'Jl. Pandan Raya No. I', 0, 1, 'C');
        // Line break
        $this->Ln(5);

        $this->SetFont('Times', 'B', 12);
        for ($i = 0; $i < 10; $i++) {
            $this->Cell(248, 0, '', 1, 1, 'C');
        }

        $this->Ln(1);

        $this->Cell(260, 8, 'Data Siswa', 0, 1, 'C');
        $this->Ln(2);

        $this->SetFont('Times', 'B', 9.5);

        // header tabel
        $this->cell(8, 7, 'NO.', 1, 0, 'C');
        $this->cell(40, 7, 'Nis', 1, 0, 'C');
        $this->cell(40, 7, 'Nama Siswa', 1, 0, 'C');
        $this->cell(40, 7, 'Alamat', 1, 0, 'C');
        $this->cell(40, 7, 'No Telp', 1, 0, 'C');
        $this->cell(40, 7, 'Nilai Preferensi', 1, 0, 'C');
        $this->cell(40, 7, 'Status', 1, 1, 'C');
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// ambil dari database
$query = "SELECT * from tb_preferensi 
join tb_siswa on tb_siswa.id = tb_preferensi.id_siswa
join tb_guru on tb_siswa.id_kelas = tb_guru.id_kelas
where tb_siswa.id_kelas = '$_GET[id_kelas]'
order by nilai desc
limit 2";
$hasil = mysqli_query($conn, $query);
$data_siswa = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_siswa[] = $row;
}

$pdf = new PDF('L', 'mm', [270, 230]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times', '', 9);

// set penomoran
$nomor = 1;

foreach ($data_siswa as $siswa) {
    $pdf->cell(8, 7, $nomor . '.', 1, 0, 'C');
    $pdf->cell(40, 7, strtoupper($siswa['nis']), 1, 0, 'C');
    $pdf->cell(40, 7, strtoupper($siswa['nama']), 1, 0, 'C');
    $pdf->cell(40, 7, strtoupper($siswa['alamat']), 1, 0, 'C');
    $pdf->cell(40, 7, strtoupper($siswa['no_telp']), 1, 0, 'C');

    $pdf->cell(40, 7, strtoupper(round($siswa['nilai'], 4)), 1, 0, 'C');
    if ($nomor > 1) {
        $pdf->cell(40, 7, strtoupper("Cadangan"), 1, 1, 'C');
    } else {
        $pdf->cell(40, 7, strtoupper("Utama"), 1, 1, 'C');
    }
    $nomor++;
}

$pdf->Ln(3);

$pdf->Output();
