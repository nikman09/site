<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li class="active">
        <strong>Halaman</strong>
    </li>
</ol>

<h3>Halaman</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Halaman","Berhasil Mengedit Halaman","Berhasil Menghapus Halaman") ?>
            <a href="<?php echo base_url() ?>administrator/halamantambah" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left">
                <i class="fa fa-plus"></i> Tambah Halaman</a>
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th width="50px">Aksi</th>
						<th>Judul</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>
								<div>
									<a href='".base_url("administrator/halamanedit?id=".$row['id_halaman']."")."' class='btn btn-primary btn-xs' title='Edit/Lihat' id='".$row['id_halaman']."'><i class='fa fa-edit' id='".$row['id_halaman']."'  ></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_halaman']."'><i class='fa fa-trash-o'></i></a>
								</div>
								</td>
                                <td><strong>".$row['judul']."</strong></td>
                               

							</tr>
						";
					}
				?>
                </tbody>
            </table>
    </div>
</div>