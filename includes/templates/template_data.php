<?php
include("includes/db.php");
$sql = "SELECT id,name FROM category";
$navigation_bar = '<li><a class="color" href="index.php">HOME</a></li>';
if ($result = mysqli_query($con, $sql)) {
    while ($row = mysqli_fetch_array($result)) {       
        $navigation_bar  .='<li>
                                <a class="color" href="index.php?cid='. $row['id'] .'" >'. $row['name'] .'</span>
                                </a>
                            </li>';
        
    }
    if(isset($_SESSION['id'])){
        $uid = $_SESSION['id'];
        $navigation_bar .= '<li>
                            <a class="color" href="profile.php?section=cart">
                                My Cart
                                <img src="common/images/cart.png" alt=""/>
                            </a> 
                        </li>';

    }else{
        $navigation_bar .= '<li>
                            <a class="color" href="profile.php?section=cart">
                                My Cart
                                <img src="common/images/cart.png" alt=""/>
                            </a> 
                        </li>';

    }
   
                       
        
}   

?>