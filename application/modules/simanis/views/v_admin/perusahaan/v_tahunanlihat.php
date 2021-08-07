<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>simanis/admin">
            <i class="fa fa-newspaper-o"></i>Admin</a>
    </li>
    <li class="active">
        <strong>Data Perusahaan (SIIKALSEL) Tahunan</strong>
    </li>
</ol>

<h3>Data Tahunan </h3>
<div class="row">

                <div class="col-md-12">
                <a href="<?php echo base_url("simanis/admin/tahunan?id=".$data['perusahaan_id']."&idk=".$id_akun."") ?>" class="btn btn-default  btn-icon icon-left  daftar" style="float:left"><i class='fa fa-arrow-left'></i>Kembali</a>
                    <br/>
                    <br/>
                    

                </div>

</div>
<div class="col-md-12" style="border: 0px solid #000;border-radius:10px;">
					
<table style=" border-spacing: 10px;

border-collapse: separate;">

<tr>

            <td width="150px" valign="top">

            Tahun

            </td>

            <td  valign="top">

               : 

            </td>

            <td  valign="top">

            <strong><?php echo  $data['tahun'] ?></strong>

            </td>

        </tr>

        <tr>

            <td width="300px" valign="top">

            Jumlah Tenaga Kerja Laki-laki 

            </td>

            <td  valign="top">

               : 

            </td>

            <td  valign="top">

            <strong><?php echo  $data['laki'] ?></strong>

            </td>

        </tr>

        <tr>

            <td>

            Jumlah Tenaga Kerja perempuan

            </td>

            <td>

               : 

            </td>

            <td>

               <?php echo  $data['perempuan'] ?>

            </td>

        </tr>

        <tr>

            <td>

            Nilai Investasi

            </td>

            <td>

               : 

            </td>

            <td>

            <?php echo  $data['investasi'] ?>

            </td>

        </tr>

        <tr>

            <td>

            Kapasitas Produksi

            </td>

            <td>

               : 

            </td>

            <td>

            <?php echo  $data['kapasitas'] ?>

            </td>

        </tr>

        <tr>

            <td>

            Satuan Kapasitas Produksi

            </td>

            <td>

               : 

            </td>

            <td>

               <?php

                    echo $data['satuan']; 

               ?>

            </td>

        </tr>

        <tr>

            <td>

            Nilai Produksi

            </td>

            <td>

               : 

            </td>

            <td>
                <?php echo $data['produksi']; ?>
            </td>

        </tr>
        <tr>
            <td>
            Nilai BP/BB
            </td>
            <td>
               : 
            </td>
            <td>
                <?php echo $data['bb']; ?>
            </td>
        </tr>
        <tr>
            <td>
            Persentasi Pemasaran Ekspor (%)
            </td>
            <td>
               : 
            </td>
            <td>
                <?php echo $data['ekspor']; ?>
            </td>
        </tr>
        <tr>
            <td>
            Negara Tujuan Ekspor
            </td>
            <td>
               : 
            </td>
            <td>
                <?php echo $data['negara']; ?>
            </td>
        </tr>
        
     </table>





</div>



    <div class="row">
</div>
</div> 	
</div>
           
      
