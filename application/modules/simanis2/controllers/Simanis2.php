<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Simanis2 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
      
      
    }

    // Dashboard
    public function index()
    {   
        redirect(base_url("simanis"));
    }



}