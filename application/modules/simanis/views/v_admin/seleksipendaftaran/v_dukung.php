        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Lihat Data Usaha Industri</h4>
            </div>
            

                <div class="modal-body">
            
               

                    <table class="table table-bordered datable" id="table-12" style="font-size:12px">
                        <thead>
                        <tr>
                                <th width="20px">#</th>
                                <th>Nama Data Pendukung</th>
                                <th>Dokumen/Bukti Pendukung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                            foreach($data->result_array() as $row){

                                echo "
                                    <tr>
        
                                        <td>".++$i."</td>
                               
                                        <td>".$row['nama']."</td>
                                        <td>";
                                        if ($row['file']!="") {

                                            echo "<a href='".base_url()."assets/images/pelatihan/pendukung/".$row['file']."' class='btn btn-default btn-sm btn-icon icon-left ' title='Edit'  id='".$row['id_berkas']."'target='_blank' ><i class='fa fa-eye' id='".$row['id_berkas']."'></i> View</a>";
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

       
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                </div>

      