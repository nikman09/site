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
		<div class="col-md-8" style="border: 0px solid #000;border-radius:10px;">

		

		

		 <table style=" border-spacing: 10px;

    border-collapse: separate;">

	<tr>

				<td width="150px" valign="top">

				Nama Produk 

				</td>

				<td  valign="top">

				   : 

				</td>

				<td  valign="top">

				<strong><?php echo  $data['produk'] ?></strong>

				</td>

			</tr>

			<tr>

				<td width="150px" valign="top">

				Kode Produk

				</td>

				<td  valign="top">

				   : 

				</td>

				<td  valign="top">

				<strong><?php echo  $data['kode'] ?></strong>

				</td>

			</tr>

			<tr>

				<td>

				Jenis

				</td>

				<td>

				   : 

				</td>

				<td>

				   <?php echo  $data['jenis'] ?>

				</td>

			</tr>

			<tr>

				<td>

				Spesifikasi Panjang

				</td>

				<td>

				   : 

				</td>

				<td>

				<?php echo  $data['panjang'] ?>

				</td>

			</tr>

			<tr>

				<td>

				Spesifikasi Lebar

				</td>

				<td>

				   : 

				</td>

				<td>

				<?php echo  $data['lebar'] ?>

				</td>

			</tr>

			<tr>

				<td>

				Spesifikasi Tinggi

				</td>

				<td>

				   : 

				</td>

				<td>

				   <?php

				   	 echo $data['tinggi']; 

				   ?>

				</td>

			</tr>

			<tr>

				<td>

				Spesifikasi Berat

				</td>

				<td>

				   : 

				</td>

				<td>
					<?php echo $data['berat']; ?>
				</td>

			</tr>
			<tr>
				<td>
				Keterangan Isi
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['isi']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Informasi Lainnya
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['lainnya']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Harga Jual Produk
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['harga']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Nilai Penjualan
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['nilai']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Bahan
				</td>
				<td>
				   : 
				</td>
				<td>
					<?php echo $data['bahan']; ?>
				</td>
			</tr>
			<tr>
				<td>
				Wilayah Pemasaran
				</td>
				<td>
				   : 
				</td>
				<td>
				<?php 
		
					foreach($pemasaran->result_array() as $row){
					
						echo "- ".$row['pemasaran']." </br> ";

					}
					?>
				</td>
			</tr>
		
		

		 </table>

	

	</div>

	<div class="col-md-4" style="border: 0px solid #000;border-radius:10px;">
	<?php  if ($data['gambar']!="") {

		echo "<a href='".base_url()."assets/images/pelatihan/perusahaan/produk/".$data['gambar']."'  id='".$data['id']."'target='_blank' ><img  class='thumbnail' src='".base_url()."assets/images/pelatihan/perusahaan/produk/".$data['gambar']."' width='300px'></a>";

		} else {

		//  echo "<a href='#' class='btn btn-default btn-xs' disabled> <i class='fa fa-file'></li></a>";    
		echo "<img  class='thumbnail' src='".base_url()."assets/images/not-available.png' width='150px'>";

		}
		?>
		


		

	

	</div>

	<div class="row">

					<div class="col-md-12">
					<a href="<?php echo base_url("simanis/produk?id=".$data['perusahaan_id']."") ?>" class="btn btn-default  btn-icon icon-left  daftar" style="float:right"><i class='fa fa-arrow-left'></i>Kembali</a>
						
						<br/>
						<br/>
							</form>

					</div>

</div>

</div>


