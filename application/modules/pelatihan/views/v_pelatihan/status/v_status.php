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
		<div class="col-md-12" style="border: 0px solid #000;border-radius:10px;">
		
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
				<a href="<?php base_url() ?>pelatihan/biodata" class="btn <?=$persen<100?"btn-danger":"btn-success" ?> btn-icon icon-left" ><i class="fa fa-user"></i>Pengisian Biodata &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
				<br/>	<span style="color:#ba0c00;font-size:10px"><?=$persen<100?"Belum Lengkap":"" ?></span>
				</td>
			</tr>
			<!-- <tr>
				<td  valign="top">
				  Berkas
				</td>
				<td  valign="top">
				   : 
				</td>
				<td  valign="top">
					<a href="<?php base_url() ?>pelatihan/biodata" class="btn btn-success	 btn-icon icon-left" ><i class="fa fa-file-o"></i>Upload Dokumen Pendukung</a>
				</td>
			</tr>
			 -->
			<tr>
				<td>
				  Status Pendaftaran
				</td>
				<td>
				   : 
				</td>
				<td>
				<span style="font-size:16px">
				  <strong> <?php
						if ($data["status"]=="Menunggu Hasil Seleksi") {
							echo "<span style='color:#076767'>".$data["status"]."</span>";
						} else if ($data["status"]=="Tidak Lulus Seleksi"){
							echo "<span style='color:#e61305'>".$data["status"]."</span>";
						} else if ($data["status"]=="Lulus Seleksi") {
							echo "<span style='color:#007203'>".$data["status"]."</span>";
						}
				   ?>
				   </strong>
				   <span>
				</td>
			</tr>
		
		 </table>
			<p align="right">
			<!-- <a href="<?php base_url() ?>pelatihan/informasi" class="btn btn-default btn-icon icon-left" style="margin:10px;margin-right:0px"><i class="fa fa-times"></i>Batal</a> -->
		  
			</p>

			
	</div>
</div>
</div>

