<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>pelatihan/admin">
            <i class="fa fa-newspaper-o"></i>Admin</a>
    </li>
    <li class="active">
        <strong>Pelatihan</strong>
    </li>
</ol>

<h3>Pelatihan</h3>
<div class="row">
    <div class="col-md-12">
    <div class="row">
        <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>pelatihan/admin/seleksipendaftaran"	method="post"  id="form"> 	
           
        <div class="col-md-12">    
        
        <?php pesan_get('msg',"Berhasil Mengubah Pelatihan Yang Aktif","Berhasil Mengedit Status Seleksi","Berhasil Menghapus Pelatihan") ?>
           
                <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label " style="margin-top:5px;">Pelatihan yang Aktif</label>
                        <div class="col-sm-8" style="margin-top:5px">
                        <select  id="pelatihanaktif"  class="form-control" name="pelatihanaktif"  data-rule-required="true"> 
                        <option value="0" disabled selected>.:Pilih  Pelatihan:.</option>
                        <?php 
                                foreach($pelatihan->result_array() as $row ){
                                    echo "<option value='".$row["id_pelatihan"]."' >".$row["nama"]."</<option>";

                                }
                        ?>
							
						</select>
                         </div>
                         <div class="col-sm-2 text-right"  style="margin-top:5px">
                            <button type="submit" class="btn  btn-default btn-icon icon-left"  id="tambahpelanggan"  style=""><i class="fa fa-check" ></i> Pilih Pelatihan</button>
                           
                        </div>
                    </div>
                    
						
                   
                                 
                </div>
              
                
                
            </form>



		</div>
        <hr/>
        
        <div style="height:200px">
        </div>
       
        
    </div>
</div>

