<?php 
 include('includes/header.php');
include('includes/navbar.php');?>
     <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                               <?php
                               $query="SELECT distinct login.username,login.id , patients.name FROM login INNER JOIN patients ON login.id = patients.caretaker_id ";
                               $query_run = mysqli_query($con,$query);
                               if(mysqli_num_rows($query_run)>0){
                                $row = mysqli_fetch_assoc($query_run);
                                   
                               
                               ?>
                                    <thead>
                                       
                          
                                        <tr>
                            
                                            <th>CareTakerName</th>
                                            <th>Patients</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($query_run as $row)
                                                {
                                                ?>
                                    <tr>
                                            <td><?php echo $row["username"] ?></td>
                                            <td><?php echo $row["name"] ?></td>
                                            
                                    </tr>
                                    <?php
                                         }
                                        }
                                         else{
                                            echo "No records";
                                         }

                                         ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content 