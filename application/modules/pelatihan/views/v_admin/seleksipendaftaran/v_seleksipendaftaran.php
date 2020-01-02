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
        <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>app/tambahtransaksi"	method="post"  id="form"> 	
           
                <div class="col-md-12">    
                <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="margin-top:5px">Pelatihan</label>
                        <div class="col-sm-6" style="margin-top:5px">
                        <select type="hidden" id="antarjemput"  class="form-control" name="antarjemput"  data-rule-required="true"> 
							<option value="Tidak">Tidak</option>
							<option value="Iya">Iya</option>
						</select>
                         </div>
                         <div class="col-sm-2"  style="margin-top:5px">
                            <a class="btn  btn-default btn-icon icon-left"  id="tambahpelanggan" data-toggle="modal" data-target="#myModal3" style=""><i class="fa fa-check" ></i> Pilih</a>
                           
                        </div>
                    </div>
						
                   
                                 
                </div>
                
                
            </form>



		</div>
        <hr/>
    <div class="row">
			<div class="col-sm-3 col-xs-12">
		
				<div class="tile-stats tile-default">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="10" data-postfix="" data-duration="500" data-delay="0">0</div>
		
					<h3>Total Pendaftar</h3>
					<p></p>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12">
		
				<div class="tile-stats tile-white">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="10" data-postfix="" data-duration="500" data-delay="0">0</div>
		
					<h3>Menunggu Hasil Seleksi</h3>
					<p></p>
					</div>
			</div>
			
			<div class="clear visible-xs"></div>
			<div class="col-sm-3 col-xs-12">
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="10" data-postfix="" data-duration="500" data-delay="0">0</div>

					<h3>Lulus Seleksi</h3>
					<p></p>
				</div>
			</div>
            <div class="col-sm-3 col-xs-12">
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="10" data-postfix="" data-duration="500" data-delay="0">0</div>

					<h3>Tidak Lulus Seleksi</h3>
					<p></p>
				</div>
			</div>
		</div>
       
        <?php pesan_get('msg',"Berhasil Menambah Pelatihan","Berhasil Mengedit Status Seleksi","Berhasil Menghapus Pelatihan") ?>
           
           
        <div class="table-responsive">
            <table class="table table-bordered datatable "  id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th width="50px">Aksi</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Kota</th>
                        <th>Nomor HP</th>
                        <th>Pendidikan</th>
                        <th>Biodata</th>
                        <th>Data Usaha</th>
                        <th>Seleksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					foreach($data->result_array() as $row){
						echo "
                            <tr>
                                <td>
                                <div>
									<a href='".base_url("pelatihan/admin/pelatihanedit?id=".$row['id_pelatihan']."")."' class='btn btn-primary btn-xs' title='Edit/Lihat' id='".$row['id_pelatihan']."'><i class='fa fa-eye' id='".$row['id_pelatihan']."'  ></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_pelatihan']."'><i class='fa fa-file-pdf-o'></i></a>
                                </div>
                                </td>
								<td>".$row['nama']."</td>
								<td>".$row['jk']."</td>
								<td>".hitung_umur($row['tanggallahir'])." th</td>
								<td>".$row['kota']."</td>
                                <td>".$row['nohp']."</td>
                                <td>".$row['pendidikan']."</td>
                                <td><a href='#' class='btn btn-primary btn-sm btn-icon icon-left biodata' title='Lihat Biodata'  data-toggle='modal' id='".$row['id_akun']."' data-target='#myModal2'><i class='fa fa-user' ></i> 90 %</a> </td>
                                <td><a href='#' class='btn btn-primary btn-sm btn-icon icon-left usaha' title='Usaha'  data-toggle='modal' id='".$row['id_akun']."' data-target='#myModal3'><i class='fa fa-industry'></i>50 %</a></td>
                                <td><a href='#' class='btn ";
                                if ($row['status']=='Menunggu Hasil Seleksi')  echo 'btn-default';
                                else if ($row['status']=='Lulus Seleksi')  echo 'btn-success';
                                else if ($row['status']=='Tidak Lulus Seleksi')  echo 'btn-danger';
                                    
                                echo " btn-sm btn-icon icon-left seleksi' title='Edit/Lihat' id='".$row['id_pelatihandaftar']."' data-target='#myModal4'  data-toggle='modal' ><i class='fa fa-edit'></i> ".$row['status']."</a>";
                                
						echo "
							</tr>
						";
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal-biodata">

        </div>
    </div>
</div>


<div class="modal fade" id="myModal3">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal-usaha">

        </div>
    </div>
</div>


<div class="modal fade" id="myModal4">
    <div class="modal-dialog ">
        <div class="modal-content" id="modal-seleksi">

        </div>
    </div>
</div>