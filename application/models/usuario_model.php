<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	public function __construct(){
		parent::_construct();
	}



	public function consulta_usuarios($nombre,$password)
	{
       $this->db->select('id_usuarios, nombre');
      $this->db->from('usuarios');
      $this->db->where('nombre', $nombre);
      $this->db->where('password', $password);
      $consulta = $this->db->get();
      $resultado = $consulta->row();
      return $resultado;
	}
}
?>