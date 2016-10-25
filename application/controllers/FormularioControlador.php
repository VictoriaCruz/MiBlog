<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormularioControlador extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
	}

	public function mostrar_formulario()
	{
		$this->load->view('nuevo_post');
	}

 

    public function post($id = '')
    {
      $fila=  $this->db_model->obtener_post($id);


      $data = array($fila->entry_name,$fila->entry_body,$fila ->date,$fila->user);
      $this->load->view('post');
     /* echo $fila->entry_name . "<br>";
      echo $fila->entry_body . "<br>";
      echo $fila->date . "<br>";
      echo $fila->user . "<br>";
      */
    }
   
	public function insertar_comentarios()
	{  

		//var_dump($_FILES['imagen']);exit;
        $this->form_validation->set_rules('titulo','Titulo','trim|required');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|required');
        $this->form_validation->set_rules('textComentario','Comentario','trim|required');



	
        if (!$this->form_validation->run())
			{
				
				$data['message_display'] = 'El comentario no se registro';  
				$this->load->view('nuevo_post',$data);
			}
			//si pasamos la validación correctamente pasamos a hacer la inserción en la base de datos
			else 
			{
                 $config['upload_path'] = 'upload/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
               
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
               
                if (!($this->upload->do_upload('imagen')))
                {
                        $error =  $this->upload->display_errors();
                      echo $error;
                }
                else{
                         $this->upload->data('file_name');
                        
                       
                }
           }

				$data = array (
    				'entry_name' => $this->input->post('titulo'),
    				'description' => $this->input->post('descripcion'),
    				'entry_body' => $this->input->post('textComentario'),
    				'date' => DATE('Y-m-d'),
    				'user' => $this->session->userdata['logged_in']['usuario'],
    				'img' =>$this->upload->data('file_name'));	

				 $this->db_model->nuevo_comentario('entry',$data);
              
              

                  	redirect('Blog/principal',refresh);
	}

}
?>