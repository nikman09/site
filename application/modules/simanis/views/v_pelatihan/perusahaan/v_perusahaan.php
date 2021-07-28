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

    <h3>Data Usaha/Perusahaan</h3>

						<hr/>

        <?php pesan_get2('msg',"Berhasil Menambah Data Perusahaan","Berhasil Mengedit Data Perusahaan","Berhasil Menghapus Data Perusahaan") ?>

        <a href="<?php echo base_url("simanis/tambahperusahaan") ?>" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left" >

                <i class="fa fa-plus"></i> Tambah Data Usaha</a>
            <table class="table table-bordered datatable" id="table-12" style="font-size:12px">

                <thead>

                  <tr>
                        <th width="10px">#</th>
                        <th>Nama Perusahaan</th>
                        <th>Pemilik</th>
                        <th>Kab/Kota</th>
                        <th>Kecamatan</th>
                        <th>KBLI</th>
                        <th>Jumlah Produk</th>
                        <th>Laporan Tahunan</th>
                        <th>Legalitas</th>
                        <th width="130px">Aksi</th>
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

                                <td>".$row['perusahaan']."</td>
                                <td>".$row['pemilik']."</td>
                                <td>".$row['kota']."</td>
                                <td>".$row['kecamatan']."</td>
                                <td>".$row['kbli']."</td>

                                <td>";

                                 $jumlah= $this->m_pelatihan_produk->lihatdataakun($row['id_perusahaan'])->num_rows();
                                    if ($jumlah>0)
                                    {
                                        echo "<a href='".base_url()."simanis/produk?id=".$row['id_perusahaan']."' class='btn btn-success btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id']."'><i style='font-style: normal;'>$jumlah</i>Produk</a>";
                                    } else {
                                        echo "<a href='".base_url()."simanis/produk?id=".$row['id_perusahaan']."' class='btn btn-danger btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id']."'><i style='font-style: normal;'>$jumlah</i>Produk</a>";
                                    }
                                    echo "<td>";
                                    $jumlahlaporan= $this->m_pelatihan_tahunan->lihatdataakun($row['id_perusahaan'])->num_rows();
                                    if ($jumlahlaporan>0)
                                    { 
                                        echo "<a href='".base_url()."simanis/tahunan?id=".$row['id_perusahaan']."' class='btn btn-success btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id']."'><i style='font-style: normal;'>$jumlahlaporan</i>Laporan</a>";
                                    } else {
                                        echo "<a href='".base_url()."simanis/tahunan?id=".$row['id_perusahaan']."' class='btn btn-danger btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id']."'><i style='font-style: normal;'>$jumlahlaporan</i>Laporan</a>";
                                    }
                                echo " </td>
                                <td align='center'>";
                                if ($row['legalitas']!="") {
									echo "<a href='".base_url()."assets/images/pelatihan/perusahaan/legalitas/".$row['legalitas']."' class='btn btn-default btn-sm  ' title='Edit'  id='".$row['id_perusahaan']."'target='_blank' ><i class='fa fa-file' id='".$row['id_perusahaan']."'></i></a>";
                                } else {
                                    echo "<a href='#' class='btn btn-default btn-xs' disabled> <i class='fa fa-file'></li></a>";    
                                }
                                echo "</td>
                                <td>
								<div style='width:100px'>
                                <a href='".base_url("simanis/lihatperusahaan?id=".$row['id_perusahaan']."")."' class='btn btn-primary btn-xs lihat' title='Edit'  id='".$row['id_perusahaan']."' ><i class='fa fa-eye' id='".$row['id_perusahaan']."'></i></a>
                                <a href='".base_url("simanis/editperusahaan?id=".$row['id_perusahaan']."")."' class='btn btn-primary btn-xs edi' title='Edit'  id='".$row['id_perusahaan']."' ><i class='fa fa-edit' id='".$row['id_perusahaan']."'></i></a>
									<a href='#' class='btn btn-primary btn-xs hapus' title='Hapus' id='".$row['id_perusahaan']."'><i class='fa fa-trash-o'></i></a>
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






