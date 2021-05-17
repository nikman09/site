<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-users"></i>Administrator</a>
    </li>
    <li class="active">
        <strong>Admin</strong>
    </li>
</ol>

<h3>Admin</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Admin","Berhasil Mengedit Admin","Berhasil Menghapus Admin") ?>
            <a href="<?php echo base_url() ?>administrator/admintambah" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left">
                <i class="fa fa-plus"></i> Tambah Admin</a>
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th width="50px">Aksi</th>
						<th>Username</th>
                        <th>Nama</th>
                        <th>Bidang</th>
						<th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td  style='width:80px;'>
								<div>
                                    <a href='".base_url("administrator/adminedit?id=".$row['username']."")."' class='btn btn-primary btn-xs' title='Edit/Lihat' id='".$row['username']."'><i class='fa fa-edit' id='".$row['username']."'  ></i></a>
                                    <a href='#' class='btn btn-info btn-xs kunci' title='Password' data-toggle='modal' id='".$row['username']."' data-target='#myModal'><i class='fa fa-key' id='".$row['username']."'  ></i></a>
                                    
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['username']."'><i class='fa fa-trash-o'></i></a>
								</div>
								</td>
                                <td>".$row['username']."</td>
                                <td>".$row['nama']."</td>
                                <td>".$row['bidang']."</td>
                                <td>".$row['nohp']."</td>

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
