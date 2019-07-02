<ol class="breadcrumb bc-3">
<li>
	<a href="<?php echo base_url() ?>arsip">
		<i class="fa fa-list"></i>Kepegawaian</a>
</li>

<li class="active">
	<strong>Edit Data PNS</strong>
</li>
</ol>

<h3>Edit Data PNS</h3>
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
	<div class="panel-title">
		Update
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>
<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>kepegawaian/pnsedit?id_pegawai=<?php if (isset($id_pegawai2)) echo $id_pegawai2; else echo $data['id_pegawai']; ?>"	method="post"  enctype="multipart/form-data" id="form"> 	

<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="panel-body">
					<?php pesan_get('msg',"Berhasil Mengedit Data PNS","Gagal Mengedit Data PNS") ?>
						<div class="row">
							<div class="col-md-6">
							<input type="hidden" class="form-control" name="id_pegawai" data-required="true" value="<?php echo $data['id_pegawai']; ?>" />
			
				
				<div class="form-group">
					<label class="col-lg-4 control-label">Nomor SK PNS</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="skpns" value="<?php echo $data['skpns']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal SK PNS <?php  ?></label>
						<div class="col-lg-8">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php  if ($data['tglskpns']=="0000-00-00") echo date('d-m-Y'); else echo tanggal($data['tglskpns']); ?>"
								readonly data-validate="required" data-message-required="Tanggal tglskpns " name="tglskpns" style="background-color:#fff"  placeholder="dd/mm/yyyy">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>

						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">TMT</label>
						<div class="col-lg-8">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php  if ($data['tmtpns']=="0000-00-00") echo date('d-m-Y'); else echo tanggal($data['tmtpns']); ?>"
								readonly data-validate="required" data-message-required="Tanggal tmtpns " name="tmtpns" style="background-color:#fff"  placeholder="dd/mm/yyyy">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>

						</div>
					</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Golongan Awal</label>
					<div class="col-lg-8">
					<select class="form-control" name="golongan">
						<option value='' disabled>.:Pilih Golongan Awal:.</option>
						<option value="I/a - JURU MUDA" <?php echo ($data['golongan']=='I/a - JURU MUDA'?'selected':'') ?> >I/a - JURU MUDA</option>
						<option value="I/b - JURU MUDA TINGKAT I" <?php echo ($data['golongan']=='I/b - JURU MUDA TINGKAT I'?'selected':'') ?> >I/b - JURU MUDA TINGKAT I</option>
						<option value="I/c - JURU" <?php echo ($data['golongan']=='I/c - JURU'?'selected':'') ?> >I/c - JURU</option>
						<option value="I/d - JURU TINGKAT I" <?php echo ($data['golongan']=='I/d - JURU TINGKAT I'?'selected':'') ?> >I/d - JURU TINGKAT I</option>
						<option value="II/a - PENGATUR MUDA" <?php echo ($data['golongan']=='II/a - PENGATUR MUDA'?'selected':'') ?> >II/a - PENGATUR MUDA</option>
						<option value="II/b - PENGATUR MUDA TK. I" <?php echo ($data['golongan']=='I/b - PENGATUR MUDA TK. I'?'selected':'') ?> >II/b - PENGATUR MUDA TK. I</option>
						<option value="II/c - PENGATUR" <?php echo ($data['golongan']=='II/c - PENGATUR'?'selected':'') ?> >II/c - PENGATUR</option>
						<option value="II/d - PENGATUR TK. I" <?php echo ($data['golongan']=='II/d - PENGATUR TK. I'?'selected':'') ?> >II/d - PENGATUR TK. I</option>
						<option value="III/a - PENATA MUDA"  <?php echo ($data['golongan']=='III/a - PENATA MUDA'?'selected':'') ?> >III/a - PENATA MUDA</option>
						<option value="III/b - PENATA MUDA TK. I" <?php echo ($data['golongan']=='III/b - PENATA MUDA TK. I'?'selected':'') ?> >III/b - PENATA MUDA TK. I</option>
						<option value="III/c - PENATA" <?php echo ($data['golongan']=='III/c - PENATA'?'selected':'') ?> >III/c - PENATA</option>
						<option value="III/d - PENATA TK. I" <?php echo ($data['golongan']=='III/d - PENATA TK. I'?'selected':'') ?> >III/d - PENATA TK. I</option>
						<option value="IV/a - PEMBINA" <?php echo ($data['golongan']=='IV/a - PEMBINA<'?'selected':'') ?> >IV/a - PEMBINA</option>
						<option value="IV/b - PEMBINA TK. I" <?php echo ($data['golongan']=='IV/b - PEMBINA TK. I'?'selected':'') ?> >IV/b - PEMBINA TK. I</option>
						<option value="IV/c - PEMBINA UTAMA MUDA" <?php echo ($data['golongan']=='IV/c - PEMBINA UTAMA MUDA'?'selected':'') ?> >IV/c - PEMBINA UTAMA MUDA</option>
						<option value="IV/d - PEMBINA UTAMA  MADYA" <?php echo ($data['golongan']=='IV/d - PEMBINA UTAMA  MADYA'?'selected':'') ?> >IV/d - PEMBINA UTAMA  MADYA</option>
						<option value="IV/e - PEMBINA UTAMA" <?php echo ($data['golongan']=='IV/e - PEMBINA UTAMA'?'selected':'') ?> >IV/e - PEMBINA UTAMA</option>
					 
					</select>
					</div>
				</div>
				

				
				

				<div class="form-group">
					<label class="col-lg-4 control-label">Pejabat Pengesahan</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="pejabatpengesahan" value="<?php echo $data['pejabatpengesahan']; ?>" 
						/>
					</div>
				</div>
			
				
			</div>
			
			<div class="col-md-6">
				
		
				<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['berkas']; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="berkas">
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							<?php 
					if(isset($id_pegawai)) {
						echo '<label style="color:red;font-size:10px">Upload ulang berkas !</label>';
						} 
					?>
					</div>
				</div>
			</div>
		</div>
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-info btn-s-xs">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<a href="<?php echo base_url('kepegawaian/pns') ?>" class="btn btn-danger btn-s-xs">
		<i class="fa fa-close"></i> Keluar</a>

		
</footer>
</form>
				</div>
			