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
    

    public function obtener_post($id = '')
    {
       $result = $this->db->query("SELECT * FROM entry WHERE entry_id = '".$id."' LIMIT 1 ");

       return $result->row();
    } 


    public function obtener_id($data)
    {

        $titulo = $data['entry_name'];
        
        $autor = $data['user'];

        $query = $this->db->query("SELECT entry_id FROM entry WHERE entry_name = $titulo and user = $autor");
        return $query;
    }

   

    
}

?>