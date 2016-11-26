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
    //  error_reporting(0);
    }
    // Server File ( Api.php )
defined('BASEPATH') OR exit('No direct script access allowed');
// Including Phil Sturgeon's Rest Server Library in our Server file.
require APPPATH . '/libraries/REST_Controller.php';
class API extends REST_Controller{
// Load model in constructor
public function __construct() {
parent::__construct();
$this->load->model('API_model');
}
// Server's Get Method
public function data_get($id_param = NULL){
$id = $this->input->get('id');
if($id===NULL){
$id = $id_param;
}
if ($id === NULL)
{
$data = $this->API_model->read($id);
if ($data)
{
$this->response($data, REST_Controller::HTTP_OK);
}
else
{
$this->response([
'status' => FALSE,
'error' => 'No books were found'
], REST_Controller::HTTP_NOT_FOUND);
}
}
$data = $this->API_model->read($id);
if ($data)
{
$this->set_response($data, REST_Controller::HTTP_OK);
}
else
{
$this->set_response([
'status' => FALSE,
'error' => 'Record could not be found'
], REST_Controller::HTTP_NOT_FOUND);
}
}
// Server's Post Method
public function data_post(){
$data = array('book_name' => $this->input->post('dname'),
'book_price' => $this->input->post('dprice'),
'book_author' => $this->input->post('dauthor')
);
$this->API_model->insert($data);
$message = [
'Book Name' => $data['book_name'],
'Book Price' => $data['book_price'],
'Book Author' => $data['book_author'],
'message' => 'Added a resource'
];
$this->set_response($message, REST_Controller::HTTP_CREATED);
}
// Server's Put Method
public function data_put(){
$data = $this->input->input_stream();
$this->API_model->update($data);
$message = [
'id' => $data['id'],
'Book Name' => $data['book_name'],
'Book Price' => $data['book_price'],
'Book Author' => $data['book_author'],
'message' => 'Added a resource'
];
$this->set_response($message, REST_Controller::HTTP_CREATED);
}
// Server's Delete Method
public function data_delete(){
$id = $this->uri->segment(3);
if($id===NULL){
$this->set_response([
'status' => FALSE,
'error' => 'ID cannot be empty'
], REST_Controller::HTTP_NOT_FOUND);
}
$data = $this->API_model->delete($id);
if ($data)
{
$this->set_response($data, REST_Controller::HTTP_OK);
}
else
{
$this->set_response([
'status' => FALSE,
'error' => 'Record could not be found'
], REST_Controller::HTTP_NOT_FOUND);
}
}
}
    
     // POST /orders/ Create order in the system
       function orders_post()
       { 
         $u_id = $this->input->post('u_id');
         $email_id = $this->input->post('email_id');
         $mobile_no = $this->input->post('mobile');
         
         $name=$this->input->post('name');
         $price=$this->input->post('price');
         $quantity=$this->input->post('qty');
         
         $test = count($name);
         if($test > 0 && count($quantity) > 0 && $name != '0' && $price != '0' && $quantity != '0' && $name != '' && $price != '' && $quantity != ''){
            
         //Setting values for tabel columns
        $details = array(
        'user_id' => $u_id,
        'user_email_id' => $email_id,
        'user_mobile_no' => $mobile_no
        );
 
      //Transfering Order Basic details to model method common_insert('table_name',$data)
      $last_id = $this->model->common_insert('oms_db_order_tbl',$details);
      if(isset($last_id)){
        for($i=0;$i<$test;$i++){
             //Setting values for tabel columns
        $items = array(
        'order_id' => $last_id,
        'name' => $name["$i"],
        'price' => $price["$i"],
        'quantity' => $quantity["$i"],
        );
         //Transfering Ordered items details to model method common_insert('table_name',$data)
      $this->model->common_insert('oms_db_order_items_tbl',$items);     
            }
      $msg = "Your Order Confirmed. Order Id : ord_$last_id";
       //Send Order Confirmation SMS
      $this->order_confirm_sms($mobile_no,$msg);     
      //Sending Request Response 
      $this->orders_get($last_id);
      }   
       }else{
        //Sending Response 402
       $this->return_402();
        }  
         }
    // GET /orders/{id} ­ Get order by id
       function orders_get($id)
       {
      if(isset($id) && $id !='' && $id != 0 ){ 
      //Transfering id to Model
      $data = $this->model->order_details_by_id($id);
      //Sending Request Response 
      $this->return_response($data);
      
        }else{
      //Sending Failed Response 402
      $this->return_402();
        }
    }
 // GET /orders/search?user_id=123 By user Id
       function search_get()
       {
        $user_id=$this->input->get('user_id');
      if(isset($user_id) && $user_id !='' && $user_id != 0 ){ 
        
      //Transfering id to Model
      $data = $this->model->order_details_by_user_id($user_id);
      //Sending Request Response 
      $this->return_response($data);
      
        }else{
        //Sending Failed Response 402
      $this->return_402();
        }
    }
 // GET /orders/search?user_id=123 By user Id
       function today_get()
       {
      //Transfering id to Model
      $data = $this->model->today_order_details();
      //Sending Request Response 
      $this->return_response($data);
       }

       // POST /orders/{id} ­ Update order & order item attributes
       function orders_upd_post()
       { 
         $id = $this->uri->segment(3);
         $status = $this->uri->segment(4);
         
         if($status == 'cancel'){ 
            $last_id = $this->model->common_update('oms_db_order_tbl', array('status' => 'cancelled'),$id); 
            if($last_id){ $this->orders_get($id); }else{ $this->return_402(); }
         }else if($status == 'payment'){  
            $payment = $this->uri->segment(5);
            $res = $this->model->payment_insert('oms_db_payment_details_tbl', array('order_id' => $id,'value' =>$payment,'payment_data_id' =>'1')); 
            if($res){ $this->return_response($res); }else{ $this->return_402(); }
         }else{            
            
         $u_id = $this->input->post('u_id');
         $email_id = $this->input->post('email_id');
         $mobile_no = $this->input->post('mobile');
         
         $name=$this->input->post('name');
         $price=$this->input->post('price');
         $quantity=$this->input->post('qty');
         
         $test = count($name);
         if($test > 0 && count($quantity) > 0){
            
         //Setting values for tabel columns
        $details = array(
        'user_id' => $u_id,
        'user_email_id' => $email_id,
        'user_mobile_no' => $mobile_no
        );
 
      //Transfering Order Basic details to model method common_updatte('table_name',$data)
      $last_id = $this->model->common_update('oms_db_order_tbl',$details,$id);
      if(isset($last_id)){
        $this->model->shift_items_details('oms_db_order_items_tbl',$last_id);  
        for($i=0;$i<$test;$i++){
             //Setting values for tabel columns
        $items = array(
        'order_id' => $last_id,
        'name' => $name["$i"],
        'price' => $price["$i"],
        'quantity' => $quantity["$i"],
        );
         //Transfering Ordered items details to model method common_update('table_name',$data)         
      $this->model->common_insert('oms_db_order_items_tbl',$items);     
            }
      $msg = "Your Order Updated. Order Id : ord_$last_id";
       //Send Order Confirmation SMS
      $this->order_confirm_sms($mobile_no,$msg);     
      //Sending Request Response 
      $this->orders_get($id);
      }else{
         //Sending Response 402
       $this->return_402();
      }   
       }else{
        //Sending Response 402
       $this->return_402();
        } 
        } 
         }
    //Common Function for response
  function return_response($data)
       {
        if($data)
      {       
        $message_s =array( 'status' => array('code' => '200', 'message' => 'Success'),'Detail' => $data);
        $this->response($message_s, 200); // 200 being the HTTP response code
      }else{
          $message_f = array( 'status' => array('code' => '402', 'message' => 'Id Does not exist'));
          $this->response($message_f, 200); // 200 being the HTTP response code  
           }  
        }
        function return_402()
        {
        $message_f = array( 'status' => array('code' => '402', 'message' => 'paramter missing'));
        $this->response($message_f, 200); // 200 being the HTTP response code      
        }
        ##################################################################------- SEND SMS-------#########################################################################


   function httpRequest($url){

    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";

    preg_match($pattern,$url,$args);

    $in = "";

    $fp = fsockopen($args[1],80, $errno, $errstr, 30);

    if (!$fp) { 
        return("$errstr ($errno)");
        }else {

        $args[3] = "C".$args[3];

        $out = "GET /$args[3] HTTP/1.1\r\n";

        $out .= "Host: $args[1]:$args[2]\r\n";

        $out .= "User-agent: PARSHWA WEB SOLUTIONS\r\n";

        $out .= "Accept: */*\r\n";

        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);

        while (!feof($fp)) {

           $in.=fgets($fp, 128);

        }
    }

    fclose($fp);

    return($in);

}

function order_confirm_sms($mobile,$msg)
{ 

    $password = '10181';
    
    $senderid='JMBUDP';
    
    $smsurl ='http://www.kit19.com/ComposeSMS.aspx?';
    
    $user = 'jambudweep180633';
    
    $url = 'username='.$user;
    
    $url.= '&password='.$password;
    
    $url.= '&sender='.$senderid;
    
    $url.= '&to='.urlencode($mobile);
    
    $url.= '&message='.urlencode($msg);
    
    $url.= '&priority=1';
    
    $url.= '&dnd=1';
    
    $url.= '&unicode=1';
    
    $urltouse =  $smsurl.$url;
    
    //Open the URL to send the message
    
    $response = $this->httpRequest($urltouse);

if (strpos($response, 'Sent.') !== false) {
   $m='Sent.';
}else{
    $m='FAILED';
}
$query = "INSERT INTO oms_db_sms_mgmt_tbl (time_stamp,msg,sms_type,mobile_no,sms)VALUES (NOW(), '".$m."','Auto','".$mobile."','".$msg."')" ; 
$result = $this->db->query($query);	

   if (strpos($response, 'Sent.') !== false) {
    return true;
}else{
    return false;
}
}

} 

?>