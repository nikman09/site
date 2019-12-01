<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Menu</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/navigasieditproses" method="post" enctype="multipart/form-data" id="form2">
            <input type="hidden" name="id_navigasi" value="<?=$item['id_navigasi']?>" />
                 <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Dokumen" value="<?=$item['judul'] ?>">
                            </div>
                           
                           
                          

                            <div class="form-group">
                                <label for="field-1" class="control-label">Modul</label>
                                <select  class="form-control" id="modula" name="modul" validate="required" >
                                <option value="" >.:Pilih Modul:.</option>
                                  <option value="Laman" <?=("Laman"==$item['tipe']?'Selected':'') ?>>Laman</option>
                                  <option value="Dokumen" <?=("Dokumen"==$item['tipe']?'Selected':'') ?>>Dokumen</option>
                                  <option value="Kegiatan" <?=("Kegiatan"==$item['tipe']?'Selected':'') ?>>Kegiatan</option>
                                  <option value="Bidang" <?=("Bidang"==$item['tipe']?'Selected':'') ?>>Bidang</option>
                                  <option value="Jadwal" <?=("Jadwal"==$item['tipe']?'Selected':'') ?>>Jadwal</option>
                                  <option value="Berita" <?=("Berita"==$item['tipe']?'Selected':'') ?>>Berita</option>
                                  <option value="Kontak" <?=("Berita"==$item['tipe']?'Selected':'') ?>>Kontak</option>
                                  <option value="URL" <?=("URL"==$item['tipe']?'Selected':'') ?>>URL</option>
                                </select>
                            </div>

                            <div class="form-group moduldetaila">
                            <?php
                                if ($item['tipe']=="Laman")
                                        {
                                            $data = $this->m_halaman->lihatdata();
                                            echo '<label for="field-1" class="control-label">Laman</label>';
                                            echo '<select id="detail"  name="detail" class="form-control">';
                                            foreach($data->result_array() as $row){
                                                echo "<option value=".$row['id_halaman']." ".($row['id_halaman']==$item['detail']?'Selected':'').">".$row['judul']."</option>";
                                            }
                                            echo '</select>';
                                        } else if($item['tipe']=="Dokumen") {
                                            $data = $this->m_dokumen->lihatdata();
                                            echo '<label for="field-1" class="control-label">Dokumen</label>';
                                            echo '<select id="detail"  name="detail" class="form-control">';
                                            foreach($data->result_array() as $row){
                                                echo "<option value=".$row['id_dokumen']." ".($row['id_dokumen']==$item['detail']?'Selected':'').">".$row['judul']."</option>";
                                            }
                                            echo '</select>';
                                        } else if($item['tipe']=="Kegiatan") {
                                            $data = $this->m_bidang->lihatdata();
                                            echo '<label for="field-1" class="control-label">Bidang</label>';
                                            echo '<select id="detail"  name="detail" class="form-control">';
                                            echo "<option value='all'>Semua Kegiatan</option>";
                                            foreach($data->result_array() as $row){
                                                echo "<option value=".$row['id_bidang']." ".($row['id_bidang']==$item['detail']?'Selected':'').">".$row['bidang']."</option>";
                                            }
                                            echo '</select>';
                                        } else if($item['tipe']=="Bidang") {
                                            $data = $this->m_bidang->lihatdata();
                                            echo '<label for="field-1" class="control-label">Bidang</label>';
                                            echo '<select id="detail"  name="detail" class="form-control">';
                                            foreach($data->result_array() as $row){
                                                echo "<option value=".$row['id_bidang']." ".($row['id_bidang']==$item['detail']?'Selected':'').">".$row['bidang']."</option>";
                                            }
                                            echo '</select>';
                                        } else if($item['tipe']=="Jadwal") {
                                            $data = $this->m_jadwal->lihatdata();
                                            echo '<label for="field-1" class="control-label">Jadwal</label>';
                                            echo '<select id="detail"  name="detail" class="form-control">';
                                            foreach($data->result_array() as $row){
                                                echo "<option value=".$row['id_jadwal']." ".($row['id_jadwal']==$item['detail']?'Selected':'').">".$row['nama']."</option>";
                                            }
                                            echo '</select>';
                                        }   else if($item['tipe']=="URL") {
                                            echo '<label for="field-1" class="control-label">URL</label>';
                                            echo '<input type="text" id="url"  name="url" class="form-control" value="'.$item['url'].'" placeholder="Masukkan URL" />';
                                            echo "<br/>";
                                            echo '<label for="field-1" class="control-label">Target</label>';
                                            echo "<br/>";
                                            echo '<select id="target"  name="target" class="form-control">';
                                            echo '<option value="0" '.(0==$item['target']?'Selected':'').'>Default</option>';
                                            echo '<option value="1" '.(1==$item['target']?'Selected':'').'>Blank</option>';
                                            echo '</select>';
                                        }
                                ?>
                            </div>

                        </div>

                      
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>