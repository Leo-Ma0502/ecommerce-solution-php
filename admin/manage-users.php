
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Manage Dealers</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Manage Dealers</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th> Location</th>
											<th> Options</th>
											
										
										</tr>
									</thead>
									<tbody>

									<?php $query=mysqli_query($con,"select * from dealer");
									$cnt=1;
									while($row=mysqli_fetch_array($query))
									{
									?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['location']);?></td>
											<td>
												<form method="post">
												<?php 
													echo "<button name=check value=".$row['id'].">Check order information</button>";
												
												?>
												<?php 
													echo "<button name=check_stock value=".$row['id'].">Check stock information</button>";
												
												?>
												</form>
											</td>
								
											
										<?php $cnt=$cnt+1; }
										
										
										
										?>
										
								</table>
								<?php 
								// check order information of chosen dealer
								if(isset($_POST['check'])){
									$did_to_process = $_POST['check'];
									echo "<h3>The order information of dealer $did_to_process</h3>";
									?>
									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" >
										<thead>
											<tr>
												<th>#</th>
												<th>Product name</th>
												<th width="50">User Contact</th>
												<th>Number </th>
												<th>Status </th>
											</tr>
										</thead>
									
										<tbody>

										<?php 
										$query=mysqli_query($con,"select o.*, u.mail as umail from orders o inner join user u on o.uid=u.id where o.did=$did_to_process");
										//$query=mysqli_query($con,"select g.*, cat.name as cname from goods g inner join category cat on g.cid=cat.id where g.did=$Did ");
										$cnt=1;
											while($row=mysqli_fetch_array($query))
											{
											?>										
												<tr>
													<td><?php echo htmlentities($cnt);?></td>
													<td><?php echo htmlentities($row['gid']);?></td>
													<td><?php echo htmlentities($row['umail']);?></td>
													<td><?php echo htmlentities($row['num']);?></td>
													<td><?php echo htmlentities($row['status']);?></td>
													
												</tr>

												<?php $cnt=$cnt+1;  
										}
										?>
										</tbody>
									</table>
								<?php
								//check stock information of chosen dealer
								}elseif(isset($_POST['check_stock'])){
									$did_to_process = $_POST['check_stock'];
									echo "<h3>The stock information of dealer $did_to_process</h3>";
									?>
									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<th>Stock</th>
											<th>Category</th>
											<th>Status</th>
											<th>Options</th>
										</tr>
									</thead>
									<tbody>

									<?php 
									$query=mysqli_query($con,"select g.*, cat.name as cname from goods g inner join category cat on g.cid=cat.id where g.did=$did_to_process");
									$cnt=1;
									while($row=mysqli_fetch_array($query))
									{
									?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['stock']);?></td>
											<td><?php echo htmlentities($row['cname']);?></td>
											<td><?php echo htmlentities($row['status']);?></td>
											<td>
												<form method="post">
												<?php 
												if($row['status']=='available'){
													echo "<button name=change_ua value=".$row['gid'].">make unavailable</button>";
												}else{
													echo "<button name=change_a value=".$row['gid'].">make available</button>";
												}
												?>
												</form>
											</td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
								<?php

								}
							
								?>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
<?php } ?>