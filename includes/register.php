<?php 	
if(isset($_POST['register'])){
	$user =$_POST['user'];
	$phone_number = $_POST['phone_number'];
	$mail = $_POST['mail'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$address = $_POST['address'];
	if($user&&$phone_number&&$mail&&$password&&$repassword&&$address&&$password==$repassword){
		echo "<script>console.log('data post succuss')</script>";
		$sql = "INSERT INTO `user`(`name`, `phone_number`, `mail`, `password`,  `address`) VALUES ('$user','$phone_number','$mail','$password','$address')" ;
		$check = mysqli_query($con,$sql);
		if ($check){
			echo "<script>alert('Successfully registered! Login again please')</script>";
			echo "<script>window.location.replace('user_auth.php?section=login','_self')</script>";
		}else{
			echo "<script>alert('Something error')</script>";
			echo "<script>window.location.replace('user_auth.php?section=register','_self')</script>";
		}
	}else{
		echo "<script>alert('data lost or the password is not consistent')</script>";
	}
	
}		
				
?>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Register</h1>
		<em></em>
		<h2><a href="index.php">Go to Home</a><label>||</label>Register</a></h2>
	</div>
</div>
<!--register-->
<div class="container">
	<div class="login">
		
		<div class="col-md-6 login-do">
			<form action="" method="post">
				<div class="login-mail">
					<input type="text" name = "user" placeholder="username" required="">
					<i  class="glyphicon glyphicon-user"></i>
				</div>
				<div class="login-mail">
					<input type="text" name = "phone_number" placeholder="phone number" required="">
					<i  class="glyphicon glyphicon-phone"></i>
				</div>
				<div class="login-mail">
					<input type="text" name = "mail" placeholder="email" required="">
					<i  class="glyphicon glyphicon-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" name = "password" placeholder="password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<div class="login-mail">
					<input type="password" name = "repassword" placeholder="confirm password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<div class="login-mail">
					<input type="text" name = "address" placeholder="address" required="">
					<i  class="glyphicon glyphicon-envelope"></i>
				</div>
				
				
				<label class="hvr-skew-backward">
					<button  class="hvr-skew-backward"  name = "register" id = "register" >register</button>			
				</label>
			</form>
		
		</div>
		
		<div class="col-md-6 login-right">
				<h3>Free Account</h3>			
				<p>Already have an account?</p>
			<a href="user_auth.php?section=login" class="hvr-skew-backward">Login</a>

		</div>
		
		<div class="clearfix"> </div>
		
	</div>

</div>

<!--//register-->
