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
                   <div class="panel-heading" style="text-align:center;"><strong> <h3>Update Order (POST)</h3>
                   <small>POST /orders - Update order in the system and persist the same in orders and order_items table</small></strong></div>
                    <div class="panel-heading" >
                   <?php                    
                        $sql = "SELECT * FROM oms_db_order_tbl where id ='".$id."'"; 
                        $query = $this->db->query($sql);          
                        $result= $query->result();
                       // print_r($result);
                        foreach($result as $key){
                            $user_id = $key->user_id;
                            $user_email_id = $key->user_email_id;
                            $user_mobile_no = $key->user_mobile_no;
                        }
                   ?>
                    <form  method="post" action="<?=site_url()?>index.php/controller_api/orders_upd/<?=$id?>">
                    <div class="form-group">
                     <label>User Id</label>
                     <input type="number" name="u_id" value="<?=$user_id?>" required="" class="form-control" placeholder="User Id">
                    </div>
                    <div class="form-group">
                     <label>Email address</label>
                     <input type="email" name="email_id" value="<?=$user_email_id?>" required="" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                     <label>Mobile No</label>
                     <input type="number"   min="10"  value="<?=$user_mobile_no?>" required="" name="mobile" class="form-control" placeholder="Mobile">
                    </div><br /><h3>Add Items (+)</h3><br />
                     <?php                    
                        $sql = "SELECT * FROM oms_db_order_items_tbl where order_id ='".$id."'"; 
                        $query = $this->db->query($sql);          
                        $result= $query->result();
                       // print_r($result);
                        foreach($result as $key){
                            $name = $key->name;
                            $price = $key->price;
                            $qty = $key->quantity;
                        
                   ?>
                    <div class="form-group">
                    <div class="col-sm-4">
                      <label>Item Name</label>
                     <input type="text" required="" name="name[]" class="form-control" value="<?=$name?>"  placeholder="Name">
                    </div>
                    <div class="col-sm-4">
                      <label>Price</label>
                     <input type="text" required="" name="price[]" class="form-control" value="<?=$price?>"  placeholder="Price Per Unit">
                    </div>
                    <div class="col-sm-4">
                      <label>Quantity</label>
                     <input type="text" required="" name="qty[]" class="form-control" value="<?=$qty?>"  placeholder="Quantity">
                    </div>
                    </div>
                    <?php } ?>
                   <br />
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