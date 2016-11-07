<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use Mailgun\Mailgun;


class Email_sender {


	public function enviarEmail(){


		$mg = new Mailgun('key-9331edce8dacc2e19f8c7895b381da9c');
		$domain = 'sandboxa2906d9e48514d78aa7b887c296a0f08.mailgun.org';


		$mg->sendMessage($domain, array(
								'from'=>'postmaster@sandboxa2906d9e48514d78aa7b887c296a0f08.mailgun.org',
								'to'=>'victoriiacruzg@gmail.com',
								'subject'=>'BLOG',
								'text'=>'Alguien comento o hizo un post nuevo'
						));



	}

	public function enviarPass($pass){

		$mg = new Mailgun('key-9331edce8dacc2e19f8c7895b381da9c');
		$domain = 'sandboxa2906d9e48514d78aa7b887c296a0f08.mailgun.org';
       $pass = $pass['password'];
       
		$mg->sendMessage($domain, array(
								'from'=>'postmaster@sandboxa2906d9e48514d78aa7b887c296a0f08.mailgun.org',
								'to'=>'victoriiacruzg@gmail.com',
								'subject'=>'Recuperacion de password',
								'text'=>'Tu password es : '.$pass
						));

	}


}
?>