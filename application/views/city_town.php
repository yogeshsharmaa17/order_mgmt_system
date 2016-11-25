<?php $username = $this->session->userdata('username');  if($username !=''){ ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>City/Township</title>
     <?php include 'include/style.php'; ?>

  </head>

  <body>

    <?php include 'include/header.php'; ?>

    <div class="container">

      <div class="row">
      <div class="col-sm-3 col-md-3">

          <?php include 'include/sidebar1.php'; ?>

        </div> <!-- end left -->
        <div class="col-sm-6 col-md-6">
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;"><strong> <h3>City & Township List </h3></strong></div>
            </div>
            </div>
            </div>
 <div class="row">
                <div class="col-md-12">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          City & Township
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <div class="col-sm-12 col-md-12">
        <form  class="form-horizontal" role="form">
                     
                <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                    <table class="table" style="border:1px solid black;" >
                   
                    <?php $s = "select * from country_list order by country_name";
                          $r = mysql_query($s); 
                          while($rw=mysql_fetch_array($r)){
                          
                          $cid =$rw['id'];
                          $s1 = "select * from state_list where country_id = '".$cid."' ";
                          $r1 = mysql_query($s1); 
                          while($rw1=mysql_fetch_array($r1)){
                    
                     ?>
                     <tr><td><?=$rw['country_name'];?></td><td><?=$rw1['state_name'];?></td></tr>
                    <?php } } ?>
                    </table>
                  </div>
                </div>
                
                 
             </div> 
        
        </form>
  </div>
      </div>
    </div>
  </div>
  

</div>
 </div>
  </div>
  <div class="col-sm-3 col-md-3">

          <?php include 'include/sidebar2.php'; ?>

        </div> <!-- end left -->
            </div>
   
      </div><!-- end main row -->

    </div><!-- end container -->
<?php include 'include/footer.php'; ?>
<?php include 'include/script.php'; ?>
  </body>
</html>
<?php }else{ header("location:index.php/rcb/rcbpl"); } ?>