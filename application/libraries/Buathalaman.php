<?php
class Buathalaman {
    private $ci;
    function __construct() {
        $this->ci = & get_instance();;
    }
  
    function paging($base_url,$total_rows,$per_page,$uri_segment,$num_links)
    {	
        $config['base_url'] = site_url($base_url); //site url
        $config['total_rows'] = $total_rows; //total row
        $config['per_page'] = $per_page;  //show record per halaman
        $config["uri_segment"] =$uri_segment;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = $num_links;
    
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = '<i class="fa fa-angle-double-left"></i>';
        $config['last_link']        = '<i class="fa fa-angle-double-right"></i>';
        $config['next_link']        = '<i class="fa fa-angle-right"></i>';
        $config['prev_link']        = '<i class="fa fa-angle-left"></i>';
        $config['full_tag_open']    = '<ul class="pagination float-right">';
        $config['full_tag_close']   = '</ul>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';   
    
        $this->ci->load->pagination->initialize($config);
        return  $this->ci->pagination->create_links();
    }


  

}

  