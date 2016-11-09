<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');



if(! function_exists('checar_password') )
{
	function checar_password($password)
	{   

		 if (preg_match('/[^a-zA-Z0-9\-_]/', $password)) 
		 { 
      	  return 0; 
  		 } 
  		  else 
  		 { 
          return 1; 
   		 }
   		//return preg_match('/[^a-zA-Z0-9\-_]/', $password);
	}
}




?>