<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li class="active">
        <strong>Bidang</strong>
    </li>
</ol>

<h3>Bidang</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Bidang","Berhasil Mengedit Bidang","Berhasil Menghapus Bidang") ?>
            <a href="<?php echo base_url() ?>administrator/bidangtambah" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah  btn-icon icon-left">
                <i class="fa fa-plus"></i> Tambah Bidang</a>
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th width="50px">Aksi</th>
						<th>Nama Bidang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<div>
									<a href='".base_url("administrator/bidangedit?id=".$row['id_bidang']."")."' class='btn btn-primary btn-xs' title='Edit/Lihat' id='".$row['id_bidang']."'><i class='fa fa-edit' id='".$row['id_bidang']."'  ></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_bidang']."'><i class='fa fa-trash-o'></i></a>
								</div>
								</td>
                                <td>".$row['bidang']."</td>

							</tr>
						";
					}
				?>
                </tbody>
            </table>
    </div>
</div>