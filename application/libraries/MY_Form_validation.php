<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{


	protected $CI;

	public function __construct()
	{
		parent::__construct();
	}

	public function letteronly($string)
	{

      /* $var = preg_match('/[^a-Z]/',$string); 

       if($var === 1)
       {
       	return true;
       }

       else {
       	
        return false;
       } */


       $permitidos = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";

      for ($i=0; $i<strlen($string); $i++){ 
      	if (strpos($permitidos, substr($string,$i,1))===false)
      	{ 
         
         return false; 
        } 
        } 
   
        return true; 
	    }
}

?>