<?php
class Model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

      function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
         function order_details_by_id($id)
 {
     $update_detail = "SELECT * FROM `oms_db_order_tbl` WHERE id ='".$id."'";
     $query = $this->db->query($update_detail);
     return $query->result();
 }  
     function apply_job_delete(){
       //Delete in Table(students) of Database(college)
       
           $email=$this->input->get('email');
           $jobid=$this->input->get('job_id');

            $sql = "DELETE FROM apply_job where user_email_id LIKE '".$email."' and job_id = '".$jobid."' "; 
           $query = $this->db->query($sql);
            return $query->result();
          // return $query;

         }
    
     function ajax_state_list()
 {
     $country_id = $this->input->post('country_id');
     $update_detail = "SELECT * FROM `state_list` WHERE country_id ='".$country_id."' order by state_name ";
     $query = $this->db->query($update_detail);
     return $query->result();
 }  
     function ajax_district_list()
 {
     $state_id = $this->input->post('state_id');
     $update_detail = "SELECT * FROM `city_list` WHERE state_id ='".$state_id."' order by city_name ";
     $query = $this->db->query($update_detail);
     return $query->result();
 } 
           
         function login(){
       //Inserting in Table(students) of Database(college)
       
           $user=$this->input->post('email');
           $pass=$this->input->post('pass');

            $sql = "SELECT * FROM job_portal_users where email_id like '".$user."' and password like '".$pass."' "; 
           $query = $this->db->query($sql);
            return $query->result();
          // return $query;

         }
        
          function login_get(){
       //Inserting in Table(students) of Database(college)
       
           $user=$this->input->get('email');
           $pass=$this->input->get('pass');

            $sql = "SELECT * FROM job_portal_users where email_id like '".$user."' and password like '".$pass."' "; 
           $query = $this->db->query($sql);
            return $query->result();
          // return $query;

         }
         function admin_login(){
       //Inserting in Table(students) of Database(college)
       
           $user=$this->input->post('user');
           $pass=$this->input->post('pass');

            $sql = "SELECT * FROM account where username like '".$user."' and password1 like '".$pass."' "; 
           $query = $this->db->query($sql);
            return $query->result();
          // return $query;

         }
        function return_user_id($email,$job_id){
       //Inserting in Table(students) of Database(college)
           
            $sql = "SELECT private_key FROM job_portal_users where email_id like '".$email."' "; 
           $query = $this->db->query($sql);
            return $query->result();
          // return $query;
   
         }
            function search_job($where,$range){
       //Inserting in Table(students) of Database(college)
        $sql = "SELECT * FROM job_list AS jl JOIN city_list JOIN state_list JOIN country_list join company_details WHERE jl.status=1 AND jl.company_name = company_details.id AND jl.city = city_list.id AND jl.country = country_list.id AND jl.state = state_list.id ".$where.$range;
         $query = $this->db->query($sql);
           return $query->result();

         }
           function apply_job_detail($job_id){
       //Inserting in Table(students) of Database(college)
    
            $sql = "SELECT * FROM apply_job where job_id like '$job_id' "; 
            $query = $this->db->query($sql);
             return $query->result();

         }
         
             function apply_job_detail_user($email){
       //Inserting in Table(students) of Database(college)
    
            $sql = "SELECT * FROM apply_job AS a JOIN job_list AS jl JOIN city_list JOIN state_list JOIN country_list join company_details WHERE a.user_email_id LIKE '".$email."' AND a.job_id=jl.id AND jl.company_name = company_details.id AND jl.city = city_list.id AND jl.country = country_list.id AND jl.state = state_list.id "; 
            $query = $this->db->query($sql);
             return $query->result();

         }
         
         
                 function feedback_detail($user_email){
       //Inserting in Table(students) of Database(college)
    
            $sql = "SELECT * FROM feedback where user_email_id like '$user_email' "; 
            $query = $this->db->query($sql);
             return $query->result();

         }
            function login_forget(){
       //Inserting in Table(students) of Database(college)
       
           $user=$this->input->post('email');
            $sql = "SELECT * FROM job_portal_users where email_id like '".$user."'  "; 
           $query = $this->db->query($sql);
            return $query->result();
          // return $query;

         }
           function login_forget_get(){
       //Inserting in Table(students) of Database(college)
       
           $user=$this->input->get('email');
            $sql = "SELECT * FROM job_portal_users where email_id like '".$user."'  "; 
           $query = $this->db->query($sql);
            return $query->result();
          // return $query;

         }
           function reset_password_get(){
       //Inserting in Table(students) of Database(college)
       
           $user=$this->input->get('email');
           $old_pass=$this->input->get('old_pass');
           $new_pass=$this->input->get('new_pass');
             $sql = "SELECT * FROM job_portal_users where email_id like '".$user."' and password like '".$old_pass."' "; 
           $query = $this->db->query($sql);
             $result= $query->result();
             //return $result;
           if($result){  $s="update job_portal_users set password = '".$new_pass."' where email_id like '".$user."' ";  $q = $this->db->query($s); return $q->result(); } else{ return false; }
          // return $query;

         }
         function user_edit($id,$data)
         {
            $this->db->where('private_key', $id);
          $result = $this->db->update('job_portal_users', $data);  
         
          return $result;
         } 
          function delete_company($id)
         {
            $this->db->where('id', $id);
           $result = $this->db->delete('company_details'); 
         
          return $result;
         } 
          function delete_job($id)
         {
            $this->db->where('id', $id);
           $result = $this->db->delete('job_list'); 
         
          return $result;
         } 
          function active_user($id,$data)
         {
            $this->db->where('private_key', $id);
          $result = $this->db->update('job_portal_users', $data);  
         
          return $result;
         } 
         function active_company($id,$data)
         {
            $this->db->where('id', $id);
          $result = $this->db->update('company_details', $data);  
         
          return $result;
         } 
              function job_edit($id,$data)
         {
            $this->db->where('id', $id);
          $result = $this->db->update('job_list', $data);  
      
          return $result;
         } 
              function user_resume_edit($email,$resume)
         {
         
          $sql="update job_portal_users set resume='".$resume."' where email_id = '".$email."'  ";
          $res = mysql_query($sql);
          return $res;
         } 
          function user_photo_edit($email,$photo)
         {
         
          $data = array( 'photo' => $photo );
          
          $this->db->where('email_id', $email);
          $result = $this->db->update('job_portal_users', $data);  
          
          return $result;
         } 
      
          function user_insert($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
           $query = $this->db->insert('job_portal_users', $data);
          $insert_id = $this->db->insert_id();
            if($insert_id != ''){ 
           $date = date("Y-m-d");
           $type = 1;
           $note = " New User add on date : $date";
           $relate = "New User";
           $this->notification($date,$type,$note,$relate);    

         }    
         return $query;
         }
          function apply_job($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
      $email=$this->input->get('email');
      $job_id=$this->input->get('job_id');
      $sql1 = "SELECT * FROM apply_job where job_id='".$job_id."' and user_email_id like '".$email."' "; 
           $query1 = $this->db->query($sql1);          
            $result1= $query1->result();
      if($result1)
      {
       return 0;
      }else{
           $query = $this->db->insert('apply_job', $data);
           $insert_id = $this->db->insert_id();
           
         return $insert_id;
         }
         }
         function current_exp_insert($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
           $query = $this->db->insert('current_exp', $data);
           $insert_id = $this->db->insert_id();
           
         return $insert_id;
         }
           function add_user_personal($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
           $query = $this->db->insert('user_personal_detail', $data);
           $insert_id = $this->db->insert_id();
           
         return $insert_id;
         }
         
             function add_user_project($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
           $query = $this->db->insert('user_project_detail', $data);
           $insert_id = $this->db->insert_id();
           
         return $insert_id;
         }
          function update_user_personal($data,$id)
         {
            $this->db->where('user_id', $id);
          $result = $this->db->update('user_personal_detail', $data);  
         
          return $result;
         } 
            function job_insert($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
           $query = $this->db->insert('job_list', $data);
          $insert_id = $this->db->insert_id();
            if($insert_id != ''){ 
           $date = date("Y-m-d");
           $type = 1;
           $note = " New Job add on date : $date";
           $relate = "New Job";
           $this->notification($date,$type,$note,$relate);    

         }    
         return $query;
         }
            function state_insert($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
           $query = $this->db->insert('state_list', $data);
         
         return $query;
         }
             function country_insert($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
           $query = $this->db->insert('country_list', $data);
         
         return $query;
         }
                 function feedback_insert($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
           $query = $this->db->insert('feedback', $data);
         
         return $query;
         }
             function town_insert($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
           $query = $this->db->insert('city_list', $data);
         
         return $query;
         }
             function company_edit($id,$data)
         {
            $this->db->where('id', $id);
           $this->db->update('company_details', $data);  
         }
          function user_profile_update($data,$id)
         {
            $this->db->where('private_key', $id);
           $this->db->update('job_portal_users', $data);  
         }
            function company_insert($data){
       //Inserting in Table(students) of Database(college)
      //print_r ($data);
           $query = $this->db->insert('company_details', $data);
          $insert_id = $this->db->insert_id();
            if($insert_id != ''){ 
           $date = date("Y-m-d");
           $type = 1;
           $note = " New Company add on date : $date";
           $relate = "New Company";
           $this->notification($date,$type,$note,$relate);    

         }    
         return $query;
         }
         
          function users_detail(){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT * FROM job_portal_users order by private_key desc"; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
                 function company_list(){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT * FROM company_details order by company_name"; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
           function city_get_model($sid){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT id,city_name as name FROM city_list where state_id='".$sid."' order by city_name"; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
                  function country_get_model(){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT id,country_name as name FROM country_list order by country_name"; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
                  function state_get_model($id){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT id,state_name as name FROM state_list where country_id='".$id."' order by state_name"; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
             function industry_get_model(){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT id,industry as name FROM industry order by industry"; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
          function town_get_model($id){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT id,city_id,town_name as name FROM town_list where city_id like '".$id."'"; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
           function company_detail(){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT * FROM company_details order by id desc"; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
            function s_company_detail($id){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT * FROM company_details where id = '".$id."' "; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
                 function e_job_detail($id){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT * FROM job_list where id = '".$id."' "; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
               function job_detail(){
       //Inserting in Table(students) of Database(college)
 
           $sql = "SELECT * FROM job_list order by id desc"; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
          function user_detail_model($email){
       //Inserting in Table(students) of Database(college)

         $sql = "SELECT * FROM job_portal_users as jpu join industry as i join city_list as cl on jpu.city=cl.id and jpu.industry_type=i.id where jpu.email_id like '".$email."' "; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            
           return $result;

         }
            function user_detail_id($id){
       //Inserting in Table(students) of Database(college)

            $sql = "SELECT * FROM job_portal_users as t1  where t1.private_key = '".$id."'"; 
            $query = $this->db->query($sql);          
            $result= $query->result();
            $sql2 = "SELECT * FROM user_personal_detail as t2 where t2.user_id = '".$id."'"; 
            $query2 = $this->db->query($sql2);          
            $result2= $query2->result();
            $result['personal_detail']=$result2;
            $sql1 = "SELECT * FROM  user_project_detail as t3 where t3.user_id = '".$id."'"; 
            $query1 = $this->db->query($sql1);          
            $result1= $query1->result();
            $result['project']=$result1;
           return $result;

         }
           function job_detail_model($id){
       //Inserting in Table(students) of Database(college)
       $sql = "SELECT * FROM job_list where id='".$id."' "; 
       $res = mysql_query($sql);
       $row = mysql_fetch_array($res);
       $view = $row['count'];
       $view = $view + 1 ;
       
       $sql1 = "update job_list set count = '".$view."' where id='".$id."' "; 
       $query1 = $this->db->query($sql1);  

          $sql2 = "SELECT * FROM job_list where id='".$id."'  "; 
           $query2 = $this->db->query($sql2);          
            $result= $query2->result();
            
           return $result;

         }
           function users_detail_ajax($user,$type){
       //Inserting in Table(students) of Database(college)
           if($type==1){ $where="user_name like '".$user."' " ;}
           if($type==2){ $where="email_id like '".$user."' " ;}
           if($type==3){ $where=" device_id like '".$user."' " ;}
           
           $sql = "SELECT * FROM job_portal_users where ".$where; 
           $query = $this->db->query($sql);          
            $result= $query->result();
            //print_r($result);
           return $result;

         }
                function user_ajax($search){
       //Inserting in Table(students) of Database(college)
     
           $sql = "SELECT * FROM job_portal_users ".$search; 
           $query = $this->db->query($sql);          
           $result= $query->result();
          return $result ;
        
         }
         function personal_user_ajax($search){
       //Inserting in Table(students) of Database(college)
     
           $sql = "SELECT * FROM user_personal_detail ".$search; 
           $query = $this->db->query($sql);          
           $result= $query->result();
          return $result ;
        
         }
            function project_user_ajax($search){
       //Inserting in Table(students) of Database(college)
     
           $sql = "SELECT * FROM user_project_detail ".$search; 
           $query = $this->db->query($sql);          
           $result= $query->result();
          return $result ;
        
         }
         
           function notification($date,$type,$note,$relate)
         {
           $sql = "insert into notification(notification,date,type,related_to)values('".$note."','".$date."','".$type."','".$relate."')"; 
           $query = $this->db->query($sql);   
         }
        
}
?>