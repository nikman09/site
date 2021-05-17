<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>simanis/admin">
            <i class="fa fa-newspaper-o"></i>Admin</a>
    </li>
    <li class="active">
        <strong>Akun</strong>
    </li>
</ol>

<h3>Akun</h3>
<div class="row">
			<div class="col-sm-4 col-xs-12">
		
				<div class="tile-stats tile-default">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?= $totalakun ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
		
					<h3>Total</h3>
					<p>Total Akun Pendaftar</p>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
		
				<div class="tile-stats tile-white">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?= $totalakunlakilaki ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
		
					<h3>Laki-laki</h3>
					<p>Akun Pendaftar</p>
					</div>
			</div>
			
			<div class="clear visible-xs"></div>
			<div class="col-sm-4 col-xs-12">
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?= $totalakunperempuan ?>" data-postfix="" data-duration="500" data-delay="0">0</div>

					<h3>Perempuan</h3>
					<p>Akun Pendaftar</p>
				</div>
			</div>
            
		</div>
       
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Akun","Berhasil Mengedit Akun","Berhasil Mengganti Password Akun") ?>
           
            <table class="table table-bordered datatable"  id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Nama </th>
                        <th>Kota</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Biodata</th>
                        <th>Data Usaha</th>
                    </tr>
                </thead>
                <tbody>
                <?php
					foreach($data->result_array() as $row){
                        $biodata = $this->m_admin_akun->lihatdatasatu($row["id_akun"])->row_array();
						echo "
                            <tr>
                                <td>
                                <div>
                                    <a href='#' class='btn btn-info btn-xs kunci' title='Password' data-toggle='modal' id='".$row['id_akun']."' data-target='#myModal'><i class='fa fa-key' id='".$row['id_akun']."'></i></a>
                                </div>
                                </td>
								<td>".$row['nama']."</td>
								<td>".$row['kota']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['jk']."</td>
                                <td>".$row['nohp']."</td>
                                <td><a href='#' class='btn ".(lengkap($biodata)>=100?"btn-primary ":"btn-danger")." btn-sm btn-icon icon-left biodata' title='Lihat Biodata'  data-toggle='modal' id='".$row['id_akun']."' data-target='#myModal2'><i class='fa fa-user' ></i> ".lengkap($biodata)." %</a> </td>
                                <td><a href='#' class='btn ".(usaha($biodata)>=100?"btn-primary ":"btn-danger")." btn-sm btn-icon icon-left usaha' title='Usaha'  data-toggle='modal' id='".$row['id_akun']."' data-target='#myModal3'><i class='fa fa-industry'></i> ".usaha($biodata)." %</a></td>
								"; 
						echo "
							</tr>
						";
					}
				?>
                </tbody>
            </table>
    </div>
</div>

<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content"  id="modal-lihat">
			
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

