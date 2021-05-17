<ol class="breadcrumb bc-3">
	<li>
	<a href="<?php echo base_url() ?>kepegawaian/admin/jabatan">
	<i class="fa fa-users"></i>Jabatan</a>
	</li>
	<li class="active">
		<strong>Rincian Jabatan</strong>
	</li>
</ol>

<h3>Rincian Jabatan "<?php echo $jabatan["nama_jabatan"] ?>"</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menambah Rincian Jabatan","Berhasil Mengedit Rincian Jabatan","Berhasil Menghapus Rincian Jabatan") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url('kepegawaian/admin/jabatan') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-arrow-left"></i> Kembali</a>
	<a style="margin: 5px 0 10px 0px" class="btn  btn-primary"  data-toggle='modal'  data-target='#jabatanmodal'>
		<i class="fa fa-plus"></i> Tambah Rincian Jabatan</a>
	<table class="table table-bordered  datatable" id="table-1">
		<thead>
			<tr>
				<th width="40px">Aksi</th>
				<th>Rincian Jabatan</th>
			</tr>
		</thead>
		<tbody>
			<?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<a href='#' class='btn btn-primary btn-xs edit' title='Edit' data-toggle='modal' id='".$row['id_subjabatan']."' data-target='#myModal'><i class='fa fa-edit' id='".$row['id_subjabatan']."'  ></i></a>
								<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_subjabatan']."'><i class='fa fa-trash-o'></i></a>
								</td>
								<td>".$row['nama_subjabatan']."</td>
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
                <h4 class="modal-title">Tambah Rincian Jabatan</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/admin/rinciantambah" method="post" id="form">
                <div class="modal-body">
                    <div class="row">
					<div class="col-md-12">
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<input type="hidden" name="id_jabatan" value="<?=$jabatan["id_jabatan"]?>">
							<div class="form-group">
								<label for="field-1" class="control-label">Rincian Jabatan</label>
								<input type="text" class="form-control" id="nama_subjabatan" name="nama_subjabatan" placeholder="Rincian Jabatan">
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