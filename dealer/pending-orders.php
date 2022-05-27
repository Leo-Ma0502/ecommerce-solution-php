
<?php
session_start();
include('include/config.php');
// see if the user is logged in
if(strlen($_SESSION['alogin'])==0)
{	
	header('location:index.php');
}

// if is logged in
else{
	$Did = $_SESSION['id'];
	date_default_timezone_set('Asia/Kolkata');// change according timezone
	$currentTime = date( 'd-m-Y h:i:s A', time () );

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Pending Orders</title>
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
								<h3>Manage Orders</h3>
							</div>
							<div class="module-body table">


							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" >
									<thead>
										<tr>
											<th>#</th>
											<th>Product name</th>
											<th width="50">User Contact</th>
											<th>Number </th>
											<th>Status </th>
											<th>Options</th>
								
										</tr>
									</thead>
								
									<tbody>

									<?php 
									$query=mysqli_query($con,"select o.*, u.mail as umail from orders o inner join user u on o.uid=u.id where o.did=$Did");
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
												<td><form method="post">
													<?php 
													if($row['status']=='asked for refund'){
														echo "<button name=process value=".$row['oid'].">PROCESS</button>";
													}else{
														echo "Nothing to process";
													}
													?>
													</form>
												</td>
												
											</tr>

											<?php $cnt=$cnt+1;  
									}
									?>
									</tbody>
							</table>
							<?php 
							if(isset($_POST['process'])){
								$oid_to_process = $_POST['process'];
								$update=mysqli_query($con,"update orders set status='refund request processed' where oid=$oid_to_process");
								if($update){
									echo "<script>window.location.replace('pending-orders.php')</script>";
								}else{
									echo "<script>alert('update failed')</script>";
								}

								echo "processed".$oid_to_process;
							}
							
							
							?>
						</div>
					</div>						

					
					
				</div>
			</div>
		</div>
	</div>
</div>

	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
<?php } ?>