<?php
  session_start();
  include("../dbconfig.php");
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
                  input.hidden {
    position: absolute;
    left: -9999px;
}
.container{
    margin-left:300px;
    
}
#profile-image1 {
    cursor: pointer;
  
     width: 100px;
    height: 100px;
	border:2px solid #03b1ce ;}
	.tital{ font-size:16px; font-weight:500;}
	 .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}	
</style>

<div class="container">
	<div class="row">
	
        
        
       <div class="col-md-7 ">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                
                <input id="profile-image-upload" class="hidden" type="file">
<div style="color:#999;" >click here to change profile image</div>
                <!--Upload Image Js And Css-->
           
              
   
                
                
                     
                     
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;" </h4></span>
              <span><p></p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    <?php
    $query="SELECT * FROM login WHERE email = '".$_SESSION["email"]."'";
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0){
        $row = mysqli_fetch_assoc($query_run);
    
    ?>
     
              
<div class="col-sm-5 col-xs-6 tital " >Name:</div><?php echo $row["username"] ?><div class="col-sm-7 col-xs-6 "></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Email:</div><?php echo $row["email"] ?><div class="col-sm-7"> </div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone number:</div><?php echo $row["phone"] ?><div class="col-sm-7"></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Address:</div><?php echo $row["address"] ?><div class="col-sm-7"></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Role</div><?php echo $row["role"] ?><div class="col-sm-7"></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >ID</div><?php echo $row["id"] ?><div class="col-sm-7"></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>



 <div class="clearfix"></div>
<div class="bot-border"></div>


<?php
            }
         
        
         else{
             echo "No records";
         }

                                            ?>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script> 
       
       
       
       
       
       
       
       
       
   </div>
</div>




         