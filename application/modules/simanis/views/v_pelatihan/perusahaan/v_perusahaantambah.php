

<div class="container">

	<div class="row">

		<div class="col-md-12">

			<hr class="no-top-margin" />

		</div>

	</div>	

</div>



<div class="container">

	<div class="row vspace" style="margin:5px;">

		<div class="col-md-12">

		<form id="form" role="form"  action="<?php echo base_url() ?>simanis/tambahperusahaan" method="post"  enctype="multipart/form-data" >

		

                    <div class="row">

		<div class="row">

					<div class="col-md-12">

					<?php pesan_get2('msg',"Berhasil Menyimpan Data Usaha !") ?>

						<h3>Data Usaha / Perusahaan</h3>

						<hr/>

						

					</div>

					</div>

					<div class="row">

					



						<div class="col-md-6">	
								
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">

								
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Usaha / Perusahaan *</label>
									<input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Masukkan Nama Usaha / Perusahaan"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">NPWP Perusahaan </label>
									<input type="text" class="form-control" id="npwp" name="npwp" placeholder="Masukkan NPWP"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Nomor Daftar Industri </label>
									<input type="text" class="form-control" id="ndi" name="ndi" placeholder=" Masukkan Nomor Daftar Industri"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Bentuk Badan Usaha * </label>
									<select class="form-control select3" name="badan_id" id="badan_id" >
										<option value=""  selected>.:Pilih Bentuk Badan usaha:.</option>
										<?php
											foreach($masterbadan->result_array() as $row) {
												echo "<option value='".$row['id']."' >".$row['badan']."</option>";

											}
										?>
									</select>
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Pemilik * </label>
									<input type="text" class="form-control" id="pemilik" name="pemilik" placeholder=" Masukkan Nama Pemilik"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Alamat * </label>
									<input type="text" class="form-control" id="alamat" name="alamat" placeholder=" Masukkan Nama Jalan, Nomor, RT/RW"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Kabupaten/Kota * </label>
									<select class="form-control select3" name="kota_id" id="kota_id" >
										<option value=""  selected>.:Pilih Kabupaten/Kota:.</option>
										<?php
											foreach($masterkota->result_array() as $row) {
												echo "<option value='".$row['id']."' >".$row['kota']."</option>";

											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Kecamatan * </label>
									<select class="form-control select3" name="kecamatan_id" id="kecamatan_id" placeholder="asd"  >
									<option value="" selected>.:Pilih Kecamatan:.</option>
									</select>
								</div>	

								<div class="form-group">
									<label for="field-1" class="control-label">Kelurahan * </label>
									<select class="form-control select3" name="kelurahan_id" id="kelurahan_id" >
									<option value=""  selected>.:Pilih Kelurahan:.</option>
									</select>
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Kodepos</label>
									<input type="text" class="form-control nilai" id="kodepos" name="kodepos" placeholder="Masukkan Kodepos"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Telepon</label>
									<input type="text" class="form-control nilai" id="telpon" name="telpon" placeholder="Masukkan Nomor Telepon (ex. 0811777777)"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Fax</label>
									<input type="text" class="form-control nilai" id="fax" name="fax" placeholder="Masukkan Nomor Fax (ex. 0811777777)"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Email</label>
									<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email "  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Website</label>
									<input type="text" class="form-control" id="website" name="website" placeholder="Masukkan Website"  value="">
								</div>	
									
						</div>

						

						<div class="col-md-6">
							<div class="form-group">
									<label for="field-1" class="control-label">Izin Usaha Industri *</label>
									<select class="form-control select3" name="izin_id" id="izin_id" >
										<option value="" selected >.:Pilih Izin Usaha Industri:.</option>
										
										<?php
											foreach($masterizin->result_array() as $row) {
												echo "<option value='".$row['id']."' >".$row['izin']."</option>";

											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">KBLI *</label>
									<select class="form-control select3" name="kbli_id" id="kbli_id" >
										<option value="" selected>.:Pilih KBLI:.</option>
										<?php
											foreach($masterkbli->result_array() as $row) {
												echo "<option value='".$row['id']."' >".$row['kode']."-".$row['kbli']."</option>";

											}
										?>
									</select>
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label ">Komoditi *</label>
									<select class="form-control select3" name="komoditi_id" id="komoditi_id" > 
										<option value=""  selected>.:Pilih Komoditi:.</option>
										<?php
											foreach($masterkomoditi->result_array() as $row) {
												echo "<option value='".$row['id']."' >".$row['komoditi']."</option>";

											}
										?>
									</select>
								</div>		
								<div class="form-group">
									<label for="field-1" class="control-label"> Produk *</label>
									<select class="form-control select3" name="produk_id[]" id="produk_id" multiple="multiple" placeholder="Pilih Produk">
										
										<?php
											foreach($masterproduk->result_array() as $row) {
												echo "<option value='".$row['id']."' >".$row['produk']."</option>";

											}
										?>
									</select>
								</div>	
							<div class="form-group">
									<label for="field-1" class="control-label">Latitude</label>
									<input type="text" class="form-control" id="latitude" name="latitude" placeholder="Masukkan Koordinat Latitude"  value="">
								</div>		
								<div class="form-group">
									<label for="field-1" class="control-label">Longitude</label>
									<input type="text" class="form-control" id="longitude" name="longitude" placeholder="Masukkan Koordinat longitude"  value="">
								</div>		
								<div class="form-group">
									<label for="field-1" class="control-label">Whatsapp</label>
									<input type="text" class="form-control nilai" id="wa" name="wa" placeholder="Masukkan Nomor Whatsapp"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Facebook</label>
									<input type="text" class="form-control" id="fb" name="fb" placeholder="Masukkan ID Facebook"  value="">
								</div>			
								<div class="form-group">
									<label for="field-1" class="control-label">Instagram</label>
									<input type="text" class="form-control" id="ig" name="ig" placeholder="Masukkan Instagram"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Tokopedia</label>
									<input type="text" class="form-control" id="tokped" name="tokped" placeholder="Masukkan ID Tokopedia"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Bukalapak</label>
									<input type="text" class="form-control" id="bukalapak" name="bukalapak" placeholder="Masukkan ID Bukalapak"  value="">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Shopee</label>
									<input type="text" class="form-control" id="shopee" name="shopee" placeholder="Masukkan ID Shopee"  value="">
								</div>	
							
								<div class="form-group">

									<label for="field-1" class="control-label">Upload Dokumen Legalitas Perusahaan</label>
									<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
									<div class="input-group">
										<div class="form-control uneditable-input" data-trigger="fileinput">
											<i class="glyphicon glyphicon-file fileinput-exists"></i>
											<span class="fileinput-filename"><?php echo set_value('legalitas') ?></span>
										</div>
										<span class="input-group-addon btn btn-default btn-file">

											<span class="fileinput-new">Select file</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" name="legalitas" >

										</span>

										<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>

									</div>

									</div>

									<div class="form-group">

									<label for="field-1" class="control-label">Upload Gambar Tempat Usaha</label>
									<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
									<div class="input-group">
										<div class="form-control uneditable-input" data-trigger="fileinput">
											<i class="glyphicon glyphicon-file fileinput-exists"></i>
											<span class="fileinput-filename"><?php echo set_value('gambar') ?></span>
										</div>
										<span class="input-group-addon btn btn-default btn-file">

											<span class="fileinput-new">Select file</span>
											<span class="fileinput-exists">Change</span>
											<input type="file" name="gambar" >

										</span>

										<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>

									</div>
												<br/>
												<br/>
												<br/>
									</div>

						</div>

						


                    </div>



					<div class="row">

					<div class="col-md-12">

						<button type="submit" class="btn btn-primary  btn-icon icon-left  daftar" style="float:right"><i class='fa fa-save'></i>Simpan</button>

						<br/>
						<br/>
							</form>

					</div>

		</div>

	</div>

</div>

</div>

</div>


</div>


</div>



