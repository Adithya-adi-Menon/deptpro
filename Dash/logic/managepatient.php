<?php
include("../includes/dbconfig.php");
if(isset($_POST['submit']))
{
    $name = $_POST["name"];
    $age = $_POST["age"];
    $caretaker_id = $_POST["caretaker_id"];

    $query= "INSERT INTO patients(caretaker_id,name,age)VALUES('$caretaker_id','$name','$age')";
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        echo '<script type="text/javascript">alert("Patient Added Successfully");
        window.location.href="../managep_care.php";
        </script>';
    }
    else{
        echo '<script type="text/javascript">alert("Failed to Add");
        window.location.href="../managep_care.php";
        </script>';
    }
}
?>