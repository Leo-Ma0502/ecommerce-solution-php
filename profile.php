<?php include("includes/templates/temp_head.php");?>  
<?php include("includes/templates/temp_body_header.php");?> 

<!--banner-->
<div class="banner-top">
    <div class="container">
        <h1>Profile<h1>
        <em></em>
        <h2><a href="index.php">Go to Home</a><label>||</label>Profile</a></h2>
    </div>
</div>

<?php 
if(isset($_SESSION['user'])){
    include("includes/templates/temp_profile.php");
    if(isset($_GET['section'])) {  
        $target = explode('#', $_GET['section'])[0];
        echo "<br><br><h2>$target</h2>";
        include('includes/'.$target.'.php');   
    }
}else{
	echo "<a href='user_auth.php?section=login' class='item_add hvr-skew-backward'>Please login</a>";
}

?>



<?php include("includes/templates/temp_body_footer.php");?> 