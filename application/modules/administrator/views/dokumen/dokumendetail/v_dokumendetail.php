<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-file"></i>Administrator</a>
    </li>
    <li class="active">
        <strong>Dokumen Detail</strong> 
    </li>
</ol>

<h3>Dokumen Kegiatan <small><?php echo $data[''] ?></small></h3> 
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Dokumen Kegiatan","Berhasil Mengedit Dokumen Kegiatan","Berhasil Menghapus Dokumen Kegiatan") ?>
            <a href="#" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Tambah Dokumen</a>
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                  <tr>
                        <th width="50px">Aksi</th>
                        <th>Judul</th>
						<th>Keterangan</th>
                        <th>Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					foreach($data2->result_array() as $row){
						echo "
							<tr>
								<td>
								<div>
									<a href='#' class='btn btn-primary btn-xs edit' title='Edit' data-toggle='modal' id='".$row['id_dokumen']."' data-target='#myModal2'><i class='fa fa-edit' id='".$row['id_dokumen']."'></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_dokumen']."'><i class='fa fa-trash-o'></i></a>
								</div>
								</td>
                                <td>".$row['judul']."</td>
                                <td>".$row['keterangan']."</td>
                                <td></td>

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
                <h4 class="modal-title">Tambah Dokumen</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/dokumentambah" method="post" enctype="multipart/form-data" id="form">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Dokumen">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan Dokumen">
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


<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-tambah">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Dokumen</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/dokumentambah" method="post" enctype="multipart/form-data" id="form">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Dokumen</label>
                                <input type="text" class="form-control" id="dokumen" name="dokumen" placeholder="Dokumen Kegiatan">
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