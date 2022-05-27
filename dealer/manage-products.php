
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
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
	<title>Admin| Manage Products</title>
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
								<h3>Manage Products</h3>
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
											<th>Product Name</th>
											<th>Stock</th>
											<th>Category</th>
											<th>Status</th>
											<th>Options</th>
										</tr>
									</thead>
									<tbody>

									<?php 
									$query=mysqli_query($con,"select g.*, cat.name as cname from goods g inner join category cat on g.cid=cat.id where g.did=$Did ");
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
								//set whether the good is available to buyers
								if(isset($_POST['change_ua'])){
									$gid_to_process = $_POST['change_ua'];
									$update=mysqli_query($con,"update goods set status='unavailable' where gid=$gid_to_process");
									if($update){
										echo "<script>window.location.replace('manage-products.php')</script>";
									}else{
										echo "<script>alert('update failed')</script>";
									}

									echo "processed".$oid_to_process;
								}elseif(isset($_POST['change_a'])){
									$gid_to_process = $_POST['change_a'];
									$update=mysqli_query($con,"update goods set status='available' where gid=$gid_to_process");
									if($update){
										echo "<script>window.location.replace('manage-products.php')</script>";
									}else{
										echo "<script>alert('update failed')</script>";
									}

									echo "processed".$oid_to_process;
								}
								
								
								?>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->



	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>