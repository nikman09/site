<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-file"></i>Administrator</a>
    </li>
    <li class="active">
        <strong>Dokumen Detail</strong> 
    </li>
</ol>

<h3>Dokumen Kegiatan <small><?php echo $data['judul'] ?></small></h3> 
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Detail Dokumen","Berhasil Mengedit Dokumen","Berhasil Menghapus Detail Dokumen") ?>
            <a href="#" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Tambah Detail Dokumen</a>
                <a href="<?php echo base_url(); ?>administrator/dokumen" style="margin: 5px 0 10px 0px" class="btn  btn-default ">
                <i class="fa fa-arrow-left"></i> Kembali</a>
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
									<a href='#' class='btn btn-primary btn-xs edit' title='Edit' data-toggle='modal' id='".$row['id_dokumendetail']."' data-target='#myModal2'><i class='fa fa-edit' id='".$row['id_dokumendetail']."'></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_dokumendetail']."'><i class='fa fa-trash-o'></i></a>
								</div>
								</td>
                                <td>".$row['judul']."</td>
                                <td>".$row['keterangan']."</td>
                                <td>";
                                if ($row['dokumen']!="") {
                                    echo "<a href='".base_url()."assets/dokumen/".$row['dokumen']."' class='btn btn-default btn-xs'> <i class='fa fa-download'></li></a>";
                                } else {
                                    echo "<a href='#' class='btn btn-default btn-xs' disabled> <i class='fa fa-download'></li></a>";    
                                }
                                echo "</td>
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
                <h4 class="modal-title">Tambah Detail Dokumen</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/dokumendetailtambah" method="post" enctype="multipart/form-data" id="form">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <input type="hidden" name="id_dokumen" value="<?=$data['id_dokumen']?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Dokumen">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan Dokumen">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">File</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo set_value('foto') ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="dokumen"   id="image-source"  onchange="previewImage();">
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
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
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/dokumendetailtambah" method="post" enctype="multipart/form-data" id="form">

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