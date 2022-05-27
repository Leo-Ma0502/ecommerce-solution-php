<!--The home page-->
<?php include("includes/templates/temp_head.php")?>
<?php include("includes/templates/temp_body_header.php")?>
<?php include("includes/goods_display.php")?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h1><?php echo "$cat"?></h1>
        <em></em>
        <h2><a href="index.php">Home</a><label>/</label><?php echo "$cat"?></a></h2>
    </div>
</div>
<br>
<!--//banner-->

<!--content-->
<div class="content">
    <div class="container"> 
        <!--products-->
        <div class="content-mid">
            <h3>
                <form method="post" style="font-size: small; display:inline">
                    <input name="input" value="Search for batteries here" style="width:100%; height:5%; text-align:center;" class="item_price"></input><br>
                    <button type="submit" name="search" style="width:100%; height:5%; text-align:center;" class="item_add hvr-skew-backward">Search</button>
                </form>
            </h3>
            <!-- goodslist -->
            <?php echo "$goods_list"?>
            <!-- //goodslist -->          
        </div>       
        <!--//products-->
    </div> 
</div>
<!--//content-->

<?php
if(isset($_POST['cart_add'])){
    if(isset($_SESSION['id'])){
        $uid = $_SESSION['id'];
        $gid = $_POST['gid'];
        $sql = "INSERT INTO cart (uid, gid) VALUES ('$uid', '$gid')";
        $check = mysqli_query($con,$sql);
        if($check){
            echo "<script>alert('Product successfully added to your cart!')</script>";
        }


    }else{
        echo "<script>alert('login to add this into your cart')</script>";
    }
}
include("includes/templates/temp_body_footer.php")
?>


