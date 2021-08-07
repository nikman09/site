<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>simanis/admin">
            <i class="fa fa-newspaper-o"></i>Admin</a>
    </li>
    <li class="active">
        <strong>Data Perusahaan (SIIKALSEL)</strong>
    </li>
</ol>

<h3>Data SIIKALSEL <b>"<?php echo $biodata["nama"] ?>"</b></h3>
<div class="row">
    <div class="col-md-12">
    <table class="table table-bordered datatable" id="table-1" style="font-size:12px">

<thead>

  <tr>
  <th >Aksi</th>
        <th width="10px">#</th>
        <th>Nama Perusahaan</th>
        <th>Pemilik</th>
        <th>Kab/Kota</th>
        <th>Kecamatan</th>
        <th>KBLI</th>
        <th>Jumlah Produk</th>
        <th>Laporan Tahunan</th>
        <th>Legalitas</th>
      
    </tr>
</thead>
<tbody>
    <?php

    $i=0;

    foreach($data->result_array() as $row){
        echo "
            <tr>
            <td>
            <div style='width:50px'>
            <a href='".base_url("simanis/admin/lihatperusahaan?id=".$row['id_perusahaan']."&idk=".$row['simanis_id']."")."' class='btn btn-primary btn-sm  btn-icon icon-left lihat' title='Lihat'  id='".$row['id_perusahaan']."' ><i class='fa fa-eye' id='".$row['id_perusahaan']."'></i> Lihat</a>
           
            </td>
                <td>".++$i."</td>
                </td>
                <td>".$row['perusahaan']."</td>
                <td>".$row['pemilik']."</td>
                <td>".$row['kota']."</td>
                <td>".$row['kecamatan']."</td>
                <td>".$row['kbli']."</td>

                <td>";

                 $jumlah= $this->m_pelatihan_produk->lihatdataakun($row['id_perusahaan'])->num_rows();
                    if ($jumlah>0)
                    {
                        echo "<a href='".base_url()."simanis/admin/produk?id=".$row['id_perusahaan']."&idk=".$row['simanis_id']."' class='btn btn-success btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id']."'><i style='font-style: normal;'>$jumlah</i>Produk</a>";
                    } else {
                        echo "<a href='".base_url()."simanis/admin/produk?id=".$row['id_perusahaan']."&idk=".$row['simanis_id']."' class='btn btn-danger btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id']."'><i style='font-style: normal;'>$jumlah</i>Produk</a>";
                    }
                    echo "<td>";
                    $jumlahlaporan= $this->m_pelatihan_tahunan->lihatdataakun($row['id_perusahaan'])->num_rows();
                    if ($jumlahlaporan>0)
                    { 
                        echo "<a href='".base_url()."simanis/admin/tahunan?id=".$row['id_perusahaan']."&idk=".$row['simanis_id']."' class='btn btn-success btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id']."'><i style='font-style: normal;'>$jumlahlaporan</i>Laporan</a>";
                    } else {
                        echo "<a href='".base_url()."simanis/admin/tahunan?id=".$row['id_perusahaan']."&idk=".$row['simanis_id']."' class='btn btn-danger btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id']."'><i style='font-style: normal;'>$jumlahlaporan</i>Laporan</a>";
                    }
                echo " </td>
                <td align='center'>";
                if ($row['legalitas']!="") {
                    echo "<a href='".base_url()."assets/images/pelatihan/perusahaan/legalitas/".$row['legalitas']."' class='btn btn-default btn-sm  ' title='Edit'  id='".$row['id_perusahaan']."'target='_blank' ><i class='fa fa-file' id='".$row['id_perusahaan']."'></i></a>";
                } else {
                    echo "<a href='#' class='btn btn-default btn-xs' disabled> <i class='fa fa-file'></li></a>";    
                }
                echo "</td>
              
            </tr>

        ";

    }

?>

</tbody>

</table>
    <div class="row">
</div>
</div> 	
</div>
           
      
