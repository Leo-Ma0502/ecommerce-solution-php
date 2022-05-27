<?php 
$goods_information = '';
$goods_picture = '';
if (isset($_GET['gid'])) {
    $target = explode('#', $_GET['gid'])[0];
    $sql = "SELECT * FROM goods WHERE id=$target";
    if ($result = mysqli_query($con, $sql)) {
        $row = mysqli_fetch_array($result);
        $goods_information .= '<h3 class="good_name">Name:'. $row['name'] .'</h3>
                            <p> Description:</p>
                            <p> '. $row['description'] .'</p>
                            <p> '. $row['description'] .'</p>
                            <p> '. $row['description'] .'</p>
                            <p> '. $row['description'] .'</p>
                            <p> '. $row['description'] .'</p>
                            <p> '. $row['description'] .'</p>
                            <div class="price_single">
                            <span class="reducedfrom item_price">Present price:'. $row['present_price'] .'</span>
                            </div>
                            ';
        $goods_picture .= '<img src='.$row["pic_path"].'></img>';
    }

}
?>

