<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li class="active">
        <strong>Menu Navigasi</strong>
    </li>
</ol>

<h3>Menu Navigasi</h3>
<script type="text/javascript">
		jQuery(document).ready(function($)
		{

      var csfrData = {};
      csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
      $.ajaxSetup({
          data: csfrData
      });

    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        maxLevels : 3

      });

      $('#save').click(function(){
            oSortable = $('.sortable').nestedSortable('toArray');
            $('#hasil').slideUp(function(){
              $.ajax({
                url : '<?php echo base_url() ?>administrator/order_save',
                type: 'POST',
                data : { sortable: oSortable},
                cache: false,
                success:function(data){
                  $('#hasil').slideDown();
                },
                error:function(){
                  alert('Gagal Simpan!');
                }
              });
            });
		});

     
		});
		</script>



<a href="#" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Tambah Menu</a>

<div class="panel panel-primary" data-collapsed="0">
					
			<div class="panel-heading">
				<div class="panel-title">
					Pindah Menu Sesuai Keinginan
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
				</div>
			</div>
<div class="panel-body">
<div id="hasil">
            <?php echo get_ol($page); ?>
          </div>

         
         
        </div>
        <footer class="panel-footer">
          <button type="button" id="save" class="btn btn-success btn-sm btn-flat  btn-icon icon-left"><i class="fa fa-save"></i> Simpan Navigasi</button>
</footer>
		</div>

<?php
//var_dump($page);
//echo get_ol($page);
function get_ol($array, $child = FALSE)
{
    $str = '';
    
    if(count($array)){
        $str .= $child == FALSE ? '<ol class="sortable dd-list">' : '<ol>';
        $str .= $child == FALSE ? '<li id="item_" class="dd-item">' :'';
        $str .= $child == FALSE ? '<div class="dd-handle">Beranda&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn btn-default btn-xs btn-flat" href="#"><i class="fa fa-info"></i></a>&nbsp<a class="btn btn-default btn-xs btn-flat" href="#" class="btn btn-info btn-sm"><i class="fa fa-info"></i></a></div>' : '';
        $str .= $child == FALSE ? '<hr>' : '';
        $str .= $child == FALSE ? '</li>': '';
        foreach($array as $item){
            $str .= '<li id="item_'.$item['id_navigasi'].'" class="dd-item">';
            $str .= '<div  class="dd-handle">'. $item['judul'] .'&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn btn-info btn-xs btn-flat edit" title="Edit" data-toggle="modal" data-target="#myModal2"  href="#" id="'.$item['id_navigasi'].'"><i class="fa fa-edit"></i></a>&nbsp<a title="delete" class="btn btn-danger btn-xs btn-flat hapus" href="#"  id="'.$item['id_navigasi'].'"><i class="fa fa-trash"></i></a></div>';
            
            if(isset($item['children']) && count($item['children'])){
                $str .= get_ol($item['children'], TRUE);
            }
            
            $str .= '</li>' . PHP_EOL;
        }
        
        $str .= '</ol>' . PHP_EOL;
    }else{
        $str = '<ol class="sortable">';
        $str .= $child == FALSE ? '<li id="item_">' :'';
        $str .= $child == FALSE ? '<div>Beranda&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn btn-default btn-sm" href="#"><i class="fa fa-info"></i></a>&nbsp<a class="btn btn-default btn-sm" href="#" class="btn btn-info btn-sm"><i class="fa fa-info"></i></a></div>' : '';
        $str .= $child == FALSE ? '<hr>' : '';
        $str .= '</ol>';
    }
    
    return $str;
}

?>



<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-tambah">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Menu</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/navigasitambah" method="post" enctype="multipart/form-data" id="form">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Dokumen">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Parent</label>
                                <select  class="form-control" id="parent" name="parent" validate="required" >
                                   <option value="0">Tidak ada parent</option>
                                   <?php 
                                      foreach($data->result_array() as $row){
                                        echo "<option value=".$row['id_navigasi'].">".$row['judul']."</option>";
                                    }
                                   ?>
                                </select>
                            </div>
                           
                            <div class="form-group modulparent">
                            </div>

                            <div class="form-group">
                                <label for="field-1" class="control-label">Modul</label>
                                <select  class="form-control" id="modul" name="modul" validate="required" >
                                   <option value="">.:Pilih Modul:.</option>
                                  <option value="Laman">Laman</option>
                                  <option value="Dokumen">Dokumen</option>
                                  <option value="Kegiatan">Kegiatan</option>
                                  <option value="Bidang">Bidang</option>
                                  <option value="Jadwal">Jadwal</option>
                                  <option value="Berita">Berita</option>
                                  <option value="Kontak">Kontak</option>
                                  <option value="URL">URL</option>
                                </select>
                            </div>

                            <div class="form-group moduldetail">
                            </div>

                        </div>

                      
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>




<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-edit">
          
         
        </div>
    </div>
</div>