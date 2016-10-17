<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Db_model extends CI_Model{
	
    
    public function __construct()
    {
        parent::__construct();
    }

    function nuevo_comentario($tabla,$comentario)
    {
    	

    	return $this->db->insert($tabla,$comentario);
    }

   

    
}

?>