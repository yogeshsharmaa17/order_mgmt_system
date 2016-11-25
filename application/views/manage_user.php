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
            <div class="panel-heading"><strong><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp; Manage Users</strong></div>
            <div class="panel-body" data-spy="scroll"  style="height:600px;overflow:auto; position: relative;" >
            <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>User Name</th>
          <th>User Profile</th>         
          <th>Block User</th>
        </tr>
      </thead>
      <tbody>
         <?php  $json= json_encode( array('result' => $result ) );  foreach ($result as $row1) {  $row=(array)$row1; $id=$row['private_key'];     ?>
        <tr>
        
          <td><?=$row['user_name'];?></td>
          
          <td><a href="<?=site_url();?>index.php/rcb/user_profile/<?=$row['private_key'];?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a> </td>
         
           <td><form action="<?=site_url();?>index.php/rcb/inactive_user/<?=$row['private_key'];?>" method="post" ><input type="hidden" name="status" value="<?php echo $status = $row['status'];?>" /><input type="submit" <?php if($status == 1){ ?> value="Active"  class="btn btn-success"  <?php  } ?> <?php if($status == 0){ ?> value="InActive"  class="btn btn-danger"  <?php  } ?>/> </form></td>

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