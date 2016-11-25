<?php
 $per = $this->session->userdata('permission');
?>

<div class="list-group">
            <a href="<?=site_url();?>index.php/rcb/index" style="color:black;" class="list-group-item"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            <a  href="<?=site_url();?>index.php/rcb/list_job" style="color:black;" class="list-group-item"><span class="badge">3</span> <span class="glyphicon glyphicon-info-sign"></span> List New Job</a>
            <a  href="<?=site_url();?>index.php/rcb/manage_job/all" style="color:black;" class="list-group-item"><span class="badge">3</span> <span class="glyphicon glyphicon-usd"></span> Manage Job</a>
                 
          </div>
            
            <div class="list-group">
            <a href="<?=site_url();?>index.php/rcb/list_company"  style="color:black;" class="list-group-item"><span class="glyphicon glyphicon-asterisk"></span> List a Company</a>
            <a  href="<?=site_url();?>index.php/rcb/manage_company"  style="color:black;" class="list-group-item"><span class="glyphicon glyphicon-italic"></span> Manage Companies</a>
            <a  href="<?=site_url();?>index.php/rcb/manage_user"  style="color:black;" class="list-group-item"><span class="badge">3</span> <span class="glyphicon glyphicon-share"></span> Manage JobSeeker </a>            
            
          </div>
          
          <div class="list-group" >
            <a href="<?=site_url();?>index.php/rcb/list_country" style="color:black;" class="list-group-item"><span class="glyphicon glyphicon-plus-sign"></span> List Country</a>
             <a href="<?=site_url();?>index.php/rcb/list_state" style="color:black;" class="list-group-item"><span class="glyphicon glyphicon-plus-sign"></span> List State</a>
            <a  href="<?=site_url();?>index.php/rcb/list_city"  style="color:black;" class="list-group-item"><span class="glyphicon glyphicon-plus-sign"></span> List City</a>
            <a  href="<?=site_url();?>index.php/rcb/city_town"  class="list-group-item" style="color:black;" > <span class="glyphicon glyphicon-plus-sign"></span> Country/State/City</a>
</div>
    <div class="list-group" >
            <a href="<?=site_url();?>index.php/rcb/new_user" style="color:black;" class="list-group-item"><span class="glyphicon glyphicon-plus-sign"></span> List User</a>
</div>
     