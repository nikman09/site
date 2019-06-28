<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>kepegawaian">
			<i class="fa fa-user"></i>Kepegawaian</a>
	</li>
	<li class="active">
		<strong>CPNS</strong>
	</li>
</ol>

<h3>Berkas CPNS</h3>
<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-heading">
		<div class="panel-title">
		CPNS
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
				<div class="form-group">
						<label class="col-lg-4 control-label">Nomor SK CPNS</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['nomorsk']; ?> </p>
						</div>
					</div>
			
				<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal SK CPNS</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['tanggalsk']; ?> </p>
						</div>
					</div>
			
				<div class="form-group">
						<label class="col-lg-4 control-label">TMT CPNS</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['tmt']; ?> </p>
						</div>
					</div>
			
				<div class="form-group">
						<label class="col-lg-4 control-label">Golongan Awal</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['golonganawal']; ?> </p>
						</div>
					</div>
				
				<div class="form-group">
						<label class="col-lg-4 control-label">Tingkat Pendidikan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['tingkatpendidikan']; ?> </p>
						</div>
					</div>
			
				<div class="form-group">
						<label class="col-lg-4 control-label">Pejabat Pengesahan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['pejabatpengesahan']; ?> </p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-4 control-label">File SK CPNS</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php if ($data['berkas'] =="") echo "<a  class=\"btn btn-xs  btn-danger\" <i class=\"fa fa-file\" disabled></i> belum diupload "; else echo "<a href=\"".base_url()."assets/berkas/cpns/".$data['berkas']."\" class=\"btn btn-xs  btn-success\"> <i class=\"fa fa-file\"></i> Lihat"; ?> </a> </p>
						</div>
					</div>
				

				
			</div>
		</div>
		</div>
		<footer class="panel-footer text-left bg-light lter">
			<a href="<?php echo base_url('kepegawaian/cpnsedit?id='.$data['id_cpns'].'') ?>" class="btn btn-info btn-s-xs">
				<i class="fa fa-edit"></i> Edit</a>
			&nbsp
		</footer>
	</form>

