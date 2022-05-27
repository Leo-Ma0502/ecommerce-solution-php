<div class="container">
  
   <div class="col-md-2">
    <div style = "padding-top:100px">
        <h4 class="cate">ITEM</h4>
        <ul class="menu-drop"> 
        <?php 
        if(isset($_SESSION['user'])){
            $uid = $_SESSION['id'];
            echo '<li class="item1";><a href="profile.php?section=account">Account information</a></li>
            <li class="item2"><a href="profile.php?section=cart">Cart</a></li>
            <li class="item2"><a href="profile.php?section=orders">Orders</a></li>
            <li class="item3"><a href="profile.php?section=payment">Payment information</a></li>';
        }else{
            echo "<li><a href='user_auth.php?section=login' class='item_add hvr-skew-backward'>Please login</a></li>";
        }
      
        
        ?>
            
           
        </ul>
    </div>
   </div>