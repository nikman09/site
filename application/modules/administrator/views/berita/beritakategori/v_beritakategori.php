<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li class="active">
        <strong>Kategori</strong>
    </li>
</ol>

<h3>Kategori Berita</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Kategori Berita","Berhasil Mengedit Kategori Berita","Berhasil Menghapus Kategori Berita") ?>
            <a href="#" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah  btn-icon icon-left" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Tambah Kategori</a>
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th width="50px">Aksi</th>
                        <th>Kategori</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<div>
									<a href='#' class='btn btn-primary btn-xs edit' title='Edit' data-toggle='modal' id='".$row['id_beritakategori']."' data-target='#myModal2'><i class='fa fa-edit' id='".$row['id_beritakategori']."'></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_beritakategori']."'><i class='fa fa-trash-o'></i></a>
								</div>
								</td>
								<td>".$row['kategori']."</td>

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
                <h4 class="modal-title">Tambah Kategori</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/beritakategoritambah" method="post" enctype="multipart/form-data" id="form">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori Berita">
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
                <h4 class="modal-title">Tambah Kategori</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/beritakategoritambah" method="post" enctype="multipart/form-data" id="form">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori Berita">
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