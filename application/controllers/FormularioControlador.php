<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormularioControlador extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
	}

   public function error()
{
	echo "ocurrio un error";
}	
	

	public function insertar_comentarios()
	{ 
		

        $this->form_validation->set_rules('titulo','Titulo','trim|required');
        $this->form_validation->set_rules('textComentario','Comentario','trim|required');
    
        if (!$this->form_validation->run())
			{
				
				$this->error();
			}
			//si pasamos la validación correctamente pasamos a hacer la inserción en la base de datos
			else 
			{
				$data = array (
    				'entry_name' => $this->input->post('titulo'),
    				'entry_body' => $this->input->post('textComentario')
    				);					
				 $this->db_model->nuevo_comentario('entry',$data);
			}
        
                 redirect('Blog/principal',refresh);
	}

}
?>