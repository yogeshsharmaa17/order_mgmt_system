<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>JOB PORTAL ADMIN</title>
     <?php include 'include/style.php'; ?>

  </head>

  <body>

    <?php include 'include/header.php'; ?>

    <div class="container">

      <div class="row">

        <div class="col-sm-4 col-md-4">

          

        </div> <!-- end left -->

        <div class="col-sm-4 col-md-4">

          
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;"><strong> <h3>ADMINISTRATOR LOGIN</h3></strong></div>
            
                  <div class="panel-body">
            
            <form method="post" action="<?=site_url();?>index.php/rcb/login" class="form-horizontal" role="form">
              <div class="form-group">
                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required=""  name="user" placeholder="User Name">
                  </div>
                </div>
                 <div class="form-group">
                  
                  <div class="col-sm-12">
                    <input type="password" class="form-control" required="" name="pass" placeholder="Password">
                  </div>
                </div>
                  <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                
                </form>
                </div>
            </div>
            </div>
            </div>

            
              </div> <!-- end left -->
            <div class="col-sm-4 col-md-4">
        </div><!-- end right -->

      </div><!-- end main row -->

    </div><!-- end container -->
<?php include 'include/footer.php'; ?>
<?php include 'include/script.php'; ?>
  </body>
</html>