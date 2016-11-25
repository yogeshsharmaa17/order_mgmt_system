<?php $username = $this->session->userdata('username');  if($username !=''){ ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>List New Job</title>
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
                  $( "#price" ).val( ui.values[ 0 ] +"-"+ ui.values[ 1 ] );
               }
           });
         $( "#price" ).val( ( "#slider-3" ).slider( "values", 0 ) +
            "-" + ( "#slider-3" ).slider( "values", 1 ) );
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
        <div class="col-sm-8 col-md-8">
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;"><strong> <h3>List New Job </h3></strong></div>
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
          Job Basic Information
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
       
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?=site_url();?>index.php/rcb/new_job_insert" class="form-horizontal"  enctype="multipart/form-data" role="form">
           
             <div class="form-group">  
             <div class="col-sm-12" id="notification1"></div>                
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" name="j_title" placeholder="Job Title" />
                  </div>
                </div>
            
                <div class="form-group">                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" name="j_position" placeholder="Position" />
                  </div>
                </div>
                     
                <div class="form-group">                  
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" name="j_skills" placeholder="Skills" />
                  </div>
                </div>
                 <div class="form-group">
                 <div class="col-sm-4"><label>Open Date</label></div>                  
                  <div class="col-sm-8">
                    <input type="date" class="form-control" required="" name="open_date" />
                  </div>
                </div>
                 <div class="form-group">                  
                  <div class="col-sm-4"><label>Close Date</label></div>                  
                  <div class="col-sm-8">
                    <input type="date" class="form-control" required="" name="close_date" />
                  </div>
                </div>
                  <div class="form-group">   
             <div class="col-sm-12" id="notification2"></div>                
                  <div class="col-sm-12">
      <p>
         <label for="exp">Experience (In Year ):</label>
         <input type="text" id="exp" 
            class="form-control" placeholder="Ex: 5-3 max to min"  name="j_exp[]" />
      </p>
      <div id="slider-4"></div>
                  </div>
                </div> 
             <div class="form-group">   
             <div class="col-sm-12" id="notification2"></div>                
                  <div class="col-sm-8">
 <p>
         <label for="price">Salary range:</label>
         <input type="text" id="price" style="border:0; color:#b9cd6d; font-weight:bold;" name="salary[]" />
      </p>
      <div id="slider-3"></div>
                  </div>
                  
                  <div class="col-sm-4">
                   <label for="price">Currency:</label>
                   <select class="form-control" required="" name="currency">
                   <option>Currency Type</option>
                   <option value="1" >Dollar</option>
                   <option value="2" >Kyat</option>
                    
                    </select>
                  </div>
                </div>              
                <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                    
                    <select class="form-control" required="" name="company">
                    <option>Company</option>
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
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                  
                  <select class="form-control" required="" id="country" name="country">
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
                   <select class="form-control" required="" id="state" name="state">
                  <option>State</option>
                    </select>
                  </div>
                </div>
                            <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                   <select class="form-control" required="" id="district" name="city">
                   <option>City</option>
                    </select>
                  </div>
                </div>  
             </div> 
                  <div class="form-group">
                <div class="col-sm-12" id="notification3"></div> 
                <div class="col-sm-12">
                   <select class="form-control" required="" name="w_type">
                   <option>Working Type</option>
                   <option>Full Time</option>
                   <option>Part Time</option>
                    
                    </select>
                  </div>
                </div>
                  <div class="form-group">                  
                  <div class="col-sm-12">
                    <textarea  class="form-control" required="" name="job_desc" placeholder="Job Discription" ></textarea>
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
            </div>
   
      </div><!-- end main row -->

    </div><!-- end container -->
<?php include 'include/footer.php'; ?>
<?php include 'include/script.php'; ?>
 <script>
            $(document).ready(function () {
               //ON STREET SELECT BOX CHANGE
  
    $('#country').change(function() { 
    var  country_id = $(this).val();
  //  alert(country_id);
    $.ajax({
method: "POST",
url: "<?=site_url();?>index.php/rcb/ajax_state_list",
data: { country_id: country_id }
}).done(function( data ) {  $('#state').html(data); });
});  

  $('#state').change(function() { 
    var  state_id = $(this).val();
    alert(state_id);
    $.ajax({
method: "POST",
url: "<?=site_url();?>index.php/rcb/ajax_district_list",
data: { state_id: state_id }
}).done(function( data ) { alert(data);  $('#district').html(data); });
});  

  });
            </script>
  </body>
</html>
<?php }else{ header("location:index.php/rcb/rcbpl"); } ?>