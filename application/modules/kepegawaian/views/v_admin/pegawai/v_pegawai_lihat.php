<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>kepegawaian">
			<i class="fa fa-user"></i>Kepegawaian</a>
	</li>
	<li class="active">
		<strong>Biodata</strong>
	</li>
</ol>

<h3>Biodata Pegawai</h3>
<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-heading">
		<div class="panel-title">
			Biodata
		</div>

		<div class="panel-options">
			<a href="#" data-rel="collapse">
				<i class="entypo-down-open"></i>
			</a>
		</div>
	</div>
		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="panel-body">
			<?php pesan_get('msg',"Berhasil Mengedit Data Pegawai","Gagal Mengedit Data Pegawai") ?>
			<div class="row">
				<div class="col-md-6">
				<a href="<?php echo base_url('kepegawaian/admin/pegawai?id='.$data['id_pegawai'].'') ?>" class="btn btn-primary btn-s-xs">
				<i class="fa fa-arrow-left"></i> Kembali</a> &nbsp	<a href="<?php echo base_url('kepegawaian/admin/pegawaiedit?id='.$data['id_pegawai'].'') ?>" class="btn btn-default btn-s-xs">
				<i class="fa fa-edit"></i> Edit</a>
			
				<hr/>
				<div class="form-group">
						<label class="col-lg-4 control-label">NIP</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['nip']; ?> </p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Nama</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['nama']; ?> </p>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label">Tempat/Tanggal Lahir</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['tempat_lahir']; ?> /  <?php   if ($data['tanggal_lahir']=="0000-00-00") echo ""; else echo tanggal($data['tanggal_lahir']); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Jenis Kelamin</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['jk']; ?> </p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Agama</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['agama']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Status Perkawinan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['status']; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Golongan Darah</label>
						<div class="col-lg-8">
							<p class="form-control-static" > : <?php echo $data['goldar'] ?></p>
						</div>
					</div>
					<div class="form-group">
					<label class="col-lg-4 control-label">Alamat / Telepon</label>
						<div class="col-lg-8">
							<p class="form-control-static"> : <?php echo $data['alamat']?> / <?php echo $data['nohp'] ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Alamat Email</label>
						<div class="col-lg-8">
							<p class="form-control-static" > : <?php echo $data['email'] ?></p>
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Kepegawaian</label>
						<div class="col-lg-8">
							<p class="form-control-static" > : <?php if ($data['statuspegawai']!="") echo $data['statuspegawai']."Pemprov Kalimantan Selatan" ?> </p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Jabatan</label>
						<div class="col-lg-8">
							<p class="form-control-static" > : <?php echo $data['nama_jabatan'] ?>  <?php if ( $data['nama_subjabatan']!="") echo " / ".$data['nama_subjabatan'] ?> </p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Pangkat</label>
						<div class="col-lg-8">
							<p class="form-control-static" > : <?php echo $data['pangkat'] ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Pendidikan Terakhir</label>
						<div class="col-lg-8">
							<p class="form-control-static" > : <?php echo $data['pendidikan'] ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal Mulai Kerja</label>
						<div class="col-lg-8">
							<p class="form-control-static" > : <?php  if ($data['tmkerja']=="0000-00-00") echo "-"; else echo tanggal($data['tmkerja']); ?></p>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-4 control-label">Masa Kerja</label>
						<div class="col-lg-8">
							<p class="form-control-static" > : <?php
								if($data['tmkerja']!="0000-00-00") {

								$tanggal1 = new DateTime($data['tmkerja']); 
								$tanggal2 = new DateTime();
								$perbedaan = $tanggal2->diff($tanggal1);
								echo $perbedaan->y.' Tahun '.$perbedaan->m.' Bulan';
								}
							 ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">Dokumen Pegawai</label>
						<div class="col-lg-8">
							<p class="form-control-static" > : 
								<a href="<?php echo base_url('kepegawaian/admin/berkas') ?>" class="btn btn-primary btn-s-xs"><i class="fa fa-file"></i> Data</a>
							</p>
						</div>
					</div>
				
				</div>

				<div class="col-md-6">
					

					<div class="form-group">
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-8" style="padding-top:20px">
							<?php if ($data['foto']=='') { ?>
								<img src="<?php echo base_url()."assets/images/foto/"; ?>default.png" class="thumbnail" width="200px"/>
							<?php } else { ?>
								<img src="<?php echo base_url()."assets/images/foto/".$data['foto']; ?>" class="thumbnail" width="200px"/>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="panel-footer text-left bg-light lter">
		
		</footer>
	</form>
</div>
