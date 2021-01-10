
 <?php

    if(isset($_GET["submit"]))
    {
                $datetime1=$_GET['datetime'];
                $splitdatetime = explode(" ",$datetime1);
                $date = $splitdatetime[0];
                $times = $splitdatetime[1];
                $append = "20";
                $fetch_date = $append.$date;
                $brch_string= $_GET['branches'];
               
    function minutes($time){
        $time = explode(':', $time);
        return ($time[0]*60) + ($time[1]);
        }
        
        $converted_min= minutes($times);
        $correct_min =$converted_min -10;
    

                $query = "SELECT patients.name,graph.* FROM patients INNER JOIN graph ON patients.id = graph.patient_id WHERE patients.name='$brch_string'AND date='$fetch_date' LIMIT 11 offset $correct_min";
                $query_run = mysqli_query($con,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                ?>
                       
               
           <script type="text/javascript">
           function dateParser(date) {
               return new Date(date);
           }
           
           var ctx = document.getElementById('myChart');
           
           
           
                   
           // pull from database Date field
           var labelsXAxis = [
               <?php
                   foreach($query_run as $row )
                   {?>
               dateParser("<?php echo $row["datetime"];?>"),
               <?php
                   }
               }
               else{
                   echo "No Record Found";
               }
               ?>
           ]
           
           <?php echo $converted_min;?>
           
           // pull from database corresponding Room 
           <?php
           //    echo $converted_min;
                
                $query = "SELECT patients.name,graph.* FROM patients INNER JOIN graph ON patients.id = graph.patient_id WHERE patients.name='$brch_string' AND date='$fetch_date' LIMIT 11 offset $correct_min";
                $query_run = mysqli_query($con,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                ?>
           var dataYAxis = [
               <?php 
                   foreach($query_run as $row)
                   {
                ?>
                       '<?php echo $row["room"];?>',
                <?php
                   }
               }else{
                   echo "No record Found";
               } ?>
               ];
           
           var myChart = new Chart(ctx, {
               type: 'line',
               data: {
                   labels: labelsXAxis,
                   datasets: [{
                       label: 'Time - Patient in Specific Room',
                       backgroundColor: "red",
                       borderColor: "blue",
                       lineTension: 0,
                       fill: false,
                       data: dataYAxis,
                   }]
               },
               options: {
                   maintainAspectRatio: false,
           
                   scales: {
                       xAxes: [{
                           type: 'time',
                           distribution: 'series',
                           time: {
                               displayFormats: {
                                   quarter: 'h:mm a'
                               }
                           }
                       }],
                       yAxes: [{
                           type: 'category',
                           labels: ['BEDROOM', 'RESTROOM', 'HALL', ''],
           
                           scaleLabel: {
           
                               display: true,
                               labelString: 'Room Name'
                           }
                       }]
                   }
               }
           });
           
           myChart.canvas.parentNode.style.height = '500px';
           myChart.canvas.parentNode.style.width = '75%';
           </script>
     <?php      
    }//else for button not pressed
    else{
        date_default_timezone_set('Asia/Kolkata');
     $times = date('H:i');
     $fetch_date= date('yy-m-d');
    echo $fetch_date;

    function minutes($time){
        $time = explode(':', $time);
        return ($time[0]*60) + ($time[1]);
        }
        
        $converted_min= minutes($times);
        $correct_min =$converted_min -10;
    

     echo $correct_min;
  
     $branch = $_GET['branches'];
     $brch_string = str_replace("-"," ",$branch);
     $query = "SELECT patients.name,graph.* FROM patients INNER JOIN graph ON patients.id = graph.patient_id WHERE patients.name='$brch_string'AND date='$fetch_date' LIMIT 10 offset $correct_min";
     $query_run = mysqli_query($con,$query);
     if(mysqli_num_rows($query_run)>0)
     {
     ?>
            
    
<script type="text/javascript">
function dateParser(date) {
    return new Date(date);
}

var ctx = document.getElementById('myChart');



        
// pull from database Date field
var labelsXAxis = [
    <?php
        foreach($query_run as $row )
        {?>
    dateParser("<?php echo $row["datetime"];?>"),
    <?php
        }
    }
    else{
        echo "No Record Found";
    }
    ?>
]

<?php echo $converted_min;?>

// pull from database corresponding Room 
<?php
//    echo $converted_min;
     $brch_string = str_replace("-"," ",$branch);
     $query = "SELECT patients.name,graph.* FROM patients INNER JOIN graph ON patients.id = graph.patient_id WHERE patients.name='$brch_string' AND date='$fetch_date' LIMIT 10 offset $correct_min";
     $query_run = mysqli_query($con,$query);
     if(mysqli_num_rows($query_run)>0)
     {
     ?>
var dataYAxis = [
    <?php 
        foreach($query_run as $row)
        {
     ?>
            '<?php echo $row["room"];?>',
     <?php
        }
    }else{
        echo "No record Found";
    } ?>
    ];

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labelsXAxis,
        datasets: [{
            label: 'Time - Patient in Specific Room',
            backgroundColor: "red",
            borderColor: "blue",
            lineTension: 0,
            fill: false,
            data: dataYAxis,
        }]
    },
    options: {
        maintainAspectRatio: false,

        scales: {
            xAxes: [{
                type: 'time',
                distribution: 'series',
                time: {
                    displayFormats: {
                        quarter: 'h:mm a'
                    }
                }
            }],
            yAxes: [{
                type: 'category',
                labels: ['BEDROOM', 'RESTROOM', 'HALL', ''],

                scaleLabel: {

                    display: true,
                    labelString: 'Room Name'
                }
            }]
        }
    }
});

myChart.canvas.parentNode.style.height = '500px';
myChart.canvas.parentNode.style.width = '75%';
</script>
<?php }?>