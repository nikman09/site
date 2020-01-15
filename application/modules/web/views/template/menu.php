<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
	<ul class="nav nav-pills" id="mainNav">
	<?php 
	    function get_ol($array, $child = FALSE)
		{
			$str = '';
			
			if(count($array)){
				$str .= $child == FALSE ? '<li class="dropdown"><a class="dropdown-item dropdown-toggle  " href="'.base_url().'"><i class="fa fa-home"></i></a></li>' :'';
				foreach($array as $item){
					if(isset($item['children']) && count($item['children'])){
						$str .=  $child == FALSE ? '<li class="dropdown"> ' : '<li class="dropdown-submenu"> ' ;
					} else {
						$str .=  $child == FALSE ? '<li class="dropdown"> ' : '<li> ' ;
					}
				
					$str .= menus($item['tipe'],$item['detail'],$item['url'],$item['target'],$item['judul']);
					
	  
					if(isset($item['children']) && count($item['children'])){
						$str .= ' <ul class="dropdown-menu">';
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
											