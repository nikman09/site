<?php
class Layout {
    private $ci;
    function __construct() {
        $this->ci = & get_instance();;
    }
    public $header = 'template/header';
	//public $menu = 'template/menu';
    public $footer = 'template/footer';
    public $endhtml = 'template/endhtml';
        
    function render($view,$data = null,$js = null){
        $this->ci->load->view($this->header);
        $this->ci->load->view($view,$data);
        $this->ci->load->view($this->footer);
        if ($js!=NULL) {
            $this->ci->load->view($js,$data);
        }
        $this->ci->load->view($this->endhtml);
    }

    public $headeradmin = 'v_admin/template/header';
	//public $menu = 'template/menu';
    public $footeradmin = 'v_admin/template/footer';
    public $endhtmladmin = 'v_admin/template/endhtml';
        
    function renderadmin($view,$data = null,$js = null){
        $this->ci->load->view($this->headeradmin);
        $this->ci->load->view($view,$data);
        $this->ci->load->view($this->footeradmin);
        if ($js!=NULL) {
            $this->ci->load->view($js,$data);
        }
        $this->ci->load->view($this->endhtmladmin);
    }

}
