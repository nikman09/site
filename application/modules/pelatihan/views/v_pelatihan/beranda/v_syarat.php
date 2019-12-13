
<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Persyaratan <br/>  <small> <?= $data['nama'] ?> </small></h4>
            </div>
          
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <table style=" border-spacing: 10px;
        border-collapse: separate;">
                <tr>
                    <td width="120px">
                    Nama Pelatihan
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php echo  $data['nama'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Kategori
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php echo  $data['kategori'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Waktu Pendaftaran
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo tgl_indo($data['mulaipendaftaran'])." s.d ".tgl_indo($data['akhirpendaftaran']).""; 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Waktu Pelatihan
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo tgl_indo($data['mulaipelatihan'])." s.d ".tgl_indo($data['akhirpelatihan']).""; 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Tempat Pelatihan
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo $data['tempat']; 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    Contact Person
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <?php
                        echo $data['cp']; 
                    ?>
                    </td>
                </tr>
                
                        <?php 
                            if  ($data['file']!="") {
                        ?>
                            <tr>
                                <td>
                                Lampiran
                                </td>
                                <td>
                                : 
                                </td>
                                <td>
                            <a href="<?php echo base_url() ?>assets/images/pelatihan/lampiran/<?php echo $data['file'] ?>" target="_blank"><i class="fa fa-download"></i> unduh </a>
                            
                                    </td>
                                </tr>
                        <?php 
                            }
                        ?>

            </table>
                        <hr/>
                        <h4>Persyaratan</h4>
							<?= $data['persyaratan'] ?>
                        </div>

                      
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>

            </form>