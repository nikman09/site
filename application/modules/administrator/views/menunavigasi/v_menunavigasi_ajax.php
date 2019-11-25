<?php
//var_dump($page);
echo get_ol($page);

function get_ol($array, $child = FALSE)
{
    $str = '';
    
    if(count($array)){
        $str .= $child == FALSE ? '<ol class="sortable">' : '<ol>';
        foreach($array as $item){
            $str .= '<li id="item_'.$item['id_navigasi'].'">';
            $str .= '<div>'. $item['judul'] .'&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn btn-info btn-sm" href="'.site_url('admin/navigasi/edit').'/'.$item['id_navigasi'].'"><i class="fa fa-edit"></i></a>&nbsp<a class="btn btn-danger btn-sm" href="'.site_url('admin/navigasi/delete').'/'.$item['id_navigasi'].'" class="btn btn-info btn-sm"><i class="fa fa-trash"></i></a></div>';
            
            if(isset($item['children']) && count($item['children'])){
                $str .= get_ol($item['children'], TRUE);
            }
            
            $str .= '</li>' . PHP_EOL;
        }
        
        $str .= '</ol>' . PHP_EOL;
    }
    
    return $str;
}

?>
<script>
    $(document).ready(function(){
      $('.sortable').nestedSortable({
          handle: 'div',
          items: 'li',
          toleranceElement: '> div',
          maxLevels : 2
        });
    });
</script>
