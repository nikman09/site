<div class="container">
	<div class="row">
		<div class="col-md-12">
			<hr class="no-top-margin" />
		</div>
	</div>	
</div>
<div class="container">
	<div class="row vspace">
		<div class="col-md-12">
		<h3 align="center">Pendaftaran <?= $data['nama'] ?></h3>
		 <table style=" border-spacing: 10px;
    border-collapse: separate;">
			<tr>
				<td width="120px">
				  Nama Pelatihan
				</td>
				<td>
				   : 
				</td>
				<td>
				   <?php echo  $data['nama'] ?>
				</td>
			</tr>
			<tr>
				<td>
				  Kategori
				</td>
				<td>
				   : 
				</td>
				<td>
				   <?php echo  $data['kategori'] ?>
				</td>
			</tr>
			<tr>
				<td>
				 Waktu Pendaftaran
				</td>
				<td>
				   : 
				</td>
				<td>
				   <?php
				   	 echo tgl_indo($data['mulaipendaftaran'])." s.d ".tgl_indo($data['akhirpendaftaran']).""; 
				   ?>
				</td>
			</tr>
			<tr>
				<td>
				  Waktu Pelatihan
				</td>
				<td>
				   : 
				</td>
				<td>
				   <?php
				   	 echo tgl_indo($data['mulaipelatihan'])." s.d ".tgl_indo($data['akhirpelatihan']).""; 
				   ?>
				</td>
			</tr>
			<tr>
				<td>
				  Tempat Pelatihan
				</td>
				<td>
				   : 
				</td>
				<td>
				   <?php
				   	 echo $data['tempat']; 
				   ?>
				</td>
			</tr>
		 </table>
		 <hr/>
		 	<h4  style="padding:10px">Persyaratan</h4>
			<p style="padding:10px">
			<?= $data['persyaratan'] ?>
			</p>
			<p align="right">
			<a href="<?php base_url() ?>pelatihan/informasi" class="btn btn-default btn-icon icon-left" style="margin:10px;margin-right:0px"><i class="fa fa-times"></i>Batal</a>
			<a href="<?php echo base_url() ?>pelatihan/pelatihandaftar?i=<?= $data['id_pelatihan'] ?>" class="btn btn-primary btn-icon icon-left" style="margin:10px;"><i class="fa fa-list"></i>Daftar </a> &nbsp
			</p>
	</div>
</div>
</div>

