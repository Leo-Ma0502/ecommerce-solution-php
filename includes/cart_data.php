<?php 
$goods_list = '<div class="mid-popular">';
$uid = $_SESSION['id'];
$gids = '<form method="post">
        <button name="checkout" class="hvr-skew-backward">Checkout</button>';
$sql = "SELECT g.*, c.name as cname, car.* FROM goods g INNER JOIN category c ON g.cid=c.id INNER JOIN cart car ON g.gid=car.gid WHERE car.uid=$uid";
if ($result = mysqli_query($con, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        $goods_list .= '<div class="col-md-3 item-grid simpleCart_shelfItem">
                        <div class="mid-pop">
                            <div class="pro-img">
                                <img src="'. $row['pic_path'].'" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="includes/detail.php?gid='. $row['gid'] .'" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="index.php?cid='. $row['cid'] .'"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>

                        <div class="mid-1">
                            <div class="women">
                                <div class="women-top"><span>' . $row['cname'] .'</span>
                                    <h6><a>' . $row['name'] .'</a></h6>
                                </div>
                                <div class="img item_add">
                                    <form method="post">
                                        <button name="cart_delete">DELETE</button>
                                        <input type="hidden" name="cartid" value= '.$row['cartid'].'></input>
                                    </form>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>

                            <div class="mid-2">
                                <p ><label>¥' . $row['original_price'] .'</label><em class="item_price">¥' . $row['present_price'] .'</em></p>
                            <div class="block">
                    
                            </div>
                            <div class="clearfix">
                    
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>';
        $gids .= '<input type="hidden" name="gid[]" value= '. $row['gid'] .'>';
        $gids .= '<input type="hidden" name="cartid[]" value= '. $row['cartid'] .'>';
        
    }  
    $gids .= '</input></form>';
    $goods_list .= '<div class="clearfix"></div></div>';
}




?>
