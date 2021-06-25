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

    <h3>Data Tahunan Perusahaan "<?php echo $perusahaan["perusahaan"] ?>"</h3>

						<hr/>

        <?php pesan_get2('msg',"Berhasil Menambah Data Tahunan","Berhasil Mengedit Data Tahunan","Berhasil Menghapus Data Tahunan") ?>

        <a href="<?php echo base_url("simanis/perusahaan") ?>" class="btn btn-default  btn-icon icon-left  daftar" style="margin: 5px 10px 10px 0px" ><i class='fa fa-arrow-left'></i>Kembali</a>
        <a href="<?php echo base_url("simanis/tambahtahunan?id=".$perusahaan["id_perusahaan"]."") ?>" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left" >

					        <i class="fa fa-plus"></i> Tambah Data Tahunan</a>

               

            <table class="table table-bordered datable" id="table-12" style="font-size:12px">

                <thead>

                  <tr>
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
                        <th width="100px" rowspan="2">Aksi</th>
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
                                <td>

								<div style='width:100px'>
                                <a href='".base_url("simanis/lihattahunan?id=".$row['tahunan_id']."")."' class='btn btn-primary btn-xs lihat' title='Lihat'  id='".$row['tahunan_id']."' ><i class='fa fa-eye' id='".$row['tahunan_id']."'></i></a>
                                <a href='".base_url("simanis/edittahunan?id=".$row['tahunan_id']."")."' class='btn btn-primary btn-xs edi' title='Edit'  id='".$row['id']."' ><i class='fa fa-edit' id='".$row['tahunan_id']."'></i></a>


									<a href='#' class='btn btn-primary btn-xs hapus' title='Hapus' id='".$row['tahunan_id']."'><i class='fa fa-trash-o'></i></a>

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