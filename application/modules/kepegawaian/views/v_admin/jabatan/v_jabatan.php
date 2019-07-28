<ol class="breadcrumb bc-3">
<li>
<a href="<?php echo base_url() ?>kepegawaian/admin/jabatan">
	<i class="fa fa-users"></i>Jabatan</a>
	</li>
	<li class="active">
		<strong>Lihat Data Jabatan</strong>
	</li>
</ol>

<h3>Data Jabatan</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menambah Data Jabatan","Berhasil Mengedit Data Jabatan","Berhasil Menghapus Data Jabatan") ?>
	<a style="margin: 5px 0 10px 0px" class="btn  btn-primary"  data-toggle='modal'  data-target='#jabatanmodal'>
		<i class="fa fa-plus"></i> Tambah Data Jabatan</a>
	<table class="table table-bordered  datatable" id="table-1">
		<thead>
			<tr>
				<th width="40px">Aksi</th>
				<th>Jabatan</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<a href='#' class='btn btn-primary btn-xs edit' title='Edit' data-toggle='modal' id='".$row['id_jabatan']."' data-target='#myModal'><i class='fa fa-edit' id='".$row['id_jabatan']."'  ></i></a>
								<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_jabatan']."'><i class='fa fa-trash-o'></i></a>
								</td>
								<td>".$row['nama_jabatan']."</td>
								<td><a href='".base_url("kepegawaian/admin/rincian?id=".$row['id_jabatan']."")."' class='btn btn-list btn-xs btn-primary' title='Rincian' id='".$row['id_jabatan']."'><i class='fa fa-list'></i> Rincian </a>
								</td>
							</tr>
						";
					}
				?>
		</tbody>
	</table>
</div>


<div class="modal fade" id="jabatanmodal">
    <div class="modal-dialog">
        <div class="modal-content" id="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Jabatan</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/admin/jabatantambah" method="post" id="form">
                <div class="modal-body">
                    <div class="row">
					<div class="col-md-12">
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<div class="form-group">
								<label for="field-1" class="control-label">Jabatan</label>
								<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" placeholder="Jabatan">
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
			<div class="modal-content"  id="modal-lihat">
				
			
			</div>
		</div>
	</div>