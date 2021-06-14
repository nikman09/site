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

                <i class="fa fa-plus"></i> Tambah Data Usaha/Perusahaan</a>

               

            <table class="table table-bordered datable" id="table-12" style="font-size:12px">

                <thead>

                  <tr>

                      

                        <th width="20px">#</th>

                        <th>Nama Perusahaan</th>

                        <th>Pemilik</th>
                        <th>Kab/Kota</th>
                        <th>Kecamatan</th>
                        <th>KBLI</th>
                        <th>Jumlah Produk</th>
                        <th>Laporan Tahunan</th>
                        <th>Legalitas</th>
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

                                <td>".$row['perusahaan']."</td>
                                <td>".$row['pemilik']."</td>
                                <td>".$row['kota']."</td>
                                <td>".$row['kecamatan']."</td>
                                <td>".$row['kbli']."</td>
                                <td><a href='".base_url()."assets/images/pelatihan/pendukung/".$row['legalitas']."' class='btn btn-success btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id']."'target='_blank' ><i style='font-style: normal;'>01</i> Produk</a></td>
                                <td><a href='".base_url()."assets/images/pelatihan/pendukung/".$row['legalitas']."' class='btn btn-success btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id']."'target='_blank' ><i style='font-style: normal;'>01</i>Laporan</a></td>
                        
                                <td>";

                                if ($row['legalitas']!="") {
									echo "<a href='".base_url()."assets/images/pelatihan/pendukung/".$row['legalitas']."' class='btn btn-default btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id_perusahaan']."'target='_blank' ><i class='fa fa-eye' id='".$row['id_perusahaan']."'></i> View</a>";

                                } else {

                                    echo "<a href='#' class='btn btn-default btn-xs' disabled> <i class='fa fa-download'></li></a>";    

                                }

                                echo "</td>
                                <td>

								<div>
                                <a href='".base_url("simanis/lihatperusahaan?id=".$row['id_perusahaan']."")."' class='btn btn-info btn-xs lihat' title='Edit'  id='".$row['id_perusahaan']."' ><i class='fa fa-eye' id='".$row['id_perusahaan']."'></i></a>

									<a href='#' class='btn btn-primary btn-xs edit' title='Edit' data-toggle='modal' id='".$row['id_perusahaan']."' data-target='#myModal2'><i class='fa fa-edit' id='".$row['id_perusahaan']."'></i></a>

									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_perusahaan']."'><i class='fa fa-trash-o'></i></a>

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







<div class="modal fade" id="myModal">

    <div class="modal-dialog">

        <div class="modal-content" id="modal-tambah">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Tambah  Data Pendukung</h4>

            </div>

            <form role="form" class="validate" action="<?php echo base_url() ?>simanis/pendukung" method="post" enctype="multipart/form-data" id="form">



                <div class="modal-body">



                    <div class="row">

                        <div class="col-md-12">

                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">

   

                            <div class="form-group">

                                <label for="field-1" class="control-label">Nama Data Pendukung</label>

                                <input type="text" class="form-control" id="judul" name="nama" placeholder="Masukkan Nama Dokumen Pendukung">

                            </div>

                           

                            <div class="form-group">

                                <label for="field-1" class="control-label">File</label>

                                <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">

								<div class="input-group">

									<div class="form-control uneditable-input" data-trigger="fileinput">

										<i class="glyphicon glyphicon-file fileinput-exists"></i>

										<span class="fileinput-filename"><?php echo set_value('file') ?></span>

									</div>

									<span class="input-group-addon btn btn-default btn-file">

										<span class="fileinput-new">Select file</span>

										<span class="fileinput-exists">Change</span>

										<input type="file" name="dokumen" >

									</span>

									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>

								</div>

							</div>

                            * Max 1 MB

                            </div>

                            

                        </div>



                      

                    </div>



                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

                    <button type="submit" class="btn btn-primary">Simpan</button>

                </div>



            </form>



        </div>

    </div>

</div>





<div class="modal fade" id="myModal2">

    <div class="modal-dialog">

        <div class="modal-content" id="modal-edit">

          

         

        </div>

    </div>

</div>

