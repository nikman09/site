<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>kepegawaian">
			<i class="fa fa-user"></i>Kepegawaian</a>
	</li>
	<li class="active">
		<strong>PNS</strong>
	</li>
</ol>

<h3>Berkas PNS</h3>
<div class="panel panel-primary" data-collapsed="0">
	<div class="panel-heading">
		<div class="panel-title">
		PNS
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
						<label class="col-lg-4 control-label">Nomor SK PNS</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['skpns']; ?> </p>
						</div>
					</div>
			
				<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal SK PNS</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['tglskpns']; ?> </p>
						</div>
					</div>
			
				<div class="form-group">
						<label class="col-lg-4 control-label">TMT PNS</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['tmtpns']; ?> </p>
						</div>
					</div>
			
				<div class="form-group">
						<label class="col-lg-4 control-label">Golongan Awal</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['golongan']; ?> </p>
						</div>
					</div>
				
				<div class="form-group">
						<label class="col-lg-4 control-label">Pejabat Pengesahan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['pejabatpengesahan']; ?> </p>
						</div>
					</div>
			
				
					<div class="form-group">
						<label class="col-lg-4 control-label">File SK PNS</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php if ($data['berkas'] =="") echo "<a  class=\"btn btn-xs  btn-danger\" <i class=\"fa fa-file\" disabled></i> belum diupload "; else echo "<a href=\"".base_url()."assets/berkas/pns/".$data['berkas']."\" class=\"btn btn-xs  btn-success\"> <i class=\"fa fa-file\"></i> Lihat"; ?> </a> </p>
						</div>
					</div>
				

				
			</div>
		</div>
		</div>
		<footer class="panel-footer text-left bg-light lter">
			<a href="<?php echo base_url('kepegawaian/pnsedit?id='.$data['id_pns'].'') ?>" class="btn btn-info btn-s-xs">
				<i class="fa fa-edit"></i> Edit</a>
			&nbsp
		</footer>
	</form>

