<div role="main" class="main">
				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?php echo base_url() ?>assets/front-end/web2/bahan/tes11.jpg);padding-top: 100px;padding-bottom: 100px;">
					<div class="container">
						<div class="row mt-5">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-9 font-weight-bold"><?php echo $halaman['judul'] ?></h1>
								<span class="sub-title">Dinas Perindustrian Kalimantan Selatan</span>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-light d-block text-center">
									<li><a href="<?php echo base_url() ?>">Beranda</a></li>
									<li class="active"><?php echo $halaman['judul'] ?></li>
								</ul>
							</div>
						</div>
					</div>
				</section>
			

				<div class="container">

					<div class="row">
						<div class="col">
						  <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                  <tr>
                        <th width="50px">Aksi</th>
                        <th>Judul</th>
						<th>Keterangan</th>
                        <th>Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					foreach($data2->result_array() as $row){
						echo "
							<tr>
								<td>
								<div>
									<a href='#' class='btn btn-primary btn-xs edit' title='Edit' data-toggle='modal' id='".$row['id_dokumendetail']."' data-target='#myModal2'><i class='fa fa-edit' id='".$row['id_dokumendetail']."'></i></a>
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_dokumendetail']."'><i class='fa fa-trash-o'></i></a>
								</div>
								</td>
                                <td>".$row['judul']."</td>
                                <td>".$row['keterangan']."</td>
                                <td>";
                                if ($row['dokumen']!="") {
                                    echo "<a href='".base_url()."assets/images/dokumen/".$row['dokumen']."' class='btn btn-default btn-xs' target='_blank'> <i class='fa fa-download'></li></a>";
                                } else {
                                    echo "<a href='#' class='btn btn-default btn-xs' disabled> <i class='fa fa-download'></li></a>";    
                                }
                                echo "</td>
							</tr>
						";
					}
				?>
                </tbody>
            </table>

						

						</div>
					</div>
					
					

				</div>

				