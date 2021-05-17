<ul class="nav-menu align-to-right">
	   <?php 
	    function get_ol($array, $child = FALSE)
		{
			$str = '';
			
			if(count($array)){
				$str .= $child == FALSE ? '<li><a href="'.base_url().'">Beranda</a></li>' :'';
				foreach($array as $item){
					$str .= '<li>';
					$str .= menus($item['tipe'],$item['detail'],$item['url'],$item['target'],$item['judul']);
					
	  
					if(isset($item['children']) && count($item['children'])){
						$str .= ' <ul class="nav-dropdown">';
						$str .= get_ol($item['children'], TRUE);
						$str .= ' </ul>';
					}
					
					$str .= '</li>' . PHP_EOL;
				}
				
			}else{
				$str .= $child == FALSE ? '<li><a href="#">Home</a></li>' :'';
		  
			}
			
			return $str;
		}
	   $page = $this->m_navigasi->get_nested();

	   echo get_ol($page); ?> 
      
      </ul>