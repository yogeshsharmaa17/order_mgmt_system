<?php $username = $this->session->userdata('username');  if($username !=''){ ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>JOB PORTAL</title>
     <?php include 'include/style.php'; ?>

  </head>

  <body>

    <?php include 'include/header.php'; ?><!-- header -->

    <div class="container">

      <div class="row">
      <div class="col-sm-3 col-md-3">

          <?php include 'include/sidebar1.php'; ?>

        </div> <!-- end left -->
        <div class="col-sm-8 col-md-8">
            <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                   <div class="panel-heading" style="text-align:center;"><strong> <h3>DETAILED PANEL</h3></strong></div>
                   </div>
                  </div>
                </div>
          </div>
          
   
      </div><!-- end main row -->

    </div><!-- end container -->
<?php include 'include/footer.php'; ?><!-- footer -->
<?php include 'include/script.php'; ?><!-- script -->
  </body>
</html>
<?php }else{ header("location:index.php/rcb/rcbpl"); } ?>