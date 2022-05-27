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
        <td>User name</td>
        <td class="item_price">'. $row['name'] .'</td>
        <td class="add-check"></td>
    </tr>
    <tr class="cart-header1">
      <td>phone number</td>
      <td class="item_price">'. $row['phone_number'] .'</td>
      <td class="add-check"></td>
    </tr>
    <tr class="cart-header2">
      <td>email address</td>
      <td class="item_price">'. $row['mail'] .'</td>
      <td class="add-check"></td>
    </tr>
    <tr class="cart-header2">
      <td>password</td>
      <td class="item_price">**********</td>
      <td class="add-check"></td>
    </tr>
    <tr class="cart-header2">
      <td>Address</td>
      <td class="item_price">'. $row['address'] .'</td>
      <td class="add-check"></td>
    </tr>
  </form>';  

  //edit account information
  $information_edit = '
  <form method="post">
    <button type="submit" class="item_add hvr-skew-backward"  name="update">Update</button>
    <tr class="cart-header">
      <input  type="hidden" name = "id" value='.$row["id"].'></input>
      <td>User name</td>
      <td class="item_price">'. $row['name'] .'</td>
      <td class="add-check"><input  name = "name" value='.$row["name"].'></input></td>
    </tr>
    <tr class="cart-header1">
      <td>phone number</td>
      <td class="item_price">'. $row['phone_number'] .'</td>
      <td class="add-check"><input  name = "phone_number" value='.$row["phone_number"].'></input></td>
    </tr>
    <tr class="cart-header2">
      <td>email address</td>
      <td class="item_price">'. $row['mail'] .'</td>
      <td class="add-check"><input  name = "mail" value='.$row["mail"].'></input></td>
    </tr>
    <tr class="cart-header2">
      <td>password</td>
      <td class="item_price">**********</td>
      <td class="add-check"><input  name = "password" value='.$row["password"].'></input></td>
    </tr>
    <tr class="cart-header2">
      <td>Address</td>
      <td class="item_price">'. $row['address'] .'</td>
      <td class="add-check"><input  name = "address" value='.$row["address"].'></input></td>
    </tr>
  </form>';
    
}else{
    $person_information = "";
}

?>


