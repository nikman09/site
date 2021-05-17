<section class="contact-map" id="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d26790.55185829955!2d114.81488961738617!3d-3.4851830830792414!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de686bc23e3a1bd%3A0x8c8a39bcb8ef553a!2sDinas%20Perindustrian%20Prov%20Kalsel!5e0!3m2!1sid!2sid!4v1576471520195!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>


<div class="container">
	<div class="row vspace">
		<div class="col-md-12">
		<h3 align="center">Daftar Kontak Pelatihan</h3>
		<table class="table  datable" id="table-1" style="font-size:12px;width:100%" >
		<thead>
			<tr>

				<th>Pelatihan</th>
			
				<th>Kontak</th>
			</tr>
		</thead>
		<tbody>
		
			<?php
				foreach($data->result_array() as $row){
					echo "
						<tr>
							<td>".$row['nama']."</td>
							<td>".$row['cp']."</td>
						</tr>";
				}
				?>
		</tbody>
	</table>
	</div>
</div>
</div>
<section class="contact-container" style="margin-top:0px">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-7 sep">
			<?php pesan_get2('msg',"Berhasil Mengirim Pesan","Berhasil Mengirim Pesan","Berhasil Menghapus Berita") ?>
								
				<h4>Kirim Pesan </h4>
				
				
				<form id="form" class="validate" action="<?php echo base_url() ?>simanis/kontak" method="POST">
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
					
					<div class="form-group">
						<input type="text" name="nama" name="nama"  class="form-control" placeholder="Masukkan Nama" />
					</div>
					
					<div class="form-group">
						<input type="text" name="email" id="email"  class="form-control" placeholder="Masukkan E-mail" />
					</div>
					<div class="form-group">
						<input type="text" name="judul" name="judul"  class="form-control" placeholder="Masukkan Judul" />
					</div>
					<div class="form-group">
						<textarea class="form-control" id="pesan"  name="pesan" placeholder="Masukkan Pesan" rows="6"></textarea>
					</div>
					
					<div class="form-group text-right">
						<button class="btn btn-primary" name="send">Kirim</button>
					</div>
					
				</form>
				
			</div>
			
			<div class="col-sm-offset-1 col-sm-4">
				
				<div class="info-entry">
					
					<h4>Alamat</h4>
					
					<p>
					Jl. Dharma Praja  <br /> 
					Komplek Perkantoran Provinsi Kalimantan Selatan  <br />
					Banjarbaru.
						
						<br />
						<br />
						
						
					</p>
					
				</div>
				
				<div class="info-entry">
					
					<h4>Kontak</h4>
					
					<p>
						Phone: (0511) 5915906<br />
						disperin.kalselprov@gmail.com
					</p>
					
					<!-- <ul class="social-networks">
						<li>
							<a href="#">
								<i class="entypo-instagram"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="entypo-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="entypo-facebook"></i>
							</a>
						</li>
					</ul> -->
				
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</section>	


