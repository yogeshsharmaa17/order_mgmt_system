<?php $username = $this->session->userdata('username');  if($username !=''){ 
$sql = "select * from job_portal_users where private_key = $id ";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>JOB PORTAL</title>
     <?php include 'include/style.php'; ?>

  </head>

  <body>

    <?php include 'include/header.php'; ?>

 <div class="container">
      <div class="row">
    
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?=$row['user_name'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?=site_url();?>uploads/<?=$row['photo'];?>" class="img-circle"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>Email Id:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <td>Industry:</td>
                        <?php $ind=$row['industry_type']; $s="select * from industry where id = $ind "; $r = mysql_query($s); $rw=mysql_fetch_array($r); ?>
                        <td><?=$rw['industry'];?></td>
                      </tr>
                      
                      <tr>
                        <td>Skills</td>
                        <td><?=$row['skills'];?></td>
                      </tr>
                   
                        <tr>
                        <td>Experience</td>
                        <td><?=$row['exp'];?>&nbsp;Year</td>
                      </tr>
                       <tr>
                        <td>Salary</td>
                        <td><?=$row['salary'];?>&nbsp;KR</td>
                      </tr>
                       <tr>
                        <td>Home Address</td>
                        <td><?=$row['address'];?></td>
                      </tr>
                      <tr>
                        <td>Email Id:</td>
                        <td><?=$row['email_id'];?></td>
                      </tr>
                      <tr>
                        <td>Mobile No:</td>
                        <td><?=$row['mobile_no'];?></td>
                     
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">Applied Job</a>
                  <a href="#" class="btn btn-primary">Following</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit_user_profile/<?=$id?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
<?php include 'include/script.php'; ?>
  </body>
</html>
<?php }else{ header("location:index.php/rcb/rcbpl"); } ?>