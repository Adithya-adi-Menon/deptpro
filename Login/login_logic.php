<?php
session_start();
include('../dbconfig.php');
if(isset($_POST['submit'])){
 
 $email=$_POST["email"];
 $password=$_POST["pass"];
 $encrypt1 = md5($password);
    
  $query = "SELECT * from login where email ='$email' AND password='$encrypt1' " ;
  $query_run =mysqli_query($con,$query);

  if(mysqli_num_rows($query_run)>0){
      $_SESSION["email"] = $_POST['email'];
      $_SESSION["loggedin"]= true;
      header("Location:../Dash/dashboard.php");
    }
    else{
        echo '<script type="text/javascript">alert("Username Or Password Is Incorrect !");
        window.location.href="login.php";
        </script>';
    }
   
   
   
   
   
   
   
   
   
        //     $stmt = $con->prepare($query);
    //  $stmt->bind_param($stmt,"s",$username);
    //  $stmt->execute();
    //  mysqli_stmt_store_result($stmt);
    //  $result = $stmt->get_result();
    //  if($result->num_rows===0) exit('No rows');
    //  while($row=$result->fetch_assoc())
    //  {
    //      $username = $row['username'];
        
    //      echo $username;
    //  }
    //  $stmt->close();
     
}

?>