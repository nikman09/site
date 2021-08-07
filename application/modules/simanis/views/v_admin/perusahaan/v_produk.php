<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>simanis/admin">
            <i class="fa fa-newspaper-o"></i>Admin</a>
    </li>
    <li class="active">
        <strong>Data Perusahaan</strong>
    </li>
</ol>

<h3>Data Produk "<?php echo $perusahaan["perusahaan"] ?>"</h3>

						<hr/>

        <?php pesan_get2('msg',"Berhasil Menambah Produk","Berhasil Mengedit Produk","Berhasil Menghapus Produk") ?>

        <a href="<?php echo base_url("simanis/admin/perusahaan?id=".$perusahaan["simanis_id"]."") ?>" class="btn btn-default  btn-icon icon-left  daftar" style="margin: 5px 10px 10px 0px" ><i class='fa fa-arrow-left'></i>Kembali</a>
    
               

            <table class="table table-bordered datable" id="table-1" style="font-size:12px">

                <thead>

                  <tr>
                  <th width="50px">Aksi</th>
                        <th width="30px">#</th>
                      
                        <th>Kode</th>
                        <th>Produk</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Nilai Pernjualan</th>
                        <th width="150px">Gambar Produk</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $i=0;

					foreach($data->result_array() as $row){



						echo "

							<tr>
                            <td>
							<div>
                                <a href='".base_url("simanis/admin/lihatproduk?id=".$row['id']."&idk=".$perusahaan["simanis_id"]."")."' class='btn btn-primary btn-sm  btn-icon icon-left lihat' title='Lihat'  id='".$row['id']."' ><i class='fa fa-eye' id='".$row['id']."'></i> Lihat</a>
                               
                                </div>
                                </td>
                                <td>".++$i."</td>

								</td>

                                <td>".$row['kode']."</td>
                                <td>".$row['produk']."</td>
                                <td>".$row['jenis']."</td>
                                <td>".$row['harga']."</td>
                                <td>".$row['nilai']."</td>
                                
                                <td align='center'>";

                                if ($row['gambar']!="") {

									echo "<a href='".base_url()."assets/images/pelatihan/perusahaan/produk/".$row['gambar']."'  id='".$row['id']."'target='_blank' ><img  class='thumbnail' src='".base_url()."assets/images/pelatihan/perusahaan/produk/".$row['gambar']."' width='150px'></a>";

                                } else {

                                  //  echo "<a href='#' class='btn btn-default btn-xs' disabled> <i class='fa fa-file'></li></a>";    
                                 echo "<img  class='thumbnail' src='".base_url()."assets/images/not-available.png' width='150px'>";

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
           
      
