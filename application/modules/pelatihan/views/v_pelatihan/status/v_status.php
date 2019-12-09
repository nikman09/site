<div class="container">
	<div class="row">
		<div class="col-md-12">
			<hr class="no-top-margin" />
		</div>
	</div>	
</div>

<div class="container">

	<div class="row vspace" style="padding:10px">
	<?php pesan_get2('msg',"Berhasil Melakukan Pendaftaran Pelatihan !","Gagal Melakukan Pendaftaran, Hanya Bisa Melakukan Satu Kali Pendaftaran Pelatihan Hingga Seleksi Pendaftaran Selesai !") ?>
		<div class="col-md-12" style="border: 1px solid #000;border-radius:10px;">
		
		<h3 align="center">Status Pendaftaran Pelatihan</h3>
		 <table style=" border-spacing: 10px;
    border-collapse: separate;">
			<tr>
				<td width="120px" valign="top">
				  Nama Pelatihan
				</td>
				<td  valign="top">
				   : 
				</td>
				<td  valign="top">
				<strong><?php echo  $data['nama'] ?></strong>
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
		 	<h4  style="padding:10px">Status</h4>
			 <table style=" border-spacing: 10px;
    border-collapse: separate;">
			<tr>
				<td width="120px"  valign="top">
				  Biodata
				</td>
				<td  valign="top">
				   : 
				</td>
				<td  valign="top">
				<a href="<?php base_url() ?>pelatihan/biodata" class="btn btn-info btn-icon icon-left" ><i class="fa fa-user"></i>Isi Biodata</a>
				<br/>	<span>Belum Lengkap </span>
				</td>
			</tr>
			<tr>
				<td  valign="top">
				  Berkas
				</td>
				<td  valign="top">
				   : 
				</td>
				<td  valign="top">
					<a href="<?php base_url() ?>pelatihan/biodata" class="btn btn-info btn-icon icon-left" ><i class="fa fa-file"></i>Upload Berkas</a>
					<br/><span>Berkas Belum Lengkap</span>
				</td>
			</tr>
			
			<tr>
				<td>
				  Status Pendaftaran
				</td>
				<td>
				   : 
				</td>
				<td>
				<span style="color:#e61305;font-size:16px">
				  <strong> <?php
				   	 echo $data['status']; 
				   ?>
				   </strong>
				   <span>
				</td>
			</tr>
		
		 </table>
			<p align="right">
			<a href="<?php base_url() ?>pelatihan/informasi" class="btn btn-default btn-icon icon-left" style="margin:10px;margin-right:0px"><i class="fa fa-times"></i>Batal</a>
			<a href="<?php echo base_url() ?>pelatihan/pelatihandaftar?i=<?= $data['id_pelatihan'] ?>" class="btn btn-primary btn-icon icon-left" style="margin:10px;"><i class="fa fa-list"></i>Daftar </a> &nbsp
			</p>
	</div>
</div>
</div>

