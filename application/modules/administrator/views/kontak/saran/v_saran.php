<ol class="breadcrumb bc-3">

    <li>

        <a href="<?php echo base_url() ?>administrator">

            <i class="fa fa-newspaper-o"></i>Administrator</a>

    </li>

    <li class="active">

        <strong>Kritik dan Saran </strong>

    </li>

</ol>



<h3>Kritik dan Saran </h3>

<div class="row">

    <div class="col-md-12">

        <?php pesan_get('msg',"Berhasil Menambah Kritik dan Saran ","Berhasil Mengedit Kritik dan Saran ","Berhasil Menghapus Kritik dan Saran ") ?>

           

            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">

                <thead>

                    <tr>

                        <th width="80px">Aksi</th>

						<th>Nama</th>

                        <th>Email</th>

						<th>Perihal</th>

                        <th>Waktu</th>

                        <th>#</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

					foreach($data->result_array() as $row){

						echo "

							<tr>

								<td>

								<div>

									

									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_saran']."'><i class='fa fa-trash-o'></i></a>

								</div>

								</td>

                                <td>".$row['nama']."</td>

                                <td>".$row['email']."</td>

                                <td><strong>".$row['judul']."</strong></td>

                                <td>".$row['timeinput']."</td>

                                <td><a href='".base_url("administrator/saranlihat?id=".$row['id_saran']."")."' class='btn btn-primary btn-xs' title='Lihat' id='".$row['id_saran']."'><i class='fa fa-eye' id='".$row['id_saran']."'  ></i> Lihat </a></td>



							</tr>

						";

					}

				?>

                </tbody>

            </table>

    </div>

</div>