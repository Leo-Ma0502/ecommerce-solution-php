<?php 	
if(isset($_POST['login'])){
	$user =$_POST['user'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM user WHERE name='$user' AND password='$password'" ;
	if ($result = mysqli_query($con, $sql))
	{
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);
		if($count==1)
		{	
			$_SESSION['user'] = $row['name'];
			$_SESSION['id'] = $row['id'];

			
			echo "<script>window.open('index.php','_self')</script>";
		}
		else{
			echo "<script>alert('username or Password is Wrong!')</script>";
			echo "<script>window.location.replace('user_auth.php?section=login','_self')</script>";
		}
	}

}		
			
?>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Login</h1>
		<em></em>
		<h2><a href="index.php">Go to Home</a><label>||</label>Login</a></h2>
	</div>
</div>
<!--login-->
<div class="container">
	<div class="login">
	
		<form action="" method="post">
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" name="user" placeholder="username" required="">
					<i  class="glyphicon glyphicon-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password"  name="password" placeholder="password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
					
				<label class="hvr-skew-backward">
					<button  type="submit" name="login" class=" hvr-skew-backward">Login</button>
				</label>

			</div>
			<div class="col-md-6 login-right">
				<h3>Completely Free Account</h3>
				
				<p>Haven't got an account?</p>
				<a href="user_auth.php?section=register" class=" hvr-skew-backward">Signup</a>

			</div>
			
			<div class="clearfix"> </div>
		</form>
	</div>

</div>
<!--//login-->

