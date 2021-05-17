<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=NamaPeserta.xls");
?>

<h3 align="center">
Daftar Peserta</h3> 	

<table style="border: 1px solid black">
                <thead>
                    <tr style="border: 1px solid black">
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Kab/Kota</th>
                        <th>Nomor HP</th>
                        <th>Pendidikan</th>
                        <th>Seleksi</th>
                    </tr>
                </thead>
                <tbody style="border: 1px solid black">
                <?php
					foreach($data->result_array() as $row){
                   
						echo "
                            <tr style='border: 1px solid black'>
                               
								<td>".$row['nama']."</td>
								<td>".$row['jk']."</td>
								<td>".hitung_umur($row['tanggallahir'])." th</td>
								<td>".$row['kota']."</td>
                                <td>".$row['nohp']."</td>
                                <td>".$row['pendidikan']."</td>
                               
                               
                                <td>".$row['status']."</td>";
                                
						echo "
							</tr>
						";
					}
				?>
                </tbody>
            </table>