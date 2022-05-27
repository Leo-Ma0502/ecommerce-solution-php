<?php //include("includes/templates/temp_head.php")?>  
<?php //include("includes/templates/temp_body_header.php")?> 
<?php //include("includes/templates/temp_profile.php")?> 
<?php include("payment_data.php")?> 
<div class="col-md-10">
	<div class="check-out">
        <div class="bs-example4" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                <table class="table-heading simpleCart_shelfItem">
                    <?php 
                    if(isset($_POST['edit'])){
                        echo "$information_edit"; 
                    }elseif(isset($_POST['update'])){
                        $id = $_POST['id'];
                        $paymethod = $_POST['paymethod'];
                        echo "<script>console.log('data input received')</script>";
                        $update = "UPDATE `user` SET `paymethod`='$paymethod' WHERE id=$id" ;
                        $check = mysqli_query($con,$update);
                        if ($check) {
                            echo "<script>window.location.replace('profile.php?section=payment','_self')</script>";
                            echo "<script>console.log('Profile has been Updated.')</script>";
                        }
                        else{
                            echo "<script>alert('Update failed')</script>";
                        }
                    }
                    else{
                         echo "$person_information";   
    
                    }       
                    ?>

                </table>
            </div>
	    </div>
    </div>
</div>
</div>

<?php //include("includes/templates/temp_body_footer.php");?> 