<?php
/**Connection to database */
$con = mysqli_connect("localhost", "root", "", "db_0512");
if (mysqli_connect_errno($con)) { 
    die("Connect to MySQL failed: " . mysqli_connect_error()); 
}else{
    echo "<script>console.log('database connected')</script>";
}

?>