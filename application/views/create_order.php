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
                   <div class="panel-heading" style="text-align:center;"><strong> <h3>Create Order (POST)</h3><small>POST /orders - Create order in the system and persist the same in orders and
order_items table</small></strong></div>
                    <div class="panel-heading" >
                    <form  method="post" action="<?=site_url()?>index.php/controller_api/orders">
                    <div class="form-group">
                     <label>User Id</label>
                     <input type="number" name="u_id" required="" class="form-control" placeholder="User Id">
                    </div>
                    <div class="form-group">
                     <label>Email address</label>
                     <input type="email" name="email_id" required="" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                     <label>Mobile No</label>
                     <input type="number"  min="10" required="" name="mobile" class="form-control" placeholder="Mobile">
                    </div><br /><h3>Add Items (+)</h3><br />
                    <div class="form-group">
                    <div class="col-sm-4">
                      <label>Item Name</label>
                     <input type="text" required="" name="name[]" class="form-control"  placeholder="Name">
                    </div>
                    <div class="col-sm-4">
                      <label>Price</label>
                     <input type="text" required="" name="price[]" class="form-control"  placeholder="Price Per Unit">
                    </div>
                    <div class="col-sm-4">
                      <label>Quantity</label>
                     <input type="text" required="" name="qty[]" class="form-control"  placeholder="Quantity">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                      <label>Item Name</label>
                     <input type="text" required="" name="name[]" class="form-control"  placeholder="Name">
                    </div>
                    <div class="col-sm-4">
                      <label>Price</label>
                     <input type="text" required="" name="price[]" class="form-control"  placeholder="Price Per Unit">
                    </div>
                    <div class="col-sm-4">
                      <label>Quantity</label>
                     <input type="text" required="" name="qty[]" class="form-control"  placeholder="Quantity">
                    </div>
                    </div><br />
                    <div class="form-group">
                    <label></label>
                     <input type="submit" class="btn btn-primary" />
                    </div>
                    </form>
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