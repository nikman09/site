<?php
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetTitle('SKUM -');
    $pdf->SetMargins(10, 10, 10, true);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');


///////////////////////////////////////////////////////////////// Page 1
     $pdf->AddPage();

// output the HTML content

$asd = '<div style="border:1px solid #000;"><h3 align="center">Kartu Pendaftaran Pelatihan Industri</h3>
<table border="0px" style="margin:30px">
    <tr><td width="150px">Nomor Pendaftaran</td><td width="10px">:</td><td  width="360px"><strong>'.$data['nodaf'].'</strong></td> </tr>
    <tr><td>Nama Pelatihan</td><td>:</td><td><strong>'.$data['nama'].'</strong></td></tr>
    <tr><td>Kategori</td><td>:</td><td>'.$data['kategori'].'</td></tr>
    <tr><td>Waktu Mendaftar</td><td>:</td><td>'.$data['createdate'].'</td></tr>
    <tr><td>Waktu Pelatihan</td><td>:</td><td>'.tgl_indo($data['mulaipelatihan']).' s.d '.tgl_indo($data['akhirpelatihan']).'</td></tr>
    <tr><td>Tempat Pelatihan</td><td>:</td><td>'.$data['tempat'].'</td></tr><tr><td>Syarat</td><td>:</td><td></td></tr>
</table>
</div>';
$pdf->writeHTML($asd, false, true, false, false, '');
$pdf->ln(0.5);
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
$pdf->Cell(0, 0, 'CODE 128 AUTO', 0, 1);
$pdf->write1DBarcode('22233s111', 'C128', '', '', '', 18, 0.4, $style, 'N');

$pdf->lastPage();


$pdf->Output('SKUM', 'I');
?>