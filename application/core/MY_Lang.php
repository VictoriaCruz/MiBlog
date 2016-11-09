<?php

class MY_Lang extends CI_Lang{


	public function __construct()
    {
        parent::__construct();
	}

    public function traducir()
    {
   		
	     $CI =& get_instance();
   		 $CI->lang->load('form_validation','spanish');
   		 $CI->config->set_item('language','spanish');
      	
    }
}

?>