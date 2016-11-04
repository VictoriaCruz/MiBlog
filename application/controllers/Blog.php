<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Db_model');
        $this->load->helper('url');
    }
 
    function index()
    {  
        $query = $this->Db_model->ver_posts();
        $this->load->view('header');
        $this->load->view('vista_simple', ['query' => $query]);
    }

    function principal()

    {   
        $query = $this->Db_model->ver_posts();
        $this->load->view('header');
        $this->load->view('principal_view', ['query' => $query]);
    }

    
 

    
}
 
/* End of file blog.php */
/* Location: ./application/controllers/blog.php */