<?php 
 include('includes/header.php');
include('includes/navbar.php');?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php 
            $query="SELECT id FROM login WHERE email = '".$_SESSION["email"]."'";
            $query_run = mysqli_query($con,$query);
            if(mysqli_num_rows($query_run)>0)
            {?>
  
        <form method="post" action="logic/managepatient.php">
          <div class="form-group">
            <label for="Name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="Age" class="col-form-label">Age:</label>
            <input type="text" name="age" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
          <?php
                foreach($query_run as $row)
                {?>
            
            <input type="text" value="<?php echo $row["id"]?>" name="caretaker_id" class="form-control" id="recipient-name">
            <?php     
                }?>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
        </form>
               
            
        <?php
            }else{
                echo "No Records Found";
            }

          ?>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal close --><div>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                            <?php
                                    $query = "SELECT id FROM login WHERE email='".$_SESSION["email"]."'";
                                    $query_run = mysqli_query($con,$query);
                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                      
                                        while($row = mysqli_fetch_assoc($query_run))
                                        {
                                            $caretaker_id = $row["id"];
                                            $query1="SELECT * FROM patients WHERE caretaker_id='$caretaker_id'";
                                            $query_run1=mysqli_query($con,$query1);
                                        
                                    ?>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <button type="button" data-toggle="modal" data-target="#exampleModal" style="float:right;"class="btn btn-primary">Add Patients</buttom>
                                    <thead>
                                       
                      
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($query_run1 as $row1)
                                                {
                                                ?>
                                        <tr>
                                            <td><?php echo $row1["name"] ?></td>
                                            <td><?php echo $row1["age"]?></td>
                                            <td><a class="btn btn-secondary">Edit</a></td>
                                            <td><a class="btn btn-danger">Delete</a></td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                      
                                    }
                                    else{
                                        echo "No Records";
                                    }
                                        
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
