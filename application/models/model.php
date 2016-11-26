<?php
class Model extends CI_Model {

      function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function order_details_by_id($id)
 {
     $detail = "SELECT * FROM oms_db_order_tbl as tbl1 join oms_db_order_items_tbl as tbl2 on tbl1.id=tbl2.order_id   WHERE tbl1.id ='".$id."'";
     return $this->common_execute($detail);
 }  
    function order_details_by_user_id($id)
 {
     $detail = "SELECT * FROM oms_db_order_tbl as tbl1 join oms_db_order_items_tbl as tbl2 on tbl1.id=tbl2.order_id   WHERE tbl1.user_id ='".$id."'";
     return $this->common_execute($detail);
 } 
    function today_order_details()
 {   
     $detail = "SELECT * FROM oms_db_order_tbl where DATE(`created_at`) = CURDATE()";
     return $this->common_execute($detail);
 }  
 
   function common_insert($tbl,$details)
 {   
    $this->db->insert($tbl,$details);
    $last_ins_id = $this->db->insert_id();
    return $last_ins_id;
     
 } 
    function payment_insert($tbl,$details)
 {   
    $this->db->insert($tbl,$details);
    $last_ins_id = $this->db->insert_id();
    
    $detail = "SELECT * FROM oms_db_payment_details_tbl where id = $last_ins_id";
     return $this->common_execute($detail);
     
 }   
  function common_update($tbl,$details,$id)
 {   
    $this->db->where('id',$id);
    $this->db->update($tbl,$details);
    return $id;
     
 }  
 
 function shift_items_details($tbl,$id)
 {   
    $this->db->where('order_id',$id);
    $this->db->delete($tbl);
    return $id;
     
 }  
 function common_execute($detail)
 {  
    $query = $this->db->query($detail);
     return $query->result();
     
    }
}
?>