  
<script type="text/javascript">

<?php
// echo $correct_min;
$query_lat_long = "SELECT patients.name,graph.* FROM patients INNER JOIN graph ON patients.id = graph.patient_id WHERE patients.name='$brch_string'AND date='$fetch_date' LIMIT 11 offset $correct_min";
     $query_run_lat = mysqli_query($con,$query_lat_long);
     if(mysqli_num_rows($query_run_lat)>0)
     {?>
var roomA = document.getElementById('RoomA');
HallLat=[]
    HallLong=[]
    BedroomLat=[]
    BedroomLong=[]
    RestroomLat=[]
    RestroomLong=[]
    <?php

    while($row  = mysqli_fetch_assoc($query_run_lat))
         {
            if($row["room"] === "HALL")
            {?>
           
               HallLong.push(<?php echo $row["long"];?>);
               HallLat.push(<?php echo $row["lat"];?>);
               		
            <?php
            }
            elseif($row["room"] === "RESTROOM")
            {?>
               RestroomLong.push(<?php echo $row["long"];?>);
               RestroomLat.push(<?php echo $row["lat"];?>);
               
               <?php
            }
            elseif($row["room"] === "BEDROOM")
            {?>
               BedroomLong.push(<?php echo $row["long"];?>);
               BedroomLat.push(<?php echo $row["lat"];?>);
               
            <?php
            }
        }
    }
    
                ?>

var myChartroomA = new Chart(roomA, {
    type: 'line',
    data: {
        labels: HallLat,
        datasets: [{
            label: 'HALL TRAJECTORY MOTION',
            data: HallLong,
            fill: false,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false,
                }
            }]
        }
    }
});

myChartroomA.canvas.parentNode.style.height = '400px';
myChartroomA.canvas.parentNode.style.width = '25%';

var roomB = document.getElementById('RoomB');
var myChartRoomB = new Chart(roomB, {
    type: 'line',
    data: {
        labels: RestroomLat,
        datasets: [{
            label: 'RESTROOM TRAJECTORY MOTION',
            data: RestroomLong,
            fill: false,
            backgroundColor: 'purple',
            borderColor: 'purple',
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false,
                }
            }]
        }
    }
});

myChartRoomB.canvas.parentNode.style.height = '400px';
myChartRoomB.canvas.parentNode.style.width = '25%';


// 10.95575846662391, 76.85763125254759
// 10.955780624036938, 76.85701574124651
// 10.955732280588203, 76.85693777648171







var roomC = document.getElementById('RoomC');
var myChartroomC = new Chart(roomC, {
    type: 'line',
    data: {
        labels: BedroomLat,
        datasets: [{
            label: 'BEDROOM TRAJECTORY MOTION',
            data: BedroomLong,
            fill: false,
            backgroundColor: 'green',
            borderColor: 'green',
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false,
                }
            }]
        }
    }
});

myChartroomC.canvas.parentNode.style.height = '400px';
myChartroomC.canvas.parentNode.style.width = '25%';








</script>