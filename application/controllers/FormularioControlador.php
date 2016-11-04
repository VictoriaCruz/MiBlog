<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormularioControlador extends CI_Controller {

	function __construct()
	{
		parent::__construct();
    $this->load->library('email_sender');
		$this->load->model('db_model');
	}

	public function mostrar_formulario()
	{
		$this->load->view('nuevo_post');
	}
  

  public function mostrar_principal()
  {

      $this->load->view('header');
      $this->load->view('principal_view');
  }

  public function mostrar_actualizar()
  {
     $id =$this->input->post('id');
     $data = array(
                 'id'=> $id);
    $this->load->view('actualizar_post',$data);
  
  }
 

    public function post($id = '')
    {
      $fila = $this->db_model->obtener_post($id);
      $comments = $this->db_model->obtener_comment($id);
      if( ! is_null($fila))
      {
      $data['post'] = $fila;
      $data['comments'] = $comments;

      $this->load->view('post',$data,$comments);
      }
     else
      {
        $this->load->view('errorpage');
      }

    }
   
	public function insertar_comentarios()
	{  

		//var_dump($_FILES['imagen']);exit;
        $this->form_validation->set_rules('titulo','Titulo','trim|required|min_length[3]');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|required|min_length[15]');
        $this->form_validation->set_rules('textComentario','Comentario','trim|required');

        if ($this->form_validation->run() == FALSE)
			{ 
        $this->session->set_flashdata('error','Parece que hubo un error');
        redirect('FormularioControlador/mostrar_formulario','refresh');
				//$this->load->view('nuevo_post');
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
                      //echo $error;
                }
                else{
                         $this->upload->data('file_name');         
                }
            

				$data = array (
    				'entry_name' => $this->input->post('titulo'),
    				'description'=> $this->input->post('descripcion'),
    				'entry_body' => $this->input->post('textComentario'),
    				'date' => DATE('Y-m-d'),
    				'user' => $this->session->userdata['logged_in']['usuario'],
    				'img' =>$this->upload->data('file_name'));	

				 $this->db_model->nuevo_comentario('entry',$data);

       //  $this->email_sender->enviarEmail();
         $this->session->set_flashdata('post','Tu post ya fue publicado');
       redirect('Blog/principal','refresh');     
      }
                  	

	}



	public function comentar()
	{
  		    $this->form_validation->set_rules('comentario','Comentario','trim|required|xss_clean');
          $id =$this->input->post('id');
          
          if (!isset($this->session->userdata['logged_in'])) {
         $this->session->set_flashdata('nopermitido','Lo siento para comentar tienes que iniciar sesion');
         redirect('FormularioControlador/post/'.$id, 'refresh'); 
      }
           else{     
            $datos = array('entry_id' => $this->input->post('id'),
            	             'comentario' => $this->input->post('comentario'),
            	             'usuario' =>  $this->session->userdata['logged_in']['usuario'],
            	             'fecha' => DATE('Y-m-d'));
            
  		 $this->db_model->comentar('comentarios',$datos);

       //$this->email_sender->enviarEmail();
       $this->session->set_flashdata('comentar','comentario hecho!');
      redirect('FormularioControlador/post/'.$id ,'refresh');
  		}
  }


    public function actualizar_post()   //metodo para que se puede actualizar un post
    {  
        $this->form_validation->set_rules('titulo','Titulo','trim|required|min_length[3]');
        $this->form_validation->set_rules('descripcion','Descripcion','trim|required|min_length[15]');
        $this->form_validation->set_rules('textComentario','Comentario','trim|required');

        if ($this->form_validation->run() == FALSE)
      { 

        $this->session->set_flashdata('error','Ocurrio algo,verifica porfavor');
        redirect('FormularioControlador/mostrar_actualizar','refresh');
        //$this->load->view('actualizar_post');
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
                }
                else{
                         $this->upload->data('file_name');         
                }
            
             $misma_id = $this->input->post('id');
             $data = array (
             
            'entry_name' => $this->input->post('titulo'),
            'description'=> $this->input->post('descripcion'),
            'entry_body' => $this->input->post('textComentario'),
            'img' =>$this->upload->data('file_name'));  

         $this->db_model->actualizar_post($data,$misma_id);
         $this->session->set_flashdata('actualizado','Tu post fue actualizado');
       redirect('Blog/principal');     
      }
                    


    }
}
?>