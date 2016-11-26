<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Controller_client extends CI_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
 //$this->load->library('rest', array('server' => 'http://localhost/mb',
//'api_key' => 'REST API',
//'api_name' => 'X-API-KEY',
//'http_user' => 'admin',
//'http_pass' => '1234',
//'http_auth' => 'basic',
//));
      $this->load->model('model');
    
    }
  public function index()
	{
		$this->load->view('index');
	} 
 public function create_order()
	{
		$this->load->view('create_order');
	} 
     public function update_order($id)
	{   $data['id'] = $id;
		$this->load->view('update_order',$data);
	} 
 } 
 

?>