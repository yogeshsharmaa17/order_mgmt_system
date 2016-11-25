<?php $username = $this->session->userdata('username');  if($username !=''){ ?> 
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
       <div class="col-sm-12 col-md-12">
            <div class="row">
                <div class="col-md-12">


        <div class="panel panel-default">
            <div class="panel-heading"><strong><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp; Manage Applied Jobs</strong></div>
            <div class="panel-body" data-spy="scroll"  style="height:600px;overflow:auto; position: relative;" >
            <div class="row">
            <div class="col-md-12">
            <table class="table table-striped table-bordered">
      
      <tr><?php $s1="select * from job_list where id = $job_id "; $r1=mysql_query($s1); $row1=mysql_fetch_array($r1);    ?>
          <td><?=$row1['job_title'];?></td></tr>
        <tr>
        </table>
            </div>
            </div>
            <table class="table table-striped table-bordered">
      
        <tr>
        <thead>
          <th>User Name</th>
          <th>User Email ID</th>
          <th>Resume</th>
        </tr>
      </thead>
      <tbody>
      
<?php
foreach ($result as $row1) $row3=(array)$row1;{ 
 
 $id = $row3['id'];

 $user_email_id = $row3['user_email_id'];
 
 $s2="select * from job_portal_users where email_id like '".$user_email_id."' "; $r2=mysql_query($s2); $row2=mysql_fetch_array($r2);
 
?>
        <tr>
          
          <td><?=$row2['user_name'];?></td>
          
          <td><?=$row2['email_id'];?></td>
          <td><a href="<?php echo site_url()."uploads/".$row2['resume'];?>" target="_blank" />Resume</a></td>

        </tr>
<?php	} ?>

      </tbody>
    </table>
            </div>
            </div>
            </div>
            </div>
            </div>

           
   
      </div><!-- end main row -->

    </div><!-- end container -->
<?php include 'include/footer.php'; ?>
<?php include 'include/script.php'; ?>
  </body>
</html>
<?php }else{ header("location:index.php/rcb/rcbpl"); } ?>