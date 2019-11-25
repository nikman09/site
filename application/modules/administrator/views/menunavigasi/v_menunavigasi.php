<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li class="active">
        <strong>Pesan</strong>
    </li>
</ol>

<h3>Pesan</h3>
<script type="text/javascript">
		jQuery(document).ready(function($)
		{
			$('.dd').nestable({});
		});
		</script>





<div class="panel panel-primary" data-collapsed="0">
					
			<div class="panel-heading">
				<div class="panel-title">
					Simple Draggable List
				</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
				</div>
			</div>
<div class="panel-body">
<div  id="hasil" class="nested-list dd with-margins">
            <?php echo get_ol($page); ?>
        </div>
        </div>
		
		</div>
<section class="content">
<div class="row">
    <div class="col-xs-12">
      <div class="box box-danger">
        <div class="box-header">
        <?php if($this->session->flashdata('flashconfirm')): ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fa fa-check"></i> Sukses! <?php echo $this->session->flashdata('flashconfirm'); ?>.
        </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('flasherror')): ?>
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fa fa-info"></i> Perhatian! <?php echo $this->session->flashdata('flasherror'); ?>.
        </div>
        <?php endif; ?>
        <h3 class="box-title">
 
            <button type="button" id="save" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-save"></i> Simpan</button>
        </h3>
        </div>
        <div class="box-body">
       
         
         
          <br>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

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
            $str .= '<div  class="dd-handle">'. $item['judul'] .'&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn btn-info btn-xs btn-flat" title="Edit" href="'.site_url('admin/navigasi/edit').'/'.$item['id_navigasi'].'"><i class="fa fa-edit"></i></a>&nbsp<a title="delete" class="btn btn-danger btn-xs btn-flat" href="'.site_url('admin/navigasi/delete').'/'.$item['id_navigasi'].'" class="btn btn-info btn-sm"><i class="fa fa-trash"></i></a></div>';
            
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