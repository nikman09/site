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

		<form id="form" role="form"  action="<?php echo base_url() ?>simanis/datausaha" method="post"  enctype="multipart/form-data" >

		

                    <div class="row">

		<div class="row">

					<div class="col-md-12">

					<?php pesan_get2('msg',"Berhasil Menyimpan Data Usaha !") ?>

						<h3>Data Usaha / Perusahaan</h3>

						<hr/>

						

					</div>

					</div>

					<div class="row">

					



						<div class="col-md-4"v>	

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
									<select class="form-control" name="badan_id" id="badan_id" >
										<option value="" disabled>.:Pilih Bentuk Badan usaha:.</option>
										<?php
											foreach($masterbadan->result_array() as $row) {
												echo "<option value='".$row['id']."' >".$row['badan']."</option>";

											}
										?>
									</select>
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Pemilik * </label>
									<input type="text" class="form-control" id="pemilik" name="pemilik" placeholder=" Masukkan nama Pemilik"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Alamat * </label>
									<input type="text" class="form-control" id="alamat" name="alamat" placeholder=" Masukkan Nama Jalan, Nomor, RT/RW"  value="">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Kabupaten/Kota * </label>
									<select class="form-control" name="kota_id" id="kota_id" >
										<option value="" disabled>.:Pilih Kabupaten/Kota:.</option>
										<?php
											foreach($masterkota->result_array() as $row) {
												echo "<option value='".$row['id']."' >".$row['kota']."</option>";

											}
										?>
									</select>
								</div>	

						</div>

						

						<div class="col-md-4">

						</div>

						<div class="col-md-3">

				
							

						</div>



                    </div>



					<div class="row">

					<div class="col-md-12">

						<button type="submit" class="btn btn-primary  btn-icon icon-left  daftar" style="float:right"><i class='fa fa-save'></i>Simpan</button>

							</form>

					</div>

		</div>

	</div>

</div>

</div>

