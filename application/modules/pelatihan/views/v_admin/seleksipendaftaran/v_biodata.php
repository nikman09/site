<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Lihat Biodata</h4>
            </div>
            <form role="form" class="validate" id="form2">

                <div class="modal-body">
            	<form id="form" role="form" class="validate"  action="<?php echo base_url() ?>pelatihan/biodata" method="post"  enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-6">
                    <h4>Data Diri</h4>
                     <hr/>
                        <div class="form-group row" >
                            <label for="" class="col-md-4 control-label">Nama</label>
                            <span class="col-md-8">: <?php echo $data['nama']; ?></span>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">NIK</label>
                            <span class="col-md-8"> : <?php echo $data['nik']; ?> </span>
                        </div>	

                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Alamat Email</label>
                            <span class="col-md-8"> : <?php echo $data['email']; ?> </span>
                        </div>	
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Jenis Kelamin</label>
                            <span class="col-md-8"> : <?php echo $data['jk']; ?> </span>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Tempat Lahir</label>
                            <span class="col-md-8"> : <?php echo $data['tempatlahir']; ?> </span>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Tanggal Lahir</label>
                            <span class="col-md-8"> : <?php echo tgl_indo($data['tanggallahir']); ?> </span>
                        </div>	
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Alamat</label>
                            <span class="col-md-8"> : <?php echo $data['alamat']; ?> </span>
                        </div>	
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Kota</label>
                            <span class="col-md-8"> : <?php echo $data['kota']; ?> </span>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Nomor HP</label>
                            <span class="col-md-8"> : <?php echo $data['nohp']; ?> </span>
                        </div>	
                        			<hr/>
                    <div class="form-group row">
                        <label for="" class="col-md-4 control-label">Foto</label>
                        <span class="col-md-8">
                            <?php if($data['foto']!="") { ?>
                            <img src="<?php echo base_url()."assets/images/pelatihan/biodata/".$data['foto'] ?>" alt="..." width="100px">
                            <?php
                            } else {
                            ?>

                            <?php
                            }
                            ?>
                        </span>
                    </div>
                   
                    </div>
                    

                <div class="col-md-6">
                    <h4>Data Pendidikan</h4>
                     <hr/>
                      <div class="form-group row">
                        <label for="" class="col-md-4 control-label">Pendidikan Terakhir</label>
                        <span class="col-md-8"> : <?php echo $data['pendidikan']; ?> </span>
                      </div>	
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Nama Sekolah/PT</label>
                            <span class="col-md-8"> : <?php echo $data['namapendidikan']; ?> </span>
                      </div>	
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Jurusan</label>
                            <span class="col-md-8"> : <?php echo $data['jurusan']; ?> </span>
                      </div>
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Nilai/IPK</label>
                            <span class="col-md-8"> : <?php echo $data['nilai']; ?> </span>
                      </div>
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Pelatihan/ Seminar/ Sertifikasi Yang Pernah diikuti</label>
                            <span class="col-md-8"> : <?php echo $data['daftarpelatihan']; ?> </span>
                      </div>
                      <div class="form-group row">
                            <label for="" class="col-md-4 control-label">Keahlian yang dimiliki</label>
                            <span class="col-md-8"> : <?php echo $data['daftarkeahlian']; ?> </span>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-md-4 control-label">KTP</label>
                        <span class="col-md-8">
                            <?php if($data['ktp']!="") { ?>
                            <img src="<?php echo base_url()."assets/images/pelatihan/biodata/".$data['ktp'] ?>" alt="..." width="100px">
                            <?php
                            } else {
                            ?>

                            <?php
                            }
                            ?>
                        </span>
                    </div>
		 
                

                            
				
						
					
						

					
                    

				
	
</div>
</div>

                </div>
                <div class="modal-footer">
                  
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>

            </form>