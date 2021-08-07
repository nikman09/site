<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>simanis/admin">
            <i class="fa fa-newspaper-o"></i>Admin</a>
    </li>
    <li class="active">
        <strong>Data Perusahaan (SIIKALSEL) Tahunan</strong>
    </li>
</ol>

<h3>Data Tahunan "<?php echo $perusahaan["perusahaan"] ?>"</h3>

						<hr/>

        <?php pesan_get2('msg',"Berhasil Menambah Produk","Berhasil Mengedit Produk","Berhasil Menghapus Produk") ?>

        <a href="<?php echo base_url("simanis/admin/perusahaan?id=".$perusahaan["simanis_id"]."") ?>" class="btn btn-default  btn-icon icon-left  daftar" style="margin: 5px 10px 10px 0px" ><i class='fa fa-arrow-left'></i>Kembali</a>
    
            <table class="table table-bordered datable" id="table-1" style="font-size:12px">

                <thead>

                  <tr>
                  <th width="100px" rowspan="2">Aksi</th>
                        <th width="20px" rowspan="2">#</th>
                        <th  rowspan="2">Tahun Data</th>
                        <th  colspan="2">Tenaga Kerja</th>
                        <th rowspan="2">Nilai Investasi</th>
                        <th rowspan="2">Kapasitas Produksi</th>
                        <th rowspan="2">Satuan Produksi</th>
                        <th rowspan="2">Nilai Produksi</th>
                        <th rowspan="2">Nilai BB/BP</th>
                        <th rowspan="2">Persentasi Ekspor</th>
                        <th rowspan="2">Negara Tujuan Ekspor</th>
                      
                    </tr>
                    <tr>
                        <th>L</th>
                        <th>P</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $i=0;

					foreach($data->result_array() as $row){



						echo "

							<tr>

                            <td>

                            <div style='width:100px'>
                            <a href='".base_url("simanis/admin/lihattahunan?id=".$row['tahunan_id']."&idk=".$perusahaan["simanis_id"]."")."' class='btn btn-primary btn-sm lihat btn-icon icon-left' title='Lihat'  id='".$row['tahunan_id']."' ><i class='fa fa-eye' id='".$row['tahunan_id']."'></i> Lihat</a>
                          
                            </td>
                                <td>".++$i."</td>

								</td>
                                <td>".$row['tahun']."</td>
                                <td>".$row['laki']."</td>
                                <td>".$row['perempuan']."</td>
                                <td>".$row['investasi']."</td>
                                <td>".$row['kapasitas']."</td>
                                <td>".$row['satuan']."</td>
                                <td>".$row['produksi']."</td>
                                <td>".$row['bb']."</td>
                                <td>".$row['ekspor']."</td>
                                <td>".$row['negara']."</td>
                               
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
           
      
