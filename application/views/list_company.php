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
     <div class="col-sm-3 col-md-3">

          <?php include 'include/sidebar1.php'; ?>

        </div> <!-- end left -->
  

        <div class="col-sm-8 col-md-8">
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;"><strong> <h3>Add New Company </h3></strong></div>
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
        <form method="post" action="<?=site_url();?>index.php/rcb/new_company_insert" class="form-horizontal"  enctype="multipart/form-data" role="form">
           
             <div class="form-group">  
             <div class="col-sm-12" id="notification1"></div>                
                  <div class="col-sm-12">
                    <input class="form-control" required="" name="c_name" placeholder="Company Name" />
                  </div>
                </div>
                <div class="form-group">                  
                  <div class="col-sm-12">
                    <textarea  class="form-control" required="" name="c_desc" placeholder="Company Discription" ></textarea>
                  </div>
                </div>
                <div class="form-group">                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="http://" name="c_url" placeholder="Company URL use http:// or https://" />
                  </div>
                </div>
             <div class="form-group">   
             <div class="col-sm-12" id="notification2"></div>                
                  <div class="col-sm-12">
                    <input type="email" class="form-control" required="" name="c_email" placeholder="Company Email address" />
                  </div>
                </div>              
                <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                    <input type="text" class="form-control" required="" name="contact_no" placeholder=" Company Contact No." />
                  </div>
                </div>
             
               <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                  
                  <select class="form-control" required="" name="country">
                  <option>Country</option>
                    <?php $s1 = "select * from country_list order by country_name";
                          $r1 = mysql_query($s1); 
                          while($rw1=mysql_fetch_array($r1)){
                    
                     ?>
                     <option value="<?=$rw1['id'];?>" ><?=$rw1['country_name'];?></option>
                    <? } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                   <select class="form-control" required="" name="state">
                   <option>State</option>
                    <?php $s2 = "select * from state_list order by state_name";
                          $r2 = mysql_query($s2); 
                          while($rw2=mysql_fetch_array($r2)){
                    
                     ?>
                     <option value="<?=$rw2['id'];?>" ><?=$rw2['state_name'];?></option>
                    <? } ?>
                    </select>
                  </div>
                </div>
                            <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                   <select class="form-control" required="" name="city">
                   <option>City</option>
                    <?php $s3 = "select * from city_list order by city_name";
                          $r3 = mysql_query($s3); 
                          while($rw3=mysql_fetch_array($r3)){
                    
                     ?>
                     <option value="<?=$rw3['id'];?>" ><?=$rw3['city_name'];?></option>
                    <? } ?>
                    </select>
                  </div>
                </div>  
             
               
                <div class="form-group">
                <div class="col-sm-12">
                    <textarea  class="form-control" required=""  name="address" placeholder="Company Address" ></textarea>
                  </div>
                </div>  
                   <div class="form-group">                  
                  <div class="col-sm-12">
                    
                    <select class="form-control" required="" name="industry">
                    <option>	Accounting	</option>
<option>	Admin / Human Resources	</option>
<option>	Banking / Finance	</option>
<option>	Beauty & Wellness / Health & Fitness	</option>
<option>	Building & Construction	</option>
<option>	Communication / PR	</option>
<option>	Customer Service	</option>
<option>	Design	</option>
<option>	Education	</option>
<option>	Engineering	</option>
<option>	Featured	</option>
<option>	Hospitality / F & B	</option>
<option>	Information Technology (IT)	</option>
<option>	Insurance	</option>
<option>	Management	</option>
<option>	Manufacturing	</option>
<option>	Marketing / Public Relations	</option>
<option>	Media & Advertising	</option>
<option>	Medical Services	</option>
<option>	Merchandising & Purchasing	</option>
<option>	Others	</option>
<option>	Professional Services	</option>
<option>	Property	</option>
<option>	Real Estate / Property Management	</option>
<option>	Sales / Business Development	</option>
<option>	Sciences / Laboratory / R&D	</option>
<option>	Telecommunications	</option>
<option>	Transportation / Logistics	</option>

                    </select>
                  </div>
                </div>
                    <div class="form-group">
                     <div class="col-sm-12">
                    <input type="file" class="form-control"  name="pictures[]"  />
                  </div>
                   </div> 
           
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
                 
   
      </div><!-- end main row -->

    </div><!-- end container -->
<?php include 'include/footer.php'; ?>
<?php include 'include/script.php'; ?>
  </body>
</html>
<?php }else{ header("location:index.php/rcb/rcbpl"); } ?>