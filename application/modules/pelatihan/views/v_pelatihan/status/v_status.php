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
		<div class="col-md-12" style="border: 0px solid #000;border-radius:10px;">
		
		<h3 align="center">Status Pendaftaran Pelatihan</h3>
		 <table style=" border-spacing: 10px;
    border-collapse: separate;">
	<tr>
				<td width="150px" valign="top">
				  Nomor Pendaftaran
				</td>
				<td  valign="top">
				   : 
				</td>
				<td  valign="top">
				<strong><?php echo  $data['nodaf'] ?></strong>
				</td>
			</tr>
			<tr>
				<td width="150px" valign="top">
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
			<tr>
				<td>
				  Syarat
				</td>
				<td>
				   : 
				</td>
				<td>
					<a href="#" id="<?= $data['id_pelatihan'] ?>"  class="btn btn-primary btn-icon icon-left syarat" data-toggle="modal"   data-target="#myModal2"><i class="fa fa-list"></i>Persyaratan  &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</a>
				</td>
			</tr>
		 </table>
		 <hr/>
		 	<h4  style="padding:10px">Status</h4>
			 <table style=" border-spacing: 10px;
    border-collapse: separate;">
			<tr>
				<td width="150px"  valign="top">
				  Biodata
				</td>
				
				<td  valign="top">
				   : 
				</td>
				<td  valign="top">
				<a href="<?php base_url() ?>biodata" class="btn <?=$persen<100?"btn-primary":"btn-primary" ?> btn-icon icon-left" ><i class="fa fa-user"></i>Pengisian Biodata  &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</a>
				<br/>	<span style="color:#ba0c00;font-size:11px"><?=$persen<100?"Belum Lengkap":"" ?></span>
				</td>
			</tr>
			<tr>
				<td width="150px"  valign="top">
				  Data Usaha
				</td>
				
				<td  valign="top">
				   : 
				</td>
				<td  valign="top">
				<a href="<?php base_url() ?>datausaha" class="btn <?=$persenusaha<100?"btn-primary":"btn-primary" ?> btn-icon icon-left" ><i class="fa fa-shopping-cart"></i>Pengisian Data Usaha  &nbsp&nbsp &nbsp&nbsp</a>
				<br/>	<span style="<?=$persenusaha<100?"color:#ba0c00;":"color:#000;" ?>font-size:11px"><?=$persenusaha<100?"Belum Lengkap (Untuk Kategori Pelaku Industri Harus Melengkapi Data Usaha)":"*Untuk Kategori Pelaku Industri Harus Melengkapi Data Usaha" ?></span>
				</td>
			</tr>
			<tr>
				<td width="150px"  valign="top">
				  Data Pendukung
				</td>
				
				<td  valign="top">
				   : 
				</td>
				<td  valign="top">
				<a href="<?php base_url() ?>pelatihan/pendukung" class="btn btn-primary btn-icon icon-left" ><i class="fa fa-upload"></i>Upload Data Pendukung </a>
				<br/>	
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

			<?php
				 if ($data["status"]=="Tidak Lulus Seleksi"){
			?>
			<tr>
				<td>
				  Keterangan
				</td>
				<td>
				   : 
				</td>
				<td>
				   <?php
				   	 echo $data['keterangan']; 
				   ?>
				</td>
			</tr>
			<?php
				} else if ($data["status"]=="Lulus Seleksi") {
			?>
			<tr>
				<td>
				  Kartu Pendaftaran
				</td>
				<td>
				   : 
				</td>
				<td>
				<a href="<?php echo base_url(); ?>pelatihan/cetak" target="_blank" class="btn btn-info btn-icon icon-left" ><i class="fa fa-print"></i>Cetak Kartu &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp</a>

				</td>
			</tr>
			
			<!-- <tr> 
				<td>
				  Konfirmasi Kehadiran
				</td>
				<td>
				   : 
				</td>
				<td>
				   <?php
				   	 echo $data['konfirmasi']; 
				   ?> 
				</td>
			</tr>
			<tr>
				<td>
				
				</td>
				<td>
				   
				</td>
				<td>  
				<?php 
					if ($data['konfirmasi']=="Belum Konfirmasi") {

				?>
				    	<a href="#" class="btn btn-default btn-icon icon-left" data-toggle="modal"   data-target="#myModal" ><i class="fa fa-check"></i>Konfirmasi</a>

					<?php 
				}
					?>
				</td>-->
			</tr>
			<?php 
				}
			?>
		 </table>
			<p align="right">
			<!-- <a href="<?php base_url() ?>pelatihan/informasi" class="btn btn-default btn-icon icon-left" style="margin:10px;margin-right:0px"><i class="fa fa-times"></i>Batal</a> -->
			</p>
	</div>
</div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-tambah">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Konfirmasi Kehadiran</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>pelatihan/status" method="post" id="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<input type="hidden" name="id_pelatihandaftar" value="<?=$data['id_pelatihandaftar']?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Konfirmasi Konfirmasi</label>
                                <select type="text" class="form-control" id="konfirmasi" name="konfirmasi" placeholder="Kategori Berita">
									<option value="">.:Pilih Konfirmasi:.</option>
									<option value="Hadir">Hadir</option>
									<option value="Tidak Bisa Hadir">Tidak Bisa Hadir</option>
								</select>
                            </div>
							<div class="form-group">
                                <label for="field-1" class="control-label">Alasan (*Jika tidak bisa berhadir)</label>
                                <textarea class="form-control" id="alasan" name="alasan" placeholder="Masukkan Alasan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-edit">
          
         
        </div>
    </div>
</div>