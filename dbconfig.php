<?php

define('DB_SERVER', '117.239.104.62');
define('DB_USERNAME', 'skcet');
define('DB_PASSWORD', 'skc3t@345');
define('DB_NAME', 'careassist');
define('DB_PORT','3307');
 
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME,DB_PORT);


if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>