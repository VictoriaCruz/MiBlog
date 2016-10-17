<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller{


	function __construct()
	{
		parent::__construct();
	
	}


	 public function mostrar_iniciosesion() {
      $data = array();
     // $data['error'] = $this->session->flashdata('error');
      $this->load->view('iniciar_sesion');  //$data
   }

   public function iniciar_sesion_post(){

   	if($this->input->post())
   	{
   		$nombre = $this->input->post('nombre');
   		$password = $this->input->post('password');
   		$this->load->model('usuario_model');

   		$usuario = $this->usuario_model->consulta_usuarios($nombre,$password);

   		if($usuario)
   		{
   			$usuario_data = array(
   				'id_usuarios' => $usuario -> id_usuarios,
                'nombre' => $usuario -> nombre,
                'logueado' => TRUE;
   				);

   			$this->session->set_userdata($usuario_data);
           
   			redirect('usuarios/logueado');
   		}else
   		{   
   			$this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos.');
   			redirect('usuarios/mostrar_iniciosesion');
   		}
   	}
   	else
   	{
   		 $this->mostrar_iniciosesion();
   	}
   }


   	public function logueado()
   	{   
          

    		if($this->session->userdata('logueado'))
   		{
   			$data = array();
   			$data['nombre'] = $this->session->userdata('nombre');
   			$this->load->view('principal_view',$data);                //aqui le paso el nombre del usuario a la vista
   	   }
   	   else
   	   {
   	   	 redirect('usuarios/mostrar_iniciosesion');
   	   }
   }

   public function cerrar_sesion() {
      $usuario_data = array(
         'logueado' => FALSE
      );
      $this->session->set_userdata($usuario_data);
      redirect('usuarios/mostrar_iniciosesion');
   }


}
?>