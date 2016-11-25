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
            <div class="panel-heading"><strong><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp; Manage Company</strong></div>
            <div class="panel-body" data-spy="scroll"  style="height:600px;overflow:auto; position: relative;" >
            <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Company Name</th>
          <th>Job Posted</th>
          <th>Company URL</th>
          <th>Active/Inactive</th>
          <th>Delete</th>
          <th>EDIT</th>
        </tr>
      </thead>
      <tbody>
         <?php $i=1; $s="select * from company_details order by id desc"; $r=mysql_query($s); while($row=mysql_fetch_array($r)){ $c_name = $row['company_name'];    ?>
        <tr>
        <?php $s_j="select count(id) as job_count from job_list where company_name like '".$c_name."' "; $r_j=mysql_query($s_j); $row_j=mysql_fetch_array($r_j);    ?>
          <td><?=$i;?></td>
          <td><?=$row['company_name'];?></td>
          <td><a href="<?=site_url();?>index.php/rcb/manage_job/<?=$row['company_name'];?>"><?=$row_j['job_count'];?></a></td>
          
          <td><a href="<?=site_url();?>index.php/rcb/inactive_company/<?=$row['id'];?>" target="_blank">URL</a></td>
          
          
	  <td><form action="<?=site_url();?>index.php/rcb/inactive_company/<?=$row['id'];?>" method="post" ><input type="hidden" name="status" value="<?php $status = $row['status'];?>" /><input type="submit" <?php if($status == 1){ ?> value="Active"  class="btn btn-success"  <?php  } ?> <?php if($status == 0){ ?> value="InActive"  class="btn btn-danger"  <?php  } ?>/> </form></td>

<td><a href="<?=site_url();?>index.php/rcb/delete_company/<?=$row['id'];?>" onClick="return confirm('Are you absolutely sure you want to delete?')"   class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a> </td>


	 <td><a href="<?=site_url();?>index.php/rcb/edit_company/<?=$row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-edit"></span></a> </td>

        </tr>
<?php $i++;	} ?>

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