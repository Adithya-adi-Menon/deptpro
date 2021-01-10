<?php 
 include('includes/header.php');
include('includes/navbar.php');?>
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
               
           
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-4">
                        <?php 
                                     date_default_timezone_set('Asia/Kolkata');
                                     $datetime = date('y-m-dCH:i+05:30');
                                     
                                    $query="SELECT id FROM login WHERE email = '".$_SESSION["email"]."'";
                                    $query_run = mysqli_query($con,$query);
                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        while($row=mysqli_fetch_assoc($query_run))
                                        {
                                            $caretaker_id= $row["id"];
                                            $query1= "SELECT * FROM patients WHERE caretaker_id = '$caretaker_id'";
                                            $query_run1 = mysqli_query($con,$query1);
                                            
                                        foreach($query_run1 as $row1)
                                        {
                                         $id= $row1["id"];
                                           
                                         $query2= "SELECT room FROM graph WHERE patient_id = '$id' AND datetimesql='$datetime'";
                                         $query_run2 = mysqli_query($con,$query2);
                                         
                                     foreach($query_run2 as $row2)
                                     {            
                                ?>
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title mb-3">Patient Card</strong>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="mx-auto d-block">
                                        <h5 class="text-sm-center mt-2 mb-1">Name : <?php echo $row1["name"];?></h5>
                                        <div class="location text-sm-center"><i class="fa fa-map-marker"></i>Age : <?php echo $row1["age"];?></div>
                                    </div>
                                        <hr>
                                        <div class="card-text text-sm-center">
                                            <!-- <a href="#" class="btn btn-primary">View</a> -->
                                            <?php  echo '
                            <a class="btn btn-primary" href=patient_care.php?branches='.preg_replace('#[ -]+#', '-', trim($row1['name'])).'&room='.preg_replace('#[ -]+#', '-', trim($row2['room'])).'>
                          	View
                            </a>
                              ';?>
                                        </div>
                                     
                                </div>
                              
                            </div>
                                            <?php          
                                            }      
                                         }
                                        }
                                    }
                                    else{
                                        echo "no records";
                                    }
                                ?>
                        </div>
                    </div>
                </div>
         
               
               
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright 
                    </div>
                    
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    
</body>
</html>
