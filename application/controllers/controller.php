<?php defined('BASEPATH') OR exit('No direct script access allowed');


// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Controller extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        
      $this->load->model('model');
    
    }
       function orders_get($id)
       {
        
      if(isset($id) && $id !='' && $id != 0 ){ 
      //Transfering id to Model
      $data = $this->model->order_details_by_id($id);
 // $data content response
 if($data){ 
    
        $message_s =array( 'status' => array('code' => '200', 'message' => 'Success'),'Data' => $data);
        $this->response($message_s, 200); // 200 being the HTTP response code
        }else{
          $message_f = array( 'status' => array('code' => '402', 'message' => 'Wrong Order Number Try Again'));
          $this->response($message_f, 200); // 200 being the HTTP response code  
        }
        }else{
        $message_f = array( 'status' => array('code' => '402', 'message' => 'paramter missing'));
          $this->response($message_f, 200); // 200 being the HTTP response code  
        }
    }
 
  
} 

?>