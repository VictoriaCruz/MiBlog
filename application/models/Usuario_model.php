<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}


	public function insertar_registrar($data)
	{  

		 $user = $data['usuario'];
		 $pass = $data['password'];
		
        $where = "usuario= '".$user."'  OR password='".$pass."' ";
		 $this->db->where($where);
		 $query = $this->db->get('usuarios');
		

		if($query->num_rows() == 0)
		{
			$this->db->insert('usuarios',$data);	
			
				return TRUE;
		}	
			else
			{
				return FALSE;
			}
	}

	public function login($data)
	{  

		$user = $data['usuario'];
		//$pass = $data['password'];

		
		 $query = $this->db->where("usuario","$user");
		// $query = $this->db->where("password", "$pass");
		 $query = $this->db->get("usuarios");

		if ($query->num_rows() == 1) 
		{
		return $query ->result() ;
		} 
		else {
		return FALSE;
		}
	}


	public function read_user_information($usuario)
	{
		$condition = "usuario =" . "'" . $usuario . "'";
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query -> num_rows() == 1)
		{
			return  $query ->result();
		}else{
			return FALSE;
		}
	}

	public function recuperar($data)
	{

		$correo = $data['email'];
		$secreta = $data['secreta'];

		
		 $query = $this->db->where("email","$correo");
		 $query = $this->db->where("secreta", "$secreta");
		 $query = $this->db->get("usuarios");

		if ($query->num_rows() == 1) 
		{
		$pass = $this->db->query("SELECT password from usuarios where email = '".$correo."' and secreta ='".$secreta."'");
		return $pass->result();
		} 
		else {
		return FALSE;
		}
	}


	public function traer_hash($user){
     $query = $this->db->query("SELECT password from usuarios where usuario = '".$user."' ");

     if($query->num_rows() == 1)
     {
     	return $query->row();
     }
     else
     {
     	return false;
     }

	}


}
?>