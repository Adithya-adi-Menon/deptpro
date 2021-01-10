<?php 
include("../dbconfig.php");

if(isset($_POST["submit"]))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['pass']; 
    $cpassword = $_POST['cpass'];
    $role = $_POST['role'];
     //encryption
    $encrypt1 = md5($password);
    $cencrypt1 = md5($cpassword);

    $query= "SELECT email FROM login WHERE email = '$email'";
        $query_run = mysqli_query($con,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
                if($email === $row["email"])
                {
                    echo '<script type="text/javascript">alert("Email Already Exists !");
                    window.location.href="register.php";
                    </script>';
                }
            }
        }
        elseif($encrypt1 != $cencrypt1)
        {
            echo '<script type="text/javascript">alert("Password And Conform Password Do Not Match !");
            window.location.href="register.php";
            </script>';
            
        }
        else{
                $query = "INSERT INTO login(username,email,phone,address,password,role) VALUES (?,?,?,?,?,?)";
                $stmt = $con->prepare($query);
                $stmt->bind_param('ssssss',$username,$email,$phone,$address,$encrypt1,$role);
                    
                if($stmt->execute()){
                echo '<script type="text/javascript">alert("Registration Success ");
                window.location.href="login.php";
                </script>';
                }
                else{
                echo '<script type="text/javascript">alert("Failed !");
                window.location.href="register.php";
                </script>';
                }
            }
          
    
    

}

?>