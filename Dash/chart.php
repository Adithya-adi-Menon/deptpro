<?php include('includes/header.php');
 include('includes/navbar.php');
?>

    <div class="WhereIsPatient">

        <div>
            <canvas id="myChart"></canvas>
        </div>
        <div class="Details">
        <?php
                if(isset($_GET['submit']))
                {
                $datetime1=$_GET['datetime'];
                $splitdatetime = explode(" ",$datetime1);
                $date = $splitdatetime[0];
                $time = $splitdatetime[1];
                $c = "C";
                $append = "+05:30";
                $perfect_datetime = $date.$c.$time.$append;
                $branch1 = $_GET['branches'];
                $querychart = "SELECT patients.name,graph.* FROM patients INNER JOIN graph ON patients.id = graph.patient_id WHERE patients.name='$branch1'AND datetimesql='$perfect_datetime' ";
                $query_runchart = mysqli_query($con,$querychart);
                if(mysqli_num_rows($query_runchart)>0)
                {?>
                <?php 
                    while($rowchart = mysqli_fetch_assoc($query_runchart))
                    {?>
                        
                        
            <div class="alert alert-info" role="alert">
                Name :- <?php echo $rowchart["name"];?>
            </div>
            <div class="alert alert-warning" role="alert">
                Current Posture :- <?php echo $rowchart["posture"];?>
            </div>
            <div class="alert alert-dark" role="alert">
                Temprature :- <?php echo $rowchart["temperature"];?> °C
            </div>
            <div class="alert alert-danger" role="alert">
                Heart Beat :- <?php echo $rowchart["heartbeat"];?> bpm
            </div>
            <?php }
                }
                else{
                    "No record Found";
                }
            }else{

            
            ?>
            <?php
                $datetime1=$_GET['datetime'];
                $splitdatetime = explode(" ",$datetime1);
                $date = $splitdatetime[0];
                $append = "+05:30";
                $perfect_datetime = $date.$append;
                
                $branch1 = $_GET['branches'];
                $brch_string1 = str_replace("-"," ",$branch1);
                $querychart = "SELECT patients.name,graph.* FROM patients INNER JOIN graph ON patients.id = graph.patient_id WHERE patients.name='$brch_string1'AND datetimesql='$perfect_datetime' ";
                $query_runchart = mysqli_query($con,$querychart);
                if(mysqli_num_rows($query_runchart)>0)
                {?>
                <?php 
                    while($rowchart = mysqli_fetch_assoc($query_runchart))
                    {?>
                        
                  
            <div class="alert alert-info" role="alert">
                Name :- <?php echo $rowchart["name"];?>
            </div>
            <div class="alert alert-warning" role="alert">
                Current Posture :- <?php echo $rowchart["posture"];?>
            </div>
            <div class="alert alert-dark" role="alert">
                Temprature :- <?php echo $rowchart["temperature"];?> °C
            </div>
            <div class="alert alert-danger" role="alert">
                Heart Beat :- <?php echo $rowchart["heartbeat"];?> bpm
            </div>
            <?php }
                }
                else{
                    "No record Found";
                }
            }

            
            ?>
            
        </div>

    </div>

    <div id="selectTime">
    <?php
    $branch1 = $_GET['branches'];
                $brch_string1 = str_replace("-"," ",$branch1);
             $brch_string1 ?>
        <form method="get" action="chart.php"  id="task-form">

            <div class="form-group" style="position: relative">
                <label for="due">Select Time</label>
                <input type="text" id="due" name="datetime" class="form-control">
                <input type="hidden" name="branches" value="<?php echo $brch_string1?>" class="form-control"> 
            </div>
            <input type="submit" name="submit" value="Show Graph" class='btn btn-primary btn-block'>
        </form>
    
    </div>
    <div id="rooms">


        <div class="border border-success">
            <canvas id="RoomA"></canvas>

        </div>

        <div class="border border-success">
            <canvas id="RoomB"></canvas>

        </div>

        <div class="border border-success">
            <canvas id="RoomC"></canvas>

        </div>
    </div>


    <!-- including chart js using cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"
        integrity="sha512-zO8oeHCxetPn1Hd9PdDleg5Tw1bAaP0YmNvPY8CwcRyUk7d7/+nyElmFrB6f7vg4f7Fv4sui1mcep8RIEShczg=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    

        <?php include("chartScript.php") ?>

        <?php include("latlong.php") ?>
        

    <!--Datetime-->
    <script src="https://kit.fontawesome.com/9a3152f70a.js" crossorigin="anonymous"></script>
    <script src="bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#due').datetimepicker({format:'YY-MM-DD HH:mm'});
        });
    </script>
</body>

</html>