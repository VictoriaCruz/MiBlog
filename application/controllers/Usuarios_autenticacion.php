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
		$this->form_validation->set_rules('usuario','Usuario','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');

		if($this->form_validation->run() == FALSE)
		{    
			$data['message_display'] = 'Parece que hubo un error';
			 $this->load->view('registrar_form',$data);  //mostrar el form para registrarse de nuevo
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
				$data['message_display'] = 'Registrado!';
				$this->load->view('iniciar_sesion',$data);  //mostrar el form para iniciar sesion
			}
			else
			{
				$data['message_display'] = 'oops.. ya existe un usuario asi';
				$this->load->view('registrar_form',$data);
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

            $this->load->view('header');
			$this->load->view('principal_view');
		    }
			else{
			$this->load->view('iniciar_sesion');
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

            $this->load->view('header');
			$this->load->view('principal_view');
			}
    	 } 
    		else
		 	{
			$data = array(
			'error_message' => 'Usuario o Contraseña incorrectos');
			$this->load->view('iniciar_sesion', $data);
			}
		}
		
	}

	public function logout()
	{
		$sess_array = array(
			'usuario' => '');

		$this->session->unset_userdata('logged_in',$sess_array);
		redirect('Blog/index',refresh);


	}

		
	
}

?>