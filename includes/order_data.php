<?php 
$uid = $_SESSION['id'];

$pname = '';
$pquant = '';
$tprice = '';
$status = '';
$op = '';

$oids = '<form method="post">
        <button name="pay" class="hvr-skew-backward">Pay for all</button>';
$sql = "SELECT o.*, g.gid as gid, g.name as gn, g.present_price as gp FROM orders o INNER JOIN goods g ON o.gid=g.gid WHERE o.uid=$uid";
if ($result = mysqli_query($con, $sql)) {
    $round = 0;
    while ($row = mysqli_fetch_array($result)) {
        $pname .= "<form>".$row['gn']."<br></form>";
        $pquant .= "<form>".$row['num']."<br></form>";
        $tprice .= "<form>¥".$row['gp'] * $row['num']."<br></form>";
        $status .= "<form>".$row['status']."<br></form>";
        if($row['status']=='unpaid'){
            $op .= "<form method='post'><button style='font-size:12px' name='order_delete'>DELETE</button>";
            $op .= "<input type='hidden' name='oid' value= ". $row['oid'] ."></input></form>";
        }else{
            $op .= "<form method='post'><button style='font-size:12px' name='refund'>Refund</button>";
            $op .= "<input type='hidden' name='oid' value= ". $row['oid'] ."></input></form>";
        }
        $round++;
        
        $oids .= '<input type="hidden" name="oid[]" value= '. $row['oid'] .'>';
        
    }  
    $op .= "";
    $oids .= '</input></form>';
}




?>
