<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Demo : OMS</title>
    <?php include 'include/style.php'; ?><!-- style -->

  </head>

  <body>

    <?php include 'include/header.php'; ?><!-- header -->

    <div class="container">

      <div class="row">
      <div class="col-sm-3 col-md-3">
          <?php include 'include/sidebar1.php'; ?>
      </div> 
        <div class="col-sm-8 col-md-8">
            <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                   <div class="panel-heading" style="text-align:center;"><strong> <h3>DETAILED PANEL</h3></strong></div>
                    <div class="panel-heading" >
                    <div class="row">
                    <div class="col-md-4">
                    <a class="btn btn-default" href="<?=site_url()?>media/data_model/data_model.png" target="_blank">Data Model</a>
                    </div>
                    <div class="col-md-4">
                    <a  class="btn btn-default" href="https://github.com/yogeshsharmaa17/order_mgmt_system" target="_blank">Project Git</a>
                    </div>
                    <div class="col-md-4">
                    <a  class="btn btn-default" href="https://github.com/chriskacerguis/codeigniter-restserver" target="_blank">Git Used In Project </a>
                    </div>
                    </div>
                    </div>
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