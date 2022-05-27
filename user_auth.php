<?php include("includes/templates/temp_head.php");?>  
<?php include("includes/templates/temp_body_header.php");?>  
<?php 

//include("includes/templates/temp_profile.php");

if(isset($_GET['section'])) {  
    $target = explode('#', $_GET['section'])[0];
    //echo "<script>window.open('$target.php','_self')</script>";
    include('includes/'.$target.'.php');
    
    
}


?>



<?php include("includes/templates/temp_body_footer.php");?> 