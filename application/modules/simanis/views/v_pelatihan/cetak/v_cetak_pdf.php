<?php
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetTitle('Kartu Pendaftaran');
    $pdf->SetMargins(10, 10, 10, true);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');


///////////////////////////////////////////////////////////////// Page 1
     $pdf->AddPage();
     $style = array(
        'position' => '',
        'align' => 'C',
        'stretch' => false,
        'fitwidth' => true,
        'cellfitalign' => '',
        'hpadding' => 'auto',
        'vpadding' => 'auto',
        'fgcolor' => array(0,0,0),
        'bgcolor' => false, //array(255,255,255),
        'text' => false,
        'font' => 'helvetica',
        'fontsize' => 8,
        'stretchtext' => 4
    );



    $pdf->Image(''.base_url().'assets/images/go.png', 10, 10, 50, '', '', 'http://disperin.kalselprov.go.id/', '', false, 300);
    $pdf->SetX(150);
    $pdf->write1DBarcode($data['nodaf'], 'C128', '', '', '', 8, 0.4, $style, 'N');
    $pdf->ln(10);

  

    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 0, 'KARTU PENDAFTARAN PELATIHAN INDUSTRI', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    $pdf->ln(3);
    $pdf->writeHTML("<hr>", false, true, false, false, '');
    $pdf->ln(0.5);
    $pdf->ln();
    $pdf->SetFont('helvetica', '', 14);
    $asd = '
    <table border="0px" style="">
        <tr><td width="130px">Nomor Pendaftaran</td><td width="10px">:</td><td  width="360px"><strong>'.$data['nodaf'].'</strong></td> </tr>
    </table>
    ';
    $pdf->writeHTML($asd, false, true, false, false, '');
    $pdf->SetFont('helvetica', '', 10);
   if ($data['foto']!="") {
    $pdf->Image(''.base_url().'assets/images/pelatihan/biodata/'.$data['foto'].'', 140, 40, 50, '', '', 'http://disperin.kalselprov.go.id/', '', false, 300);
   }
  
 
    $asd = '
    <h4><u>Data Diri</u></h4>
    <br/>
    <table border="0px" style="">
        <tr><td  width="130px">Nama Lengkap</td><td width="10px">:</td><td width="230px">'.$data['namalengkap'].'</td></tr>
        <tr><td>NIK</td><td>:</td><td>'.$data['nik'].'</td></tr>
        <tr><td>Tempat / Tanggal Lahir</td><td>:</td><td>'.$data['tempatlahir'].' / '.tanggal($data['tanggallahir']).'</td></tr>
        <tr><td>Jenis Kelamin</td><td>:</td><td>'.$data['jk'].'</td></tr>
        <tr><td>Tempat Pelatihan</td><td>:</td><td>'.$data['tempat'].'</td></tr>
        <tr><td>No Telepon</td><td>:</td><td>'.$data['nohp'].'</td></tr>
        <tr><td>email</td><td>:</td><td>'.$data['email'].'</td></tr>
        
        <tr><td>Alamat</td><td>:</td><td>'.$data['alamat'].'</td></tr>
        <tr><td>Kota</td><td>:</td><td>'.$data['kota'].'</td></tr>
    </table>
    </div>';
    $pdf->writeHTML($asd, false, true, false, false, '');
    $pdf->ln(0.5);
    $asd = '
    <h4><u>Data Pendidikan</u></h4>
    <table border="0px" style="">
        <tr><td width="130px">Pendidikan</td><td width="10px">:</td><td  width="360px">'.$data['pendidikan'].'</td> </tr>
        <tr><td>Institusi Pendidikan</td><td>:</td><td>'.$data['namapendidikan'].'</td></tr>
        <tr><td>Jurusan</td><td>:</td><td>'.$data['jurusan'].'</td></tr>
        <tr><td>Nilai Rata-rata UN / IPK</td><td>:</td><td>'.$data['nilai'].'</td></tr>
      
    </table>
    </div>';
    $pdf->writeHTML($asd, false, true, false, false, '');
    $pdf->ln(0.5);
    $asd = '
    <h4><u>Data Pekerjaan/Keahlian</u></h4>
    <table border="0px" style="">
        <tr><td width="130px">Pekerjaan</td><td width="10px">:</td><td  width="360px">'.$data['pekerjaan'].'</td> </tr>
        <tr><td>Instansi/Perusahaan</td><td>:</td><td>'.$data['tempatkerja'].'</td></tr>
        <tr><td>Posisi/Jabatan</td><td>:</td><td>'.$data['posisi'].'</td></tr>
        <tr><td>Daftar Pelatihan</td><td>:</td><td>'.$data['daftarpelatihan'].'</td></tr>
        <tr><td>Daftar Keahlian</td><td>:</td><td>'.$data['daftarkeahlian'].'</td></tr>
    </table>
    </div>';
    $pdf->writeHTML($asd, false, true, false, false, '');
    $pdf->ln(0.5);
    $asd = '
    <h4><u>Data Usaha Industri</u></h4>
    <br/>
    <table border="0px" style="">
        <tr><td td width="130px">Nama Usaha / Perusahaan</td><td width="10px">:</td><td width="360px">'.$data['unama'].'</td></tr>
        <tr><td>Alamat Perusahaan</td><td>:</td><td>'.$data['ujalan'].' '.$data['udesa'].' '.$data['ukecamatan'].' '.$data['ukabkota'].'</td></tr>
        <tr><td>Bentuk Badan Usaha</td><td>:</td><td>'.$data['ubentuk'].'</td></tr>
        <tr><td>Nama Produk</td><td>:</td><td>'.$data['uproduk'].'</td></tr>
        <tr><td>Merek</td><td>:</td><td>'.$data['umerek'].'</td></tr>
        
        <tr><td>Alamat</td><td>:</td><td>'.$data['alamat'].'</td></tr>
        <tr><td>Kota</td><td>:</td><td>'.$data['ukabkota'].'</td></tr>
    </table>
    </div>';
//     $asd = '
//     <h4><u>Data Usaha Industri</u></h4>
//     <br/>
//    ';
//     $pdf->writeHTML($asd, false, true, false, false, '');
//     $pdf->ln(0.5);
//     $asd = '
//     <table border="1px" style="" width="100%" cellpadding="2px">
//       <tr>
//             <td  width="15px" align="center"><b>#</b></td>
//             <td width="150px" align="center"><b>Nama Usaha Industri</b></td>
//             <td width="145px" align="center"><b>Kab/Kota</b></td>
//             <td  width="30px" align="center"><b>Tipe</b></td>
//             <td  width="200px" align="center"><b>KBLI</b></td>
//         </tr>
//   ';
       
//     $i=0;
//     foreach($usaha->result_array() as $row){
//         $asd .= '
//             <tr>
//                 <td align="center">'.++$i.'</td>
//                 <td>'.$row['perusahaan'].'</td>
//                 <td>'.$row['kota'].'</td>
//                 <td>'.$row['badan'].'</td>
//                 <td>'.$row['kbli'].'</td>
//             </tr>
//         ';

//     }
//     $asd .= ' 

//     </table>
//     </div>
//     ';
    $pdf->writeHTML($asd, false, true, false, false, '');
    $pdf->ln(0.5);


    $asd = '
    <h4><u>Pelatihan </u></h4>
    <table border="0px" style="">
        <tr><td  width="130px">Nama Pelatihan</td><td  width="10px">:</td><td   width="360px">'.$data['nama'].'</td></tr>
        <tr><td>Kategori</td><td>:</td><td>'.$data['kategori'].'</td></tr>
        <tr><td>Waktu Mendaftar</td><td>:</td><td>'.$data['createdate'].'</td></tr>
        <tr><td>Waktu Pelatihan</td><td>:</td><td>'.tgl_indo($data['mulaipelatihan']).' s.d '.tgl_indo($data['akhirpelatihan']).'</td></tr>
        <tr><td>Tempat Pelatihan</td><td>:</td><td>'.$data['tempat'].'</td></tr>
    </table>
    </div>';
    $pdf->writeHTML($asd, false, true, false, false, '');
    $pdf->ln(0.5);
    $pdf->ln(3);
    $pdf->SetFont('helvetica', '', 12);
    $asd = '
    <table border="0px" style="">
        <tr><td  width="130px">Status Pendaftaran</td><td  width="10px">:</td><td   width="360px">'.$data['status'].'</td></tr>
       
    </table>
    </div>';
    // <tr><td>Konfirmasi Kehadiran</td><td>:</td><td>'.$data['konfirmasi'].'</td></tr>
    $pdf->writeHTML($asd, false, true, false, false, '');
    $pdf->ln(0.5);

$pdf->write2DBarcode($data['nodaf'], 'QRCODE,Q', 160, 250, 30, 50, $style, 'N');
// $pdf->Text(20, 25, 'QRCODE Q');
$pdf->writeHTML("<hr>", false, true, false, false, '');
$pdf->ln(3);
$pdf->lastPage();



$pdf->Output('Kartu Pendaftaran', 'I');
?>