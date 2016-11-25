<?php $username = $this->session->userdata('username');  if($username !=''){ ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit New Job</title>
     <?php include 'include/style.php'; ?>
  <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#slider-3" ).slider({
               range:true,
               min: 100,
               max: 10000,
               values: [ 500, 2500 ],
               slide: function( event, ui ) {
                  $( "#price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
               }
           });
         $( "#price" ).val( "$" + $( "#slider-3" ).slider( "values", 0 ) +
            " - $" + $( "#slider-3" ).slider( "values", 1 ) );
         });
      </script>
               <script>
         $(function() {
            $( "#slider-4" ).slider({
               range:true,
               min: 1,
               max: 10,
               values: [ 3, 5 ],
               slide: function( event, ui ) {
                  $( "#exp" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
               }
           });
         $( "#exp" ).val( "" + $( "#slider-4" ).slider( "values", 0 ) +
            " - " + $( "#slider-4" ).slider( "values", 1 ) );
         });
      </script>

  </head>

  <body>

    <?php include 'include/header.php'; ?>

    <div class="container">

      <div class="row">
      <div class="col-sm-3 col-md-3">

          <?php include 'include/sidebar1.php'; ?>

        </div> <!-- end left -->
<?php
foreach ($result as $row1) $row=(array)$row1;{ 
 
 $id = $row['id'];
 $c_name = $row['company_name'];

       
       }
?>
  

        <div class="col-sm-6 col-md-6">
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;"><strong> <h3>Edit Job </h3></strong></div>
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
          Edit Job Basic Information
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?=site_url();?>index.php/rcb/edit_job_insert/<?=$id;?>" class="form-horizontal" role="form">
           
             <div class="form-group">  
             <div class="col-sm-12" id="notification1"></div>                
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="<?=$row['job_title'];?>" name="j_title" placeholder="Job Title" />
                  </div>
                </div>
                <div class="form-group">                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="<?=$row['experience'];?>" name="j_exp" placeholder="Experience" />
                  </div>
                </div>
                <div class="form-group">                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="<?=$row['position'];?>" name="j_position" placeholder="Position" />
                  </div>
                </div>
                   <div class="form-group">   
             <div class="col-sm-12" id="notification2"></div>                
                  <div class="col-sm-12">
      <p>
       <label for="price">Experience (In Year) : <?php $exp=$row['experience'] ; $sexp=unserialize($exp); echo $sexp[0];  ?></label><br />
         <label for="exp">Experience :</label>
         <input type="text" id="exp" 
            style="border:0; color:#b9cd6d; font-weight:bold;" name="j_exp[]" />
      </p>
      <div id="slider-4"></div>
                  </div>
                </div> 
                <div class="form-group">                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="<?=$row['skills'];?>" name="j_skills" placeholder="Skills" />
                  </div>
                </div>
             <div class="form-group">   
             <div class="col-sm-12" id="notification2"></div>                
                  <div class="col-sm-12">
                  
                  <p>
                  <label for="price">Salary : <?php $sal=$row['salary'] ; $s=unserialize($sal); echo $s[0];  ?></label><br />
         <label for="price">Salary range:</label>
         <input type="text" id="price" 
            style="border:0; color:#b9cd6d; font-weight:bold;" name="salary[]" />
      </p>
      <div id="slider-3"></div>
      </div>
                </div>              
                <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                <option value="<?=$c_name;?>" ><?=$c_name;?></option>
                    <?php $s1 = "select * from company_details where id = '".$cid."' ";
                          $r1 = mysql_query($s1); $rw1=mysql_fetch_array($r1); ?>
                    <select class="form-control" required="" name="company">
                    <option value="<?=$rw1['id'];?>" ><?=$rw1['company_name'];?></option>
                    <?php $s = "select * from company_details order by company_name";
                          $r = mysql_query($s); 
                          while($rw=mysql_fetch_array($r)){
                    
                     ?>
                     <option value="<?=$rw['id'];?>" ><?=$rw['company_name'];?></option>
                    <? } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" value="<?=$row['industry'];?>" name="industry" placeholder="Industry" />
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                  
                  <select class="form-control" required="" name="city">
                  <option>City</option>
                    <?php $s = "select * from city_list order by city_name";
                          $r = mysql_query($s); 
                          while($rw=mysql_fetch_array($r)){
                    
                     ?>
                     <option value="<?=$rw['id'];?>" ><?=$rw['city_name'];?></option>
                    <? } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                   <select class="form-control" required="" name="town">
                   <option>Township</option>
                    <?php $s = "select * from town_list order by town_name";
                          $r = mysql_query($s); 
                          while($rw=mysql_fetch_array($r)){
                    
                     ?>
                     <option value="<?=$rw['id'];?>" ><?=$rw['town_name'];?></option>
                    <? } ?>
                    </select>
                  </div>
                </div>
                 <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                    <select class="form-control" required="" name="w_type">
                   <option><?=$row['work_type'];?></option>
                   <option>Full Time</option>
                   <option>Part Time</option>
                    </select>
                  </div>
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