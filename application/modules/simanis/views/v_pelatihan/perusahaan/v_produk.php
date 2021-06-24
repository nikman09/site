<div class="container">

	<div class="row">

		<div class="col-md-12">

			<hr class="no-top-margin" />

		</div>

	</div>	

</div>



<div class="container">

	<div class="row vspace" style="margin:5px;min-height:300px">

	<div class="col-md-12">

    <h3>Data Produk "<?php echo $perusahaan["perusahaan"] ?>"</h3>

						<hr/>

        <?php pesan_get2('msg',"Berhasil Menambah Produk","Berhasil Mengedit Produk","Berhasil Menghapus Produk") ?>

        <a href="<?php echo base_url("simanis/perusahaan") ?>" class="btn btn-default  btn-icon icon-left  daftar" style="margin: 5px 10px 10px 0px" ><i class='fa fa-arrow-left'></i>Kembali</a>
        <a href="<?php echo base_url("simanis/tambahproduk?id=".$perusahaan["id_perusahaan"]."") ?>" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left" >

					        <i class="fa fa-plus"></i> Tambah Produk</a>

               

            <table class="table table-bordered datable" id="table-12" style="font-size:12px">

                <thead>

                  <tr>
                        <th width="20px">#</th>
                        <th>Kode</th>
                        <th>Produk</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Nilai Pernjualan</th>
                        <th width="150px">Gambar Produk</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $i=0;

					foreach($data->result_array() as $row){



						echo "

							<tr>

							
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
                                <td>

								<div>
                                <a href='".base_url("simanis/lihatproduk?id=".$row['id']."")."' class='btn btn-primary btn-xs lihat' title='Lihat'  id='".$row['id']."' ><i class='fa fa-eye' id='".$row['id']."'></i></a>
                                <a href='".base_url("simanis/editproduk?id=".$row['id']."")."' class='btn btn-primary btn-xs edi' title='Edit'  id='".$row['id']."' ><i class='fa fa-edit' id='".$row['id']."'></i></a>


									<a href='#' class='btn btn-primary btn-xs hapus' title='Hapus' id='".$row['id']."'><i class='fa fa-trash-o'></i></a>

                                </div>
                                </td>
							</tr>

						";

					}

				?>

                </tbody>

            </table>

    </div>

</div>
</div>