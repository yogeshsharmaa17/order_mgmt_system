<?php $username = $this->session->userdata('username');  if($username !=''){ ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>List State</title>
     <?php include 'include/style.php'; ?>
<script>
function user_detail(user,type)
{
 
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        
  var  x = xmlhttp.responseText;
  if(type==1){ document.getElementById("notification1").innerHTML=x; }
  if(type==2){ document.getElementById("notification2").innerHTML=x; }
  if(type==3){ document.getElementById("notification3").innerHTML=x; }
  
    }
  }
xmlhttp.open("GET","ajax_user/"+,true);
xmlhttp.send();
}
</script>

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
                <div class="panel-heading" style="text-align:center;"><strong> <h3>List State </h3></strong></div>
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
          Insert State 
        </a>
      </h4>
    </div>

          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="<?=site_url();?>index.php/rcb/list_state_insert" class="form-horizontal" role="form">
                     
                <div class="form-group">
                <div class="col-sm-12" ></div> 
                <div class="col-sm-12">
                    
                    <select class="form-control" required="" name="country_id">
                    <?php $s = "select * from country_list order by country_name";
                          $r = mysql_query($s); 
                          while($rw=mysql_fetch_array($r)){
                    
                     ?>
                     <option value="<?=$rw['id'];?>" ><?=$rw['country_name'];?></option>
                    <? } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12" ></div> 
                <div class="col-sm-12">
                    <input type="text" class="form-control" required="" name="state" placeholder="State Name" />
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