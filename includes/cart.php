<?php
if(isset($_SESSION['id'])){
	include("cart_data.php");
	?>
	<div class="col-md-10">
		<div class="check-out">
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="table-responsive">
						<table class="table-heading simpleCart_shelfItem">
							<?php echo "$goods_list" ?>	
						</table>
				</div>
			</div>
			<div class="produced">

					<?php echo "$gids" ?>	

			</div>
		</div>
	</div>
</div>

<?php 
	if(isset($_POST['cart_delete'])){
		if(isset($_SESSION['id'])){
			$uid = $_SESSION['id'];
			$cartid = $_POST['cartid'];
			$sql = "DELETE FROM cart WHERE cartid=$cartid";
			$check = mysqli_query($con,$sql);
			if($check){
				echo "<script>alert('Product successfully deleted from your cart!')</script>";
				echo "<script>window.location.replace('profile.php?section=cart')</script>";
			}
	
	
		}else{
			echo "<script>alert('login to delete this')</script>";
		}
	}elseif(isset($_POST['checkout'])){
		//user id
		$uid = $_SESSION['id'];

		echo "<script>console.log('user id: ' + '$uid')</script>";
		echo "<script>console.log('------')</script>";

		//get good information, especially available dealer id and status
		if(isset($_POST['gid'])){
			$gid = $_POST['gid'];
			$cartid = $_POST['cartid'];
			for($i=0; $i<count($gid); $i++){
				echo "<script>console.log('car id:' + '$carid[$i]')</script>";
				$get_good = "SELECT * FROM goods WHERE gid=$gid[$i];";
				echo "<script>console.log('------')</script>";
				//check the availablity of the good to decide whether the order can be generated
				if($result_good = mysqli_query($con, $get_good)){
					$row_good= mysqli_fetch_array($result_good);
					$status = $row_good['status'];
					if($status=='available'){
						$a = $row_good['name'];
						$did = $row_good['did'];
						$gid_available = $row_good['gid'];
						echo "<script>console.log('available dealer for ' + '$a ' + 'is ' + '$did')</script>";
						$order = "INSERT INTO `orders` (`uid`, `did`, `gid`) VALUES ('$uid', '$did', '$gid_available')";
						$check = mysqli_query($con, $order);
						if($check){
							echo "<script>console.log('order generated for')</script>";
							echo "<script>console.log('good id: ' + '$gid_available')</script>";
							echo "<script>console.log('')</script>";

						}else{
							echo "<script>alert('good id:')</script>";
							echo "<script>console.log('$gid_available')</script>";
							echo "<script>console.log('is not added')</script>";
						}
						$new_cart = "DELETE FROM `cart` WHERE `cartid`=$cartid[$i]";
						$refresh_check = mysqli_query($con, $new_cart);
					}else{
						$na = $row_good['name'];
						echo "<script>alert('$na'+' is not available')</script>";
					}
						
					
					
				}else{
					echo "<script>console.log('goods data lost')</script>";
				}
			}
			echo "<script>window.location.replace('profile.php?section=orders')</script>";
			
		}else{
			echo "<script>alert('you have nothing in cart')</script>";
		}

		
	}


}else{
	echo "<li><a href='user_auth.php?section=login' class='item_add hvr-skew-backward'>Please login</a></li>";
}

?>


