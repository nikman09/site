<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>simanis/admin">
            <i class="fa fa-newspaper-o"></i>Admin</a>
    </li>
    <li class="active">
        <strong>Statisik</strong>
    </li>
</ol>

<h3>Statisik Jumlah Pendaftar</h3>
<div class="row">
<div class="col-sm-12 col-xs-12">
		
				<div class="tile-stats tile-default">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?= $totalakun ?>" data-postfix="" data-duration="500" data-delay="0">0</div>
		
					<h3>Total Mendaftar Akun</h3>
					<p> Akun </p>
				</div>
			</div>
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Akun","Berhasil Mengedit Akun","Berhasil Mengganti Password Akun") ?>
           
            <table class="table table-bordered datatable"  id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelatihan </th>
                        <th>Kategori</th>
                        <th>Kuota</th>
                        <th>Mulai Pelatihan</th>
                        <th>Pengumuman</th>
                        <th>Jumlah Pendaftar</th>
                        <th>Seksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i= 0;
					foreach($data->result_array() as $row){
                    
						echo "
                            <tr>
                                <td>".++$i."
                                </td>
								<td>".$row['nama_pelatihan']."</td>
								<td>".$row['kategori_pelatihan']."</td>
                                <td>".$row['kuota_pelatihan']."</td>
                                <td>".tgl_indo($row['mulai_pelatihan'])."</td>
                                <td>".tgl_indo($row['pengumuman_pelatihan'])."</td>
                                <td style='color:#'>".$row['totalpendaftar']."</td>
                                <td>".$row['seksi']."</td>
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
       
