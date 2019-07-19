<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>kepegawaian">
			<i class="fa fa-list"></i>Kepegawaian</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>kepegawaian">Data Pegawai</a>
	</li>
	<li class="active">
		<strong>Riwayat Pendidikan</strong>
	</li>
</ol>

<h3>Data Riwayat Pendidikan "<?php echo $pegawai['nama'];  ?>"</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Menambah Riwayat Pendidikan","Berhasil Mengedit Riwayat Pendidikan","Berhasil Menghapus Riwayat Pendidikan") ?>
	<a style="margin: 5px 0 10px 0px" href="<?php echo base_url('kepegawaian/admin/pegawailihat?id='.$pegawai['id_pegawai'].'') ?>" class="btn btn-primary btn-s-xs">
				<i class="fa fa-arrow-left"></i> Kembali</a>
	<a style="margin: 5px 0 10px 0px" class="btn  btn-default"  data-toggle='modal'  data-target='#rpendidikanmodal'>
		<i class="fa fa-plus"></i> Tambah Riwayat Pendidikan</a>
	<table class="table table-bordered  datatable" id="table-1" style="font-size:12px">
		<thead>
			<tr>
				<th width="80px">Aksi</th>
				<th>Jenjang</th>
				<th>Nama Sekolah/Perguruan Tinggi</th>
				<th>Tahun Lulus</th>
				<th width="40px">Ijazah</th>
			</tr>
		</thead>
		<tbody>
			<?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<a href='#' class='btn btn-info btn-xs edit' title='Edit' data-toggle='modal' id='".$row['id_riwayatpendidikan']."' data-target='#myModal'><i class='fa fa-edit' id='".$row['id_riwayatpendidikan']."'  ></i></a>
								<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_riwayatpendidikan']."'><i class='fa fa-trash-o'></i></a>
								</td>
								<td>".$row['pendidikan']."</td>
								<td>".$row['nama']."</td>
								<td>".$row['tahunlulus']."</td>
								<td>";
								 if ($row['berkas']=="") echo "<a class='btn btn-danger btn-xs'><i class='fa fa-file'></i> Lihat</a>"; else echo "<a href='".base_url()."assets/berkas/riwayatpendidikan/".$row['berkas']."'  class='btn btn-success btn-xs' target='_blank'><i class='fa fa-file'></i> Lihat</a>";
								echo "
								</td>
							</tr>
						";
					}
				?>
		</tbody>
	</table>
</div>


<div class="modal fade" id="rpendidikanmodal">
    <div class="modal-dialog">
        <div class="modal-content" id="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Riwayat Pendidikan</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/admin/riwayatpendidikantambah" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
					<div class="col-md-12">
							<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $id_pegawai ?>">
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<div class="form-group">
								<label for="field-1" class="control-label">Jenjang</label>
								
								<select class="form-control" name="id_pendidikan" id="id_pendidikan">
								<option value="" disabled>.:Pilih Pendidikan Terakhir:.</option>
								<?php
									foreach($pendidikan->result_array() as $row) {
										
										echo "<option value='".$row['id_pendidikan']."'>".$row['pendidikan']."</option>";
									}
								?>
								</select>
							</div>	

							<div class="form-group">
								<label for="field-1" class="control-label">Nama Sekolag/Perguruan Tinggi</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Sekolah/Perguruan Tinggi">
							</div>	
							<div class="form-group">
								<label for="field-1" class="control-label">Tahun Lulus</label>
								<input type="text" class="form-control" id="tahunlulus" name="tahunlulus" placeholder="Tahun Lulus">
							</div>	
							<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="berkas">
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							</div>
						</div>	 
						</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
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