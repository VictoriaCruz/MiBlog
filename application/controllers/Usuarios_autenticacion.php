<?php



if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_autenticacion extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');

	
	}

	public function mostrar_iniciar()
	{
		$this->load->view('iniciar_sesion');
	}
    
    public function mostrar_registrar()
    {
    	$this->load->view('registrar_form');
    }
   

 

	

	public function registrar_nuevo()
	{
		$this->form_validation->set_rules('usuario','Usuario','trim|required|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[5]');
		$this->form_validation->set_rules('email','Email','trim|required');

		if($this->form_validation->run() == FALSE)
		{    
			//$data['message_display'] = 'Parece que hubo un error';
			$this->session->set_flashdata('error','Parece que hubo un error, verifica los campos');
			redirect('Usuarios_autenticacion/mostrar_registrar','refresh' );
			// $this->load->view('registrar_form',$data);  //mostrar el form para registrarse de nuevo
		}
		else
		{
			$data  = array(
				'usuario' => $this->input->post('usuario'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'));

			$result = $this->Usuario_model->insertar_registrar($data);  

			if($result == TRUE)
			{
				$this->session->set_flashdata('registrado','Registrado!');
                redirect('Usuarios_autenticacion/mostrar_iniciar','refresh');
				
			}
			else
			{   $this->session->set_flashdata('ocupado','Oops.. parece que ya hay alguien registrado asi');
				redirect('Usuarios_autenticacion/mostrar_registrar','refresh' );
				
			}
		}
	}



	public function proceso_registro()
	{
		$this->form_validation->set_rules('usuario','Usuario','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if ($this->form_validation->run() == FALSE) 
		{
			if(isset($this->session->userdata['logged_in']))
			{
              redirect('Blog/principal');
           
		    }
			else{
				
		 		$this->session->set_flashdata('incorrectos','Usuario o password incorrectos');
		 		redirect('Usuarios_autenticacion/mostrar_iniciar','refresh');
			}
		} 
		else
		 {
			$data = array(
			'usuario' => $this->input->post('usuario'),
			'password' => $this->input->post('password'));

		$result = $this->Usuario_model->login($data);
		if ($result == TRUE) 
		 {

		$usuario = $this->input->post('usuario');
		$result = $this->Usuario_model->read_user_information($usuario);
			if ($result != false) 
			{
			$session_data = array(
			'usuario' => $result[0]->usuario,
			'email' => $result[0]->email,);
			// Add user data in session
			$this->session->set_userdata('logged_in', $session_data);
              redirect('Blog/principal');
        
			}
    	 } 
    		else
		 	{
			
		 		$this->session->set_flashdata('incorrectos','Usuario o password incorrectos');
		 		redirect('Usuarios_autenticacion/mostrar_iniciar','refresh');
			
			}
		}
		
	}

	public function logout()
	{
		$sess_array = array(
			'usuario' => '');

		$this->session->unset_userdata('logged_in',$sess_array);
		redirect('Blog/index');


	}

		
	
}

?>