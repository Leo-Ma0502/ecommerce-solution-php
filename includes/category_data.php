<?php 
$id = $_GET['cid'];
		
$sql = "SELECT name FROM category WHERE id='$id'";
$resultn = mysqli_query($con, $sql);
$rown = mysqli_fetch_array($resultn);
$name = $rown['name'];


$goods_list = '<div class="mid-popular">';
$sql = "SELECT id FROM category  WHERE  fid='$id'";
if ($resultp = mysqli_query($con, $sql)) {
    while ($rowp = mysqli_fetch_array($resultp)) {
        $idid = $rowp['id'];
        $sql = "SELECT  cid,cname FROM selling  WHERE cid='$idid'";
        $resultps = mysqli_query($con, $sql);
        if($rowps = mysqli_fetch_array($resultp))
        {
            $goods_list .= '<div class="col-md-4 item-grid1 simpleCart_shelfItem"><div class=" mid-pop"><div class="pro-img">
            <img src="common/images/pc1.jpg" class="img-responsive" alt=""><div class="zoom-icon ">
            <a class="picture" href="common/images/pc.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
            <a href="index.php?a=home&c=home&m=category&id='. $rowps['cid'] .'"><i class="glyphicon glyphicon-menu-right icon"></i></a></div></div><div class="mid-1">
            <div class="women"><div class="women-top"><span>分类</span><h6><a href="index.php?a=home&c=home&m=category&id='. $rowps['cid'] .'">' . $rowps['cname'] .'</a></h6>
            </div><div class="img item_add"><a href="#"><img src="common/images/ca.png" alt=""></a>
            </div><div class="clearfix"></div></div><div class="mid-2"><p ><label></label><em class="item_price"></em></p>
            <div class="block"><div class="starbox small ghosting"> </div></div><div class="clearfix"></div></div></div></div></div>';
        }
    }
}

$sql = "SELECT gid FROM selling WHERE cid='$id' LIMIT 24";
if ($result = mysqli_query($con, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        $gid = $row['gid'];
        $sql = "SELECT pic_path,cname,name,original_price,present_price FROM goods WHERE id='$gid'";
        $results = mysqli_query($con, $sql);
        $rows = mysqli_fetch_array($result);
        if(isset($rows))
        {
            $goods_list .= '<div class="col-md-4 item-grid1 simpleCart_shelfItem"><div class=" mid-pop"><div class="pro-img">
            <img src="'. $rows['pic_path'] .'" class="img-responsive" alt=""><div class="zoom-icon ">
            <a class="picture" href="'. $rows['pic_path'] .'" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
            <a href="index.php?a=home&c=home&m=content&id='. $gid .'"><i class="glyphicon glyphicon-menu-right icon"></i></a></div></div><div class="mid-1">
            <div class="women"><div class="women-top"><span>' . $rows['cname'] .'</span><h6><a href="index.php?a=home&c=home&m=content&id='. $gid .'">' . $rows['name'] .'</a></h6>
            </div><div class="img item_add"><a href="#"><img src="common/images/ca.png" alt=""></a>
            </div><div class="clearfix"></div></div><div class="mid-2"><p ><label>' . $rows['original_price'] .'</label><em class="item_price">' . $rows['present_price'] .'</em></p>
            <div class="block"><div class="starbox small ghosting"> </div></div><div class="clearfix"></div></div></div></div></div>';
        }
    } 
    $goods_list .= '<div class="clearfix"></div></div>';	   
    $result->close();
}

$sql = "SELECT cid,cname FROM selling";
$real_category = '';
$category = array();
if ($result = mysqli_query($con, $sql)) {
       while ($row = mysqli_fetch_array($result)) {
             if (!in_array($row['cname'], $category))
                 {
                   $id = $row['cid'];
                   $sql = "SELECT id FROM category WHERE fid=0  AND id='$id'";
                   $results = mysqli_query($con, $sql);
                   if($rows = mysqli_fetch_array($results))
                   { 
                       $real_category  .= '<li class="item1"><a href="index.php?a=home&c=home&m=category&id='. $row['cid'] .'">'. $row['cname'] .'</a></li>';
                       $real_category  .= '<ul class="cute">';
                       $sql = "SELECT id FROM category  WHERE  fid='$id'";
                       if ($resultss =mysqli_query($con, $sql)){
                           while($rowss = mysqli_fetch_array($resultss))
                               {
                                   $id = $rowss['id'];
                                   $sql = "SELECT  cid,cname FROM selling  WHERE  cid='$id'";
                                   $resultsss = mysqli_query($con, $sql);
                                   if($rowsss = mysqli_fetch_array($resultsss))
                                   {
                                      $real_category  .= '<li class="subitem1"><a href="index.php?a=home&c=home&m=category&id='. $rowsss['cid'] .'">'. $rowsss['cname'] .'</a></li>';
                                   } 
                               }
                       }
                       $real_category  .= '</ul>';
                   }
                   $category[] = $row['cname'];
                 }
           }   
    $result->close();
}

?>