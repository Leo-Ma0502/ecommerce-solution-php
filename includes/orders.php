<?php 
if(isset($_SESSION['id'])){
	include("order_data.php");
	?>
	<div class="col-md-10">
		<div class="check-out">
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="table-responsive">
						<table class="table-heading simpleCart_shelfItem">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Total price</th>
                                    <th>Status</th>
                                    <th>Option</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo "$pname" ?></td>
                                    <td><?php echo "$pquant" ?></td>
                                    <td><?php echo "$tprice" ?></td>
                                    <td><?php echo "$status" ?></td>
                                    <td><?php echo "$op" ?></td>
                                </tr>

                            </tbody>
							
						</table>
				</div>
			</div>
			<div class="produced">

					<?php echo "$oids" ?>	

			</div>
		</div>
	</div>
</div>

<?php 
	// delete order before payment
	if(isset($_POST['order_delete'])){
		if(isset($_SESSION['id'])){
			$uid = $_SESSION['id'];
			$oid = $_POST['oid'];
			$sql = "DELETE FROM orders WHERE oid=$oid";
			$check = mysqli_query($con,$sql);
			if($check){
				echo "<script>alert('This order successfully deleted!')</script>";
                echo "<script>window.location.replace('profile.php?section=orders')</script>";
			}
	
	
		}else{
			echo "<script>alert('login to delete this')</script>";
		}
		// ask for refund
	}elseif(isset($_POST['refund'])){
		if(isset($_SESSION['id'])){
			$uid = $_SESSION['id'];
			$oid = $_POST['oid'];
			$sql = "UPDATE orders SET status='asked for refund' WHERE oid='$oid'";
			$check = mysqli_query($con,$sql);
			if($check){
				echo "<script>alert('Successfully asked for refund!')</script>";
                echo "<script>window.location.replace('profile.php?section=orders')</script>";
			}
	
	
		}else{
			echo "<script>alert('login to delete this')</script>";
		}

		// pay for orders
	}elseif(isset($_POST['pay'])){
		//user id
		$uid = $_SESSION['id'];
		echo "<script>console.log('user id: ' + '$uid')</script>";
		echo "<script>console.log('------')</script>";

		//check whether the user has payment method
		$payinfo = "SELECT paymethod FROM user WHERE id=$uid";
		if($r_payinfo = mysqli_query($con, $payinfo)){
			$row_payinfo = mysqli_fetch_array($r_payinfo)['paymethod'];
			//there is no payment method
			if($row_payinfo == 'not added'){
				echo "<script>alert('please add payment method first')</script>";
				echo "<script>window.location.replace('profile.php?section=payment','_self')</script>";
			//there is payment method
			}else{
				// update order status into paid
				if(isset($_POST['oid'])){
					$oids = $_POST['oid'];

					for($i=0; $i<count($oids); $i++){
						$sql_orders = "SELECT * FROM orders WHERE oid=$oids[$i]";
						$orders_info = mysqli_query($con, $sql_orders);
						if($row_orders=mysqli_fetch_array($orders_info)){
							$status = $row_orders['status'];
							if($status=='unpaid'){
								$set_paystatus = "UPDATE orders SET status = 'paid' WHERE oid=$oids[$i]";
								$check = mysqli_query($con,$set_paystatus);
								// update stock number
								$sql_orders = "SELECT * FROM orders WHERE oid=$oids[$i]";
								$orders_info = mysqli_query($con, $sql_orders);
								if($row_orders=mysqli_fetch_array($orders_info)){
									$gid_down = $row_orders['gid'];
									$sql_goods = "UPDATE goods SET stock = stock-1 WHERE gid=$gid_down";
									$check_goods = mysqli_query($con,$sql_goods);
								}
							
							}
						}

					}
					echo "<script>window.location.replace('profile.php?section=orders')</script>";
			
				}else{
					echo "<script>alert('order list is empty')</script>";

				}
				
			}

		}
	}


}else{
	echo "<li><a href='user_auth.php?section=login' class='item_add hvr-skew-backward'>Please login</a></li>";
}

?>
