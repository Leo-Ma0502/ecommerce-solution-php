<?php
if(isset($_SESSION['user'])){
  $uid = $_SESSION['id'];
  $sql = "SELECT * FROM user WHERE id = '$uid'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  //account information 
  $person_information = '
  <form method="post">
    <button type="submit" class="item_add hvr-skew-backward"  name="edit">EDIT</button>
  </form>
  <form>
    <tr class="cart-header">
        <td>payment method</td>
        <td class="item_price">'. $row['paymethod'] .'</td>
        <td class="add-check"></td>
    </tr>
   
  </form>';  

  //edit account information
  $information_edit = '
  <form method="post">
    <button type="submit" class="item_add hvr-skew-backward"  name="update">Update</button>
    <tr class="cart-header">
      <input type="hidden" name = "id" value='.$row["id"].'></input>
      <td>payment method</td>
      <td class="item_price">'. $row['paymethod'] .'</td>
      <td class="add-check"><input  name = "paymethod" value='.$row["paymethod"].'></input></td>
    </tr>
   
  </form>';
    
}else{
    $person_information = "";
}

?>


