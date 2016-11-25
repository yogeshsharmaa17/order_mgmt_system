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
           <div class="col-sm-3 col-md-3">

          <?php include 'include/sidebar1.php'; ?>

        </div> <!-- end left -->
       <div class="col-sm-8 col-md-8">
            <div class="row">
                <div class="col-md-12">
      

        <div class="panel panel-default">
            <div class="panel-heading"><strong><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp; Manage Jobs</strong></div>
            <div class="panel-body" data-spy="scroll"  style="height:600px;overflow:auto; position: relative;" >
            <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Job Title</th>
          <th>Company</th>
          <th>Industry</th>
          <th>Salary</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>Apply</th>
        </tr>
      </thead>
      <tbody>
       <?php   $s="select * from job_list"; $r=mysql_query($s); while($row=mysql_fetch_array($r)){ $id=$row['id']; $cid=$row['company_name'];  ?>
        <tr>
        
          
          <td><?=$row['job_title'];?></td>
          <td><?=$row['company_name'];?></td>
          <td><?=$row['industry'];?></td>
          <td><?php echo "Max Salary : ".$sal=$row['salary_max']." Min Salary :".$row['salary_min'];   ?></td>
         
         <td><a href="<?=site_url();?>index.php/rcb/edit_job/<?=$row['id'];?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a> </td>
         <td><a href="<?=site_url();?>index.php/rcb/delete_job/<?=$row['id'];?>" onClick="return confirm('Are you absolutely sure you want to delete?')"   class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td>
          <?php $job="select count(id) as cout from apply_job where job_id = $id"; $r_job=mysql_query($job); $row_j=mysql_fetch_array($r_job); if(empty($row_j)){ echo '<td>'."EMPTY".'</td>'; } else{ ?>
          <td><a href="<?=site_url();?>index.php/rcb/manage_apply_job/<?=$row['id'];?>" ><?=$row_j['cout'];?></a> </td> <?php }  ?>

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