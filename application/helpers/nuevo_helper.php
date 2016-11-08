<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

if(! function_exists('all_usuarios') )
{
	function all_usuarios()
	{
        $ci =& get_instance();
		$query = $ci->db->get('usuarios');
		return $query->result();
	}
}
?>