<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_autenticacion extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
		$this->load->library('email_sender');
		
	}

	public function mostrar_iniciar()
	{
		$this->load->view('iniciar_sesion');
	}
    
    public function mostrar_registrar()
    {
    	$this->load->view('registrar_form');
    }

    public function recuperar_pass()
    {
    	$this->load->view('recuperar');
    }

    public function nueva_pass($data)
    {
    	$this->load->view('nueva_pass',$data);
    }

	public function registrar_nuevo()
	{
        $this->lang->traducir();

            $pass = $this->input->post('password');
            $result = checar_password($pass);

			if($result == 0)
        	{
              $this->session->set_flashdata('valido','Solo letras,numeros, - y _ en el password');			
			redirect('Usuarios_autenticacion/mostrar_registrar','refresh' );
        	}	

		$this->form_validation->set_rules('usuario','Usuario','trim|required|min_length[3]|letteronly');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[5]');
		$this->form_validation->set_rules('email','Email','trim|required|is_unique[usuarios.email]');
		$this->form_validation->set_rules('secreta','Secreta','trim|required|min_length[5]');

		if($this->form_validation->run() == FALSE)
		{     
		    $error = validation_errors();
			$this->session->set_flashdata('error',$error);			
			redirect('Usuarios_autenticacion/mostrar_registrar','refresh' );
    	}
		else
		{  
			

			$data  = array(
				'usuario' => $this->input->post('usuario'),
				'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
				'email' => $this->input->post('email'),
				'secreta' => $this->input->post('secreta'));

			$result = $this->Usuario_model->insertar_registrar($data);  

			if($result == TRUE)
			{
				$this->session->set_flashdata('registrado','Registrado!');
                redirect('Usuarios_autenticacion/mostrar_iniciar','refresh');
				
			}
			else
			{   
				$this->session->set_flashdata('error','Trata un usuario o password diferente');
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

		 		$this->session->set_flashdata('incorrectos','Usuario o password incorrectos');
		 		redirect('Usuarios_autenticacion/mostrar_iniciar','refresh');
		
		} 
		else
		 {     
            $user = $this->input->post('usuario');
            $contra =  $this->input->post('password');
		 	$hash = $this->Usuario_model->traer_hash($user);
		 	$arreglo = $hash->password;
           
		 	if($hash != false)
		 	{
		 	  if(password_verify($contra,$arreglo))
		 	  {
		 	  	
			 	$data = array(
				'usuario' => $user);

				$result = $this->Usuario_model->login($data);
	
                
				if ($result != false) 
		 	 	{
				$session_data = array(
				'usuario' => $result[0]->usuario);

				$this->session->set_userdata('logged_in', $session_data);
              	redirect('Blog/principal');
        
			    }
    	      } 
    	        $this->session->set_flashdata('incorrectos','error');
		 		redirect('Usuarios_autenticacion/mostrar_iniciar','refresh');	 
    	    }
    		else
		 	{
		 		$this->session->set_flashdata('incorrectos','error2');
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

	public function recuperar()
	{
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('secreta','Secreta','trim|required|lettersonly|min_length[5]');

		if(!$this->form_validation->RUN() == FALSE)
		{
			$this->session->set_flashdata('incorrectos','Verifica los datos que pusiste');
		 	redirect('Usuarios_autenticacion/recuperar_pass','refresh');
		}else
		{

			$data = array(
			'email' => $this->input->post('email'),
			'secreta' => $this->input->post('secreta'));
            
			$result = $this->Usuario_model->recuperar($data);
			
            
			if($result == false)
			{
			$this->session->set_flashdata('datos','Esos datos no estan registrados');
		 	redirect('Usuarios_autenticacion/recuperar_pass','refresh');
			}
			else
			{
           		$this->load->view('nueva_pass',$data);
			}
		}

               
	}

	public function nueva_contra()
	{
        	$this->form_validation->set_rules('password','Password','trim|required|min_length[5]');

        	if($this->form_validation->run() == FALSE)
        	{
        		$this->session->set_flashdata('incorrectos','Verifica los datos que pusiste');
		 	   redirect('Usuarios_autenticacion/nueva_pass','refresh');
        	}
        	else
        	{
        		$datos =array(
        			'password'=> password_hash($this->input->post('password'),PASSWORD_BCRYPT),
        			'email' => $this->input->post('correo'),
			        'secreta' => $this->input->post('secret'));
                
        		$result = $this->Usuario_model->nueva_pass($datos);

        		if(is_null($result))
        		{
        			$this->session->set_flashdata('error','Intentalo de nuevo');
		 	        redirect('Usuarios_autenticacion/nueva_pass','refresh');
        			
        		}
        		else
        		{
        			$this->session->set_flashdata('cambiada','Password reestablecido, inicia sesion');
		 	       redirect('Usuarios_autenticacion/mostrar_iniciar','refresh');
        			
        		}

        	}
	}

		
	
}

?>