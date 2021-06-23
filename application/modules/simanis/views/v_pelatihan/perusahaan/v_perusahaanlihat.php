<div class="container">

	<div class="row">

		<div class="col-md-12">

			<hr class="no-top-margin" />

		</div>

	</div>	

</div>



<div class="container">



	<div class="row vspace" style="padding:10px">

	<?php pesan_get2('msg',"Berhasil Melakukan Pendaftaran Pelatihan !","Berhasil Melakukan Konfirmasi Kehadiran !") ?>
	<h3 align="center">Data Usaha / Perusahaan</h3>
		<div class="col-md-6" style="border: 0px solid #000;border-radius:10px;">

		

		

		 <table style=" border-spacing: 10px;

    border-collapse: separate;">

	<tr>

				<td width="150px" valign="top">

				 Perusahaan 

				</td>

				<td  valign="top">

				   : 

				</td>

				<td  valign="top">

				<strong><?php echo  $data['perusahaan'] ?></strong>

				</td>

			</tr>

			<tr>

				<td width="150px" valign="top">

				NPWP Perusahaan

				</td>

				<td  valign="top">

				   : 

				</td>

				<td  valign="top">

				<strong><?php echo  $data['npwp'] ?></strong>

				</td>

			</tr>

			<tr>

				<td>

				Nomor Daftar Industri 

				</td>

				<td>

				   : 

				</td>

				<td>

				   <?php echo  $data['ndi'] ?>

				</td>

			</tr>

			<tr>

				<td>

				Bentuk Badan Usaha

				</td>

				<td>

				   : 

				</td>

				<td>

				<?php echo  $data['ndi'] ?>

				</td>

			</tr>

			<tr>

				<td>

				Nama Pemilik

				</td>

				<td>

				   : 

				</td>

				<td>

				<?php echo  $data['pemilik'] ?>

				</td>

			</tr>

			<tr>

				<td>

				Alamat

				</td>

				<td>

				   : 

				</td>

				<td>

				   <?php

				   	 echo $data['alamat']; 

				   ?>

				</td>

			</tr>

			<tr>

				<td>

				Kabupaten/Kota

				</td>

				<td>

				   : 

				</td>

				<td>
					<?php echo $data['kota']; ?>
				</td>

			</tr>
			<tr>
				<td>
				Kecamatan
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['kecamatan']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Kelurahan
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['kelurahan']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Kodepos
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['kodepos']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Telepon
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['telpon']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Fax
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['fax']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Email
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['email']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Website
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['website']; ?>
				</td>
			</tr>
		

		 </table>

	

	</div>

	<div class="col-md-6" style="border: 0px solid #000;border-radius:10px;">

		

	<table style=" border-spacing: 10px;

border-collapse: separate;">

	
		<tr>
			<td width="150px">
			IUI
			</td>
			<td>
			   : 
			</td>
			<td>
				<?php echo $data['izin']; ?>
			</td>
		</tr>
		<tr>
			<td>
			KBLI
			</td>
			<td>
			   : 
			</td>
			<td>
				<?php echo $data['kbli']; ?>
			</td>
		</tr>
		<tr>
			<td>
			Komoditi
			</td>
			<td>
			   : 
			</td>
			<td>
				<?php echo $data['komoditi']; ?>
			</td>
		</tr>
		<tr>
			<td>
			Produk
			</td>
			<td>
			   : 
			</td>
			<td>
			 <?php 
		
			 foreach($produk->result_array() as $row){
				
				 echo "- ".$row['produk']." </br> ";

			 }
						 ?>

			</td>
		</tr>
		<tr>
			<td>
			Latitude
			</td>
			<td>
			   : 
			</td>
			<td>
				<?php echo $data['latitude']; ?>
			</td>
		</tr>
		<tr>
			<td>
			Longitude
			</td>
			<td>
			   : 
			</td>
			<td>
				<?php echo $data['longitude']; ?>
			</td>
		</tr>
		<tr>
			<td>
			Whatsapp
			</td>
			<td>
			   : 
			</td>
			<td>
				<?php echo $data['wa']; ?>
			</td>
		</tr>
		<tr>
			<td>
			Facebook
			</td>
			<td>
			   : 
			</td>
			<td>
				<?php echo $data['fb']; ?>
			</td>
		</tr>
		<tr>
			<td>
			Tokopedia
			</td>
			<td>
			   : 
			</td>
			<td>
				<?php echo $data['tokped']; ?>
			</td>
		</tr>
		<tr>
			<td>
			Bukalapak
			</td>
			<td>
			   : 
			</td>
			<td>
				<?php echo $data['bukalapak']; ?>
			</td>
		</tr>
		<tr>
			<td>
			Shopee
			</td>
			<td>
			   : 
			</td>
			<td>
				<?php echo $data['shopee']; ?>
			</td>
		</tr>
		
		<tr>
			<td>
			Gambar Usaha
			</td>
			<td>
			   : 
			</td>
			<td>
				<a href="http://siikalsel.disperin.kalselprov.go.id/uploads/<?php echo $data['gambar']; ?>" class="btn btn-default btn-icon icon-left"><i class="fa fa-eye"></i> Lihat</a>
			</td>
		</tr>
		<tr>
			<td>
			Legalitas
			</td>
			<td>
			   : 
			</td>
			<td>
			<a href="http://siikalsel.disperin.kalselprov.go.id/uploads/<?php echo $data['legalitas']; ?>" class="btn btn-default btn-icon icon-left"><i class="fa fa-eye"></i> Lihat</a>
			</td>
		</tr>

	 </table>
		

		

	

	</div>
	<div class="row">

<div class="col-md-12">
<br/>
	<br/>	
	<br/>
	<br/>					
<a href="<?php echo base_url("simanis/perusahaan") ?>" class="btn btn-default  btn-icon icon-left  daftar" style="float:right"><i class='fa fa-arrow-left'></i>Kembali</a>
	

		</form>

</div>

</div>
</div>

</div>




