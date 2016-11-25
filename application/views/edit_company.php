<?php $username = $this->session->userdata('username');  if($username !=''){ ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>New Company</title>
     <?php include 'include/style.php'; ?>

  </head>

  <body>

    <?php include 'include/header.php'; ?>

    <div class="container">

      <div class="row">

  <?php
	foreach ($result as $row1) $row=(array)$row1;{ 
 
 $id = $row['id'];
       $c_name = $row['company_name'];
       $c_email = $row['company_email'];
       $c_desc = $row['company_description'];
       $c_url = $row['company_url'];
       $address = $row['address'];
       $industry = $row['industry'];
       $area = $row['area'];
       $city = $row['city']; 
        $contact = $row['contact']; 
       $img = $row['img'];
       }
?>
     <div class="col-sm-3 col-md-3">

          <?php include 'include/sidebar1.php'; ?>

        </div> <!-- end left -->
        <div class="col-sm-6 col-md-6">
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;"><strong> <h3>Edit Company Details </h3></strong></div>
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
          Company Basic Information
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?=site_url();?>index.php/rcb/company_edit/<?=$id;?>" class="form-horizontal" role="form">
           
             <div class="form-group">  
             <div class="col-sm-12" id="notification1"></div>                
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="<?=$c_name;?>" name="c_name" placeholder="Company Name" />
                  </div>
                </div>
                <div class="form-group">                  
                  <div class="col-sm-12">
                    <textarea type="text" class="form-control" required="" name="c_desc" placeholder="Company Discription" ><?=$c_desc;?></textarea>
                  </div>
                </div>
                <div class="form-group">                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required=""  value="<?=$c_url;?>" name="c_url" placeholder="Company URL use http:// or https://" />
                  </div>
                </div>
             <div class="form-group">   
             <div class="col-sm-12" id="notification2"></div>                
                  <div class="col-sm-12">
                    <input type="email" class="form-control" required="" value="<?=$c_email;?>" name="c_email" placeholder="Company Email address" />
                  </div>
                </div>              
                <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="<?=$contact;?>" name="contact_no" placeholder=" Company Contact No." />
                  </div>
                </div>
             
               <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="<?=$city;?>"  name="city" placeholder=" City" />
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="<?=$area;?>"  name="area" placeholder=" Area" />
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12">
                    <textarea  class="form-control" required=""  name="address" placeholder="Company Address" ><?=$address;?></textarea>
                  </div>
                </div>  
                    <div class="form-group">
                     <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="<?=$industry;?>" name="industry" placeholder="Industry Type" />
                  </div>
                   </div> 
                <div class="form-group">
                     <div class="col-sm-12">
                    <input type="file" class="form-control" value="<?=$img;?>" name="pictures[]"  />
                  </div>
                   </div> 
                   <div class="form-group">
                     <div class="col-sm-12">
                    <a href="#" class="thumbnail">
                      <img src="<?=site_url();?>uploads/<?=$img;?>" alt="..." /></a>
                 </div></div>
          <div class="form-group">
             <div class="col-sm-12">
             <button type="submit" class="btn btn-primary">Submit</button>
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
            </div>
                 <div class="col-sm-3 col-md-3">

          <?php include 'include/sidebar2.php'; ?>

        </div> <!-- end left -->
   
      </div><!-- end main row -->

    </div><!-- end container -->
<?php include 'include/footer.php'; ?>
<?php include 'include/script.php'; ?>
  </body>
</html>
<?php }else{ header("location:index.php/rcb/rcbpl"); } ?>