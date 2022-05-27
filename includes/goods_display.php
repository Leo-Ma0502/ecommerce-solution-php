<?php 
$goods_list = '<div class="mid-popular">';

if(isset($_POST['search'])){
    $input = $_POST['input'];
    $sql = "SELECT g.*, c.name as cname FROM goods g INNER JOIN category c ON g.cid=c.id WHERE g.name LIKE '%$input%'";
    $cat = 'Result for: '. $input;
    if ($result = mysqli_query($con, $sql)) {
        $count = mysqli_num_rows($result);
        if($count>0){
            while ($row = mysqli_fetch_array($result)) {
                $goods_list .= '<div class="col-md-3 item-grid simpleCart_shelfItem">
                                <div class="mid-pop">
                                    <div class="pro-img">
                                        <img src="'. $row['pic_path'].'" class="img-responsive" alt="">
                                            <div class="zoom-icon ">
                                                <a class="picture" href="includes/detail.php?gid='. $row['gid'] .'" 
                                                rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
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
                                            <button name="cart_add"><img src="common/images/ca.png"></button>
                                            <input type="hidden" name="gid" value= '.$row['gid'].'></input>
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
                
            }  

            
        }else{
            $goods_list .= '<div class="col-md-3 item-grid simpleCart_shelfItem">
                                No result for:   '.$input.'
                                </div>
                                </div>
                                </div>
                                </div>';
            $goods_list .= '<div class="clearfix"></div></div>';      
        }   
    }   
}elseif(isset($_GET['cid'])){
    $id=$_GET['cid'];
    $sql = "SELECT g.*, c.name as cname FROM goods g INNER JOIN category c ON g.cid=c.id WHERE c.id=$id";
    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $cat = 'Category: '.$row['cname'];
            $goods_list .= '<div class="col-md-3 item-grid simpleCart_shelfItem">
                            <div class="mid-pop">
                                <div class="pro-img">
                                    <img src="'. $row['pic_path'].'" class="img-responsive" alt="">
                                        <div class="zoom-icon ">
                                            <a class="picture" href="includes/detail.php?gid='. $row['gid'] .'" rel="title" 
                                            class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
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
                                        <button name="cart_add"><img src="common/images/ca.png"></button>
                                        <input type="hidden" name="gid" value= '.$row['gid'].'></input>
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
            
        }  
        $goods_list .= '<div class="clearfix"></div></div>';		 
    
    }
}else{
    $cat = 'Home';
    $sql = "SELECT g.*, c.name as cname FROM goods g INNER JOIN category c ON g.cid=c.id";

    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $goods_list .= '<div class="col-md-3 item-grid simpleCart_shelfItem">
                            
                                <div class="mid-pop">
                                    <div class="pro-img">
                                        <img src="'. $row['pic_path'].'" class="img-responsive" alt="">
                                            <div class="zoom-icon ">
                                                <a class="picture" href="includes/detail.php?gid='. $row['gid'] .'" rel="title" 
                                                class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
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
                                                    <button name="cart_add"><img src="common/images/ca.png" alt=""></button>
                                                    <input type="hidden" name="gid" value= '.$row['gid'].'></input>
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
            
        }  
        $goods_list .= '<div class="clearfix"></div></div>';
        		 
    }

}


?>

