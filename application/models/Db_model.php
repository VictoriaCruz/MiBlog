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


    public function obtener_comment($id ='')
    {

        
         $result = $this->db->query("SELECT * FROM comentarios WHERE entry_id = '".$id."'");
         return $result->result();
    }


    public function obtener_id($usuario,$titulo)
    {

        $query = $this->db->query("SELECT entry_id FROM entry WHERE entry_name = ' ".$titulo. "'and user = '".$usuario."'");
        return $query->result();
    }



    public function comentar($tabla,$datos)
    {
       return $this->db->insert($tabla,$datos);
    }


 
    public function actualizar_post($data,$misma_id)
    {
        $id = $misma_id;
        $titulo = $data['entry_name'];
        $desc = $data['description'];
        $contenido = $data['entry_body'];
        $img = $data['img'];

       return  $this->db->query("UPDATE entry  
                            SET entry_name =  '".$titulo."' ,
                                description= '".$desc."',
                                entry_body = '".$contenido."',
                              img = '".$img."' 
                             WHERE  entry_id =  '".$id."' ");


   }
     

   

    
}

?>