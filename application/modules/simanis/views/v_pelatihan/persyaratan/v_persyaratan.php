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
				<td width="160px">
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
                    Tanggal Pendaftaran
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
                    Tanggal Pengumuman Seleksi
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo $data['pengumuman']; 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Tanggal Pelatihan
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
                <tr>
                    <td>
                    Kuota Peserta
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo $data['kuota']; 
                    ?>
                    </td>
                </tr>
			<tr>
				<td>
				  Contact Person
				</td>
				<td>
				   : 
				</td>
				<td>
				   <?php
				   	 echo $data['cp']; 
				   ?>
				</td>
			</tr>
			
					 <?php 
					 	if  ($data['file']!="") {
					 ?>
						 <tr>
							<td>
							Lampiran
							</td>
							<td>
							: 
							</td>
							<td>
						<a href="<?php echo base_url() ?>assets/images/pelatihan/lampiran/<?php echo $data['file'] ?>" target="_blank"><i class="fa fa-download"></i> unduh </a>
						
								</td>
							</tr>
					 <?php 
						 }
				     ?>

		 </table>
		 <hr/>
		 	<h4  style="padding:10px">Persyaratan</h4>
			<div style="padding:10px">
			<?= $data['persyaratan'] ?>
			<br/>
			<p style="color:#a10000">
						 * Setelah melakukan pendaftaran pelatihan maka tidak akan bisa mendaftar pelatihan yang lain  sampai pendaftaran pelatihan yang didaftar sudah selesai atau dinyatakan tidak lulus seleksi. <br/>
						 * dengan melakukan pendaftaran maka peserta menyetujui  ketentuan dan persyaratan seleksi pendaftaran pelatihan.
			</p>
			</div>
		
<!-- 		
			<input type="checkbox" value="setuju"/> Setuju dengan Persyaratan dan Ketentuan yang berlaku -->
			<p align="right">
			
			<a href="<?php base_url() ?>pelatihan/informasi" class="btn btn-default btn-icon icon-left" style="margin:10px;margin-right:0px"><i class="fa fa-times"></i>Batal</a>
			<a href="<?php echo base_url() ?>simanis/pelatihandaftar?i=<?= $data['id_pelatihan'] ?>" class="btn btn-primary btn-icon icon-left" style="margin:10px;"><i class="fa fa-list"></i>Daftar </a> &nbsp
			</p>
	</div>
</div>
</div>



