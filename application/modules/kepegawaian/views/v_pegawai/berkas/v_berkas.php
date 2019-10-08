<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>kepegawaian">
			<i class="fa fa-list"></i>Kepegawaian</a>
	</li>
	<li>
		<a href="<?php echo base_url() ?>kepegawaian">Data Pegawai</a>
	</li>
	<li class="active">
		<strong>Berkas Pegawai</strong>
	</li>
</ol>

<h3>Berkas Pegawai</h3>
<div class="table-responsive">
	<?php pesan_get('msg',"Berhasil Mengupload Data Berkas Pegawai","","","Gagal Mengupload Data Berkas Pegawai (Max 5MB)") ?>
	<a href="<?php echo base_url('kepegawaian/biodata') ?>" class="btn btn-default btn-s-xs" style="margin-bottom:10px">
				<i class="fa fa-list"></i> Biodata</a> &nbsp	
	<table class="table table-bordered" style="font-size:12px">
		<thead>
			<tr>
				
				<th>Berkas</th>
				<th>Upload</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Kartu Tanda Penduduk</td>
				<td>
				<?php if ($data['ktp']=="") echo "<a class='btn btn-danger btn-xs'><i class='fa fa-file'></i> Lihat</a>"; else echo "<a href='".base_url()."assets/berkas/ktp/".$data['ktp']."'  class='btn btn-success btn-xs' target='_blank'><i class='fa fa-file'></i> Lihat</a>"; ?>
				<a href='#' class='btn btn-info btn-xs ktp' title='Upload KTP' data-toggle='modal'  data-target='#ktpmodal'><i class='fa fa-upload'> </i> Upload</a></td>
			</tr>
			<tr>
				<td>Kartu Nikah</td>
				<td><?php if ($data['kartunikah']=="") echo "<a class='btn btn-danger btn-xs'><i class='fa fa-file'></i> Lihat</a>"; else echo "<a href='".base_url()."assets/berkas/kartunikah/".$data['kartunikah']."'  class='btn btn-success btn-xs' target='_blank'><i class='fa fa-file'></i> Lihat</a>"; ?>
				<a href='#' class='btn btn-info btn-xs kartunikah' title='Upload Kartu Nikah' data-toggle='modal'  data-target='#kartunikahmodal'><i class='fa fa-upload'> </i> Upload</a></td>
			</td>
			<tr>
				<td>Karis/Karsu</td>
				<td><?php if ($data['kariskarsu']=="") echo "<a class='btn btn-danger btn-xs'><i class='fa fa-file'></i> Lihat</a>"; else echo "<a href='".base_url()."assets/berkas/kariskarsu/".$data['kariskarsu']."'  class='btn btn-success btn-xs' target='_blank'><i class='fa fa-file'></i> Lihat</a>"; ?>
				<a href='#' class='btn btn-info btn-xs kariskarsu' title='Upload Karis/Karsu' data-toggle='modal'  data-target='#kariskarsumodal'><i class='fa fa-upload'> </i> Upload</a></td>
			</tr>
			<tr>
				<td>Kartu Keluarga</td>
				<td><?php if ($data['kartukeluarga']=="") echo "<a class='btn btn-danger btn-xs'><i class='fa fa-file'></i> Lihat</a>"; else echo "<a href='".base_url()."assets/berkas/kartukeluarga/".$data['kartukeluarga']."'  class='btn btn-success btn-xs' target='_blank'><i class='fa fa-file'></i> Lihat</a>"; ?>
				<a href='#' class='btn btn-info btn-xs kartukeluarga' title='Upload Kartu Keluarga' data-toggle='modal'  data-target='#kartukeluargamodal'><i class='fa fa-upload'> </i> Upload</a></td>
			</tr>
			<tr>
				<td>BPJS</td>
				<td><?php if ($data['bpjs']=="") echo "<a class='btn btn-danger btn-xs'><i class='fa fa-file'></i> Lihat</a>"; else echo "<a href='".base_url()."assets/berkas/bpjs/".$data['bpjs']."'  class='btn btn-success btn-xs' target='_blank'><i class='fa fa-file'></i> Lihat</a>"; ?>
				<a href='#' class='btn btn-info btn-xs bpjs' title='Upload BPJS' data-toggle='modal'  data-target='#bpjsmodal'><i class='fa fa-upload'> </i> Upload</a></td>
			</tr>
			<tr>
				<td>TASPEN</td>
				
				<td><?php if ($data['taspen']=="") echo "<a class='btn btn-danger btn-xs'><i class='fa fa-file'></i> Lihat</a>"; else echo "<a href='".base_url()."assets/berkas/taspen/".$data['taspen']."'  class='btn btn-success btn-xs' target='_blank'><i class='fa fa-file'></i> Lihat</a>"; ?>
				<a href='#' class='btn btn-info btn-xs taspen' title='Upload TASPEN' data-toggle='modal'  data-target='#taspenmodal'><i class='fa fa-upload'> </i> Upload</a></td>
			</tr>
			<tr>
				<td>SK CPNS</td>
				<td><?php if ($data['skcpns']=="") echo "<a class='btn btn-danger btn-xs'><i class='fa fa-file'></i> Lihat</a>"; else echo "<a href='".base_url()."assets/berkas/skcpns/".$data['skcpns']."'  class='btn btn-success btn-xs' target='_blank'><i class='fa fa-file'></i> Lihat</a>"; ?>
				<a href='#' class='btn btn-info btn-xs skpcpns' title='Upload SK CPNS' data-toggle='modal'  data-target='#skcpnsmodal'><i class='fa fa-upload'> </i> Upload</a></td>
			</tr>
			<tr>
				<td>SK PNS</td>
				<td><?php if ($data['skpns']=="") echo "<a class='btn btn-danger btn-xs'><i class='fa fa-file'></i> Lihat</a>"; else echo "<a href='".base_url()."assets/berkas/skpns/".$data['skpns']."'  class='btn btn-success btn-xs' target='_blank'><i class='fa fa-file'></i> Lihat</a>"; ?>
				<a href='#' class='btn btn-info btn-xs skpns' title='Upload skpns' data-toggle='modal'  data-target='#skpnsmodal'><i class='fa fa-upload'> </i> Upload</a></td>
			</tr>
			<tr>
				<td>KARPEG</td>
				<td><?php if ($data['karpeg']=="") echo "<a class='btn btn-danger btn-xs'><i class='fa fa-file'></i> Lihat</a>"; else echo "<a href='".base_url()."assets/berkas/karpeg/".$data['karpeg']."'  class='btn btn-success btn-xs' target='_blank'><i class='fa fa-file'></i> Lihat</a>"; ?>
				<a href='#' class='btn btn-info btn-xs karpeg' title='Upload karpeg' data-toggle='modal'  data-target='#karpegmodal'><i class='fa fa-upload'> </i> Upload</a></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="modal fade" id="ktpmodal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-lihat">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload KTP</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/uploadktp" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
						<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $data['id_pegawai'] ?>">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['ktp']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="ktp">
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

<div class="modal fade" id="kartunikahmodal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-lihat">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Kartu Nikah</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/uploadkartunikah" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
						<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $data['id_pegawai'] ?>">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['kartunikah']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="kartunikah">
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

<div class="modal fade" id="kariskarsumodal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-lihat">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Karis/Karsu</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/uploadkariskarsu" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
						<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $data['id_pegawai'] ?>">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['kariskarsu']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="kariskarsu">
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

<div class="modal fade" id="kartukeluargamodal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-lihat">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Kartu Keluarga</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/uploadkartukeluarga" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
						<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $data['id_pegawai'] ?>">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['kartukeluarga']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="kartukeluarga">
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

<div class="modal fade" id="bpjsmodal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-lihat">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload BPJS</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/uploadbpjs" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
						<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $data['id_pegawai'] ?>">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['bpjs']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="bpjs">
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

<div class="modal fade" id="taspenmodal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-lihat">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Taspen</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/uploadtaspen" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
						<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $data['id_pegawai'] ?>">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['taspen']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="taspen">
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

<div class="modal fade" id="skcpnsmodal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-lihat">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload SK CPNS</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/uploadskcpns" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
						<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $data['id_pegawai'] ?>">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['skcpns']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="skcpns">
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

<div class="modal fade" id="skpnsmodal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-lihat">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload SK PNS</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/uploadskpns" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
						<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $data['id_pegawai'] ?>">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['skpns']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="skpns">
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

<div class="modal fade" id="karpegmodal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-lihat">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload KARPEG</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/uploadkarpeg" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
						<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $data['id_pegawai'] ?>">
						<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
						<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['karpeg']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="karpeg">
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